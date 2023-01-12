<?php

namespace app\admin\controller;
use app\admin\model\NewCategoryModel;
use app\admin\model\NewsModel;
use app\admin\model\PinYin;
use think\Db;

class News extends Base{

    private $typeArray = [
        ['index'=>1,'key'=>'新闻'],
        ['index'=>2,'key'=>'直播'],
        ['index'=>3,'key'=>'录像'],
        ['index'=>4,'key'=>'集锦']
    ];
    private $type = 1;//type 1:新闻2直播:3录像:4:集锦
    /**
     * 分类列表
     */
    public function category_list(){
        if(request()->isAjax ()){
            extract(input());
            $map = [];
            if(isset($key)&&$key!="")
            {
                $map['title'] = ['like',"%" . $key . "%"];
            }
            if(isset($start)&&$start!=""&&isset($end)&&$end=="")
            {
                $map['create_time'] = ['>= time',$start];
            }
            if(isset($end)&&$end!=""&&isset($start)&&$start=="")
            {
                $map['create_time'] = ['<= time',$end];
            }
            if(isset($start)&&$start!=""&&isset($end)&&$end!="")
            {
                $map['create_time'] = ['between time',[$start,$end]];
            }
            $nav = new \org\Leftnav;
            $categoryModel = new NewCategoryModel();
//            $Nowpage = 1;
//            $limits = 1000;
//            $count = Db::name('article_category')->where($map)->count();//计算总页面
            $allCategories = $categoryModel->getCategories();
            foreach($allCategories  as $key=>$vo){
                $allCategories[$key]['placeholder'] = '';
            }
//            print_r($allCategories);exit;
            $nav->init($allCategories);
            $lists = $nav->get_tree(0,'','','','','article_category');
            return json(['code'=>220,'msg'=>'','data'=>$lists]);
        }

        return $this->fetch('news/category_list');
    }

    /**
     * editField 快捷编辑
     * @return \think\response\Json
     */
    public function editField(){
        extract(input());
        $res = Db::name($table)->where(['category_id' => $id ])->setField($field , $value);
        if($res){
            writelog('更新字段成功',200);
            return json(['code' => 200,'data' => '', 'msg' => '更新字段成功']);
        }else{
            writelog('更新字段失败',100);
            return json(['code' => 100,'data' => '', 'msg' => '更新字段失败']);
        }
    }

    /**
     * [status_state 分类显示状态]
     * @return [type] [description]
     * @author
     */
    public function status_state()
    {
        extract(input());
        $menu = new NewCategoryModel();
        if($field == 'is_caiji'){
            $data = $menu->find($id);
            if( ($data['caiji_biao_name'] == '' or $data['caiji_biao_name'] == 'null') and $num == 1){
                return ['code' => 100, 'data' => '', 'msg' => '采集表名不能为空，启用失败'];
            }
        }
        $flag = $menu->statusState($id,$num,$field);
        return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }

    /**
     * [add_cate 添加分类]
     * @return [type] [description]
     * @author
     */
    public function add_category()
    {
        $categoryModel = new NewCategoryModel();
        $pid = input('id');

        if(request()->isPost()){
//            extract(input());
            $param = input('post.');
            unset($param['file']);
            $param['pinyin'] = $param['pinyin_other'].$param['pinyin'];
            unset($param['pinyin_other']);
            $tag_name = trim($param['tag_name']);
            unset($param['tag_name']);
            //判断拼音是否有相同的
            $pinyin = $param['pinyin'];
            $exist = Db::name('mulu_category')->where('pinyin',$pinyin)->find();
            if($exist){
                return ['code' => 100, 'data' => '', 'msg' => '该分类名拼音已存在'];
            }

            if($tag_name){
                $tag = Db::name('mulu_new_tags')->where('tag_name',$tag_name)->find();
                if($tag){
                    $param['tag_id'] = $tag['new_tag_id'];
                }else{
                    $tag_id = Db::name('mulu_new_tags')->insertGetId([
                        'tag_name' => $tag_name
                    ]);
                    $param['tag_id'] = $tag_id;
                }
            }

            if(!isset($status)){
                $param['status'] = 1;
            }
            $pid = $param['pid'];
            if($pid != 0){
                $p_c = Db::name('mulu_category')->find($pid);
                $param['top_id'] = $p_c['top_id'];
                $res = $categoryModel->save($param);
            }else{
                //添加顶级栏目
                $res_id = $categoryModel->insertGetId($param);
                $res = Db::name('mulu_category')->where('category_id',$res_id)->update([
                    'top_id' => $res_id
                ]);

            }


            if($res){
                return ['code' => 200, 'data' => '', 'msg' => '分类添加成功'];
            }else{
                return ['code' => 100, 'data' => '', 'msg' => '分类添加失败'];
            }
        }

        $type = '';
        $pinyin = '';
        if($pid){
            $p_category = $categoryModel->find($pid);
            if($p_category){
                $type = $p_category['type'];
                $pinyin = $p_category['pinyin'];
            }
        }

        $nav = new \org\Leftnav;

        $allCategories = $categoryModel->getCategories();
        foreach($allCategories  as $key=>$vo){
            $allCategories[$key]['placeholder'] = '';
        }
//        print_r($allCategories);exit;
        $nav->init($allCategories);
        $AllCategories = $nav->get_tree(0,'','','','','article_category');
        $this->assign('AllCategories',$AllCategories);
        $this->assign('pid',$pid);
        $this->assign('type',$type);
        $this->assign('pinyin',$pinyin);
        $this->assign('typeArray',$this->typeArray);
        return $this->fetch('news/add_category');
    }

