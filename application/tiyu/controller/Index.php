<?php
namespace app\tiyu\controller;


use think\Db;

class Index extends PcBase{

    public function index(){
        $website = Db::name('config')->select();
        $site = [];
        foreach ($website as $web){
            $site[$web['name']] = $web['value'];
        }
        $this->assign('site',$site);

        $this->assign('top_category',$this->top_category);
        $loops = Db::name('mulu_articles')->alias('a')
            ->join('think_mulu_category c','c.category_id = a.c_id')
            ->where('a.loop',1)
            ->where('a.status',1)
            ->where('content_img',1)
            ->order('a.article_id','desc')
            ->field('a.article_id,a.title,a.content,c.top_id')
            ->limit(4)->select();
        foreach ($loops as $key => $item){
            $imgs = $this->extract_img($item['content']);
            if(!empty($imgs)){
                $loops[$key]['img'] = $imgs[0];
            }else{
                $loops[$key]['img'] = '';
            }
            $loops[$key]['url'] = $this->top_category[$item['top_id']];
        }
        $this->assign('loops',$loops);

        $head_video = Db::name('mulu_videos')->alias('v')
            ->join('think_mulu_category c','c.category_id = v.c_id')
            ->where('v.hot',1)->where('v.status',1)->where('v.img','<>','')
            ->field('v.id,v.title,v.img,c.top_id')
            ->order('id','desc')
            ->limit(9)
            ->select();
        $this->assign('head_video',$head_video);

        $head_hot_new = Db::name('mulu_articles')->alias('a')
            ->join('think_mulu_category c','c.category_id = a.c_id')
            ->where('a.status',1)
            ->where('a.hot',1)
            ->order('a.create_time','desc')
            ->field('a.title,a.article_id,c.top_id')
            ->limit(4)
            ->select();
        $this->assign('head_hot_new',$head_hot_new);

        $head_international_new = Db::name('mulu_articles')->alias('a')
            ->join('think_mulu_category c','c.category_id = a.c_id')
            ->where('c_id','in','27,28,29,30,31')
            ->where('a.status',1)
            ->where('a.hot',0)
            ->order('a.create_time','desc')
            ->field('a.title,a.article_id,c.top_id')
            ->limit(4)
            ->select();
        $this->assign('head_international_new',$head_international_new);

        $head_domestic_new = Db::name('mulu_articles')->alias('a')
            ->join('think_mulu_category c','c.category_id = a.c_id')
            ->where('c_id','in','32')
            ->where('a.status',1)
            ->where('a.hot',0)
            ->order('a.create_time','desc')
            ->field('a.title,a.article_id,c.top_id')
            ->limit(4)
            ->select();
        $this->assign('head_domestic_new',$head_domestic_new);

        $head_basketball_new = Db::name('mulu_articles')->alias('a')
            ->join('think_mulu_category c','c.category_id = a.c_id')
//            ->where('c_id','in','2,39,40')
            ->where('a.t',$this->basketball)
            ->where('a.status',1)
            ->where('a.hot',0)
            ->order('a.create_time','desc')
            ->field('a.title,a.article_id,c.top_id')
            ->limit(4)
            ->select();
        $this->assign('head_basketball_new',$head_basketball_new);



        $loops_right = Db::name('mulu_articles')->alias('a')
            ->join('think_mulu_category c','c.category_id = a.c_id')
            ->where('a.loop_right',1)
            ->where('a.status',1)
            ->order('a.article_id','desc')
            ->field('a.article_id,a.title,a.content,c.top_id')
            ->limit(6)->select();
        foreach ($loops_right as $key => $item){
            $imgs = $this->extract_img($item['content']);
            if(!empty($imgs)){
                $loops_right[$key]['img'] = $imgs[0];
            }else{
                $loops_right[$key]['img'] = '';
            }
            $loops_right[$key]['url'] = $this->top_category[$item['top_id']];
            $loops_right[$key]['content'] = mb_substr(trim(strip_tags($item['content'])),0,26).'...';
        }
        $this->assign('loops_right',$loops_right);

        //直播列表
        $today_time = strtotime(date('Y-m-d',time()).' 00:00:00');
//        $today_time = 1659722400;
        $day_7 = $today_time + (86400 * 6);
        $zhibo_list = Db::name('mulu_zhibos')->alias('z')
            ->join('mulu_category c','c.category_id = z.c_id')
            ->where('z.create_time','between',[$today_time,$day_7])
            ->where('z.status',1)
            ->order('z.create_time','asc')
            ->limit(50)
            ->field('z.zhudui,z.kedui,z.create_time,c.category_name,c.pinyin')
            ->select();
        $zhibo_show_lists = [];
//        $week = array(1 => '一',2 => '二',3 => '三',4 => '四',5 => '五',6 => '六',7 => '日');
        if(empty($zhibo_list)){
            $zhibo_show_lists[1]['time'] = date('Y年m月d日',$today_time).'星期'.$this->week[date('N',$today_time)];
            $zhibo_show_lists[1]['list'] = [];
            $zhibo_show_lists[2]['time'] = date('Y年m月d日',$today_time+(86400*1)).'星期'.$this->week[date('N',$today_time+(86400*1))];
            $zhibo_show_lists[2]['list'] = [];
            $zhibo_show_lists[3]['time'] = date('Y年m月d日',$today_time+(86400*2)).'星期'.$this->week[date('N',$today_time+(86400*2))];
            $zhibo_show_lists[3]['list'] = [];
            $zhibo_show_lists[4]['time'] = date('Y年m月d日',$today_time+(86400*3)).'星期'.$this->week[date('N',$today_time+(86400*3))];
            $zhibo_show_lists[4]['list'] = [];
            $zhibo_show_lists[5]['time'] = date('Y年m月d日',$today_time+(86400*4)).'星期'.$this->week[date('N',$today_time+(86400*4))];
            $zhibo_show_lists[5]['list'] = [];
            $zhibo_show_lists[6]['time'] = date('Y年m月d日',$today_time+(86400*5)).'星期'.$this->week[date('N',$today_time+(86400*5))];
            $zhibo_show_lists[6]['list'] = [];
            $zhibo_show_lists[7]['time'] = date('Y年m月d日',$today_time+(86400*6)).'星期'.$this->week[date('N',$today_time+(86400*6))];
            $zhibo_show_lists[7]['list'] = [];
        }else{
            foreach ($zhibo_list as $z){
                $now_time = date('Ymd',$z['create_time']);
                $zhibo_show_lists[$now_time]['list'][] = $z;
                //2022年09月29日星期四

                $zhibo_show_lists[$now_time]['time'] = date('Y年m月d日',$z['create_time']).'星期'.$this->week[date('N',$z['create_time'])];
            }
        }

//        print_r($zhibo_show_lists);exit;
        $this->assign('zhibo_show_lists',$zhibo_show_lists);

        //录像

        $basketball_team_tags = Db::name('mulu_category')
            ->where('pid','in','35,36')
//                ->where('t',$this->basketball)->where('type',$this->type_new)
            ->where('status',1)->where('support',1)
            ->limit(3)
            ->field('category_name,tag_id')
            ->select();
        $this->assign('basketball_team_tags',$basketball_team_tags);

        $basketball_videos = Db::name('mulu_videos')->alias('v')
            ->join('think_mulu_category c','c.category_id = v.c_id')
//            ->where('v.c_id','in','35,36')
            ->where('v.t',$this->basketball)
            ->where('v.status',1)
            ->field('v.id,v.title,v.create_time,c.top_id')
            ->order('create_time','desc')
            ->limit(7)
            ->select();
        $this->assign('basketball_videos',$basketball_videos);

        $football_team_category = Db::name('mulu_category')
            ->where('pid','5')
            ->where('status',1)->where('support',1)
            ->limit(3)
            ->field('category_name,pinyin')
            ->select();
        $this->assign('football_team_category',$football_team_category);

        $football_videos = Db::name('mulu_videos')->alias('v')
            ->join('think_mulu_category c','c.category_id = v.c_id')
            ->where('v.c_id','in','15,16,17,18,19,20')
            ->where('v.status',1)
            ->field('v.id,v.title,v.create_time,c.top_id')
            ->order('create_time','desc')
            ->limit(7)
            ->select();
        $this->assign('football_videos',$football_videos);


        //国际足球
        $football_column = Db::name('mulu_category')
            ->where('type',$this->type_new)
            ->where('pid',1)
            ->where('status',1)
            ->order('sort','asc')
            ->field('category_name,pinyin')
            ->select();
        $this->assign('football_column',$football_column);

        $yingchao_news = $this->get_news(27,5);
        $this->assign('yingchao_news',$yingchao_news);
        $yingchao_support_teams = $this->get_teams(27);
        $this->assign('yingchao_support_teams',$yingchao_support_teams);

        $xijia_news = $this->get_news(27,5);
        $this->assign('xijia_news',$xijia_news);
        $xijia_support_teams = $this->get_teams(27);
        $this->assign('xijia_support_teams',$xijia_support_teams);

        $dejia_news = $this->get_news(27,5);
        $this->assign('dejia_news',$dejia_news);
        $dejia_support_teams = $this->get_teams(27);
        $this->assign('dejia_support_teams',$dejia_support_teams);

        $yijia_news = $this->get_news(27,5);
        $this->assign('yijia_news',$yijia_news);
        $yijia_support_teams = $this->get_teams(27);
        $this->assign('yijia_support_teams',$yijia_support_teams);

        $fajia_news = $this->get_news(27,5);
        $this->assign('fajia_news',$fajia_news);
        $fajia_support_teams = $this->get_teams(27);
        $this->assign('fajia_support_teams',$fajia_support_teams);

        $international_football_news = Db::name('mulu_articles')->alias('a')
            ->join('think_mulu_category c','c.category_id = a.c_id')
            ->where('a.c_id','in','27,28,29,30,31')
            ->where('a.status',1)
            ->order('a.article_id','desc')
            ->field('a.article_id,a.title,a.content,c.top_id')
            ->limit(4)->select();
        foreach ($international_football_news as $key => $item){
            $imgs = $this->extract_img($item['content']);
            if(!empty($imgs)){
                $international_football_news[$key]['img'] = $imgs[0];
            }else{
                $international_football_news[$key]['img'] = '';
            }
            $international_football_news[$key]['url'] = $this->top_category[$item['top_id']];
            $international_football_news[$key]['content'] = mb_substr(trim(strip_tags($item['content'])),0,26).'...';
        }
        $this->assign('international_football_news',$international_football_news);

        $perday_highlights = Db::name('mulu_highlights')->alias('a')
            ->join('think_mulu_category c','c.category_id = a.c_id')
            ->join('think_mulu_category cc','c.top_id = cc.category_id')
            ->where('a.c_id','in','21,22,23,24,25')
            ->where('a.status',1)
            ->where('a.img','<>','')
            ->order('a.id','desc')
            ->field('a.id,a.title,a.img,c.pinyin')
            ->limit(3)->select();
        $this->assign('perday_highlights',$perday_highlights);

        //国内足球
        $domestic_football_teams = Db::name('mulu_category')
            ->where('type',$this->type_new)->where('pid',32)->where('status',1)->where('support',1)
            ->field('category_name,tag_id')
            ->order('sort','asc')
            ->select();
        $this->assign('domestic_football_teams',$domestic_football_teams);

        $domestic_perday_highlights = Db::name('mulu_highlights')->alias('a')
            ->join('think_mulu_category c','c.category_id = a.c_id')
            ->join('think_mulu_category cc','c.top_id = cc.category_id')
            ->where('a.c_id',26)
            ->where('a.status',1)
            ->where('a.img','<>','')
            ->order('a.id','desc')
            ->field('a.id,a.title,a.img,c.pinyin')
            ->limit(3)->select();
        $this->assign('domestic_perday_highlights',$domestic_perday_highlights);

        $domestic_football_img_news = Db::name('mulu_articles')->alias('a')
            ->join('think_mulu_category c','c.category_id = a.c_id')
            ->where('a.c_id',32)
            ->where('a.status',1)
            ->where('content_img',1)
            ->order('a.article_id','desc')
            ->field('a.article_id,a.title,a.content,c.top_id')
            ->limit(4)->select();
        foreach ($domestic_football_img_news as $key => $item){
            $imgs = $this->extract_img($item['content']);
            if(!empty($imgs)){
                $domestic_football_img_news[$key]['img'] = $imgs[0];
            }else{
                $domestic_football_img_news[$key]['img'] = '';
            }
            $domestic_football_img_news[$key]['url'] = $this->top_category[$item['top_id']];
            $domestic_football_img_news[$key]['content'] = mb_substr(trim(strip_tags($item['content'])),0,26).'...';
        }
        $this->assign('domestic_football_img_news',$domestic_football_img_news);

        $domestic_football_news = Db::name('mulu_articles')->alias('a')
            ->join('think_mulu_category c','c.category_id = a.c_id')
            ->join('think_mulu_category cc','c.top_id = cc.category_id')
            ->where('a.c_id',32)
            ->where('a.status',1)
            ->where('content_img',0)
            ->order('a.article_id','desc')
            ->field('a.article_id,a.title,cc.pinyin')
            ->limit(18)->select();
        $this->assign('domestic_football_news',$domestic_football_news);

        //NBA
        $basketball_column = Db::name('mulu_category')
            ->where('type',$this->type_new)
            ->where('pid',2)
            ->where('status',1)
            ->order('sort','asc')
            ->field('category_name,pinyin')
            ->select();
        $this->assign('basketball_column',$basketball_column);

        $basketball_teams = Db::name('mulu_category')
            ->where('status',1)->where('support',1)->where('pid',39)
            ->field('category_id,category_name,top_id')
            ->order('sort','asc')
            ->select();
        foreach ($basketball_teams as $key => $team){
            $b_players = Db::name('mulu_new_tags')
                ->where('tag_category_new_relative',$team['category_id'])->where('hot',1)
                ->field('new_tag_id,tag_name')
                ->select();
            $basketball_teams[$key]['players'] = $b_players;
            $basketball_teams[$key]['url'] = $this->top_category[$team['top_id']];

            $b_team_news = Db::name('mulu_articles')
                ->where('c_id',$team['category_id'])
                ->where('status',1)
                ->order('article_id','desc')
                ->field('article_id,title')
                ->limit(5)
                ->select();
            $basketball_teams[$key]['news'] = $b_team_news;
        }
        $this->assign('basketball_teams',$basketball_teams);

        //CBA
        $cba_support_teams = Db::name('mulu_category')
            ->where('pid',40)->where('status',1)->where('support',1)
            ->field('category_name')
            ->order('sort','asc')
            ->select();
        $this->assign('cba_support_teams',$cba_support_teams);

        $cba_videos = Db::name('mulu_videos')->alias('a')
            ->join('think_mulu_category c','c.category_id = a.c_id')
            ->join('think_mulu_category cc','c.top_id = cc.category_id')
            ->where('a.c_id',36)
            ->where('a.status',1)
            ->where('a.img','<>','')
            ->order('a.id','desc')
            ->field('a.id,a.title,a.img,c.pinyin')
            ->limit(3)->select();
        $this->assign('cba_videos',$cba_videos);

        $cba_left_news = Db::name('mulu_articles')->alias('a')
            ->join('think_mulu_category c','c.category_id = a.c_id')
            ->where('a.c_id',40)
            ->where('content_img',1)
            ->where('a.status',1)
            ->order('a.article_id','desc')
            ->field('a.article_id,a.title,a.content,c.top_id')
            ->limit(4)->select();
        foreach ($cba_left_news as $key => $item){
            $imgs = $this->extract_img($item['content']);
            if(!empty($imgs)){
                $cba_left_news[$key]['img'] = $imgs[0];
            }else{
                $cba_left_news[$key]['img'] = '';
            }
            $cba_left_news[$key]['url'] = $this->top_category[$item['top_id']];
            $cba_left_news[$key]['content'] = mb_substr(trim(strip_tags($item['content'])),0,26).'...';
        }
        $this->assign('cba_left_news',$cba_left_news);

        $cba_news = Db::name('mulu_articles')->alias('a')
            ->join('think_mulu_category c','c.category_id = a.c_id')
            ->join('think_mulu_category cc','c.top_id = cc.category_id')
            ->where('a.c_id',40)
            ->where('content_img',1)
            ->where('a.status',1)
            ->order('a.article_id','desc')
            ->field('a.article_id,a.title,cc.pinyin')
            ->limit(18)->select();
        $this->assign('cba_news',$cba_news);

        $cba_video_link = Db::name('mulu_category')->find(36);
        $this->assign('cba_video_link',$cba_video_link);

        $zhongchao_highlight_link = Db::name('mulu_category')->find(26);
        $this->assign('zhongchao_highlight_link',$zhongchao_highlight_link);

        return $this->fetch('index/index');

    }

    private function get_news($c_id,$limit = 5){
        $news = Db::name('mulu_articles')->alias('a')
            ->join('think_mulu_category c','c.category_id = a.c_id')
            ->join('think_mulu_category cc','c.top_id = cc.category_id')
            ->where('a.c_id',$c_id)
            ->where('a.status',1)
            ->order('a.article_id','desc')
            ->field('a.article_id,a.title,cc.pinyin')
            ->limit($limit)
            ->select();
        return $news;
    }

    private function get_teams($pid){
        $teams = Db::name('mulu_category')
            ->where('type',$this->type_new)->where('status',1)->where('pid',27)->where('support',1)
            ->order('sort','asc')
            ->field('category_name,tag_id')
            ->select();
        return $teams;
    }

    public function switch_page(){

        echo "page";exit;

    }

    public function switch_view(){
        echo $id = input('id');
    }





}