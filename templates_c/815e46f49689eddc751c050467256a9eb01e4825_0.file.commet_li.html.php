<?php
/* Smarty version 3.1.30, created on 2017-07-27 23:59:20
  from "D:\wamp64\www\20170718\lesson9\view\commet_li.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_597a0dd84a5c14_94282212',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '815e46f49689eddc751c050467256a9eb01e4825' => 
    array (
      0 => 'D:\\wamp64\\www\\20170718\\lesson9\\view\\commet_li.html',
      1 => 1501170543,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597a0dd84a5c14_94282212 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
    <li commont_id="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" class="animated slideInDown">
        <div class="row">
            <div class="col-lg-1">
                <img src="<?php echo $_smarty_tpl->tpl_vars['value']->value['user_pic'];?>
" alt="" class="c_img" />
            </div>
            <div class="col-lg-11">
                <span style="color:#5bc0de"><?php echo $_smarty_tpl->tpl_vars['value']->value['user_nickname'];?>
:</span>
                <?php echo $_smarty_tpl->tpl_vars['value']->value['commet_content'];?>

                <div class="w-opt clearfix">
                    <div class="optb pull-right">
                        <span style="color: #ccc;"><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['value']->value['commet_time']);?>
</span>
                        <?php if ($_smarty_tpl->tpl_vars['value']->value['user_id'] == $_SESSION['uid']) {?>
                            <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['item2']->value['weibo_id'];?>
" />
                            <a href="#modal_comment" data-toggle="modal" class="delete_comment" data-num="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
">删除</a>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </li>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
}
}
