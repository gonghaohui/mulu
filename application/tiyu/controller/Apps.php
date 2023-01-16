<?php
namespace app\tiyu\controller;
use think\Request;
use think\Db;

class Apps extends PcBase{

    private $type = array(
        1 => '直播APP',
        2 => '体育APP'
    );

    public function index(){
        $website = Db::name('config')->select();
        $site = [];
        foreach ($website as $web){
            $site[$web['name']] = $web['value'];
        }
        $this->assign('site',$site);

        $zhibo_app = Db::name('mulu_app')
            ->where('type',1)->where('hot',1)->where('status',1)
            ->order('sort desc')
            ->limit(10)
            ->field('id,name,img')
            ->select();
        $tiyu_app = Db::name('mulu_app')
            ->where('type',2)->where('hot',1)->where('status',1)
            ->order('sort desc')
            ->limit(10)
            ->field('id,name,img')
            ->select();
        $this->assign('zhibo_app',$zhibo_app);
        $this->assign('tiyu_app',$tiyu_app);

        $zhibo = Db::name('mulu_app')
            ->where('type',1)->where('status',1)
            ->order('id desc')
            ->limit(6)
            ->field('id,name,sub_name,img,update,size,version')
            ->select();
        $this->assign('zhibo',$zhibo);

        $tiyu = Db::name('mulu_app')
            ->where('type',2)->where('status',1)
            ->order('id desc')
            ->limit(6)
            ->field('id,name,sub_name,img,update,size,version')
            ->select();
        $this->assign('tiyu',$tiyu);

        return $this->fetch('app/index');

    }

    public function content(){
        $id = input('id');
        $soft = Db::name('mulu_app')->where('status',1)->find($id);
        if(empty($soft))
        {
            throw new \think\exception\HttpException(404, '页面不存在');
        }
        $this->assign('soft',$soft);

        $zhibo_app = Db::name('mulu_app')
            ->where('type',1)->where('hot',1)->where('status',1)
            ->order('sort desc')
            ->limit(10)
            ->field('id,name,img')
            ->select();
        $tiyu_app = Db::name('mulu_app')
            ->where('type',2)->where('hot',1)->where('status',1)
            ->order('sort desc')
            ->limit(10)
            ->field('id,name,img')
            ->select();
        $this->assign('zhibo_app',$zhibo_app);
        $this->assign('tiyu_app',$tiyu_app);

        if($soft['photo'] != ''){
            $images = explode(',',$soft['photo']);
        }else{
            $images = [];
        }
        $this->assign('images',$images);

        $downloads = [];
        $main_download = '#';
        if($soft['downloads'] != ''){
            $download_array = explode("\n",$soft['downloads']);
            foreach ($download_array as $key => $item){
                $array = explode('|',$item);
                $downloads[$key]['name'] = $array[0];
                $downloads[$key]['url'] = $array[1];
                if($key == 0){
                    $main_download = $array[1];
                }
            }

        }else{
            $downloads = [];
        }
        $this->assign('downloads',$downloads);
        $this->assign('main_download',$main_download);

        $hot_app = Db::name('mulu_app')
            ->where('hot',1)->where('id','<>',$id)->where('status',1)
            ->order('id desc')
            ->limit(10)
            ->field('id,name')
            ->select();
        $this->assign('hot_app',$hot_app);

        $relate_app = Db::name('mulu_app')
            ->where('id','<>',$id)
            ->where('type',$soft['type'])->where('status',1)
            ->order('sort desc')
            ->limit(8)
            ->field('id,name,img')
            ->select();
        $this->assign('relate_app',$relate_app);

        return $this->fetch('app/content');
    }


    public function app_list(){
        $url_array = Request::instance();
        if(strpos($url_array->url(),'zhibo')){
            $title = "直播APP";
            $type = 1;
        }else if(strpos($url_array->url(),'tiyu')){
            $title = "体育APP";
            $type = 2;
        }else{
            throw new \think\exception\HttpException(404, '页面不存在');
        }
        $this->assign('title',$title);

        $zhibo_app = Db::name('mulu_app')
            ->where('type',1)->where('hot',1)->where('status',1)
            ->order('sort desc')
            ->limit(10)
            ->field('id,name,img')
            ->select();
        $tiyu_app = Db::name('mulu_app')
            ->where('type',2)->where('hot',1)->where('status',1)
            ->order('sort desc')
            ->limit(10)
            ->field('id,name,img')
            ->select();
        $this->assign('zhibo_app',$zhibo_app);
        $this->assign('tiyu_app',$tiyu_app);

        $lists = Db::name('mulu_app')
            ->where('status',1)
            ->where('type',$type)
            ->order('id desc')
            ->limit(99)
            ->field('id,name,detail,img,grade,size')
            ->select();
        $this->assign('lists',$lists);

        return $this->fetch('app/app_list');
    }


}