<?php

namespace app\admin\controller;
use app\admin\model\PinYin;
use think\Db;

class UpdateFunction extends Base{
    private $second = ['英超','西甲','意甲','德甲','法甲','中超'];

    private $lanqiu = ['NBA','CBA'];
    private $type = ['新闻','直播','录像','集锦'];

    private $cba = ["浙江","辽宁","山西","山东","吉林","广东","北京","同曦","江苏","北控","青岛","广厦","新疆","广州","深圳","四川","天津","上海","福建","宁波"];
    private $nba = ["凯尔特人","雄鹿","骑士","篮网","老鹰","步行者","猛龙","76人","尼克斯","热火","奇才","公牛","黄蜂","活塞","魔术","鹈鹕","太阳","灰熊","掘金","国王","爵士","独行侠","开拓者","快船","勇士","森林狼","雷霆","湖人","火箭","马刺"];

    //地址:/admin/update_function/input_zujiu_second
    //导入足球二级目录
    public function input_zujiu_second(){
        exit;
        $pid = input('pid');
        if($pid){
            $upCategory = Db::name('mulu_category')->find($pid);
            if($upCategory){
                foreach ($this->second as $second){
                    $category = [];
                    $category['type'] = $upCategory['type'];
                    $category['category_name'] = $second.$this->type[$upCategory['type']-1];
                    $category['pinyin'] = $upCategory['pinyin'].'/'.$this->get_pinyin($second);
                    $category['pid'] = $pid;

                    $exist = Db::name('mulu_new_tags')->where('tag_name',$second)->find();
                    if($exist){
                        $category['tag_id'] = $exist['new_tag_id'];
                    }else{
                        $tag_id = Db::name('mulu_new_tags')->insertGetId([
                            'tag_name' => $second
                        ]);
                        $category['tag_id'] = $tag_id;
                    }
                    Db::name('mulu_category')->insert($category);
                }
                echo "导入二级目录成功";exit;

            }else{
                echo "找不到上级分类";exit;
            }
        }else{
            echo "Error!";exit;
        }
    }

    public function input_lanjiu_second(){
        exit;
        $pid = input('pid');
        if($pid) {
            $upCategory = Db::name('mulu_category')->find($pid);
            if($upCategory){
                foreach ($this->lanqiu as $second){
                    $category = [];
                    $category['type'] = $upCategory['type'];
                    $category['category_name'] = $second.$this->type[$upCategory['type']-1];
                    $category['pinyin'] = $upCategory['pinyin'].'/'.strtolower($second);
                    $category['pid'] = $pid;
                    $exist = Db::name('mulu_new_tags')->where('tag_name',$second)->find();
                    if($exist){
                        $category['tag_id'] = $exist['new_tag_id'];
                    }else{
                        $tag_id = Db::name('mulu_new_tags')->insertGetId([
                            'tag_name' => $second
                        ]);
                        $category['tag_id'] = $tag_id;
                    }
                    Db::name('mulu_category')->insert($category);

                }
                echo "导入二级目录成功";exit;

            }else{
                echo "找不到上级分类";exit;
            }

        }else{
            echo "Error!";exit;
        }


    }

    //地址:/admin/update_function/input_zujiu_third  pid= 1,2,3,4可多个
    //导入足球三级目录(球队名)
    public function input_zujiu_third(){
        exit;
        $pid = trim(input('pid'));
//        $type = 0;//英超
//        $type = 1;//西甲
//        $type = 2;//意甲
        $type = 3;//德甲
//        $type = 4;//法甲
//        $type = 5;//中超
        if($pid) {
            $pid_array = explode(',',$pid);

            $teams = Db::name('team_info')->where('league',$this->second[$type])->field('name_cn')->select();
//            print_r($teams);exit;
            if(empty($teams)){
                echo "找不到球队";exit;
            }

            foreach ($pid_array as $p_id){
                $upCategory = Db::name('mulu_category')->find($p_id);
                foreach ($teams as $team){
                    $category = [];
                    $category['type'] = $upCategory['type'];
                    $category['category_name'] = $team['name_cn'];
                    $category['pinyin'] = $upCategory['pinyin'].'/'.$this->get_pinyin($team['name_cn']);
                    $category['pid'] = $p_id;
                    $exist = Db::name('mulu_new_tags')->where('tag_name',$team['name_cn'])->find();
                    if($exist){
                        $category['tag_id'] = $exist['new_tag_id'];
                    }else{
                        $tag_id = Db::name('mulu_new_tags')->insertGetId([
                            'tag_name' => $team['name_cn']
                        ]);
                        $category['tag_id'] = $tag_id;
                    }
                    Db::name('mulu_category')->insert($category);
                }

            }
            echo "导入三级目录成功";exit;


        }else{
            echo "Error!";exit;
        }
    }

