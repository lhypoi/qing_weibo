<?php
/* Smarty version 3.1.30, created on 2017-07-25 10:13:01
  from "D:\wamp64\www\20170718\lesson8\view\weibo_li.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5976a92d8a1972_67609528',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6a72bc3083dd463b4f124018afd2f8a4a5a2291b' => 
    array (
      0 => 'D:\\wamp64\\www\\20170718\\lesson8\\view\\weibo_li.html',
      1 => 1500948777,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5976a92d8a1972_67609528 (Smarty_Internal_Template $_smarty_tpl) {
?>
<li weibo-id="<?php echo $_smarty_tpl->tpl_vars['weibo_data']->value['id'];?>
" class="animated slideInDown">
    <div class="row">
        <div class="col-lg-2" style="text-align: center;">
            <img src="<?php echo $_smarty_tpl->tpl_vars['user_data']->value['user_pic'];?>
" alt="" class="w_img">
            <p><?php echo $_smarty_tpl->tpl_vars['user_data']->value['user_nickname'];?>
</p>
        </div>
        <div class="col-lg-10 content_box">
            <div class="triangle_border_ne"></div>
            <div class="content">
                <?php if ($_smarty_tpl->tpl_vars['weibo_data']->value['type'] == 'short_content') {?>
                    <?php echo $_smarty_tpl->tpl_vars['weibo_data']->value['weibo_content'];?>

                <?php } elseif ($_smarty_tpl->tpl_vars['weibo_data']->value['type'] == 'pic_text') {?>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['weibo_data']->value['pic'];?>
" alt="" class="w-img" style="max-width:40%;max-height:50%">
                    <?php echo $_smarty_tpl->tpl_vars['weibo_data']->value['weibo_content'];?>

                <?php } elseif ($_smarty_tpl->tpl_vars['weibo_data']->value['type'] == 'music') {?>
                    <audio src="<?php echo $_smarty_tpl->tpl_vars['weibo_data']->value['music'];?>
" controls></audio>
                <?php } elseif ($_smarty_tpl->tpl_vars['weibo_data']->value['type'] == 'vedio') {?>
                    <video src="<?php echo $_smarty_tpl->tpl_vars['weibo_data']->value['video'];?>
" controls="controls"></video>
                <?php }?>
            </div>
            <div class="w-opt clearfix">
                <div class="optb pull-right">
                    <span style="color: #55a4a9;"><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['weibo_data']->value['create_time']);?>
</span>
                    <?php if ($_smarty_tpl->tpl_vars['user_data']->value['id'] == $_SESSION['uid']) {?>
                        <a href="#modal_box" data-toggle="modal" class="delete_weibo">删除</a>
                    <?php }?>
                    <a href="" class="commet_btn">评论(0)</a>
                    <?php if ($_smarty_tpl->tpl_vars['user_data']->value['id'] == $_SESSION['uid']) {?>
                        <a href="#edit_weibo_modal" class="edit_weibo" data-toggle="modal">编辑</a>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-10 col-lg-offset-2 commont_box">
            <ul class="commont_list">

            </ul>
            <div class="row commet">
                <div class="col-lg-10">
                    <input type="text" name="commet_content" class="form-control">
                </div>
                <div class="col-lg-2">
                    <input type="button" class="btn btn-info commet_send" value="发布">
                </div>
            </div>
        </div>
    </div>
</li><?php }
}
