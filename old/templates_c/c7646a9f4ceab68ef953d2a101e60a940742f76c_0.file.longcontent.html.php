<?php
/* Smarty version 3.1.30, created on 2017-07-26 09:01:21
  from "D:\wamp64\www\20170718\lesson8\view\longcontent.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5977e9e1b95a07_76687125',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c7646a9f4ceab68ef953d2a101e60a940742f76c' => 
    array (
      0 => 'D:\\wamp64\\www\\20170718\\lesson8\\view\\longcontent.html',
      1 => 1501030830,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5977e9e1b95a07_76687125 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>长文章</title>
    <?php echo '<script'; ?>
 type="text/javascript" src="./public/js/jquery-3.1.0.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <link rel="stylesheet" type="text/css" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style type="text/css" media="screen">
        body {
          background-color: #050d19;
        }
        .longcontent_box{
            margin: 20px auto;
            width:1000px;
        }
        .longcontent_box input{
            margin-top:10px;
        }
    </style>
</head>
<body>
    <div class="longcontent_box">
        <form action="" method="">
            <?php echo '<script'; ?>
 id="container" name="content" type="text/plain"><?php echo '</script'; ?>
>
            <input type="submit" value="发布" class="btn btn-info pull-right">
        </form>
    </div>
    <?php echo '<script'; ?>
 type="text/javascript" src="public/libarary/ueditor/ueditor.config.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="public/libarary/ueditor/ueditor.all.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript">
        var ue = UE.getEditor('container');
    <?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript">
        $('.longcontent_box input[type=submit]').click(function(event) {
            if (localStorage.getItem('uid') > 0) {
                $.ajax({
                    url: "longcontent_enter.php",
                    type: "POST",
                    data: {
                        weibo_content: ue.getContent(),
                        action: 'save',
                        user_id: localStorage.getItem('uid')
                    },
                    success: function(data) {
                        if (data == 1) {
                            alert('发布成功');
                            location.href = 'weibo_enter';
                        } else {
                            alert('发布成功');
                        }
                    }
                });
            } else {
                alert('非法访问页面，请先登陆');
                location.href = 'weibo_enter';
            }
            return false;
        });
    <?php echo '</script'; ?>
>
</body>
</html><?php }
}
