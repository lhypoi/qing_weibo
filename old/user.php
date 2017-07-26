<?php
    require_once 'common.php';
    // 注册
    if ($_POST['type'] == 'register') {
        $create_time = time();
        // $user_pic = "public/img/user/".$create_time.".jpg";
        // move_uploaded_file($_FILES['user_pic']['tmp_name'], $user_pic);

        if (selectInfo('weibo_user', 'user_name', $_POST['user_name'], true) > 0) {
            returnjson('0', '该用户已存在');
            exit();
        }

        $uid = addInfo('weibo_user', array(
            'user_name'=>$_POST['user_name'],
            'user_nickname'=>$_POST['user_nickname'],
            'user_pwd'=>$_POST['user_pwd'],
            'user_pic'=>"public/img/user/1500878937.jpg"
            ));
        // 错误信息
        if ( is_array($uid) ) {
            print_r($uid);
        // 返回插入的id
        } else {
            $_SESSION['uid'] =$uid;
            returnjson('1', $uid);
        }
    // 退出
    } else if ($_POST['type'] == 'logout') {
        unset($_SESSION['uid']);
        returnjson('1', '退出用户成功');
    // 登陆
    } else if ($_POST['type'] == 'login') {
        if (selectInfo('weibo_user', 'user_name', $_POST['user_name'], true) == 0) {
            returnjson('0', '该用户不存在');
            exit();
        } else if (selectInfo('weibo_user', 'user_name', $_POST['user_name'], false)[0]['user_pwd'] != $_POST['user_pwd']) {
            returnjson('0', '密码错误');
            exit();
        } else {
            $uid = selectInfo('weibo_user', 'user_name', $_POST['user_name'], false)[0]['id'];
            $_SESSION['uid'] =$uid;
            returnjson('1', $uid);
        }
    // 编辑
    } else if ($_POST['type'] == 'edit') {

        $create_time = time();
        $user_pic = "public/img/user/".$_SESSION['uid'].'_'.$create_time.".jpg";
        move_uploaded_file($_FILES['user_pic']['tmp_name'], $user_pic);

        updateInfo('weibo_user', array('user_pic'=>$user_pic), array('id'=>$_SESSION['uid']));

    }
 ?>