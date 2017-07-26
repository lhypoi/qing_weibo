<?php
/* Smarty version 3.1.30, created on 2017-07-22 16:49:31
  from "D:\wamp64\www\20170718\lesson7\view\weibo.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5973119bd97ef0_54191904',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '047693f9ae262419ffa62ffb233d5fbaaf7c6c2b' => 
    array (
      0 => 'D:\\wamp64\\www\\20170718\\lesson7\\view\\weibo.html',
      1 => 1500713370,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5973119bd97ef0_54191904 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>微博</title>
    <?php echo '<script'; ?>
 type="text/javascript" src="./public/js/jquery-3.1.0.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="./public/js/index.js"><?php echo '</script'; ?>
>
    <link rel="stylesheet" type="text/css" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./public/css/index.css">
    <link rel="stylesheet" type="text/css" href="./public/css/animate.css">
</head>
<body>
    <div class="main">
        <div class="tab_user clearfix">
            <img src="public/img/3.jpg" alt=""  class="pull-left" />
            <div class="dropdown user_state pull-left" id="accountmenu">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">当前状态：游客<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#log_box" data-toggle="modal">登陆</a></li>
                    <li class="divider"></li>
                    <li><a href="#register_box" data-toggle="modal">注册</a></li>
                </ul>
                <input type="hidden" name="" class="user_id" value="1">
            </div>
            <div class="modal" id="log_box">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            登陆
                        </div>
                        <div class="modal-body">
                            <form action="" class="form-horizontal">
                                <div class="form-group">
                                    <label for="log_user_name" class="col-lg-2 control-label">用户名</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="" value="" class="form-control" id="log_user_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="log_user_pwd" class="col-lg-2 control-label">密码</label>
                                    <div class="col-lg-10">
                                        <input type="password" name="" value="" class="form-control" id="log_user_pwd">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="" class="btn btn-default" data-dismiss="modal">取消</button>
                            <button type="" class="btn btn-info" onclick="do_log()">登陆</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal" id="register_box">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            注册
                        </div>
                        <div class="modal-body">
                            <form action="" class="form-horizontal">
                                <div class="form-group">
                                    <label for="register_user_nickname" class="col-lg-2 control-label">昵称</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="" value="" class="form-control" id="register_user_nickname">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="register_user_name" class="col-lg-2 control-label">用户名</label>
                                    <div class="col-lg-10">
                                        <input type="text" name="" value="" class="form-control" id="register_user_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="register_user_pwd" class="col-lg-2 control-label">密码</label>
                                    <div class="col-lg-10">
                                        <input type="password" name="" value="" class="form-control" id="register_user_pwd">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="register_user_repwd" class="col-lg-2 control-label">重复密码</label>
                                    <div class="col-lg-10">
                                        <input type="password" name="" value="" class="form-control" id="register_user_repwd">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="register_user_pic" class="col-lg-2 control-label">头像</label>
                                    <div class="col-lg-10">
                                        <input type="file" name="" value="" class="form-control" id="register_user_pic">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="" class="btn btn-default" data-dismiss="modal">取消</button>
                            <button type="" class="btn btn-info" onclick="do_register()">注册</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h2>其实是我dio哒！</h2>
        <div class="row menu_box">
            <div class="col-lg-3 menu_tab">
                <a href="#tab1" data-toggle="tab">
                    <span class="glyphicon glyphicon-pencil"></span>
                    文字
                </a>
            </div>
            <div class="col-lg-3 menu_tab">
                <a href="#tab2" data-toggle="tab">
                    <span class="glyphicon glyphicon-heart"></span>
                    图文
                </a>
            </div>
            <div class="col-lg-3 menu_tab">
                <a href="#tab3" data-toggle="tab">
                    <span class="glyphicon glyphicon-music"></span>
                    音乐
                </a>
            </div>
            <div class="col-lg-3 menu_tab">
                <a href="#tab4" data-toggle="tab">
                    <span class="glyphicon glyphicon-film"></span>
                    视频
                </a>
            </div>
        </div>
        <form action="" class="clearfix">
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab1">
                    <textarea name="weibo_content" class="form-control" rows="2"></textarea>
                </div>
                <div class="tab-pane fade" id="tab2">
                    <textarea name="weibo_content" class="form-control" rows="2"></textarea>
                    <input type="file" id="pic_file">
                </div>
                <div class="tab-pane fade" id="tab3">
                    <input type="file" id="music_file">
                </div>
                <div class="tab-pane fade" id="tab4">
                    <input type="file" id="vedio_file">
                </div>
            </div>
            <input type="hidden" id="type" value="short_content">
            <input type="button" class="btn btn-info btn-lg pull-right mt_20" value="发布">
        </form>
        <div class="row">
            <div class="col-lg-8">
                <ul class="list_box mt_20">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['weibo_list']->value['weibodata'], 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                        <li id="w<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="animated slideInDown">
                            <div class="row">
                                <div class="col-lg-2">
                                    <a href="#" class="toupic" data-toggle="popover" data-placement="right" data-trigger="hover">
                                        <img src="public/img/<?php echo $_smarty_tpl->tpl_vars['item']->value['user_id'];?>
.jpg" alt="" class="w-img">
                                    </a>
                                </div>
                                <div class="col-lg-10 content_box">
                                    <div class="triangle_border_ne"></div>
                                    <div class="content">
                                        <?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'short_content') {?>
                                            <?php echo $_smarty_tpl->tpl_vars['item']->value['weibo_content'];?>

                                        <?php } elseif ($_smarty_tpl->tpl_vars['item']->value['type'] == 'pic_text') {?>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['pic'];?>
" alt="" class="w-img" style="width:100%;height:100%">
                                                </div>
                                                <div class="col-lg-6">
                                                    <?php echo $_smarty_tpl->tpl_vars['item']->value['weibo_content'];?>

                                                </div>
                                            </div>
                                        <?php } elseif ($_smarty_tpl->tpl_vars['item']->value['type'] == 'music') {?>
                                            <div class="row">
                                                <audio src="<?php echo $_smarty_tpl->tpl_vars['item']->value['music'];?>
" controls></audio>
                                            </div>
                                        <?php } elseif ($_smarty_tpl->tpl_vars['item']->value['type'] == 'vedio') {?>
                                            <div class="row">
                                                <video src="<?php echo $_smarty_tpl->tpl_vars['item']->value['vedio'];?>
" controls="controls"></video>
                                            </div>
                                        <?php }?>
                                    </div>
                                    <div class="w-opt clearfix">
                                        <div class="opta pull-left">
                                            <a href="#" class="tag1" data-toggle="popover" data-placement="top" data-trigger="hover">标签1</a>
                                            <a href="#" class="tag2" data-toggle="popover" data-placement="top" data-trigger="hover">标签2</a>
                                            <a href="#" class="tag3" data-toggle="popover" data-placement="top" data-trigger="hover">标签3</a>
                                        </div>
                                        <div class="optb pull-right">
                                            <span><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['item']->value['create_time']);?>
</span>
                                            <a href="#modal_box" data-toggle="modal" class="delete_weibo">删除</a>
                                            <a href="" class="commet_btn">评论(<?php echo count($_smarty_tpl->tpl_vars['weibo_list']->value['commetdata'][$_smarty_tpl->tpl_vars['key']->value]);?>
)</a>
                                            <a href="">编辑</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-10 commet_box">
                                    <div class="row commet">
                                        <div class="col-lg-10">
                                            <input type="text" name="commet_content" class="form-control">
                                        </div>
                                        <div class="col-lg-2">
                                            <input type="button" class="btn btn-info commet_send" value="发布">
                                        </div>
                                    </div>
                                    <ul class="commet_list">
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['weibo_list']->value['commetdata'][$_smarty_tpl->tpl_vars['key']->value], 'item2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item2']->value) {
?>
                                            <li id="c<?php echo $_smarty_tpl->tpl_vars['item2']->value['id'];?>
">
                                                <div class="row">
                                                    <div class="col-lg-2">
                                                        <img src="public/img/<?php echo $_smarty_tpl->tpl_vars['item2']->value['user_id'];?>
.jpg" alt="">
                                                    </div>
                                                    <div class="col-lg-10">
                                                        <?php echo $_smarty_tpl->tpl_vars['item2']->value['commet_content'];?>

                                                        <span>
                                                            <a href="#modal_box2" data-toggle="modal" class="delete_commet pull-right">删除</a>
                                                        </span>
                                                        <br>
                                                        <span class="pull-right" style="color: #aaa;">
                                                            <?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['item2']->value['commet_time']);?>

                                                        </span>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                    </ul>
                                </div>
                            </div>
                        </li>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    <div class="modal fade" id="modal_box">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">删除微博</div>
                                <div class="modal-body">确定删除这条微博吗？</div>
                                <div class="modal-footer">
                                    <button class="btn btn-default" data-dismiss="modal">取消</button>
                                    <button class="btn btn-info delete_weibo_y" data-dismiss="modal">确定</button>
                                    <input type="hidden" name="" class="delete_weiboid">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="modal_box2">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">删除评论</div>
                                <div class="modal-body">确定删除这条评论吗？</div>
                                <div class="modal-footer">
                                    <button class="btn btn-default" data-dismiss="modal">取消</button>
                                    <button class="btn btn-info delete_commet_y" data-dismiss="modal">确定</button>
                                    <input type="hidden" name="" class="delete_commetid">
                                </div>
                            </div>
                        </div>
                    </div>
                </ul>
            </div>
            <div class="col-lg-4 ad">
                <div class="ad1">
                    <img src="public/img/3.jpg" alt="" />
                    我是广告
                </div>
            </div>
        </div>
    </div>
</body>
</html><?php }
}
