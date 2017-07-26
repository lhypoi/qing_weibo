<?php 
    error_reporting(~E_NOTICE);
    session_start();

    function connect_mysql() {
        $dsn="mysql:dbhost=localhost;dbname=mweibo;charset=utf8";
        $db_user="root";
        $db_pwd="";
        return new PDO($dsn,$db_user,$db_pwd);
    }

    function addInfo($table,$addData=array()){
        $pdo = connect_mysql();
        $col_str =  implode(",", array_keys($addData));
        $val_data = array_values($addData);
        $val_str = "";
        $douhao = "";
        foreach ($val_data as $key => $value) {
             if(is_string($value)){
                $val_str.=$douhao."'".$value."'";
             }else{
                $val_str.=$douhao.$value;
             }
             $douhao =",";
        }
        $pdo->exec("insert into $table ($col_str) values($val_str)");
        if ($pdo->errorCode() == '00000'){
            return $pdo->lastInsertId();
        } else {
            return $pdo->errorInfo();
        }
    }

    function selectInfo($table,$key,$value,$getnum){
        $pdo = connect_mysql();
        if (is_string($value)) {
            $value = "'".$value."'";
        }
        $pstate = $pdo -> prepare("select * from $table where $key = $value");
        $pstate -> execute();
        if ($pdo->errorCode() == '00000'){
            if ($getnum) {
                return count($pstate->fetchAll());
            } else {
                return $pstate->fetchAll();
            }
        } else {
            return $pstate->errorInfo();
        }
    }

    function returnjson ($status, $msg, $html='',$err='') {
        echo json_encode(
            array(
                "status"=>$status,
                "msg"=>$msg,
                "html"=>$html,
                "err"=>$err
            )
        );
    }

    function return_weibo_li ($id) {
        require_once 'library/smarty/Smarty.class.php';
        $smarty = new Smarty();
        $smarty->template_dir = "view";

        $weibo_data = selectInfo('weibo_detail','id',$id, false);
        $user_data = selectInfo('weibo_user','id',$weibo_data[0]['user_id'], false);

        $smarty->assign("weibo_data", $weibo_data[0]);
        $smarty->assign("user_data",$user_data[0]);
        $html = $smarty->fetch("weibo_li.html");
        returnjson(1,'微博发布成功',$html);
    }

    function updateInfo($table,$updateData=array(),$whereData=array()) {
        $pdo = connect_mysql();
        $set_val_str = '';
        $douhao= '';
        foreach ($updateData as $key => $value) {
            $set_val_str.= $douhao.$key.'='. "'".$value."'";
            $douhao=",";
        }
        $where_str = '';
        $douhao= '';
        foreach ($whereData as $key => $value) {
            $where_str.= $douhao.$key.'='. $value;
            $douhao=" and ";
        }
        return $pdo->exec("update $table  set  $set_val_str where $where_str");
    }

    function return_commet_li ($id) {
        require_once 'library/smarty/Smarty.class.php';
        $smarty = new Smarty();
        $smarty->template_dir = "view";

        $commet_data = selectInfo('weibo_commet','id',$id, false);
        $user_data = selectInfo('weibo_user','id',$commet_data[0]['user_id'], false);

        $smarty->assign("commet_data", $commet_data[0]);
        $smarty->assign("user_data",$user_data[0]);
        $html = $smarty->fetch("commet_li.html");
        returnjson(1,'微博发布成功',$html);
    }
    
    //删除信息
    function delInfo($table, $id) {
        $pdo = connect_mysql();
        $sql = "DELETE FROM $table WHERE id=$id";
        return $pdo->exec($sql);
    }
 ?>