    public function input_nba(){
        exit;
        $pid = input('pid');
        if($pid) {
            $upCategory = Db::name('mulu_category')->find($pid);
            foreach ($this->nba as $second){
                $category = [];
                $category['type'] = $upCategory['type'];
                $category['category_name'] = $second;
                $category['pinyin'] = $upCategory['pinyin'].'/'.$this->get_pinyin($second);
                $category['pid'] = $pid;

                $exist = Db::name('mulu_new_tags')->where('tag_name',$second)->find();
                if($exist){
                    $category['tag_id'] = $exist['new_tag_id'];
                }else{
                    $tag_id = Db::name('mulu_new_tags')->insertGetId([
                        'tag_name' => $second
                    ]);
                    $category['tag_id'] = $tag_id;
                }
                Db::name('mulu_category')->insert($category);
            }
            echo "导入三级目录成功";exit;

        }else{
            echo "Error!";exit;
        }

    }

    public function input_cba(){
        exit;
        $pid = input('pid');
        if($pid) {
            $upCategory = Db::name('mulu_category')->find($pid);
            foreach ($this->cba as $second){
                $category = [];
                $category['type'] = $upCategory['type'];
                $category['category_name'] = $second;
                $category['pinyin'] = $upCategory['pinyin'].'/'.$this->get_pinyin($second);
                $category['pid'] = $pid;

                $exist = Db::name('mulu_new_tags')->where('tag_name',$second)->find();
                if($exist){
                    $category['tag_id'] = $exist['new_tag_id'];
                }else{
                    $tag_id = Db::name('mulu_new_tags')->insertGetId([
                        'tag_name' => $second
                    ]);
                    $category['tag_id'] = $tag_id;
                }
                Db::name('mulu_category')->insert($category);
            }
            echo "导入三级目录成功";exit;

        }else{
            echo "Error!";exit;
        }
    }

    //获取拼音
    private function get_pinyin($category_name){
        $py = new PinYin();
        $all_py = $py->get_all_py($category_name);
        return $pinyin = join('',$all_py);
    }

    public function update_top_id(){
//        $category_array = Db::name('mulu_category')
//            ->where('category_id','>=',9)
//            ->where('category_id','<=',40)
//            ->select();
//        foreach ($category_array as $category){
//            Db::name('mulu_category')->where('category_id',$category['category_id'])->update([
//                'top_id'=> $category['pid']
//            ]);
//        }

        exit;
        $category_array = Db::name('mulu_category')->alias('c')->join('think_mulu_category p_c','c.pid = p_c.category_id')
            ->where('c.top_id',0)
            ->where('c.category_id','>=',41)
            ->field('c.*,p_c.top_id as p_top_id')
            ->select();
        foreach ($category_array as $category){
            Db::name('mulu_category')->where('category_id',$category['category_id'])->update([
                'top_id'=> $category['p_top_id']
            ]);
        }
    }

    public function update_tag(){
        $lian = $this->second[5];
        $res = Db::name('team_info')->where('league',$lian)
            ->field('id as team_id,name_cn')
//            ->limit(1)
            ->select();
//        print_r($res);
//        exit;

        foreach ($res as $item){
            $players = Db::name('players')->where('team_id',$item['team_id'])->field('name')->select();

            $category_array = Db::name('mulu_category')->where('category_name',$item['name_cn'])->field('category_id,category_name,type')->select();
            $c_array = [];
            foreach ($category_array as $a){
                $c_array[$a['type']] = $a['category_id'];
            }
            foreach ($players as $player){
                $input = [];
                $input['tag_name'] = $player['name'];
                $input['tag_category_new_relative'] = isset($c_array[1]) ? $c_array[1] : 0;
                $input['tag_category_zhibo_relative'] = isset($c_array[2]) ? $c_array[2] : 0;
                $input['tag_category_video_relative'] = isset($c_array[3]) ? $c_array[3] : 0;
                $input['tag_category_highlight_relative'] = isset($c_array[4]) ? $c_array[4] : 0;
                Db::name('mulu_new_tags')->insert($input);
            }

        }
//        print_r($players);
//        echo "<br>";
//        print_r($category_array);
        echo "ok";
    }

