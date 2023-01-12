<?php

namespace app\admin\command;

use think\console\Command;
use think\console\Input;
use think\console\Output;
use think\Db;
use app\admin\model\RemoteMysqlSetting;

class CaijiZhibos extends Command{
    //每次采集的条数
    private $num = 5;
    private $type = 2;//type 1:新闻2直播:3录像:4:集锦

    protected function configure(){
        $this->setName('caiji_zhibos')->setDescription("计划任务-采集直播");
    }

    protected function execute(Input $input, Output $output){
        $output->writeln('直播采集开始执行-'.date('Y-m-d H:i:s'));
        //判断是否允许采集
        $allow = Db::name('mulu_systems')->where('key','caiji_zhibo')->find();
        if($allow['value'] == 0){
            $output->writeln('直播采集没有开启，结束采集...');
            exit;
        }
        $setting_array = Db::name('mulu_systems')->where('key','caiji_zhibo_database_config')->find();
        $setting = json_decode($setting_array['value'],true);
        $conn = @mysqli_connect($setting['dbhost'],$setting['dbuser'],$setting['dbpwd']);
        if(empty($conn)){
            $output->writeln('直播远程数据连接失败');
            exit;
        }
        $db = mysqli_select_db($conn,$setting['dbname']);
        if(!$db){
            $output->writeln('直播远程数据库不存在');
            exit;
        }

        //开始采集
        $caiji_biao_array = Db::name('mulu_category')->where('type',$this->type)->where('is_caiji',1)->select();
        if(empty($caiji_biao_array)){
            $output->writeln('本地没有设置采集的表');
            exit;
        }

        //连接远程数据库
        $remote_db = Db::connect([
            'type'            => 'mysql',
            'hostname'        => $setting['dbhost'],
            'database'        => $setting['dbname'],
            'username'        => $setting['dbuser'],
            'password'        => $setting['dbpwd'],
            'hostport'        => '3306',
            'charset'         => 'utf8',
        ],true);

        foreach ($caiji_biao_array as $biao){
            $caiji_biao_name = $biao['caiji_biao_name'];
            if($caiji_biao_name != ''){
                //判断远程表是否存在
                $sql = "show TABLES like '".$caiji_biao_name."'";
                $checkTable = $remote_db->query($sql);
                if(empty($checkTable)){
                    $output->writeln($caiji_biao_name.'表不存在');
                    continue;
//                    echo '表不存在';exit;
                }

                //开始采集
                $lists = $remote_db->table($caiji_biao_name)->where('fabu',0)->limit($this->num)->select();
                foreach ($lists as $item){
                    if($item['zhudui'] == '' or $item['kedui'] == ''){
                        $remote_db->table($caiji_biao_name)->where('id',$item['id'])->update([
                            'fabu' => 9
                        ]);
                    }else{
                        $input_data = [];
                        $input_data['c_id'] = $biao['category_id'];
                        $input_data['t'] = $biao['t'];
                        $input_data['zhudui'] = trim($item['zhudui']);
                        $input_data['kedui'] = $item['kedui'];
                        $input_data['create_time'] = strtotime($item['riqi']);//发布时间
                        $input_data['bifen'] = $item['bifen'];
                        $input_data['lunci'] = $item['lunci'];
                        $zhibo_id = Db::name('mulu_zhibos')->insertGetId($input_data);
                        //标志这条记录发布成功
                        $remote_db->table($caiji_biao_name)->where('id',$item['id'])->update([
                            'fabu' => 1
                        ]);
                        if($zhibo_id){
                            //tag--目录绑定的
                            if($biao['tag_id'] != 0){
                                $rel = Db::name('mulu_new_tag_relative')->insert([
                                    'article_id' => $zhibo_id,
                                    'tag_id' => $biao['tag_id'],
                                    'type' => $this->type
                                ]);
                                //++
                                if($rel){
                                    Db::name('mulu_new_tags')->where('new_tag_id',$biao['tag_id'])->setInc('zhibo_count');
                                }
                            }
                            //上级
                            if($biao['pid'] != 0){
                                $parent_category = Db::name('mulu_category')->where('category_id',$biao['pid'])->find();
                                if($parent_category and isset($parent_category['tag_id']) and $parent_category['tag_id'] != 0){
                                    $rel = Db::name('mulu_new_tag_relative')->insert([
                                        'article_id' => $zhibo_id,
                                        'tag_id' => $parent_category['tag_id'],
                                        'type' => $this->type
                                    ]);
                                    //++
                                    if($rel){
                                        Db::name('mulu_new_tags')->where('new_tag_id',$parent_category['tag_id'])->setInc('zhibo_count');
                                    }

                                }
                            }
                            //tag--标签绑定的球队
//                            $zhudui = Db::name('mulu_category')->where('type',$this->type)->where('team_id',$item['zhudui_id'])->where('tag_id','<>',0)->find();
//                            if($zhudui){
//                                $rel = Db::name('mulu_new_tag_relative')->insert([
//                                    'article_id' => $zhibo_id,
//                                    'tag_id' => $zhudui['tag_id'],
//                                    'type' => $this->type
//                                ]);
//                                //++
//                                if($rel){
//                                    Db::name('mulu_new_tags')->where('new_tag_id',$zhudui['tag_id'])->setInc('zhibo_count');
//                                }
//                            }
//                            $kedui = Db::name('mulu_category')->where('type',$this->type)->where('team_id',$item['kedui_id'])->where('tag_id','<>',0)->find();
//                            if($kedui){
//                                $rel = Db::name('mulu_new_tag_relative')->insert([
//                                    'article_id' => $zhibo_id,
//                                    'tag_id' => $kedui['tag_id'],
//                                    'type' => $this->type
//                                ]);
//                                //++
//                                if($rel){
//                                    Db::name('mulu_new_tags')->where('new_tag_id',$kedui['tag_id'])->setInc('zhibo_count');
//                                }
//                            }
                            $teams_array = Db::name('mulu_category')->where('pid',$biao['category_id'])->where('type',$this->type)->where('tag_id','<>',0)->select();
                            if(!empty($teams_array)){
//                                $input_data['title']
                                foreach ($teams_array as $team){
                                    if(mb_strstr($input_data['zhudui'],trim($team['category_name']))){
//                                        echo "包含";
                                        $rel = Db::name('mulu_new_tag_relative')->insert([
                                            'article_id' => $zhibo_id,
                                            'tag_id' => $team['tag_id'],
                                            'type' => $this->type
                                        ]);
                                        //++
                                        if($rel){
                                            Db::name('mulu_new_tags')->where('new_tag_id',$team['tag_id'])->setInc('zhibo_count');
                                        }
                                    }
                                    if(mb_strstr($input_data['kedui'],trim($team['category_name']))){
//                                        echo "包含";
                                        $rel = Db::name('mulu_new_tag_relative')->insert([
                                            'article_id' => $zhibo_id,
                                            'tag_id' => $team['tag_id'],
                                            'type' => $this->type
                                        ]);
                                        //++
                                        if($rel){
                                            Db::name('mulu_new_tags')->where('new_tag_id',$team['tag_id'])->setInc('zhibo_count');
                                        }
                                    }

                                }


                            }

                        }


                    }


                }//foreach ($lists as $item)


            }


        }//foreach ($caiji_biao_array as $biao)

        $output->writeln('直播采集结束-'.date('Y-m-d H:i:s'));


    }


}