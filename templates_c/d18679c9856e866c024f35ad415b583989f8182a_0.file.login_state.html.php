<?php
/* Smarty version 3.1.30, created on 2017-08-01 20:33:09
  from "D:\wamp64\www\20170718\lesson9\view\login_state.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59807505aae434_03095736',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd18679c9856e866c024f35ad415b583989f8182a' => 
    array (
      0 => 'D:\\wamp64\\www\\20170718\\lesson9\\view\\login_state.html',
      1 => 1501590770,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59807505aae434_03095736 (Smarty_Internal_Template $_smarty_tpl) {
?>
<img src="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['user_pic'])===null||$tmp==='' ? './public/img/default.png' : $tmp);?>
" alt="">
<a class="dropdown-toggle" data-toggle="dropdown" href="#">
    <?php echo $_smarty_tpl->tpl_vars['item']->value['user_nickname'];?>
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
</ul><?php }
}
