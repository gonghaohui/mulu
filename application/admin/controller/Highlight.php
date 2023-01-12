<?php

namespace app\admin\controller;
use app\admin\model\HighlightsModel;
use app\admin\model\NewCategoryModel;
use app\admin\model\NewsModel;
use app\admin\model\PinYin;
use app\admin\model\VideosModel;
use think\Db;

class Highlight extends Base{
    private $type = 4;//type 1:新闻2直播:3录像:4:集锦

    public function highlight_list(){
        $categoryModel = new NewCategoryModel();
        $nav = new \org\Leftnav;
        $allCategories = $categoryModel->getCategories($this->type);
        if(request()->isAjax ()){
            extract(input());
            $map = [];
            if(isset($id)&&$id!=""){
                $map['id'] = $id;
            }
            if(isset($category)&&$category!=""){
                $map['c_id'] = $category;
            }
            if(isset($status)&&$status!=""){
                $map['status'] = $status;
            }
            if(isset($hot)&&$hot!=""){
                $map['hot'] = $hot;
            }

            $Nowpage = input('get.page') ? input('get.page'):1;
            $limits = input("limit")?input("limit"):10;
            $count = Db::name('mulu_highlights')->where($map)->count();//计算总页面
            $highModel = new HighlightsModel();
            $od="id desc";
            $lists = $highModel->getDatasByWhere($map, $Nowpage, $limits,$od);
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

        return $this->fetch('highlight/highlight_list');

    }

    /**
     * [news_state 集锦显示状态]
     * @return [type] [description]
     * @author
     */
    public function highlights_state()
    {
        extract(input());
        $highModel = new HighlightsModel();
        $flag = $highModel->statusState($id,$num,$field);
        return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }

    /**
     * 删除集锦
     * @return array
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function del_highlight_data(){
        $id = input('id');
        $res = Db::name('mulu_highlights')->delete($id);

        $tags = Db::name('mulu_new_tag_relative')->where('article_id',$id)->where('type',$this->type)->select();
        foreach ($tags as $tag){
            Db::name('mulu_new_tag_relative')->delete($tag['r_id']);
            Db::name('mulu_new_tags')->where('new_tag_id',$tag['tag_id'])->setDec('highlight_count');
        }

        if($res){
            return ['code' => 200, 'data' => '', 'msg' => '删除成功'];
        }else{
            return ['code' => 100, 'data' => '', 'msg' => '删除失败'];
        }
    }

    /**
     * 批量删除集锦
     * @return \think\response\Json
     */
    public function batchDelHighlights(){
        extract(input());
        if(empty($ids)){
            return json(['code'=>100,'msg'=>'请选择要删除的记录！']);
        }
        $videosModel = new VideosModel();
        $flag = $videosModel->batchDelArticles($ids);

        $tags = Db::name('mulu_new_tag_relative')->where('article_id','in',$ids)->where('type',$this->type)->select();
        foreach ($tags as $tag){
            Db::name('mulu_new_tag_relative')->delete($tag['r_id']);
            Db::name('mulu_new_tags')->where('new_tag_id',$tag['tag_id'])->setDec('highlight_count');
        }

        return json(['code' => $flag['code'], 'msg' => $flag['msg']]);
    }

    /**
     * 修改集锦
     * @return array|mixed
     */
    public function edit_highlight(){
        if(request()->isPost()){
            $param = input();
            $HighlightsModel = new HighlightsModel();
            $res = $HighlightsModel->update($param);
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
        $id = input('id');
        $data = DB::name('mulu_highlights')->alias('a')
            ->join('think_mulu_category c','c.category_id = a.c_id')
            ->field('a.*,c.category_name')
            ->where('a.id',$id)->find();
//        print_r($data);exit;

//        $data['category'] = '';
        $this->assign('data',$data);
        return $this->fetch('highlight/highlight_edit');
    }

    /**
     *  修改添加集锦标签
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function edit_highlight_tags(){
        if(request()->isPost()){
            $tags = input('tags');
            $id = input('id');
            $tag_array = explode(',',str_replace('、',',',str_replace('，',',',$tags)));
            foreach ($tag_array as $t){
                if($t != ''){
                    $t = trim($t);
                    //先检索该标签是否存在
                    $exist = Db::name('mulu_new_tags')->where('tag_name',$t)->find();
                    if($exist){
                        //存在，count+1
                        Db::name('mulu_new_tags')->where('new_tag_id',$exist['new_tag_id'])->setInc('highlight_count');
                        $tag_id = $exist['new_tag_id'];
                    }else{
                        //不存在，新增
                        $tag_id = Db::name('mulu_new_tags')->insertGetId(['tag_name'=>$t,'highlight_count'=>1]);
                    }
                    Db::name('mulu_new_tag_relative')->insert(['article_id'=>$id,'tag_id'=>$tag_id,'type'=>$this->type]);
                }
            }
            return ['code' => 200, 'data' => '', 'msg' => 'success'];


        }
        $id = input('id');
        $data = DB::name('mulu_highlights')->find($id);

        //获取文章的tags
        $tags = Db::name('mulu_new_tag_relative')->alias('atr')
            ->join('mulu_new_tags at','at.new_tag_id = atr.tag_id')
            ->where('atr.article_id',$id)
            ->where('type',$this->type)
            ->field('atr.r_id,at.*')
            ->select();

        $this->assign('tags',$tags);
        $this->assign('data',$data);
        return $this->fetch('highlight/highlight_edit_tags');
    }

    /**
     * 删除集锦标签
     * @return array
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function del_highlight_tag(){
        $r_id = input('r_id');
        $tag_id = input('tag_id');
        $res = Db::name('mulu_new_tag_relative')->delete($r_id);
        if($res){
            Db::name('mulu_new_tags')->where('new_tag_id',$tag_id)->setDec('highlight_count');
            return ['code' => 200, 'data' => '', 'msg' => 'success'];
        }else{
            return ['code' => 100, 'data' => '', 'msg' => 'error'];
        }


    }

}