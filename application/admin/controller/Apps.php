<?php

namespace app\admin\controller;

use app\admin\model\AppModel;
use think\Db;

class Apps extends Base{

    private $type = array(
        1 => '直播APP',
        2 => '体育APP'
    );

    public function app_list(){
        $appModel = new AppModel();

        if(request()->isAjax ()){
            extract(input());
            $map = [];
            if(isset($id)&&$id!=""){
                $map['id'] = $id;
            }
            if(isset($status)&&$status!=""){
                $map['status'] = $status;
            }
            if(isset($hot)&&$hot!=""){
                $map['hot'] = $hot;
            }
            if(isset($type)&&$type!=""){
                $map['type'] = $type;
            }
            $Nowpage = input('get.page') ? input('get.page'):1;
            $limits = input("limit")?input("limit"):10;
            $count = Db::name('mulu_app')->where($map)->count();//计算总页面
            $od="id desc";
            $lists = $appModel->getDatasByWhere($map, $Nowpage, $limits,$od);

            return json(['code'=>220,'msg'=>'','count'=>$count,'data'=>$lists]);


        }

        $this->assign('type',$this->type);
        return $this->fetch('apps/app_list');
    }

    public function add_app(){

        if(request()->isPost()){
            $param = input('post.');
            unset($param['file']);
            $param['downloads'] = trim($param['downloads']);
            $param['create_time'] = time();
            $appModel = new AppModel();
            $res = $appModel->save($param);
            if($res){
                return ['code' => 200, 'data' => '', 'msg' => 'APP添加成功'];
            }else{
                return ['code' => 100, 'data' => '', 'msg' => 'APP添加失败'];
            }
        }

        return $this->fetch('apps/app_add');
    }

    public function edit_app(){

        if(request()->isPost()){
            $param = input('post.');
            $param['downloads'] = trim($param['downloads']);
            unset($param['file']);
            unset($param['del']);
            $param['photo'] = trim($param['photo'],',');
            $appModel = new AppModel();
            $res = $appModel->update($param);
            if($res){
                return ['code' => 200, 'data' => '', 'msg' => 'APP修改成功'];
            }else{
                return ['code' => 100, 'data' => '', 'msg' => 'APP修改失败'];
            }
        }

        $id = input('id');
        $app = Db::name('mulu_app')->find($id);

        if(!empty($app['photo'])){
            $app['photo'] = trim($app['photo'],',');
        }else{
            $app['photo'] = '';
        }

        $this->assign('app',$app);
        return $this->fetch('apps/app_edit');
    }

    public function del_app(){
        $id = input('param.id');

        $appModel = new AppModel();
        $res = $appModel->where('id', $id)->delete();
        if($res){
            return ['code' => 200, 'data' => '', 'msg' => '删除成功'];
        }else{
            return ['code' => 100, 'data' => '', 'msg' => '删除失败'];
        }


    }

    public function app_state()
    {
        extract(input());
        $appModel = new AppModel();
        $flag = $appModel->statusState($id,$num,$field);
        return json(['code' => $flag['code'], 'data' => $flag['data'], 'msg' => $flag['msg']]);
    }

    public function editField(){
        extract(input());
        $res = Db::name($table)->where(['id' => $id ])->setField($field , $value);
        if($res){
            writelog('更新字段成功',200);
            return json(['code' => 200,'data' => '', 'msg' => '更新字段成功']);
        }else{
            writelog('更新字段失败',100);
            return json(['code' => 100,'data' => '', 'msg' => '更新字段失败']);
        }
    }

}