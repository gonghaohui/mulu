<?php
namespace app\admin\model;

use think\Exception;

class RemoteMysqlSetting{

    var $max_cache_time        = 86400; // 最大的缓存时间，以秒为单位,默认24h
    var $cache_dir            = '/cache/';
    var $_dbhash            = '';
    var $setting            = array();
    var $dblink                = NULL;
    var $trans_depth        = 0;        //事务开启记录
    var $query                = null;    //查询句柄
    var $query_str            = '';    //记录最后一次查询的语句
    static private $_instance = NULL;    //储存对象
    var $mysql_disable_cache_tables = array(); // 不允许被缓存的表，遇到将不会进行缓存


    //$dbhost = 'localhost', $dbuser = 'root', $dbpwd = '', $dbname = 'test', $dbcharset = 'utf8', $pconnect = 0
    //私有化构造函数
    private function __construct(){
        $num_args=func_num_args();
        if($num_args > 0){
            $this->setting = func_get_args();
            $this->_initialize();
        }

    }

    //防止被克隆
    private function __clone(){}

    //初始化函數
    private function _initialize()
    {
        try {
            if($this->setting[5]){
                if(!($this->dblink = @mysql_pconnect($this->setting[0], $this->setting[1], $this->setting[2]))){
//                    throw new Exception($this->error_message('链接数据库失败1'));
                    echo json_encode(['code' => 100, 'msg' => '远程数据库连接失败1']);exit;
//                    echo "error" ;exit;
                }
            }else{
//                if(!($this->dblink = @mysql_connect($this->setting[0], $this->setting[1], $this->setting[2]))){
//                    throw new Exception($this->error_message('链接数据库失败'));
//                }
                if(!($this->dblink = @mysqli_connect($this->setting[0], $this->setting[1], $this->setting[2]))){
//                    throw new Exception($this->error_message('链接数据库失败2'));
                    echo json_encode(['code' => 100, 'msg' => '远程数据库连接失败2']);exit;
//                    echo "error" ;exit;
                }
            }

            if($this->select_db($this->setting[3], $this->dblink) === false) {
//                throw new Exception($this->error_message());
                echo json_encode(['code' => 100, 'msg' => '远程数据库连接失败3']);exit;
//                echo "error" ;exit;
            }
            //$this->cache_dir = ROOT_PATH. $this->cache_dir;
            //$this->_dbhash = md5(ROOT_PATH . $this->setting[0] . $this->setting[1] . $this->setting[2] . $this->setting[3]);
            mysqli_query($this->dblink,"SET NAMES '".$this->setting[4]."'");

        }catch(Exception $e){
//            echo $e->getMessage();exit;

            echo json_encode([
                'code' => 0,
                'msg' => $e->getMessage()
            ]);exit;
        }
    }

    public static function connect($dbhost = 'localhost', $dbuser = 'root', $dbpwd = '', $dbname = '', $dbcharset = 'utf8', $pconnect = 0)
    {
        if(false == (self::$_instance instanceof self)){
            self::$_instance = new self($dbhost, $dbuser, $dbpwd, $dbname, $dbcharset, $pconnect);
        }
        return self::$_instance;

    }



    /**
     * 插入数据
     *
     * @access    public
     * @param    string    $table
     * @param   array    $field_values    array('field'=>values)
     * @return    mixed
     */
    public function insert($table, $field_values, $escape = false, $replace = false) {
        $fields = array ();
        $values = array ();
        $field_names = $this->get_column('DESC '.$table);

        if(is_array($field_values)){
            foreach ( $field_names as $value ) {
                if (array_key_exists($value, $field_values ) == true) {
                    $fields[] = $value;
                    $values[] = $escape ? "'" . $this->escape_str($field_values[$value]) . "'" : "'" . $field_values[$value] . "'";
                }
            }
        }
        if ($fields && $values) {
            $sql = ($replace ? 'REPLACE' : 'INSERT') . ' INTO '.$table.' ('.implode(',',$fields).') VALUES ('.implode( ',',$values ).')';
            if($this->query($sql)){
                return $this->affected_rows();
            }
        }
        return false;
    }



    /**
     * 删除数据/ $where数组的时候默认是 AND 关系 要是实现更复杂的关系则传入字符串
     *
     * @access    public
     * @param    string    $table
     * @param   mixed    $where
     * @return    mixed
     */
    public function delete($table, $where = null, $escape = false){
        $sql = 'DELETE FROM '.$table;
        if(!empty($where)){
            if(is_array($where)){
                $arr = array();
                foreach($where as $field => $val){
                    $arr[] = $field . ' = ' . $escape ? $this->escape_str($val) : $val;
                }
                if($arr){
                    $where_str = implode(' AND ', array_unique($arr));
                    $sql .= ' WHERE '. $where_str;
                }
            }else{
                $sql .= ' WHERE ' .$escape ? $this->escape_str($where) : $where;
            }
        }
        if($this->query($sql)){
            return $this->affected_rows();
        }else{
            return false;
        }
    }