    /**
     * [edit_category 修改分类]
     * @return [type] [description]
     * @author
     */
    public function edit_category()
    {
        $categoryModel = new NewCategoryModel();


        if(request()->isPost()){
//            extract(input());
            $param = input();
            unset($param['file']);
            $param['pinyin'] = $param['pinyin_other'].$param['pinyin'];
            unset($param['pinyin_other']);
            $tag_name = trim($param['tag_name']);
            unset($param['tag_name']);
            //判断拼音是否有相同的
            $pinyin = $param['pinyin'];
            $exist = Db::name('mulu_category')->where('category_id','<>',$param['category_id'])->where('pinyin',$pinyin)->find();
            if($exist){
                return ['code' => 100, 'data' => '', 'msg' => '该分类名拼音已存在'];
            }

            if($tag_name){
                $tag = Db::name('mulu_new_tags')->where('tag_name',$tag_name)->find();
                if($tag){
                    $param['tag_id'] = $tag['new_tag_id'];
                }else{
                    $tag_id = Db::name('mulu_new_tags')->insertGetId([
                        'tag_name' => $tag_name
                    ]);
                    $param['tag_id'] = $tag_id;
                }
            }


            if(!isset($status)){
                $param['status'] = 1;
            }

            $pid = $param['pid'];
            if($pid != 0){
                $p_c = Db::name('mulu_category')->find($pid);
                $param['top_id'] = $p_c['top_id'];
                $res = $categoryModel->update($param);
            }else{
                //添加顶级栏目
                $param['top_id'] = $param['category_id'];
                $res = $categoryModel->update($param);
            }
//            $res = $categoryModel->update($param);
            if($res){
                return ['code' => 200, 'data' => '', 'msg' => '修改添加成功'];
            }else{
                return ['code' => 100, 'data' => '', 'msg' => '修改添加失败'];
            }
        }

        $nav = new \org\Leftnav;

        $category_id = input('id');
        $category = Db::name('mulu_category')->where('category_id',$category_id)->find();
        $tag_name = '';
        if($category['tag_id']!= 0)
        {
            $tag = Db::name('mulu_new_tags')->find($category['tag_id']);
            $tag_name = $tag['tag_name'];
        }

        $allCategories = $categoryModel->getCategories();
        foreach($allCategories  as $key=>$vo){
            $allCategories[$key]['placeholder'] = '';
        }
        $nav->init($allCategories);
        $AllCategories = $nav->get_tree(0,'','','','','article_category');
        $this->assign('AllCategories',$AllCategories);
        $array = explode('/',$category['pinyin']);
        $category['pinyin_other'] = '';
        $count = count($array);
        $category['pinyin'] = $array[$count-1];
        for($i=0;$i<$count-1;$i++){
            $category['pinyin_other'] = $category['pinyin_other'].$array[$i].'/';
        }

        $this->assign('category',$category);
        $this->assign('tag_name',$tag_name);
        $this->assign('typeArray',$this->typeArray);
        return $this->fetch();
    }

