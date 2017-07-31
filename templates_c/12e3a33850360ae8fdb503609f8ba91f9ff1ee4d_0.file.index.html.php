<?php
/* Smarty version 3.1.30, created on 2017-07-31 02:21:01
  from "C:\wamp\www\qing_weibo\view\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_597e940d606486_01360411',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '12e3a33850360ae8fdb503609f8ba91f9ff1ee4d' => 
    array (
      0 => 'C:\\wamp\\www\\qing_weibo\\view\\index.html',
      1 => 1501467655,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:view/common/head.html' => 1,
    'file:view/common/foot.html' => 1,
  ),
),false)) {
function content_597e940d606486_01360411 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:view/common/head.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- 发布微博 -->
<div class="weibo_content">
    <!-- 内容区域 -->
    <div class="tab-content">
        <div class="tab-pane fade in active" id="tab1">
            <textarea name="weibo_text" class="form-control" rows="2"></textarea>
        </div>
        <div class="tab-pane fade" id="tab2">
            <textarea name="weibo_text" class="form-control" rows="2"></textarea>
            <div class="filePicker">
                <label>点击选择文件</label>
                <input type="file" name="" value="" class="form-control" id="pic_file">
            </div>
            <div class="pic_file_see"></div>
        </div>
        <div class="tab-pane fade" id="tab3">
            
            <input type="text" name="" class="search_music form-control" placeholder="请用歌名、专辑、艺术家搜索" oninput="search_music(this)">
            <ul class="search_list">
            </ul>
            <textarea name="weibo_text" class="form-control" rows="2"></textarea>
        </div>
        <div class="tab-pane fade" id="tab4">
            <input type="file" id="video_file">
        </div>
    </div>
    <div class="row tag_box">
    	<div class="tags"></div>
    	<input type="text" placeholder="请添加标签，按回车确定" id="tag" />
    	<span class="warning">最多添加5个标签</span>
    </div>
    <!-- 切换栏和发布按钮 -->
    <div class="row menu_box">
        <div class="col-lg-9">
            <div class="col-lg-2 menu_tab">
                <a href="#tab1" data-toggle="tab">
                    <span class="glyphicon glyphicon-pencil"></span>
                    文字
                </a>
            </div>
            <div class="col-lg-2 menu_tab">
                <a href="#tab2" data-toggle="tab">
                    <span class="glyphicon glyphicon-heart"></span>
                    图文
                </a>
            </div>
            <div class="col-lg-2 menu_tab">
                <a href="#tab3" data-toggle="tab">
                    <span class="glyphicon glyphicon-music"></span>
                    音乐
                </a>
            </div>
            <div class="col-lg-2 menu_tab">
                <a href="#tab4" data-toggle="tab">
                    <span class="glyphicon glyphicon-film"></span>
                    视频
                </a>
            </div>
            <div class="col-lg-2 menu_tab">
                <a href="#tab4" data-toggle="tab">
                    <span class="glyphicon glyphicon-film"></span>
                    长文章
                </a>
            </div>
        </div>
        <div class="col-lg-2 col-lg-offset-1">
            <input type="button" class="btn btn-info btn-lg pull-right mt_20" value="发布">
            <input type="hidden" id="type" value="short_content">
        </div>
    </div>
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
						            <?php if ($_smarty_tpl->tpl_vars['item']->value['user_data']['id'] == $_SESSION['uid']) {?>
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
			<div class="modal fade" id="edit_weibo_modal">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <div class="modal-header">编辑微博</div>
			            <div class="modal-body">
			                <textarea class="form-control" rows="2"></textarea>
			            </div>
			            <div class="modal-footer">
			                <button class="btn btn-default" data-dismiss="modal">取消</button>
			                <button class="btn btn-info" onclick="do_edit_weibo()">确定</button>
			                <input type="hidden" name="">
			            </div>
			        </div>
			    </div>
			</div>
			<!-- 删除微博 -->
			<div class="modal" id="modal-del">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <div class="modal-header">删除信息</div>
			            <div class="modal-body">确定删除这条信息吗？</div>
			            <div class="modal-footer">
			            	<input type="hidden" id="record-num" value="">
			                <button class="btn btn-default" data-dismiss="modal">取消</button>
			                <button class="btn btn-primary" data-dismiss="modal" id="record-del-confirm">确定</button>
			            </div>
			        </div>
			    </div>
			</div>
      		<!-- 删除评论 -->
			<div class="modal" id="modal_comment">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <div class="modal-header">删除评论</div>
			            <div class="modal-body">确定删除这条评论吗？</div>
			            <div class="modal-footer">
			            	<input type="hidden" value="" id="comment-del-num" />
			                <button class="btn btn-default" data-dismiss="modal" id="comment-del-cancel">取消</button>
			                <button class="btn btn-primary" data-dismiss="modal" id="comment-del-confirm">确定</button>
			            </div>
			        </div>
			    </div>
			</div>
        </div>
        <div class="col-lg-3">
            广告
        </div>
    </div>
	<?php echo '<script'; ?>
 type="text/javascript" src="./public/js/load.js"><?php echo '</script'; ?>
>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:view/common/foot.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
