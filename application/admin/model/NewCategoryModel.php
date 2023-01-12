<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class NewCategoryModel extends Model
{
    protected $name = 'mulu_category';

    // 开启自动写入时间戳字段
    protected $autoWriteTimestamp = false;


    /**
     * [getCategories 获取全部分类]
     * @author
     */
    public function getCategories($type = 0)
    {
        if($type != 0){
            return $this->where('type',$type)->order('category_id asc')->select()->toArray();
        }else{
            return $this->order('category_id asc')->select()->toArray();
        }

    }

    /**
     * [getCategories 获取全部显示的分类]
     * @author
     */
    public function getShowCategories(){
        return $this->order('category_id asc')->where('status',1)->select()->toArray();
    }

    /**
     * [getAllCategories 获取全部文章分类]
     * @author
     */
    public function getAllCategories($map,$Nowpage,$limits)
    {
        return $this->where($map)->page($Nowpage,$limits)->order('category_id asc')->select()->toArray();
    }

    /**
     * [statusState 菜单状态]
     * @param $param
     * @return array
     */
    public function statusState($id,$num,$field = 'status'){
        $title = $this->where('category_id',$id)->value('category_name');
        if($num == 2){
            $msg = '禁用';
        }else{
            $msg = '启用';
        }
        Db::startTrans();// 启动事务
        try{
            $this->where('category_id',$id)->setField([$field=>$num]);
            Db::commit();// 提交事务
//            writelog('分类【'.$title.'】'.$msg.'成功',200);
            return ['code' => 200, 'data' => '', 'msg' => '已'.$msg];
        }catch( \Exception $e){
            Db::rollback ();//回滚事务
//            writelog('分类【'.$title.'】'.$msg.'失败',100);
            return ['code' => 100, 'data' => '', 'msg' => $msg.'失败'];
        }
    }

    /**
     * [delBeforeCheck 删除该分类前先检查该分类下还有没有分类，有的话不给删除，没有的话就可以]
     * @param $category_id
     */
    public function delBeforeCheck($category_id){
        $res = Db::name('mulu_category')->where('pid',$category_id)->select();
        if(empty($res)){
            $this->where('category_id', $category_id)->delete();
            return ['code' => 200, 'data' => '', 'msg' => '删除成功'];
        }else{
            return ['code' => 100, 'data' => '', 'msg' => '删除失败，该分类下还有分类存在'];
        }



    }

}