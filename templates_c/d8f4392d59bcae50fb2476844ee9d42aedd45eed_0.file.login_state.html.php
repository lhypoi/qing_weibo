<?php
/* Smarty version 3.1.30, created on 2017-08-02 09:23:35
  from "C:\wamp64\www\qing_weibo\view\login_state.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59819a17d0b2b1_18238568',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd8f4392d59bcae50fb2476844ee9d42aedd45eed' => 
    array (
      0 => 'C:\\wamp64\\www\\qing_weibo\\view\\login_state.html',
      1 => 1501634484,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59819a17d0b2b1_18238568 (Smarty_Internal_Template $_smarty_tpl) {
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
