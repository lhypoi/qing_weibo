<?php
/* Smarty version 3.1.30, created on 2017-07-31 16:00:09
  from "D:\wamp64\www\20170718\lesson9\view\longcontent.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_597ee38901db42_31628892',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1f5f7581f74ac2d26aafbaee0ea67e58df064fbb' => 
    array (
      0 => 'D:\\wamp64\\www\\20170718\\lesson9\\view\\longcontent.html',
      1 => 1501488006,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597ee38901db42_31628892 (Smarty_Internal_Template $_smarty_tpl) {
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
          margin: 0;
          padding: 0;
          height: 100%;
          background-color: #636a5a;
          background-image: url('public/img/bgd.jpg');
        }
        .longcontent_box{
            margin: 20px auto;
            width:1000px;
        }
        /*标签CSS*/
        .tag_box{
            height:30px;
            background-color:#fff;
            margin:10px 0 0 0;
            border-radius:5px;
        }
        .tags{
            float:left;
            color:#999;
            height:30px;
            line-height:30px;
            text-indent:5px;
            margin: 0;
            padding: 0;
        }
        #tag{
            width:35%;
            height:30px;
            line-height:30px;
            border:none;
            border-radius:5px;
            text-indent:5px;
            outline:none;
            color:#999;
            float:left;
        }
        .warning{
            color:#f00;
            display:none;
            height:30px;
            line-height:30px;
            float:right;
            margin-right:5px;
        }
    </style>
</head>
<body>
    <div class="longcontent_box">
        <form action="" method="">
            <?php echo '<script'; ?>
 id="container" name="content" type="text/plain"><?php echo '</script'; ?>
>
            <div class="tag_box clearfix">
                <div class="tags"></div>
                <input type="text" placeholder="请添加标签，按回车确定" id="tag" />
                <span class="warning">最多添加5个标签</span>
            </div>
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
        // 发布长微博
        $('.longcontent_box input[type=submit]').click(function(event) {
            if (localStorage.getItem('uid') > 0) {
                $.ajax({
                    url: "index.php?control=longcontent&action=sendWeibo",
                    type: "POST",
                    data: {
                        weibo_content: ue.getContent(),
                        tagname_arr,
                        type: 'long_content'
                    },
                    success: function(data) {
                        data = $.parseJSON(data);
                        if (data.status == 1) {
                            alert('发布成功');
                            location.href = 'index.php';
                        } else {
                            alert('发布失败');
                        }
                    }
                });
            } else {
                alert('非法访问页面，请先登陆');
                location.href = 'index.php';
            }
            return false;
        });
        // 阻止回车提交表单
        $('#tag').keypress(function(e){
            if(e.keyCode==13){
                e.preventDefault();
            }
        });
        //添加标签
        var tagname_arr = [];
        $('#tag').on('keyup', function(e) {
            if (e.keyCode == 13) {
                if (tagname_arr.length >= 5) {
                    $(this).siblings('.warning').css('display', 'block');
                } else {
                    tagname_arr.push($(this).val());
                    var _html = '';
                    for (var i = 0; i < tagname_arr.length; i++) {
                        _html += '#' + tagname_arr[i] + ' ';
                    }
                    $(this).siblings('.tags').html(_html);
                    $(this).val('');
                }
            } else if (e.keyCode == 8) {
                if ($(this).val() == '') {
                    tagname_arr.splice(tagname_arr.length - 1, 1);
                    var _html = '';
                    for (var i = 0; i < tagname_arr.length; i++) {
                        _html += '#' + tagname_arr[i] + ' ';
                    }
                    $(this).siblings('.tags').html(_html);
                }
                $(this).val('');
            }
        })
    <?php echo '</script'; ?>
>
</body>
</html><?php }
}
