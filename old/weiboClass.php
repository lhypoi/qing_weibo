<?php
class weiboClass{

    public function index()
    {
        global $smarty;
        $smarty->display("longcontent.html");
    }

    public function save()
    {
        global $pdo;
        session_start();
        return $pdo->addInfo("weibo_detail",array("weibo_content"=>$_POST['weibo_content'], "type"=>"long_content", "user_id"=>$_POST['user_id'], "create_time"=>time()));
    }

}
 ?>
