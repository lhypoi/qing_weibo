<?php
    require_once 'common.php';
    require_once 'library/smarty/Smarty.class.php';

    $smarty = new Smarty();
    $smarty->template_dir = 'view';

    if (isset($_SESSION['uid']) && $_SESSION['uid'] != 0) {
        $_user = selectInfo('weibo_user','id',$_SESSION['uid'], false);
        $user = $_user[0];
        $smarty->assign('user_name', $user['user_name']);
        $smarty->assign('user_nickname', $user['user_nickname']);
        $smarty->assign('user_pic', $user['user_pic']);
    } else {
        $_SESSION['uid'] = 0;
    }

    $pdo = connect_mysql();
    $pstate = $pdo -> prepare("select * from weibo_detail order by create_time desc");
    $pstate -> execute();
    $weibo_data = $pstate->fetchAll();
    foreach ($weibo_data as $key => $value) {
        $pstate = $pdo -> prepare("select * from weibo_commet where weibo_id = $value[id]");
        $pstate -> execute();
        $weibo_data[$key]['commet_data'] = $pstate->fetchAll();
        $pstate = $pdo -> prepare("select * from weibo_user where id = $value[user_id]");
        $pstate -> execute();
        $_weibo_data = $pstate->fetchAll();
        $weibo_data[$key]['user_data'] = $_weibo_data[0];
        foreach ($weibo_data[$key]['commet_data'] as $key2 => $value2) {
            $pstate = $pdo -> prepare("select * from weibo_user where id = $value2[user_id]");
            $pstate -> execute();
            $_weibo_data = $pstate->fetchAll();
            $weibo_data[$key]['commet_data'][$key2]['user_data'] = $_weibo_data[0];
        }
    }
    $smarty->assign('weibo_data', $weibo_data);
    $smarty->display('index.html');
 ?>