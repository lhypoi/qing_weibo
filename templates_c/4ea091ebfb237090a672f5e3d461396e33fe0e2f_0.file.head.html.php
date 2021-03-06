<?php
/* Smarty version 3.1.30, created on 2017-08-03 13:05:13
  from "C:\wamp64\www\qing_weibo\view\common\head.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59831f89629ce3_38252242',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4ea091ebfb237090a672f5e3d461396e33fe0e2f' => 
    array (
      0 => 'C:\\wamp64\\www\\qing_weibo\\view\\common\\head.html',
      1 => 1501765505,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59831f89629ce3_38252242 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>微....博的？！</title>
    <?php echo '<script'; ?>
 type="text/javascript" src="./public/js/jquery-3.1.0.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <!-- <?php echo '<script'; ?>
 type="text/javascript" src="./public/libarary/Bootstrap3.3.7/js/bootstrap.min.js"><?php echo '</script'; ?>
> -->

    <?php echo '<script'; ?>
 type="text/javascript" src="./public/js/user.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="./public/js/weibo.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="./public/js/index.js?0.0.2"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="./public/js/delete.js"><?php echo '</script'; ?>
>

    <link rel="stylesheet" type="text/css" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="./public/libarary/Bootstrap3.3.7/css/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="./public/css/index.css">
    <link rel="stylesheet" type="text/css" href="./public/css/animate.css">
</head>
<body>
    <!-- 背景 -->
    
    <!-- 微博 -->
    <div id="main">
        <!-- 头部 -->
        <div class="title">
            <!-- 标题 -->
            <h1><a href="index.php" style="text-decoration: none;">轻博客</a></h1>
            <!-- 用户信息 -->
            <div class="tab_user clearfix">
                <div class="dropdown user_state pull-left" id="accountmenu">
                    
                    <?php if ($_SESSION['uid'] > 0) {?>
                    <img src="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['user_pic']->value)===null||$tmp==='' ? './public/img/default.png' : $tmp);?>
" alt="" >
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php echo $_smarty_tpl->tpl_vars['user_nickname']->value;?>
 <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#edit_pic_box" data-toggle="modal">修改头像</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="index.php?control=user&action=home&id=<?php echo $_SESSION['uid'];?>
" data-toggle="modal">个人主页</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#quit_box" data-toggle="modal">退出</a>
                        </li>
                    </ul>
                    
                    <?php } else { ?>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        当前状态：游客 <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#login_box" data-toggle="modal">登陆</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#register_box" data-toggle="modal">注册</a>
                        </li>
                    </ul>
                    <?php }?>
                </div>
                
                <div class="modal" id="login_box">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">登陆</div>
                            <div class="modal-body">
                                <form action="" class="form-horizontal">
                                    <div class="form-group">
                                        <label for="login_user_name" class="col-lg-2 control-label">用户名</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="" value="" class="form-control" id="login_user_name"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="login_user_pwd" class="col-lg-2 control-label">密码</label>
                                        <div class="col-lg-10">
                                            <input type="password" name="" value="" class="form-control" id="login_user_pwd"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-lg-2 control-label">验证码</label>
                                        <div class="col-lg-7">
                                            <input type="text" name="captcha" class="form-control">
                                        </div>
                                        <div class="col-lg-3">
                                            <img src="../qing_weibo_tp5/public/index/home/getCaptcha" alt="" onclick="changeCaptcha(this)" id="img_captcha">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="" class="btn btn-default" data-dismiss="modal">取消</button>
                                <button type="" class="btn btn-info" onclick="user.do_login()">登陆</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="modal" id="register_box">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">注册</div>
                            <div class="modal-body">
                                <form action="" class="form-horizontal">
                                    <div class="form-group">
                                        <label for="register_user_nickname" class="col-lg-2 control-label">昵称</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="" value="" class="form-control" id="register_user_nickname"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="register_user_name" class="col-lg-2 control-label">用户名</label>
                                        <div class="col-lg-10">
                                            <input type="text" name="" value="" class="form-control" id="register_user_name"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="register_user_pwd" class="col-lg-2 control-label">密码</label>
                                        <div class="col-lg-10">
                                            <input type="password" name="" value="" class="form-control" id="register_user_pwd"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="register_user_repwd" class="col-lg-2 control-label">重复密码</label>
                                        <div class="col-lg-10">
                                            <input type="password" name="" value="" class="form-control" id="register_user_repwd"></div>
                                    </div>
<!--                                     <div class="form-group">
                                        <label for="register_user_pic" class="col-lg-2 control-label">头像</label>
                                        <div class="col-lg-10 filePicker">
                                            <label>点击选择文件</label>
                                            <input type="file" name="" value="" class="form-control" id="register_user_pic"></div>
                                    </div>
                                    <div class="form-group register_user_pic_see">
                                        <div class="col-lg-10 col-lg-offset-2"></div>
                                    </div> -->
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="" class="btn btn-default" data-dismiss="modal">取消</button>
                                <button type="" class="btn btn-info" onclick="user.do_register()">注册</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="modal" id="edit_pic_box">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">修改头像</div>
                            <div class="modal-body">
                                <div class="form-group" style="margin-bottom: 45px;">
                                    <div class="filePicker">
                                        <label>点击选择文件</label>
                                        <input type="file" name="" value="" class="form-control" id="edit_pic"></div>
                                </div>
                                <div class="form-group edit_pic_see">
                                    <div class="col-lg-10 col-lg-offset-2"></div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="" class="btn btn-default" data-dismiss="modal">取消</button>
                                <button type="" class="btn btn-info" onclick="user.do_edit()">确定</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="modal" id="quit_box">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">退出当前用户</div>
                            <div class="modal-body">是否退出当前用户？</div>
                            <div class="modal-footer">
                                <button type="" class="btn btn-default" data-dismiss="modal">取消</button>
                                <button type="" class="btn btn-info" onclick="user.do_quit()">确定</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><?php }
}
