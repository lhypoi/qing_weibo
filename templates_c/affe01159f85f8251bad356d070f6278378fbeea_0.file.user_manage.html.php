<?php
/* Smarty version 3.1.30, created on 2017-08-03 20:17:37
  from "D:\wamp64\www\20170718\lesson9\view\user_manage.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59831461b0c8b3_99732391',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'affe01159f85f8251bad356d070f6278378fbeea' => 
    array (
      0 => 'D:\\wamp64\\www\\20170718\\lesson9\\view\\user_manage.html',
      1 => 1501759896,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59831461b0c8b3_99732391 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row">
	<span>用户名：</span>
	<input type="text" name="nickname" class="form-control text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['user_name'];?>
" />
</div>
<div class="row">
	<span>新密码：</span>
	<input type="password" name="pwd" class="form-control text" />
</div>
<div class="row">
	<span>确认密码：</span>
	<input type="password" name="pwd" class="form-control text" />
</div>
<div class="row">
	<span>个人简介：</span>
	<textarea name="info" class="form-control text"></textarea>
</div>
<div class="row">
	<span></span>
	<input type="submit" value="修改" class="btn btn-success button" />
</div><?php }
}
