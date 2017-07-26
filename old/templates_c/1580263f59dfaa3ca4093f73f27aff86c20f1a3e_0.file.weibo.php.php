<?php
/* Smarty version 3.1.30, created on 2017-07-21 03:36:37
  from "D:\wamp64\www\20170718\lesson6\weibo.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_597176c5d20560_58788975',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1580263f59dfaa3ca4093f73f27aff86c20f1a3e' => 
    array (
      0 => 'D:\\wamp64\\www\\20170718\\lesson6\\weibo.php',
      1 => 1500600216,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597176c5d20560_58788975 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php
    ';?>require_once 'common.php';

    if ($_POST['type'] == 'short_content') {
        $weibo_content = $_POST['weibo_content'];
        $create_time = time();

        $pdo_object = connect_sql();
        $insert_sql = "insert into weibo_detail (weibo_content,pic,music,vedio,type,create_time) values ('$weibo_content','','','','short_content',$create_time)";
        $pstate = $pdo_object -> prepare($insert_sql);
        $pstate -> execute();
        if ($pstate -> errorCode() == '00000'){
            echo json_encode(
                array(
                    "status"=>1,
                    "weibodata"=>array(
                        'weibo_content' => $weibo_content,
                        'id' => $pdo_object -> lastInsertId(),
                        'type' => $_POST['type']
                        ),
                    )
            );
        } else {
            echo json_encode(
                array(
                    "status"=>0,
                    "error_msg"=>$pstate -> errorInfo()
                    )
            );
        }
    } else if ($_POST['type'] == 'pic_text'){
        $weibo_content = $_POST['weibo_content'];
        $create_time = time();
        $pic = "public/img/".$create_time.".jpg";
        move_uploaded_file($_FILES['pic_file']['tmp_name'], $pic);

        $pdo_object = connect_sql();
        $insert_sql = "insert into weibo_detail (weibo_content,pic,music,vedio,type,create_time) values ('$weibo_content','$pic','','','pic_text',$create_time)";
        $pstate = $pdo_object -> prepare($insert_sql);
        $pstate -> execute();
        if ($pstate -> errorCode() == '00000'){
            echo json_encode(
                array(
                    "status"=>1,
                    "weibodata"=>array(
                        'weibo_content' => $weibo_content,
                        'pic' => $pic,
                        'id' => $pdo_object -> lastInsertId(),
                        'type' => $_POST['type']
                        ),
                    )
            );
        } else {
            echo json_encode(
                array(
                    "status"=>0,
                    "error_msg"=>$pstate -> errorInfo()
                    )
            );
        }
    } else if ($_POST['type'] == 'music'){
        $create_time = time();
        $music = "public/music/".$create_time.".mp3";
        move_uploaded_file($_FILES['music_file']['tmp_name'], $music);

        $pdo_object = connect_sql();
        $insert_sql = "insert into weibo_detail (weibo_content,pic,music,vedio,type,create_time) values ('','','$music','','music',$create_time)";
        $pstate = $pdo_object -> prepare($insert_sql);
        $pstate -> execute();
        if ($pstate -> errorCode() == '00000'){
            echo json_encode(
                array(
                    "status"=>1,
                    "weibodata"=>array(
                        'music' => $music,
                        'id' => $pdo_object -> lastInsertId(),
                        'type' => $_POST['type']
                        ),
                    )
            );
        } else {
            echo json_encode(
                array(
                    "status"=>0,
                    "error_msg"=>$pstate -> errorInfo()
                    )
            );
        }
    } else if ($_POST['type'] == 'vedio'){
        $create_time = time();
        $vedio = "public/vedio/".$create_time.".mp4";
        move_uploaded_file($_FILES['vedio_file']['tmp_name'], $vedio);

        $pdo_object = connect_sql();
        $insert_sql = "insert into weibo_detail (weibo_content,pic,music,vedio,type,create_time) values ('','','','$vedio','vedio',$create_time)";
        $pstate = $pdo_object -> prepare($insert_sql);
        $pstate -> execute();
        if ($pstate -> errorCode() == '00000'){
            echo json_encode(
                array(
                    "status"=>1,
                    "weibodata"=>array(
                        'vedio' => $vedio,
                        'id' => $pdo_object -> lastInsertId(),
                        'type' => $_POST['type']
                        ),
                    )
            );
        } else {
            echo json_encode(
                array(
                    "status"=>0,
                    "error_msg"=>$pstate -> errorInfo()
                    )
            );
        }
    } else if ($_POST['type'] == 'commet'){
        $create_time = time();
        $weibo_id = $_POST['weibo_id'];
        $commet_content = $_POST['commet_content'];

        $pdo_object = connect_sql();
        $insert_sql = "insert into weibo_commet (commet_content,commet_time,weibo_id) values ('$commet_content',$create_time,$weibo_id)";
        $pstate = $pdo_object -> prepare($insert_sql);
        $pstate -> execute();
        if ($pstate -> errorCode() == '00000'){
            echo json_encode(
                array(
                    "status"=>1,
                    "weibodata"=>array(
                        "msg" => '评论插入成功'
                        ),
                    )
            );
        } else {
            echo json_encode(
                array(
                    "status"=>0,
                    "error_msg"=>$pstate -> errorInfo()
                    )
            );
        }
    } else if ($_POST['type'] == 'query'){
        $pdo_object = connect_sql();
        $insert_sql = "select * from weibo_detail order by id desc";
        $pstate = $pdo_object -> prepare($insert_sql);
        $pstate -> execute();
        if ($pstate -> errorCode() == '00000'){
            echo json_encode(
                array(
                    "status"=>1,
                    "weibodata"=> array_reverse($pstate -> fetchAll())
                    )
            );
        } else {
            echo json_encode(
                array(
                    "status"=>0,
                    "error_msg"=>$pstate -> errorInfo()
                    )
            );
        }
    } else if ($_POST['type'] == 'querycommet'){
        $weibo_id = $_POST['weibo_id'];
        $pdo_object = connect_sql();
        $insert_sql = "select * from weibo_commet where weibo_id = $weibo_id order by id desc";
        $pstate = $pdo_object -> prepare($insert_sql);
        $pstate -> execute();
        if ($pstate -> errorCode() == '00000'){
            echo json_encode(
                array(
                    "status"=>1,
                    "weibodata"=>$pstate -> fetchAll()
                    )
            );
        } else {
            echo json_encode(
                array(
                    "status"=>0,
                    "error_msg"=>$pstate -> errorInfo()
                    )
            );
        }
    }
 <?php echo '?>';
}
}
