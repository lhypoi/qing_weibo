<?php
/* Smarty version 3.1.30, created on 2017-07-24 23:51:14
  from "D:\wamp64\www\20170718\lesson7_beta\view\commet_li.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_597617727155d9_64239573',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '810c99626abb3849779d91136fca8542dc03de18' => 
    array (
      0 => 'D:\\wamp64\\www\\20170718\\lesson7_beta\\view\\commet_li.html',
      1 => 1500911457,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597617727155d9_64239573 (Smarty_Internal_Template $_smarty_tpl) {
?>
<li commont_id="<?php echo $_smarty_tpl->tpl_vars['commet_data']->value['id'];?>
">
    <div class="row">
        <div class="col-lg-1">
            <img src="<?php echo $_smarty_tpl->tpl_vars['user_data']->value['user_pic'];?>
" alt="" class="c_img" />
        </div>
        <div class="col-lg-11">
            <span style="color:#5bc0de"><?php echo $_smarty_tpl->tpl_vars['user_data']->value['user_nickname'];?>
:</span>
            <?php echo $_smarty_tpl->tpl_vars['commet_data']->value['commet_content'];?>

        <div class="w-opt clearfix">
            <div class="optb pull-right">
                <span style="color: #ccc;"><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['commet_data']->value['commet_time']);?>
</span>
                <?php if ($_smarty_tpl->tpl_vars['user_data']->value['id'] == $_SESSION['uid']) {?>
                    <a href="#modal_box" data-toggle="modal" class="delete_weibo">删除</a>
                <?php }?>
            </div>
        </div>
        </div>
    </div>
</li><?php }
}
