<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 2018/8/2
 * Time: 22:28
 */
namespace app\tiyu\controller;
use think\Controller;
use think\Db;

class PcBase extends Controller
{
    protected $typeArray = [
        ['index'=>1,'key'=>'新闻'],
        ['index'=>2,'key'=>'直播'],
        ['index'=>3,'key'=>'录像'],
        ['index'=>4,'key'=>'集锦']
    ];
    protected $type_new = 1;
    protected $type_zhibo = 2;
    protected $type_video = 3;
    protected $type_highlight = 4;

    protected $football =1;
    protected $basketball = 2;

    protected $num = 25;//分页每页显示条数
    protected $limit_pages = 100;//最多显示100页

    protected $top_category = [];

    protected $week = array(1 => '一',2 => '二',3 => '三',4 => '四',5 => '五',6 => '六',7 => '日');

    protected function _initialize()
    {
        $top_array = Db::name('mulu_category')->where('status',1)->where('pid',0)->field('category_id,pinyin')->select();
        foreach ($top_array as $top){
            $this->top_category[$top['category_id']] = $top['pinyin'];
        }

        //导航栏
        $all_navigation = Db::name('mulu_category')
            ->where('show_navigation',1)
            ->where('status',1)
            ->order('sort','asc')
            ->field('category_id,category_name,pinyin,pid')
            ->select();
        $navigation = [];
        foreach ($all_navigation as $item){
            if($item['pid'] == 0){
                $navigation[] = $item;
            }
        }
        foreach ($navigation as $key => $na){
            foreach ($all_navigation as $item){
                if($na['category_id'] == $item['pid']){
                    $navigation[$key]['sub'][] = $item;
                }
            }
        }
//        print_r($navigation);
        $this->assign('navigation',$navigation);
    }

    //获取图片地址
    protected function extract_img($tag) {
        preg_match_all('/(src)=("[^"]*")/i', $tag, $matches);
        $ret = array();
        foreach($matches[2] as $i => $v) {
            $ret[] = $matches[2][$i];
        }
        return $ret;
    }

    //直播日期列表
    protected function zhibo_data($today_time,$days,$after = true){
        $data = [];
        if($after){
            for($i=0;$i<$days;$i++){
                $day = date('Ymd', strtotime('+'.$i.' day', $today_time));
                $data[$day]['day'] = date('Y-m-d',strtotime($day));
                $data[$day]['list'] = [];
                switch ($i){
                    case 0:
                        $data[$day]['week'] = "今天";
                        $data[$day]['show_day'] = 0;
                        $data[$day]['is_today'] = 1;
                        break;
                    case 1:
                        $data[$day]['week'] = "明天";
                        $data[$day]['show_day'] = 0;
                        $data[$day]['is_today'] = 0;
                        break;
                    case 2:
                        $data[$day]['week'] = "后天";
                        $data[$day]['show_day'] = 0;
                        $data[$day]['is_today'] = 0;
                        break;
                    default:
                        $data[$day]['week'] = "周".$this->week[date('N',strtotime($day))];
                        $data[$day]['show_day'] = 1;
                        $data[$day]['is_today'] = 0;
                        break;
                }
            }
        }else{
            for($i=0;$i<$days;$i++){
                $day = date('Ymd', strtotime('-'.$i.' day', $today_time));
                $data[$day]['day'] = date('Y-m-d',strtotime($day));
                $data[$day]['list'] = [];
                switch ($i){
                    case 0:
                        $data[$day]['week'] = "今天";
                        $data[$day]['show_day'] = 0;
                        $data[$day]['is_today'] = 1;
                        break;
                    case 1:
                        $data[$day]['week'] = "昨天";
                        $data[$day]['show_day'] = 0;
                        $data[$day]['is_today'] = 0;
                        break;
                    case 2:
                        $data[$day]['week'] = "前天";
                        $data[$day]['show_day'] = 0;
                        $data[$day]['is_today'] = 0;
                        break;
                    default:
                        $data[$day]['week'] = "周".$this->week[date('N',strtotime($day))];
                        $data[$day]['show_day'] = 1;
                        $data[$day]['is_today'] = 0;
                        break;
                }
            }
        }
        return $data;

    }
}