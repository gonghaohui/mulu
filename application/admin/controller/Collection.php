<?php

namespace app\admin\controller;

use app\admin\model\RemoteMysqlSetting;
use think\Db;

class Collection extends Base
{
    private $collection_array = ['caiji_new_database_config','caiji_zhibo_database_config','caiji_video_database_config','caiji_highlight_database_config'];
    private $collection_allow_array = ['caiji_new','caiji_zhibo','caiji_video','caiji_highlight'];

    public function setting(){
        $id = input('id',1);
        $setting_array = Db::name('mulu_systems')->where('key',$this->collection_array[$id-1])->find();
        $allow = Db::name('mulu_systems')->where('key',$this->collection_allow_array[$id-1])->find();

        $setting = json_decode($setting_array['value'],true);

        $this->assign('id',$id);
        $this->assign('key',$this->collection_array[$id-1]);
        $this->assign('setting',$setting);
        $this->assign('allow',$allow);
        return $this->fetch();
    }

    public function save(){
        $key = input('key');
        $dbhost = input('dbhost');
        $dbuser = input('dbuser');
        $dbpwd = input('dbpwd');
        $dbname = input('dbname');

        $id = input('id');
        $caiji_status = input('caiji_status');
        Db::name('mulu_systems')->where('key',$this->collection_allow_array[$id-1])->update([
            'value' => $caiji_status
        ]);

        $mysql = RemoteMysqlSetting::connect($dbhost, $dbuser, $dbpwd, $dbname, $dbcharset = 'utf8', $pconnect = 0);

        $data = [
            'dbhost' => $dbhost,
            'dbuser' => $dbuser,
            'dbpwd' => $dbpwd,
            'dbname' => $dbname,
        ];

        Db::name('mulu_systems')->where('key',$key)->update([
            'value' => json_encode($data)
        ]);


        return json(['code' => 200, 'msg' => '修改成功']);


    }

    public function test(){
//        $remote_db = Db::connect([
//            'type'            => 'mysql',
//            'hostname'        => '127.0.0.1',
//            'database'        => 'gary',
//            'username'        => 'root',
//            'password'        => 'root',
//            'hostport'        => '3306',
//            'charset'         => 'utf8',
//        ],true);
//
//        $lists = $remote_db->table('tiyuxinwen3_7')->where('Id',1)->find();
//        print_r($lists);


        $conn = @mysqli_connect('127.0.0.1','root','root');
        if(empty($conn)){
            echo '新闻远程数据连接失败';
            exit;
        }
        $db = mysqli_select_db($conn,'gary');
        if(!$db){
            echo '新闻远程数据库不存在';
            exit;
        }



    }

}