    /**
     * [del_category 删除文章分类]
     * @return [type] [description]
     * @author
     */
    public function del_category()
    {
        $id = input('param.id');

        $cate = new NewCategoryModel();
        $flag = $cate->delBeforeCheck($id);
        return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }

    /**
     *  新闻列表
     * @return mixed|\think\response\Json
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function news_list(){
        $categoryModel = new NewCategoryModel();
        $nav = new \org\Leftnav;
        $allCategories = $categoryModel->getCategories($this->type);
        if(request()->isAjax ()){
            extract(input());
            $map = [];
            if(isset($article_id)&&$article_id!=""){
                $map['id'] = $article_id;
            }
//            if(isset($title)&&$title!=""){
//                $map['title'] = ['like',"%" . $title . "%"];
//            }
            if(isset($category)&&$category!=""){
                $map['c_id'] = $category;
            }
            if(isset($status)&&$status!=""){
                $map['status'] = $status;
            }
            if(isset($content_img)&&$content_img!=""){
                $map['content_img'] = $content_img;
            }
            if(isset($loop)&&$loop!=""){
                $map['loop'] = $loop;
            }
            if(isset($loop_down)&&$loop_down!=""){
                $map['loop_down'] = $loop_down;
            }
            if(isset($loop_right)&&$loop_right!=""){
                $map['loop_right'] = $loop_right;
            }
            $Nowpage = input('get.page') ? input('get.page'):1;
            $limits = input("limit")?input("limit"):10;
            $count = Db::name('mulu_articles')->where($map)->count();//计算总页面
            $articlesModel = new NewsModel();
            $od="article_id desc";
            $lists = $articlesModel->getDatasByWhere($map, $Nowpage, $limits,$od);
            $categories = $this->convert_arr_key($allCategories,'category_id');
            foreach ($lists as $key => $list){
                $lists[$key]['category_name'] = $categories[$list['c_id']]['category_name'];
            }
            return json(['code'=>220,'msg'=>'','count'=>$count,'data'=>$lists]);

        }


        foreach($allCategories  as $key=>$vo){
            $allCategories[$key]['placeholder'] = '';
        }
        $nav->init($allCategories);
        $AllCategories = $nav->get_tree(0,'','','','','article_category');
        $this->assign('AllCategories',$AllCategories);

        return $this->fetch('news/news_list');
    }

    /**
     * [news_state 文章显示状态]
     * @return [type] [description]
     * @author
     */
    public function news_state()
    {
        extract(input());
        $articlesModel = new NewsModel();
        if($field != 'status'){
            $data = $articlesModel->where('article_id',$id)->field('content_img')->find();
            if(isset($data['content_img']) and $data['content_img'] == 0){
                return json(['code' => 100, 'msg' => '该新闻内容没有图片']);
            }
        }
        $flag = $articlesModel->statusState($id,$num,$field);
        return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }



    /**
     * 修改新闻
     * @return array|mixed
     */
    public function edit_article(){
        if(request()->isPost()){
            $param = input();
//            $param['content'] = htmlspecialchars_decode($param['content']);
            $articlesModel = new NewsModel();
            $res = $articlesModel->update($param);
            if($res){
                return ['code' => 200, 'data' => '', 'msg' => '修改成功'];
            }else{
                return ['code' => 100, 'data' => '', 'msg' => '修改失败'];
            }
        }

        $categoryModel = new NewCategoryModel();
        $nav = new \org\Leftnav;
        $allCategories = $categoryModel->getCategories($this->type);
        foreach($allCategories  as $key=>$vo){
            $allCategories[$key]['placeholder'] = '';
        }
        $nav->init($allCategories);
        $AllCategories = $nav->get_tree(0,'','','','','article_category');
        $this->assign('AllCategories',$AllCategories);
        $article_id = input('id');
        $data = DB::name('mulu_articles')->alias('a')
            ->join('think_mulu_category c','c.category_id = a.c_id')
            ->field('a.*,c.category_name')
            ->where('a.article_id',$article_id)->find();
//        print_r($data);exit;

//        $data['category'] = '';
        $this->assign('data',$data);
        return $this->fetch('news/news_edit');
    }

