<?php

class Pager {

    /**
     * 分页初始值
     * @var int
     */
    private $start = 0;

    /**
     * 分页长度
     * @var int
     */
    private $limit = 0;
    const DEFAULT_LIMIT = 10;

    /**
     * 总数
     * @var int
     */
    private $total = 0;

    /**
     * 指定主键
     * @var string
     */
    private $PrimaryKey = '';

    /**
     * 是否可选中
     * @var bool
     */
    private $checkable = FALSE;


    private $ifSetOffset = FALSE;
    /**
     * @var BabySitter_Restful_RestMkData
     */
    private static $self = null;

    /**
     * @static
     * @return BabySitter_Restful_RestMkData
     */
    public static function instance(){
        if (self::$self == null){
            self::$self = new self;
        }
        return self::$self;
    }

    /**
     * 初始化配置型
     * @param int $total 数据总量
     * @param string $PrimaryKey 主键
     * @param bool $checkable 是否可选
     */
    public function config($total,$PrimaryKey,$checkable = FALSE){
        if ($this->ifSetOffset == FALSE) {
            self::setOffset();
        }
        $this->total = (int)$total;
        $this->PrimaryKey = (string)$PrimaryKey;
        $this->checkable = (bool)$checkable;
    }

    /**
     * 设置start limit值
     * @param int $start 分页初始值
     * @param int $count 分页长度
     */
    public function set_offset($start = FALSE,$limit = FALSE){
        $this->ifSetOffset = TRUE;
        $this->start = $start != FALSE ? (int)$start : (isset($_POST['start']) ? (int)$_POST['start'] : 0);
        $this->limit = $limit != FALSE ? (int)$limit : (isset($_POST['limit']) ? (int)$_POST['limit'] : self::DEFAULT_LIMIT);
    }

    /**
     * 取得当前配置
     * @return multitype:number string
     */
    public function get_config(){
        return array(
            'start' => $this->start,
            'limit' => $this->limit,
            'total' => $this->total,
            'primarykey' => $this->PrimaryKey,
        );
    }

    /**
     * 组装数据
     * @param array $data_
     * @return Ambigous <multitype:number boolean NULL , unknown>
     */
    public function make($data_ = array()){
        $data = array(
            'start' => $this->start,
            'limit' => $this->limit,
            'total' => isset($this->total) ? $this->total : 0,
            'checkable' => $this->checkable,
        );

        if ((!is_array($data_) || count($data_) < 1) && !is_object($data_)) {
            $data['rows'] = 0;
        }else{
            foreach ($data_ as $k => $v){
                if (is_object($v)) $v = $v->toArray();
                $data['rows'][$k]['id'] = $v[$this->PrimaryKey];
                $data['rows'][$k]['cells'] = $v;
            }
        }

        return $data;
    }

} 