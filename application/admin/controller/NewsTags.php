<?php

namespace app\admin\controller;
use app\admin\model\NewCategoryModel;
use app\admin\model\NewTagsModel;
use think\Db;

class NewsTags extends Base
{
    private $typeArray = [
        ['index'=>1,'key'=>'新闻'],
        ['index'=>2,'key'=>'直播'],
        ['index'=>3,'key'=>'录像'],
        ['index'=>4,'key'=>'集锦']
    ];

    public function tag_list(){
        if(request()->isAjax ()){
            extract(input());
            $map = [];
            if(isset($new_tag_id) && $new_tag_id!=""){
                $map['new_tag_id'] = $new_tag_id;
            }
            if(isset($tag_name)&&$tag_name!=""){
                $map['tag_name'] = ['like',"%" . $tag_name . "%"];
            }
            $Nowpage = input('get.page') ? input('get.page'):1;
            $limits = input("limit")?input("limit"):10;
            $count = Db::name('mulu_new_tags')->where($map)->count();//计算总页面

            $od="new_tag_id desc";
            $articlesModel = new NewTagsModel();
            $lists = $articlesModel->getDatasByWhere($map, $Nowpage, $limits,$od);
            foreach ($lists as $key => $item){
                if($item['tag_category_new_relative'] != 0){
                    $lists[$key]['category_name_new'] = Db::name('mulu_category')->where('category_id',$item['tag_category_new_relative'])->column('category_name');
                }else{
                    $lists[$key]['category_name_new'] = '';
                }
                if($item['tag_category_zhibo_relative'] != 0){
                    $lists[$key]['category_name_zhibo'] = Db::name('mulu_category')->where('category_id',$item['tag_category_zhibo_relative'])->column('category_name');
                }else{
                    $lists[$key]['category_name_zhibo'] = '';
                }
                if($item['tag_category_video_relative'] != 0){
                    $lists[$key]['category_name_video'] = Db::name('mulu_category')->where('category_id',$item['tag_category_video_relative'])->column('category_name');
                }else{
                    $lists[$key]['category_name_video'] = '';
                }
                if($item['tag_category_highlight_relative'] != 0){
                    $lists[$key]['category_name_highlight'] = Db::name('mulu_category')->where('category_id',$item['tag_category_highlight_relative'])->column('category_name');
                }else{
                    $lists[$key]['category_name_highlight'] = '';
                }
            }

//            $lists = Db::name('mulu_new_tags')->alias('nt')->join('think_mulu_category mc','mc.category_id = nt.tag_category_relative')
//                ->where($map)->page($Nowpage, $limits)
//                ->field('nt.*,mc.category_id')
//                ->order($od)
//                ->select();

            return json(['code'=>220,'msg'=>'','count'=>$count,'data'=>$lists]);
        }

        return $this->fetch('news_tags/tag_list');
    }

    /**
     * editField 快捷编辑
     * @return \think\response\Json
     */
    public function editField(){
        extract(input());

        $res = Db::name($table)->where(['new_tag_id' => $id ])->setField($field , $value);
        if($res){
            writelog('更新字段成功',200);
            return json(['code' => 200,'data' => '', 'msg' => '更新字段成功']);
        }else{
            writelog('更新字段失败',100);
            return json(['code' => 100,'data' => '', 'msg' => '更新字段失败']);
        }
    }

    public function del_tag(){
        $tag_id = input('id');
        Db::startTrans();// 启动事务
        try{
            Db::name('mulu_new_tags')->delete($tag_id);
            Db::name('mulu_new_tag_relative')->where('tag_id',$tag_id)->delete();
            Db::commit();// 提交事务
            return json(['code' => 200, 'data' => '', 'msg' => '删除成功']);
        }catch( \Exception $e){
            Db::rollback();// 回滚事务
            return json(['code' => 100, 'data' => '', 'msg' => '删除失败']);
        }

    }

    public function tag_edit(){

        if(request()->isPost()){
            $param = input();
            $tagsModel = new NewTagsModel();
            $res = $tagsModel->update($param);
            if($res){
                return ['code' => 200, 'data' => '', 'msg' => '修改成功'];
            }else{
                return ['code' => 100, 'data' => '', 'msg' => '修改失败'];
            }
        }
        $categoryModel = new NewCategoryModel();
        $nav = new \org\Leftnav;
        $allCategories = $categoryModel->getCategories();
        foreach($allCategories  as $key=>$vo){
            $allCategories[$key]['placeholder'] = '';
        }

        $nav->init($allCategories);
        $AllCategories = $nav->get_tree(0,'','','','','article_category');
//        print_r($AllCategories);exit;
        $this->assign('AllCategories',$AllCategories);

        $tag_id = input('id');
        $tag = Db::name('mulu_new_tags')->where('new_tag_id',$tag_id)->find();
        $this->assign('data',$tag);
        return $this->fetch('news_tags/tag_edit');
    }

    public function tag_hot(){
        extract(input());
        $tagModel = new NewTagsModel();
        $flag = $tagModel->statusState($id,$num,$field);
        return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }
}