    /**
     * 删除文章
     * @return array
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function del_article_data(){
        $article_id = input('id');
        $res = Db::name('mulu_articles')->delete($article_id);

        $tags = Db::name('mulu_new_tag_relative')->where('article_id',$article_id)->where('type',$this->type)->select();
        foreach ($tags as $tag){
            $res = Db::name('mulu_new_tag_relative')->delete($tag['r_id']);
            Db::name('mulu_new_tags')->where('new_tag_id',$tag['tag_id'])->setDec('new_count');
        }

        if($res){
            return ['code' => 200, 'data' => '', 'msg' => '删除成功'];
        }else{
            return ['code' => 100, 'data' => '', 'msg' => '删除失败'];
        }
    }

    /**
     * 批量删除文章
     * @return \think\response\Json
     */
    public function batchDelArticles(){
        extract(input());
        if(empty($ids)){
            return json(['code'=>100,'msg'=>'请选择要删除的记录！']);
        }
        $articlesModel = new NewsModel();
        $flag = $articlesModel->batchDelArticles($ids);

        $tags = Db::name('mulu_new_tag_relative')->where('article_id','in',$ids)->where('type',$this->type)->select();
        foreach ($tags as $tag){
            Db::name('mulu_new_tag_relative')->delete($tag['r_id']);
            Db::name('mulu_new_tags')->where('new_tag_id',$tag['tag_id'])->setDec('new_count');
        }

        return json(['code' => $flag['code'], 'msg' => $flag['msg']]);
    }

    /**
     *  修改添加文章标签
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function edit_new_tags(){
        if(request()->isPost()){
            $tags = input('tags');
            $article_id = input('article_id');
            $tag_array = explode(',',str_replace('、',',',str_replace('，',',',$tags)));
            foreach ($tag_array as $t){
                if($t != ''){
                    $t = trim($t);
                    //先检索该标签是否存在
                    $exist = Db::name('mulu_new_tags')->where('tag_name',$t)->find();
                    if($exist){
                        //存在，count+1
                        Db::name('mulu_new_tags')->where('new_tag_id',$exist['new_tag_id'])->setInc('new_count');
                        $tag_id = $exist['new_tag_id'];
                    }else{
                        //不存在，新增
                        $tag_id = Db::name('mulu_new_tags')->insertGetId(['tag_name'=>$t,'new_count'=>1]);
                    }
                    Db::name('mulu_new_tag_relative')->insert(['article_id'=>$article_id,'tag_id'=>$tag_id,'type'=>1]);
                }
            }
            return ['code' => 200, 'data' => '', 'msg' => 'success'];


        }
        $article_id = input('id');
        $data = DB::name('mulu_articles')->find($article_id);

        //获取文章的tags
        $tags = Db::name('mulu_new_tag_relative')->alias('atr')
            ->join('mulu_new_tags at','at.new_tag_id = atr.tag_id')
            ->where('atr.article_id',$article_id)
            ->where('type',1)
            ->field('atr.r_id,at.*')
            ->select();

        $this->assign('tags',$tags);
        $this->assign('data',$data);
        return $this->fetch('news/edit_news_tags');
    }

    /**
     * 删除文章标签
     * @return array
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function del_new_tag(){
        $r_id = input('r_id');
        $tag_id = input('tag_id');
        $res = Db::name('mulu_new_tag_relative')->delete($r_id);
        if($res){
            Db::name('mulu_new_tags')->where('new_tag_id',$tag_id)->setDec('new_count');
            return ['code' => 200, 'data' => '', 'msg' => 'success'];
        }else{
            return ['code' => 100, 'data' => '', 'msg' => 'error'];
        }


    }

    public function get_pinyin(){
        $category_name = trim(input('category_name'));
        if($category_name){
            $py = new PinYin();
            $all_py = $py->get_all_py($category_name);
            $pinyin = join('',$all_py);

            return ['code' => 200, 'data' => $pinyin];
        }else{
            return ['code' => 100, 'data' => '', 'msg' => 'error'];
        }

    }

    public function get_up_url(){
        $category_id = trim(input('category_id'));
        if($category_id){
            $categoryModel = new NewCategoryModel();
            $category = $categoryModel->find($category_id);
            return ['code' => 200, 'data' => $category['pinyin'].'/'];
        }else{
            return ['code' => 100, 'data' => '', 'msg' => 'error'];
        }
    }

}


