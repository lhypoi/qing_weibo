<?php
    require_once 'common.php';

    if ($_POST['type'] == 'add') {
        $create_time = time();
        $id = addInfo('weibo_commet', array(
            'commet_content'=>$_POST['commet_content'],
            'user_id'=>$_SESSION['uid'],
            'commet_time'=>$create_time,
            'weibo_id'=>$_POST['weibo_id']
            ));
        if ( is_array($id) ) {
            print_r($id);
        } else {
            return_commet_li($id);
        }
    }
 ?>