<?php
/* Smarty version 3.1.30, created on 2017-07-26 11:07:54
  from "D:\wamp64\www\20170718\lesson8\view\commet_li.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5978078a4a72b9_60550214',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f199033a17c3fb6efe5186b0ed1e3d00ffa43647' => 
    array (
      0 => 'D:\\wamp64\\www\\20170718\\lesson8\\view\\commet_li.html',
      1 => 1501038465,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5978078a4a72b9_60550214 (Smarty_Internal_Template $_smarty_tpl) {
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
                    <a href="#modal_comment" data-toggle="modal" class="delete_comment" data-num=<?php echo $_smarty_tpl->tpl_vars['user_data']->value['id'];?>
 >删除</a>
                <?php }?>
            </div>
        </div>
        </div>
    </div>
</li><?php }
}
