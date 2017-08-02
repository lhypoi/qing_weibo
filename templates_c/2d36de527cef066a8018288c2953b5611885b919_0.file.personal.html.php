<?php
/* Smarty version 3.1.30, created on 2017-08-02 14:16:12
  from "C:\wamp64\www\qing_weibo\view\personal.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5981deac19cb62_89253332',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2d36de527cef066a8018288c2953b5611885b919' => 
    array (
      0 => 'C:\\wamp64\\www\\qing_weibo\\view\\personal.html',
      1 => 1501683369,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:view/common/head.html' => 1,
    'file:view/common/foot.html' => 1,
  ),
),false)) {
function content_5981deac19cb62_89253332 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:view/common/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<link rel="stylesheet" type="text/css" href="./public/css/personal.css">
<div class="head_img_box">
	<div class="head_img">
		<a>
			<img src="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['weibo_data']->value[0]['user_data']['user_pic'])===null||$tmp==='' ? './public/img/default.png' : $tmp);?>
" />
		</a>
	</div>
	<h4><?php echo $_smarty_tpl->tpl_vars['weibo_data']->value[0]['user_data']['user_nickname'];?>
</h4>
	<span>这个人很懒，什么都没写</span>
</div>
<div class="menu">
	<ul class="clearfix">
		<li><span class="active" onclick="user.menu_select(0)">我的微博</span></li>
		<li><span onclick="user.menu_select(1)">我的相册</span></li>
		<li><span onclick="user.menu_select(2)">账号管理</span></li>
	</ul>
</div>
<div class="weibo_list">
	<div class="row">
		<div class="col-lg-9">
			<ul class="weibo_box">
				<?php
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
" class="img-rounded w_img">
				            <p><?php echo $_smarty_tpl->tpl_vars['item']->value['user_data']['user_nickname'];?>
</p>
				            <!-- 会员身份显示 -->
				            <div class="user_degree">
				            	普通用户<img src="./public/img/ud_img1.png">
				            </div>
				            <div class="info-box">
				                <div class="arrow-left"></div>
				                <a class="author-name"><?php echo $_smarty_tpl->tpl_vars['item']->value['user_data']['user_nickname'];?>
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
				                <iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=330 height=86 src="//music.163.com/outchain/player?type=2&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['music'];?>
&auto=0&height=66"></iframe>
				                <?php echo $_smarty_tpl->tpl_vars['item']->value['weibo_content'];?>

				                <?php } elseif ($_smarty_tpl->tpl_vars['item']->value['type'] == 'video') {?>
				                <video src="<?php echo $_smarty_tpl->tpl_vars['item']->value['video'];?>
" controls width="80%"></video>
				                <?php echo $_smarty_tpl->tpl_vars['item']->value['weibo_content'];?>

				                <?php } elseif ($_smarty_tpl->tpl_vars['item']->value['type'] == 'long_content') {?>
				                <?php echo $_smarty_tpl->tpl_vars['item']->value['weibo_content'];?>

				                <?php }?>
				            </div>
				            <div class="w-opt clearfix">
				                <div class="optb pull-left">
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['tag_data']['tagid_arr'], 'item2', false, 'key2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key2']->value => $_smarty_tpl->tpl_vars['item2']->value) {
?>
						            <div class="tags_box">
						            	<div class="tag_info_box">
							                <ul class="road_tag clearfix">
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
						                <a data-id = "<?php echo $_smarty_tpl->tpl_vars['item2']->value;?>
" class="tag" href="index.php?control=tag&action=info&id=<?php echo $_smarty_tpl->tpl_vars['item2']->value;?>
">#<?php echo $_smarty_tpl->tpl_vars['item']->value['tag_data']['tagname_arr'][$_smarty_tpl->tpl_vars['key2']->value];?>
&nbsp;</a>

						            </div>
						            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

				                </div>
				                <div class="optb pull-right">
				                    <span style="color: #55a4a9;"><?php echo date('Y-m-d H:i:s',$_smarty_tpl->tpl_vars['item']->value['create_time']);?>
</span>
				                    <?php if ($_smarty_tpl->tpl_vars['item']->value['user_data']['id'] == $_SESSION['uid'] || $_SESSION['admin']) {?>
				                    <a href="#modal-del" data-toggle="modal" class="delete_weibo" id="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">删除</a>
				                    <?php }?>
				                    <?php if ($_smarty_tpl->tpl_vars['item']->value['user_data']['id'] == $_SESSION['uid']) {?>
				                    <a href="#edit_weibo_modal" class="edit_weibo" data-toggle="modal">编辑</a>
				                    <?php }?>
				                    <a href="" class="commet_btn" data-num="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">评论(<?php echo $_smarty_tpl->tpl_vars['item']->value['commet_data'];?>
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
?>

			</ul>
		</div>
		<div class="col-lg-9" style="display:none;">
			<ul class="photo_list clearfix">
				<li>
					<a>
						<img src="./public/img/default.png" />
					</a>
				</li>
				<li>
					<a><img src="./public/img/default.png" /></a>
				</li>
				<li>
					<a><img src="./public/img/default.png" /></a>
				</li>
			</ul>
		</div>
		<div class="col-lg-9" style="display:none;">
			<form class="info">
				<div class="row">
					<span>用户名：</span>
					<input type="text" name="nickname" class="form-control text" />
				</div>
				<div class="row">
					<span>密码：</span>
					<input type="password" name="pwd" class="form-control text" />
				</div>
			</form>
		</div>
		<div class="col-lg-9" style="display:none;">账号管理</div>
		<div class="col-lg-3">
            <div class="side_box follow_box">
            	<h5>关注</h5>
            	<ul class="clearfix">
            		<li>
	            		<a>
							<img src="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['user_data']['user_pic'])===null||$tmp==='' ? './public/img/default.png' : $tmp);?>
" />
						</a>
					</li>
            	</ul>
            </div>
            <div class="side_box fans_box">
            	<h5>粉丝</h5>
            	<ul class="clearfix">
            		<li>
	            		<a>
							<img src="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['item']->value['user_data']['user_pic'])===null||$tmp==='' ? './public/img/default.png' : $tmp);?>
" />
						</a>
					</li>
				</ul>
            </div>
        </div>
    </div>
</div>
<div id="page-mark" data-page="home"></div>
<?php echo '<script'; ?>
 type="text/javascript" src="./public/js/load.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
//调整相片大小
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
	} else {
		photo.css('width', '225px');
		var rate = 225 / width;
		photo.css('height', (height * rate) + 'px');
	}
}
<?php echo '</script'; ?>
>
<?php $_smarty_tpl->_subTemplateRender("file:view/common/foot.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
