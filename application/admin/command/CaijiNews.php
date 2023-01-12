<?php

namespace app\admin\command;

use think\console\Command;
use think\console\Input;
use think\console\Output;
use think\Db;
use app\admin\model\RemoteMysqlSetting;

class CaijiNews extends Command{
    //每次采集的条数
    private $num = 5;
    private $type = 1;//type 1:新闻2直播:3录像:4:集锦

    protected function configure(){
        $this->setName('caiji_news')->setDescription("计划任务-采集新闻");
    }

    protected function execute(Input $input, Output $output){
        $output->writeln('新闻采集开始执行-'.date('Y-m-d H:i:s'));
        //判断是否允许采集

        $allow = Db::name('mulu_systems')->where('key','caiji_new')->find();
        if($allow['value'] == 0){
            $output->writeln('新闻采集没有开启，结束采集...');
            exit;
        }
        $setting_array = Db::name('mulu_systems')->where('key','caiji_new_database_config')->find();
        $setting = json_decode($setting_array['value'],true);
        $conn = @mysqli_connect($setting['dbhost'],$setting['dbuser'],$setting['dbpwd']);
        if(empty($conn)){
            $output->writeln('新闻远程数据连接失败');
            exit;
        }
        $db = mysqli_select_db($conn,$setting['dbname']);
        if(!$db){
            $output->writeln('新闻远程数据库不存在');
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
//        $res = $remote_db->table('tiyuxinwen3_7')->where('Id',1)->find();
//        $res_1 = Db::name('mulu_category')->find(1);

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
                    if($item['biaoti'] == '' or $item['neirong'] == ''){
                        $remote_db->table($caiji_biao_name)->where('Id',$item['Id'])->update([
                            'fabu' => 9
                        ]);
                    }else{
                        $input_data = [];
                        //判断内容里有没有图片
                        if(preg_match("/<img.*>/",$item['neirong'])){
//                            echo "有图片";
                            $input_data['content_img'] = 1;
                        }else{
//                            echo "没有图片";
                            $input_data['content_img'] = 0;
                        }
                        $input_data['c_id'] = $biao['category_id'];
                        $input_data['t'] = $biao['t'];
                        $input_data['o_id'] = $item['Id'];
                        $input_data['title'] = trim(strip_tags($item['biaoti']));
                        $input_data['content'] = $item['neirong'];
                        $input_data['create_time'] = strtotime($item['shijian']);//发布新闻
                        $input_data['update_time'] = time();

                        $article_id = Db::name('mulu_articles')->insertGetId($input_data);
                        //标志这条记录发布成功
                        $remote_db->table($caiji_biao_name)->where('Id',$item['Id'])->update([
                            'fabu' => 1
                        ]);
                        if($article_id){
                            //tag--目录绑定的
                            if($biao['tag_id'] != 0){
                                $rel = Db::name('mulu_new_tag_relative')->insert([
                                    'article_id' => $article_id,
                                    'tag_id' => $biao['tag_id'],
                                    'type' => $this->type
                                ]);
                                //++
                                if($rel){
                                    Db::name('mulu_new_tags')->where('new_tag_id',$biao['tag_id'])->setInc('new_count');
                                }

                                //上级
                                if($biao['pid'] != 0){
                                    $parent_category = Db::name('mulu_category')->where('category_id',$biao['pid'])->find();
                                    if($parent_category and isset($parent_category['tag_id']) and $parent_category['tag_id'] != 0){
                                        $rel = Db::name('mulu_new_tag_relative')->insert([
                                            'article_id' => $article_id,
                                            'tag_id' => $parent_category['tag_id'],
                                            'type' => $this->type
                                        ]);
                                        //++
                                        if($rel){
                                            Db::name('mulu_new_tags')->where('new_tag_id',$parent_category['tag_id'])->setInc('new_count');
                                        }

                                    }
                                }

                            }
                            //tag--标签绑定的球员
                            $tags_array = Db::name('mulu_new_tags')->where('tag_category_new_relative',$biao['category_id'])->select();
                            foreach ($tags_array as $tag){
                                if(mb_strstr($item['neirong'],$tag['tag_name'])){
//                                    echo "包含";
                                    $rel = Db::name('mulu_new_tag_relative')->insert([
                                        'article_id' => $article_id,
                                        'tag_id' => $tag['new_tag_id'],
                                        'type' => $this->type
                                    ]);
                                    //++
                                    if($rel){
                                        Db::name('mulu_new_tags')->where('new_tag_id',$tag['new_tag_id'])->setInc('new_count');
                                    }
                                }

                            }


                        }


                    }



                }


            }//if($caiji_biao_name != '')

        }

        $output->writeln('新闻采集结束-'.date('Y-m-d H:i:s'));


    }



}