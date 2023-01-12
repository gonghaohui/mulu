<?php

namespace app\admin\model;
use think\Model;
use think\Db;

class NewTagsModel extends Model
{
    protected $name = 'mulu_new_tags';

    // 开启自动写入时间戳字段
    protected $autoWriteTimestamp = false;

    /**
     * 根据搜索条件获取标签列表信息
     * @author
     */
    public function getDatasByWhere($map, $Nowpage, $limits,$od)
    {
        return $this->where($map)
            ->page($Nowpage, $limits)
            ->order($od)
            ->select();
    }


    public function statusState($id,$num,$field = 'status'){
        if($num == 1){
            $msg = '启用';
        }else{
            $msg = '不启用';
        }
        $res = $this->where('new_tag_id',$id)->update([$field=>$num]);
        if($res){
            return ['code' => 200, 'data' => '', 'msg' => $msg.'成功'];
        }else{
            return ['code' => 100, 'data' => '', 'msg' => $msg.'失败'];
        }
    }
}