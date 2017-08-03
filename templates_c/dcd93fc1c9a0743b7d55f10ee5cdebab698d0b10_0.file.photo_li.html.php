<?php
/* Smarty version 3.1.30, created on 2017-08-03 07:46:18
  from "C:\wamp64\www\qing_weibo\view\photo_li.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5982d4ca8befd8_67097525',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dcd93fc1c9a0743b7d55f10ee5cdebab698d0b10' => 
    array (
      0 => 'C:\\wamp64\\www\\qing_weibo\\view\\photo_li.html',
      1 => 1501743534,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5982d4ca8befd8_67097525 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['photo_list']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
<li>
	<a href="index.php?control=weibo&action=getDetail&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
		<img src="<?php echo $_smarty_tpl->tpl_vars['item']->value['pic'];?>
" />
	</a>
</li>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

<?php echo '<script'; ?>
 type="text/javascript">
//调整相片大小
ajust();
function ajust() {
	var photo_list = $('.photo_list li');
	for(var i = 0; i < photo_list.length; i ++) {
		var photo = photo_list.eq(i).children().children('img').eq(0);
		var img = new Image();
		img.src = photo.attr("src");
		var width = img.width;
		var height = img.height;
		if((width - photo_list.eq(i).width()) > (height - photo_list.eq(i).height())) {
			photo.css('height', '200px');
			var rate = 200 / height;
			photo.css('width', (width * rate) + 'px');
			var margin = (width * rate - photo_list.eq(i).width()) / 2;
			photo.css('margin-left', '-'+margin+'px');
		} else {
			photo.css('width', '225px');
			var rate = 225 / width;
			photo.css('height', (height * rate) + 'px');
			var margin = (height * rate - photo_list.eq(i).height()) / 2;
			photo.css('margin-top', '-'+margin+'px');
		}
	}
}
<?php echo '</script'; ?>
><?php }
}
