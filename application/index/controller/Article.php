<?php
namespace app\index\controller;
use app\index\model\CommentModel;
use think\Db;
use think\Page;

class Article extends PcBase
{
    public function index(){

        $id = input('id',1);
        echo 'aaa'.$id;exit;
        if($id==''){
            throw new \think\exception\HttpException(404, '页面不存在');
        }

        $article = Db::name('articles')->alias('a')
            ->join('think_article_category first','first.category_id = a.first_category')
            ->join('think_article_category second','second.category_id = a.second_category')
            ->where('a.article_id',$id)
            ->where('a.status',1)
            ->field('a.*,first.category_name_jp first_category_name_jp,second.category_name_jp second_category_name_jp,first.category_url first_category_url')
            ->find();
        if(empty($article)){
            throw new \think\exception\HttpException(404, '页面不存在');
        }
        $this->assign('article',$article);

        //该文章访问加1
        Db::name('articles')->where('article_id',$id)->setInc('views');

        //获取当前文章的标签
        $tags = Db::name('article_tags_relative')->alias('atr')
            ->join('think_article_tags at','at.tag_id = atr.tag_id')
            ->where('atr.article_id',$id)
            ->field('atr.*,at.tag_name_jp')
            ->select();
        $this->assign('tags',$tags);

        //最新的10篇文章
        $latestArticles = Db::name('articles')->cache('latest_article_10',600)
            ->where('status',1)
            ->order('article_id','desc')
            ->limit(10)
            ->field('article_id,title')
            ->select();
        $this->assign('latestArticles',$latestArticles);

        //获取相关的10篇文章,把当前目录下最相似的十篇文章展示出来
        $nowCategoryArticles = Db::name('articles')
            ->where('article_id','neq',$id)
            ->where('second_category',$article['second_category'])
            ->where('status',1)
            ->field('title,article_id')
            ->select();
        if(!empty($nowCategoryArticles)){
            $articleArray = array();
            foreach ($nowCategoryArticles as $nowArticle){
                $articleArray[$nowArticle['article_id']] = $nowArticle['title'];
            }
            $relativeArticles= $this->getSimilar($article['title'],$articleArray,10);
        }else{
            $relativeArticles = array();
        }

        $this->assign('relativeArticles',$relativeArticles);

        //工具列表
        $tools = config('tools');
        $this->assign('tools',$tools);

        //评论
//        $list = Db::name('comment')->where('status',1);
//        $this->assign('list', $list);

        $commentModel = new CommentModel();
        $comment_count = Db::name('comment')
            ->where(['article_id'=>$id,'pid'=>0,'status'=>1])->count();

        $page = new Page($comment_count, 10);
        $comments = $commentModel->where(['article_id'=>$id,'pid'=>0,'status'=>1])
            ->order('comment_id','asc')
            ->limit($page->firstRow . ',' . $page->listRows)->select();
        foreach ($comments as $key => $comment){
            $comments[$key]['between_time'] = $this->format_date($comment['create_time']);
        }

        $this->assign('page',$page);
        $this->assign('comments',$comments);
//        print_r($comments);
//        $page->comment_show();

        $ip_address = $this->get_client_ip();
        $this->assign('ip_address',$ip_address);
        $this->assign('id',$id);
        return $this->fetch('index/article');
    }

    private function getSimilar($title,$arr_title,$limit=10)
    {
//        $arr_len= count($arr_title);
        foreach ($arr_title as $key => $a_title){
            //取得两个字符串相似的字节数
            $arr_similar[$key] = similar_text($a_title,$title);
        }
//        for($i=0; $i<=($arr_len-1); $i++)
//        {
//            //取得两个字符串相似的字节数
//            $arr_similar[$i] = similar_text($arr_title[$i],$title);
//        }
//        print_r($arr_similar);
        arsort($arr_similar); //按照相似的字节数由高到低排序
        reset($arr_similar); //将指针移到数组的第一单元
        $index= 0;
        foreach($arr_similar as $old_index=>$similar)
        {
            $new_title_array[$index]['title'] = $arr_title[$old_index];
            $new_title_array[$index]['article_id'] = $old_index;
            $index++;
            if($index>=$limit){
                break;
            }
        }
        return $new_title_array;
    }


    public function comment(){
        if(request()->isPost()){
            $inputData = array();
            $comment_id = input('comment_id');

            $inputData['article_id'] = input('article_id');
//            $inputData['ip_address'] = $this->get_client_ip();
            $inputData['status'] = 2;
            $inputData['create_time'] = time();
            $inputData['update_time'] = time();
            $ip_address = input('ip_address');
            if($ip_address == ''){
                $inputData['ip_address'] = $this->get_client_ip();
            }else{
                $inputData['ip_address'] = htmlentities($ip_address);
            }


            if($comment_id == ''){
                //评论
                $type = 1;
                $inputData['content'] = htmlentities(input('comment_content'));
                $inputData['pid'] = 0;
            }else{
                //回复
                $type = 2;
                $inputData['reply_name'] = input('reply_name');
                $inputData['content'] = htmlentities(input('comment_content'));
                $inputData['pid'] = input('comment_id');
            }
            $res = Db::name('comment')->insert($inputData);
            if($res){
                return json(['code' => 200, 'msg' => 'success','type' => $type]);
            }else{
                return json(['code' => 100, 'msg' => 'error','type' => $type]);
            }

        }
        return json(['code' => 100, 'data' => '', 'msg' => 'error']);

    }


    /**
     * 获取客户端IP地址
     * @param integer $type 返回类型 0 返回IP地址 1 返回IPV4地址数字
     * @param boolean $adv 是否进行高级模式获取（有可能被伪装）
     * @return mixed
     */
    private function get_client_ip($type = 0,$adv=false) {
        $type       =  $type ? 1 : 0;
        static $ip  =   NULL;
        if ($ip !== NULL) return $ip[$type];
        if($adv){
            if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $arr    =   explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
                $pos    =   array_search('unknown',$arr);
                if(false !== $pos) unset($arr[$pos]);
                $ip     =   trim($arr[0]);
            }elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
                $ip     =   $_SERVER['HTTP_CLIENT_IP'];
            }elseif (isset($_SERVER['REMOTE_ADDR'])) {
                $ip     =   $_SERVER['REMOTE_ADDR'];
            }
        }elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ip     =   $_SERVER['REMOTE_ADDR'];
        }
        // IP地址合法验证
        $long = sprintf("%u",ip2long($ip));
        $ip   = $long ? array($ip, $long) : array('0.0.0.0', 0);
        return $ip[$type];
    }

    /**
     * 获取评论时间和当前时间之差
     * @param $dateStr
     * @return false|string
     */
    private function format_date($dateStr) {
        $limit = time() - strtotime($dateStr);
        $r = "";
        if($limit < 60) {
            $r = 'ちょうど今';//刚刚
        } elseif($limit >= 60 && $limit < 3600) {
            $r = floor($limit / 60) . '分前';
        } elseif($limit >= 3600 && $limit < 86400) {
            $r = floor($limit / 3600) . '時間前';
        } elseif($limit >= 86400 && $limit < 172800) {
            $r = '昨日';
        } elseif($limit >= 172800 && $limit < 2592000) {
            $r = floor($limit / 86400) . '日前';
        } elseif($limit >= 2592000 && $limit < 31104000) {
            //$r = floor($limit / 2592000) . '个月前';
            $r = date('Y-m-d',strtotime($dateStr));
        } else {
            $r = date('Y-m-d',strtotime($dateStr));
        }
        //return $r . "（" . $dateStr . "）";
        return $r;
    }

}