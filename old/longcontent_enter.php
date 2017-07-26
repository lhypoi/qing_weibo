<?php
    require_once 'library/smarty/Smarty.class.php';
    $smarty = new Smarty();
    $smarty->template_dir = 'view';

    require_once 'pdoClass.php';
    $pdo =  new pdoClass("mysql:dbhost=localhost;dbname=mweibo;charset=utf8","root","",true);

    require_once 'weiboClass.php';
    $weibo = new weiboClass();

    if (empty($_REQUEST)) {
        $weibo ->index();
    }else if ($_REQUEST['action'] == "save") {
        if ($weibo ->save() > 0) {
            echo 1;
        } else {
            echo 0;
        }
    }

    // 微博内容类型加个判断
    // 图片大小调整
    // 第五个框-长文章
 ?>