    public function update_zhibo_team_id(){
        exit;
        $team_id = input('team_id');
        if($team_id){
            $teams = Db::name('team_info')->where('league_id',$team_id)->field('id,name_cn')->select();
//            print_r($teams);
            if(!empty($teams)){
                foreach ($teams as $team){
                    $category = Db::name('mulu_category')->where('type',2)->where('category_name',$team['name_cn'])->find();
                    if(!empty($category)){
                        Db::name('mulu_category')->where('category_id',$category['category_id'])->update([
                            'team_id' => $team['id']
                        ]);
                    }

                }


            }




        }

    }

    public function update_nba_tag(){
        exit;
        $league_id = 924;


        $nba_teams = Db::name('team_info')
            ->where('league_id',$league_id)
            ->field('id,short_name')
            ->select();

//        foreach ($nba_teams as $team){
//            $t = Db::name('mulu_category')->where('category_name',$team['short_name'])->find();
//            if(empty($t)){
//                echo $team['short_name']."找不到";
//            }
//        }

        foreach ($nba_teams as $team){
            $players = Db::name('players')
                ->where('team_id',$team['id'])
                ->field('short_name')
                ->select();
            $category = Db::name('mulu_category')
                ->where('category_name',$team['short_name'])
                ->select();
            $input = [];
            $input['tag_category_new_relative'] =  0;
            $input['tag_category_zhibo_relative'] =  0;
            $input['tag_category_video_relative'] =  0;
            $input['tag_category_highlight_relative'] = 0;
            foreach ($category as $ca){
                if($ca['type'] == 1){
                    $input['tag_category_new_relative'] = $ca['category_id'];
                }else if($ca['type'] == 2){
                    $input['tag_category_zhibo_relative'] = $ca['category_id'];
                }else if($ca['type'] == 3){
                    $input['tag_category_video_relative'] = $ca['category_id'];
                }else if($ca['type'] == 4){
                    $input['tag_category_highlight_relative'] = $ca['category_id'];
                }
            }

            foreach ($players as $player){
                $input['tag_name'] = $player['short_name'];
                Db::name('mulu_new_tags')->insert($input);
            }


        }


    }

    public function update_cba_tag(){
        exit;
        $league_id = 925;


        $nba_teams = Db::name('team_info')
            ->where('league_id',$league_id)
            ->field('id,short_name')
            ->select();

//        foreach ($nba_teams as $team){
//            $t = Db::name('mulu_category')->where('category_name',$team['short_name'])->find();
//            if(empty($t)){
//                echo $team['short_name']."找不到";
//            }
//        }
//
//        exit;

        foreach ($nba_teams as $team){
            if($team['short_name'] == '八一'){
                continue;
            }
            $players = Db::name('players')
                ->where('team_id',$team['id'])
                ->field('name')
                ->select();
            $category = Db::name('mulu_category')
                ->where('category_name',$team['short_name'])
                ->select();
            $input = [];
            $input['tag_category_new_relative'] =  0;
            $input['tag_category_zhibo_relative'] =  0;
            $input['tag_category_video_relative'] =  0;
            $input['tag_category_highlight_relative'] = 0;
            foreach ($category as $ca){
                if($ca['type'] == 1){
                    $input['tag_category_new_relative'] = $ca['category_id'];
                }else if($ca['type'] == 2){
                    $input['tag_category_zhibo_relative'] = $ca['category_id'];
                }else if($ca['type'] == 3){
                    $input['tag_category_video_relative'] = $ca['category_id'];
                }else if($ca['type'] == 4){
                    $input['tag_category_highlight_relative'] = $ca['category_id'];
                }
            }

            foreach ($players as $player){
                $input['tag_name'] = $player['name'];
                Db::name('mulu_new_tags')->insert($input);
            }


        }


    }

}