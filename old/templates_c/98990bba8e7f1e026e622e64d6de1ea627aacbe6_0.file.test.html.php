<?php
/* Smarty version 3.1.30, created on 2017-07-21 02:47:32
  from "D:\wamp64\www\20170718\lesson6\view\test.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59716b4465f212_76718065',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '98990bba8e7f1e026e622e64d6de1ea627aacbe6' => 
    array (
      0 => 'D:\\wamp64\\www\\20170718\\lesson6\\view\\test.html',
      1 => 1500605251,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59716b4465f212_76718065 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>test</title>
</head>
<body>
    <h1>天空什么颜色的</h1>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['color']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
        <?php echo $_smarty_tpl->tpl_vars['value']->value;?>

    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['color']->value, 'item', false, 'key', 'name', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
        <?php echo $_smarty_tpl->tpl_vars['item']->value;?>

    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</body>
</html><?php }
}
