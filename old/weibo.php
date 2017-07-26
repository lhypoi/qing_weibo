<?php
    require_once 'common.php';

    if ($_POST['type'] == 'short_content') {
        $create_time = time();
        $id = addInfo('weibo_detail', array(
            'weibo_content'=>$_POST['weibo_content'],
            'user_id'=>$_SESSION['uid'],
            'create_time'=>$create_time,
            'type'=>$_POST['type']
            ));
        if ( is_array($id) ) {
            print_r($id);
        } else {
            return_weibo_li($id);
        }
    } else if ($_POST['type'] == 'pic_text') {
        $create_time = time();
        $pic = "public/img/".$_SESSION['uid'].'_'.$create_time.".jpg";
        move_uploaded_file($_FILES['pic_file']['tmp_name'], $pic);
        $id = addInfo('weibo_detail', array(
            'weibo_content'=>$_POST['weibo_content'],
            'user_id'=>$_SESSION['uid'],
            'create_time'=>$create_time,
            'type'=>$_POST['type'],
            'pic'=>$pic
            ));
        if ( is_array($id) ) {
            print_r($id);
        } else {
            return_weibo_li($id);
        }
    } else if ($_POST['type'] == 'music') {
        $create_time = time();
        $music = "public/music/".$_SESSION['uid'].'_'.$create_time.".mp3";
        move_uploaded_file($_FILES['music_file']['tmp_name'], $music);
        $id = addInfo('weibo_detail', array(
            'user_id'=>$_SESSION['uid'],
            'create_time'=>$create_time,
            'type'=>$_POST['type'],
            'music'=>$music
            ));
        if ( is_array($id) ) {
            print_r($id);
        } else {
            return_weibo_li($id);
        }
    } else if ($_POST['type'] == 'video') {
        $create_time = time();
        $video = "public/video/".$_SESSION['uid'].'_'.$create_time.".mp4";
        move_uploaded_file($_FILES['video_file']['tmp_name'], $video);
        $id = addInfo('weibo_detail', array(
            'user_id'=>$_SESSION['uid'],
            'create_time'=>$create_time,
            'type'=>$_POST['type'],
            'video'=>$video
            ));
        if ( is_array($id) ) {
            print_r($id);
        } else {
            return_weibo_li($id);
        }
    } else if ($_POST['type'] == 'edit') {
        $create_time = time();
        $result = updateInfo('weibo_detail', array('weibo_content'=>$_POST['weibo_content'],'create_time'=>$create_time), array('id'=>$_POST['id']));
        if ($result == 1) {
            returnjson('1','编辑成功');
        } else {
            returnjson('0','编辑失败');
        }
    }
 ?>