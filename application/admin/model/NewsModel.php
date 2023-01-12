<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class NewsModel extends Model
{
    protected $name = 'mulu_articles';

    // 开启自动写入时间戳字段
    protected $autoWriteTimestamp = false;

    /**
     * 根据搜索条件获取采集内容列表信息
     * @author
     */
    public function getDatasByWhere($map, $Nowpage, $limits,$od)
    {
        return $this->where($map)
            ->page($Nowpage, $limits)
            ->order($od)
            ->select();
    }

    /**
     * 批量删除采集内容，其实就是把publish这个字段改为2
     * @param $param
     */
    public function batchDelArticles($param){
        $res = $this->where('article_id','in',$param)->delete();
        if($res){
            return ['code' => 200, 'data' => '', 'msg' => '批量删除成功'];
        }else{
            return ['code' => 100, 'data' => '', 'msg' => '批量删除失败'];
        }
    }

    /**
     * [statusState 文章状态]
     * @param $param
     * @return array
     */
    public function statusState($id,$num,$field = 'status'){
        if($num == 1){
            $msg = '启用';
        }else{
            $msg = '不启用';
        }
        $res = $this->where('article_id',$id)->update([$field=>$num]);
        if($res){
            return ['code' => 200, 'data' => '', 'msg' => $msg.'成功'];
        }else{
            return ['code' => 100, 'data' => '', 'msg' => $msg.'失败'];
        }
    }



}