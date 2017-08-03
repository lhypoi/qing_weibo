<?php
/* Smarty version 3.1.30, created on 2017-08-03 09:15:05
  from "C:\wamp64\www\qing_weibo\view\commet_li.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5982e9999cecb0_63315853',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0b9a10f2ad3eff6c2c7ebc4e25ccc22304ffe8fa' => 
    array (
      0 => 'C:\\wamp64\\www\\qing_weibo\\view\\commet_li.html',
      1 => 1501548788,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5982e9999cecb0_63315853 (Smarty_Internal_Template $_smarty_tpl) {
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
                <span style="color:#05425e"><?php echo $_smarty_tpl->tpl_vars['value']->value['user_nickname'];?>
:</span>
                <?php echo $_smarty_tpl->tpl_vars['value']->value['commet_content'];?>

                <div class="w-opt clearfix">
                    <div class="optb pull-right">
                        <span style="color: #ccc;"><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['value']->value['commet_time']);?>
</span>
                        <?php if ($_smarty_tpl->tpl_vars['value']->value['user_id'] == $_SESSION['uid'] || $_SESSION['admin']) {?>
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
?>

<?php if ($_smarty_tpl->tpl_vars['more']->value == 1) {?>
    <div class="row">
	    <a class="more" data-id="<?php echo $_smarty_tpl->tpl_vars['value']->value['weibo_id'];?>
" data-page="<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
">点击加载更多</a>
    </div>
<?php }
}
}
