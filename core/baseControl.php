<?php

class baseControl{
    private $smarty;

    function __construct() {
        $this->smarty = new Smarty();
        $this->smarty->template_dir = "view";
    }

    public function model($model_name) {
        require_once "model/$model_name.php";
        return new $model_name("mysql:dbhost=localhost;dbname=mweibo;charset=utf8","root","",true);
    }
    public function display($html) {
        $this->smarty->display($html);
    }

    // 返回smarty编译好的html
    public function fetch($html)
    {
        return $this->smarty->fetch($html);
    }
    public function assign($name, $value) {
        $this->smarty->assign($name, $value);
    }
    public function fetch($html) {
        return $this->smarty->fetch($html);
    }
    public function run() {
        $control = isset($_REQUEST['control']) ? $_REQUEST['control'] : "weibo";
        $control_name = $control.'Control';
        require_once "control/$control_name.php";
        $weibo = new $control_name();
        if(!empty($_REQUEST['action'])) {
            $action = $_REQUEST['action'];
            $weibo->$action();
        }else {
            $weibo->index();
        }
    }
}

?>