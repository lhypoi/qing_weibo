<?php
/* Smarty version 3.1.30, created on 2017-07-28 13:28:21
  from "D:\wamp64\www\20170718\lesson9\view\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_597acb75a04b48_90334814',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ccc7882bbfbaa41d0fe8bd2b5d6fab59a298e9e2' => 
    array (
      0 => 'D:\\wamp64\\www\\20170718\\lesson9\\view\\index.html',
      1 => 1501215916,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597acb75a04b48_90334814 (Smarty_Internal_Template $_smarty_tpl) {
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
    <?php echo '<script'; ?>
 type="text/javascript" src="./public/js/index.js?0.0.2"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="./public/js/delete.js"><?php echo '</script'; ?>
>
    <link rel="stylesheet" type="text/css" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./public/css/index.css">
    <link rel="stylesheet" type="text/css" href="./public/css/animate.css"></head>
<body>
    <!-- 背景 -->
    <div class="bg">
        <canvas id="canvas"></canvas>
    </div>
    <!-- 微博 -->
    <div id="main">
        <!-- 头部 -->
        <div class="title">
            <!-- 标题 -->
            <h1>月色真美啊</h1>
            <!-- 用户信息 -->
            <div class="tab_user clearfix">
                <div class="dropdown user_state pull-left" id="accountmenu">
                    
                    <?php if ($_SESSION['uid'] > 0) {?>
                    <img src="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['user_pic']->value)===null||$tmp==='' ? './public/img/default.png' : $tmp);?>
" alt="">
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
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="" class="btn btn-default" data-dismiss="modal">取消</button>
                                <button type="" class="btn btn-info" onclick="do_login()">登陆</button>
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
                                <button type="" class="btn btn-info" onclick="do_register()">注册</button>
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
                                <button type="" class="btn btn-info" onclick="do_edit()">确定</button>
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
                                <button type="" class="btn btn-info" onclick="do_quit()">确定</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 发布微博 -->
        <div class="weibo_content">
            <!-- 内容区域 -->
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab1">
                    <textarea name="weibo_text" class="form-control" rows="2"></textarea>
                </div>
                <div class="tab-pane fade" id="tab2">
                    <textarea name="weibo_text" class="form-control" rows="2"></textarea>
                    <div class="filePicker">
                        <label>点击选择文件</label>
                        <input type="file" name="" value="" class="form-control" id="pic_file">
                    </div>
                    <div class="pic_file_see"></div>
                </div>
                <div class="tab-pane fade" id="tab3">
                    
                    <input type="text" name="" class="search_music form-control" placeholder="请用歌名、专辑、艺术家搜索" oninput="search_music(this)">
                    <ul class="search_list">
                    </ul>
                    <textarea name="weibo_text" class="form-control" rows="2"></textarea>
                </div>
                <div class="tab-pane fade" id="tab4">
                    <input type="file" id="video_file">
                </div>
            </div>
            <div class="row tag_box">
            	<div class="tags"></div>
            	<input type="text" placeholder="请添加标签，按回车确定" id="tag" />
            	<span class="warning">最多添加5个标签</span>
            </div>
            <!-- 切换栏和发布按钮 -->
            <div class="row menu_box">
                <div class="col-lg-9">
                    <div class="col-lg-2 menu_tab">
                        <a href="#tab1" data-toggle="tab">
                            <span class="glyphicon glyphicon-pencil"></span>
                            文字
                        </a>
                    </div>
                    <div class="col-lg-2 menu_tab">
                        <a href="#tab2" data-toggle="tab">
                            <span class="glyphicon glyphicon-heart"></span>
                            图文
                        </a>
                    </div>
                    <div class="col-lg-2 menu_tab">
                        <a href="#tab3" data-toggle="tab">
                            <span class="glyphicon glyphicon-music"></span>
                            音乐
                        </a>
                    </div>
                    <div class="col-lg-2 menu_tab">
                        <a href="#tab4" data-toggle="tab">
                            <span class="glyphicon glyphicon-film"></span>
                            视频
                        </a>
                    </div>
                    <div class="col-lg-2 menu_tab">
                        <a href="#tab4" data-toggle="tab">
                            <span class="glyphicon glyphicon-film"></span>
                            长文章
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-lg-offset-1">
                    <input type="button" class="btn btn-info btn-lg pull-right mt_20" value="发布">
                    <input type="hidden" id="type" value="short_content">
                </div>
            </div>
        </div>
        <div class="weibo_list">
            <div class="row">
                <div class="col-lg-9">
                    <ul class="weibo_box">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['weibo_data']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
                            <li weibo-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="animated slideInDown list_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
                                <div class="row clearfix">
                                    <div class="col-lg-2 head_box" style="text-align: center;">
                                        <img src="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['user_data']['user_pic'])===null||$tmp==='' ? './public/img/default.png' : $tmp);?>
" alt="" data-id="<?php echo $_smarty_tpl->tpl_vars['item']->value['user_id'];?>
" class="w_img">
                                        <p><?php echo $_smarty_tpl->tpl_vars['item']->value['user_data']['user_nickname'];?>
</p>
                                        <div class="info-box">
                                            <div class="arrow-left"></div>
                                            <a  class="author-name"><?php echo $_smarty_tpl->tpl_vars['item']->value['user_data']['user_nickname'];?>
的最近微博</a>

                                            <ul class="road_list">
	                                        </ul>

                                        </div>
                                    </div>
                                    <div class="col-lg-10 content_box">
                                        <div class="triangle_border_ne"></div>
                                        <div class="content">
                                            <?php if ($_smarty_tpl->tpl_vars['item']->value['type'] == 'short_content') {?>
                                                <?php echo $_smarty_tpl->tpl_vars['item']->value['weibo_content'];?>

                                            <?php } elseif ($_smarty_tpl->tpl_vars['item']->value['type'] == 'pic_text') {?>
                                                <img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['pic'];?>
" alt="" class="w-img">
                                                <?php echo $_smarty_tpl->tpl_vars['item']->value['weibo_content'];?>

                                            <?php } elseif ($_smarty_tpl->tpl_vars['item']->value['type'] == 'music') {?>
                                                <audio src="<?php echo $_smarty_tpl->tpl_vars['item']->value['music'];?>
" controls></audio>
                                            <?php } elseif ($_smarty_tpl->tpl_vars['item']->value['type'] == 'vedio') {?>
                                                <video src="<?php echo $_smarty_tpl->tpl_vars['item']->value['video'];?>
" controls></video>
                                            <?php } elseif ($_smarty_tpl->tpl_vars['item']->value['type'] == 'long_content') {?>
                                                <?php echo $_smarty_tpl->tpl_vars['item']->value['weibo_content'];?>

                                            <?php }?>
                                        </div>
                                        <div class="w-opt clearfix">
                                        	<div class="optb pull-left">
                                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['tag_data']['tagid_arr'], 'item2', false, 'key2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key2']->value => $_smarty_tpl->tpl_vars['item2']->value) {
?>
                                                    <a data-id = "<?php echo $_smarty_tpl->tpl_vars['item2']->value;?>
">#<?php echo $_smarty_tpl->tpl_vars['item']->value['tag_data']['tagname_arr'][$_smarty_tpl->tpl_vars['key2']->value];?>
&nbsp;</a>
                                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                                        	</div>
                                            <div class="optb pull-right">
                                                <span style="color: #55a4a9;"><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['item']->value['create_time']);?>
</span>
                                                <?php if ($_smarty_tpl->tpl_vars['item']->value['user_data']['id'] == $_SESSION['uid']) {?>
                                                    <a href="#modal-del" data-toggle="modal" class="delete_weibo" id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">删除</a>
                                                <?php }?>
                                                <?php if ($_smarty_tpl->tpl_vars['item']->value['user_data']['id'] == $_SESSION['uid']) {?>
                                                    <a href="#edit_weibo_modal" class="edit_weibo" data-toggle="modal">编辑</a>
                                                <?php }?>
                                                <a href="" class="commet_btn" data-num="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">评论(<?php echo count($_smarty_tpl->tpl_vars['item']->value['commet_data']);?>
)</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row comment_row">
                                    <div class="col-lg-10 col-lg-offset-2 commont_box">
                                    	<div class="row commet">
                                            <div class="col-lg-10">
                                                <input type="text" name="commet_content" class="form-control">
                                            </div>
                                            <div class="col-lg-2">
                                                <input type="button" class="btn btn-info commet_send" value="发布">
                                            </div>
                                        </div>
                                        <ul class="commont_list">

                                        </ul>
                                    </div>
                                </div>
                            </li>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    </ul>
                    <div class="modal fade" id="edit_weibo_modal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">编辑微博</div>
                                <div class="modal-body">
                                    <textarea class="form-control" rows="2"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-default" data-dismiss="modal">取消</button>
                                    <button class="btn btn-info" onclick="do_edit_weibo()">确定</button>
                                    <input type="hidden" name="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 删除微博 -->
		            <div class="modal" id="modal-del">
		                <div class="modal-dialog">
		                    <div class="modal-content">
		                        <div class="modal-header">删除信息</div>
		                        <div class="modal-body">确定删除这条信息吗？</div>
		                        <div class="modal-footer">
		                        	<input type="hidden" id="record-num" value="">
		                            <button class="btn btn-default" data-dismiss="modal">取消</button>
		                            <button class="btn btn-primary" data-dismiss="modal" id="record-del-confirm">确定</button>
		                        </div>
		                    </div>
		                </div>
		            </div>
		            <!-- 删除评论 -->
		            <div class="modal" id="modal_comment">
		                <div class="modal-dialog">
		                    <div class="modal-content">
		                        <div class="modal-header">删除评论</div>
		                        <div class="modal-body">确定删除这条评论吗？</div>
		                        <div class="modal-footer">
		                        	<input type="hidden" value="" id="comment-del-num" />
		                            <button class="btn btn-default" data-dismiss="modal" id="comment-del-cancel">取消</button>
		                            <button class="btn btn-primary" data-dismiss="modal" id="comment-del-confirm">确定</button>
		                        </div>
		                    </div>
		                </div>
		            </div>
                </div>
                <div class="col-lg-3">
                    广告
                </div>
            </div>

        </div>
    </div>
</body>
</html><?php }
}
