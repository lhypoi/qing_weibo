<?php
    /**
    *
    */
    class baseControl
    {
        private $smarty;

        function __construct()
        {
            $this->smarty = new Smarty();
            $this->smarty->template_dir = 'view';
        }

        public function run()
        {
            $control = isset($_REQUEST['control'])?$_REQUEST['control']:'weibo';
            $control_name = $control.'Control';

            require_once 'control/'.$control_name.'php';
            $controlObj = new $control();

            if (empty($_REQUEST['action'])) {
                $controlObj->index();
            } else {
                $controlObj->$_REQUEST['action']();
            }
        }
    }
 ?>