    /**
     *$where数组的时候默认是 AND 关系 要是实现更复杂的关系则传入字符串
     *
     * @access    public
     * @param    string    $table
     * @param   array    $field_values    array('field'=>values)
     * @param    mixed    $where
     * @return    mixed
     */
    public function update($table, $field_values, $where = null, $escape = false) {
        $field_names = $this->get_column( 'DESC ' . $table );
        $sets = array ();
        if(is_array($field_values)){
            foreach($field_names as $value ){
                if (array_key_exists($value, $field_values ) == true) {
                    $sets[] = $value . " = '" . ($escape ? $this->escape_str($field_values[$value]) : $field_values[$value]) . "'";
                }
            }
        }

        if(!empty($sets)){
            $sql = 'UPDATE ' . $table . ' SET ' . implode( ', ', $sets );

            if(is_array($where)){
                $arr = array();
                foreach($where as $field => $val){
                    $arr[] = $field . ' = ' . $escape ? $this->escape_str($val) : $val;
                }
                if($arr){
                    $where_str = implode(' AND ', array_unique($arr));
                    $sql .= ' WHERE '. $where_str;
                }
            }else{
                $sql .= ' WHERE '. $escape ? $this->escape_str($where) : $where;
            }
        }else{
            return false;
        }

        if($sql && $this->query($sql)){
            return $this->affected_rows();
        }else{
            return false;
        }

    }


    /**
     * 查詢数据
     *
     * @access    public
     * @param    string    $table
     * @param   string    $fields
     * @return    mixed
     */
    public function find($table, $fields = '*', $where = null, $options = array(), $escape = false)
    {
        $sql = 'SELECT '.$fields.' FROM '. $table;
        if($where != null)
        {
            if(is_array($where)){
                $arr = array();
                foreach($where as $field => $val){
                    $arr[] = $field . ' = ' . ($escape ? $this->escape_str($val) : $val);
                }
//                print_r($arr);exit;
                if($arr){
                    $where_str = implode(' AND ', array_unique($arr));
                    $sql .= ' WHERE '. $where_str;
                }
            }else{
                $sql .= ' WHERE '. ($escape ? $this->escape_str($where) : $where);
            }
        }
//        echo $sql;exit;
        if(isset($options['order_by']))
        {
            $sql .= ' ORDER BY '.$options['order_by'];
            if(isset($options['order_dir']))
            {
                $sql .= ' '.strtoupper($options['order_dir']);
            }
        }
        if(isset($options['limit_start']) && isset($options['limit']))
        {
            $sql .= ' LIMIT '.$options['limit_start'].', '.$options['limit'];
        }
        elseif(isset($options['limit']))
        {
            $sql .= ' LIMIT '.$options['limit'];
        }
        return $this->query($sql);
    }


    /**
     *
     * @param  string $sql_statement
     * @param  $index_key是否以主鍵形式返回
     * @param  $result_type
     * @return array
     */
    function result_array($arg, $index_key = false)
    {
        $rtn = array();
        //若是sql查詢語句
        if(is_string($arg)){
            $query = $this->query($arg);
        }elseif(is_resource($arg)){
            $query = $arg;
        }else{
            return $rtn;
        }

        while ($row = $this->fetch_assoc($query)) {
            if($index_key == false){
                $rtn[] = $row;
            } elseif (is_array($index_key)) {
                $index = '';
                foreach ($index_key as $k) {
                    if(isset($row[$k])){
                        $index .= $index == '' ? $row[$k] : '_' . $row[$k];
                    }else{
                        return $rtn;
                    }
                }
                $rtn[$index] = $row;
            } else {
                if(isset($row[$index_key])){
                    $rtn[$row[$index_key]] = $row;
                }else{
                    return $rtn;
                }
            }
        }
        return $rtn;
    }


    /**
     *
     * @param  string $sql_statement
     * @param  $index_key是否以主鍵形式返回
     * @return object
     */
    function result_object($arg, $index_key = false)
    {
        $rtn = array();
        //若是sql查詢語句
        if(is_string($arg)){
            $query = $this->query($arg);
        }elseif(is_resource($arg)){
            $query = $arg;
        }else{
            return $rtn;
        }

        while ($row = $this->fetch_object($query)) {
            if($index_key == false){
                $rtn[] = $row;
            } elseif (is_array($index_key)) {
                $index = '';
                foreach ($index_key as $k) {
                    if(isset($row->$k)){
                        $index .= $index == '' ? $row->$k : '_' . $row->$k;
                    }else{
                        return $rtn;
                    }
                }
                $rtn[$index] = $row;
            } else {
                if(isset($row->$index_key)){
                    $rtn[$row->$index_key] = $row;
                }else{
                    return $rtn;
                }
            }
        }
        return $rtn;
    }

