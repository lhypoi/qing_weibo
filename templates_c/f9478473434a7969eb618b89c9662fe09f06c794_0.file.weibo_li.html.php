<?php
/* Smarty version 3.1.30, created on 2017-07-28 08:22:36
  from "D:\wamp64\www\first\qing_weibo\view\weibo_li.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_597af44c10c827_64390284',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f9478473434a7969eb618b89c9662fe09f06c794' => 
    array (
      0 => 'D:\\wamp64\\www\\first\\qing_weibo\\view\\weibo_li.html',
      1 => 1501230135,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_597af44c10c827_64390284 (Smarty_Internal_Template $_smarty_tpl) {
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

                    <div class="tag_info_box">
                        <ul class="road_tag">
                            <li>
                                <a href="#" class="tag_content">标签微博</a>
                            </li>
                            <li>
                                <a href="#" class="tag_content">标签微博</a>
                            </li>
                            <li>
                                <a href="#" class="tag_content">标签微博</a>
                            </li>
                        </ul>
                        <div class="arrow_down"></div>
                    </div>

                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['tag_data']['tagid_arr'], 'item2', false, 'key2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key2']->value => $_smarty_tpl->tpl_vars['item2']->value) {
?>
                    <a data-id = "<?php echo $_smarty_tpl->tpl_vars['item2']->value;?>
" class="tag">#<?php echo $_smarty_tpl->tpl_vars['item']->value['tag_data']['tagname_arr'][$_smarty_tpl->tpl_vars['key2']->value];?>
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
}
}