    /*
     * 发送一条 MySQL指令
     */
    public function query($sql)
    {
        $this->query_str = $sql;
        if(!($this->query = mysqli_query($this->dblink,$this->query_str))){
            echo $this->error_message();
            return false;
        }
        return $this->query;
    }


    /**
     * mysql_fetch_array  MYSQL_NUM  MYSQL_ASSOC  MYSQL_BOTH
     */
    public function fetch_array($query, $result_type = MYSQL_ASSOC)
    {
        return mysqli_fetch_array($query, $result_type);
    }

    /**
     * mysql_fetch_assoc
     */
    public function fetch_assoc($query)
    {
        return mysqli_fetch_assoc($query);
    }

    /**
     * mysql_fetch_object
     */
    public function fetch_object($query)
    {
        return mysqli_fetch_object($query);
    }

    /**
     * mysql_fetch_row
     */
    public function fetch_row($query)
    {
        return mysqli_fetch_row($query);

    }



    //获取列
    public function get_column($sql) {
        $res = $this->query($sql);
        if($res !== false) {
            $arr = array();
            $row = $this->fetch_row($res);
            while ($row) {
                $arr [] = $row[0];
                $row = $this->fetch_row($res);
            }
            return $arr;
        }else{
            return false;
        }
    }

    function select_db($dbname)
    {
//        return mysql_select_db($dbname, $this->dblink);
        return mysqli_select_db($this->dblink,$dbname);
    }

    //影响行数 delete insert
    public function affected_rows()
    {
        return @mysqli_affected_rows($this->dblink);
    }

    //影响行数 select
    public function num_rows($res)
    {
        return @mysqli_num_rows($res);
    }

    //自增插入ID
    public function insert_id()
    {
        return @mysqli_insert_id($this->dblink);
    }

    //最后查询一次的sql
    public function last_query()
    {
        return $this->query_str;
    }



    /**
     * 转义字符串或数组
     * @param    bool  $str    是否使用做like条件的时候
     * @return    string or 数据
     */
    public function escape_str($str, $like = false)
    {
        if(is_array($str)){
            foreach ($str as $key => $val){
                $str[$key] = $this->escape_str($val, $like);
            }
            return $str;
        }

        if(function_exists('mysql_real_escape_string') && is_resource($this->dblink)){
            $str = mysqli_real_escape_string($this->dblink,$str);

        }elseif(function_exists('mysql_escape_string')){
            $str = mysqli_escape_string($this->dblink,$str);

        }else{
            $str = addslashes($str);
        }

        // escape LIKE condition wildcards
        if ($like === true){
            $str = str_replace(array('%', '_'), array('\\%', '\\_'), $str);
        }

        return $str;
    }

    /**
     * 开始一个事务.
     */
    public function begin(){
        if ($this->_trans_depth > 0){
            $this->_trans_depth += 1;
            return;
        }

        mysqli_query($this->dblink,'SET AUTOCOMMIT=0');
        mysqli_query($this->dblink,'START TRANSACTION');
    }

    /**
     * 提交一个事务.
     */
    public function commit(){
        if ($this->_trans_depth > 1){
            $this->_trans_depth -= 1;
            return true;
        }
        mysqli_query($this->dblink,'COMMIT');
    }

    /**
     * 回滚一个事务.
     */
    public function rollback(){
        if ($this->_trans_depth > 0){
            return true;
        }
        mysqli_query($this->dblink,'ROLLBACK');
        return true;
    }


    /*创建像这样的查询: "IN('a','b')";
     * @param    mix      $item_list      列表数组或字符串,如果为字符串时,字符串只接受数字串
     * @param    string   $field_name     字段名称
    */
    function db_create_in($item_list, $field_name = '')
    {
        if(empty($item_list)) {
            return $field_name . " IN ('') ";
        }else{
            if(!is_array($item_list)){
                $item_list = explode(',', $item_list);
                foreach ($item_list as $k => $v) {
                    $item_list[$k] = $v;
                }
            }
            $item_list = array_unique($item_list);
            $item_list_tmp = '';

            foreach($item_list as $item){
                if($item !== ''){
                    $item_list_tmp .= $item_list_tmp ? ",'$item'" : "'$item'";
                }
            }
            if(empty($item_list_tmp)){
                return $field_name . " IN ('') ";
            }else{
                return $field_name . ' IN (' . $item_list_tmp . ') ';
            }
        }
    }


    //错误输出
    function error_message($message = '')
    {
        if($message == ''){
            $message = @mysqli_error($this->dblink);
        }
        return $message;
    }


    public function free_result()
    {
        return mysqli_free_result($this->query);
    }

    public function close(){
        return mysqli_close($this->dblink);
    }





}