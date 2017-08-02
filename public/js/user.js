/**
 * 
 */

window.user = {
	// 判断是否登录
	haslogin: function() {
	    if (localStorage.getItem('uid') > 0) {
	        return true;
	    } else {
	        return false;
	    }
	},
	//登录注册退出修改信息
	do_register: function() {
	    var fd = new FormData();
	    fd.append('user_nickname', $('#register_user_nickname').val());
	    fd.append('user_name', $('#register_user_name').val());
	    fd.append('user_pwd', $('#register_user_pwd').val());
	    fd.append('type', 'register');
	    $.ajax({
	        url: "index.php?control=user&action=reg",
	        type: "POST",
	        contentType: false,
	        processData: false,
	        data: fd,
	        success: function(data) {
	            data = $.parseJSON(data);
	            if (data['status'] == 1) {
	                localStorage.setItem("uid", data['other']);
	                location.reload();
	            } else {
	                alert(data['msg']);
	            }
	
	        }
	    });
	},
	
	do_quit :function() {
	    $.ajax({
	        url: "index.php?control=user&action=logout",
	        type: "POST",
	        success: function(data) {
	            data = $.parseJSON(data);
	            if (data['status'] == 1) {
	                localStorage.removeItem('uid');
	                location.reload();
	            }
	        }
	    });
	},
	
	do_login: function() {
	    $.ajax({
	        url: "index.php?control=user&action=log",
	        type: "POST",
	        data: {
	            user_name: $('#login_user_name').val(),
	            user_pwd: $('#login_user_pwd').val(),
	            type: 'login'
	        },
	        success: function(data) {
	            data = $.parseJSON(data);
	            if (data['status'] == 1) {
	                localStorage.setItem("uid", data['other']);
	                location.reload();
	            } else {
	                alert(data['msg']);
	            }
	        }
	    });
	},
	
	do_edit: function() {
	    var fd = new FormData();
	    fd.append('uid', localStorage.getItem('uid'));
	    fd.append('user_pic', $('#edit_pic').get(0).files[0]);
	    fd.append('type', 'edit');
	    $.ajax({
	        url: "index.php?control=user&action=edit",
	        type: "POST",
	        contentType: false,
	        processData: false,
	        data: fd,
	        success: function(data) {
	            data = $.parseJSON(data);
	            if (data['status'] == 1) {
	                alert(data['msg']);
	                location.reload();
	            }
	        }
	    });
	},
	
	// 编辑文本类微博
	do_edit_weibo: function() {
	    $.ajax({
	        url: "index.php?control=weibo&action=editWeibo",
	        type: "POST",
	        data: {
	            weibo_content: $('#edit_weibo_modal textarea').val(),
	            id: $('#edit_weibo_modal input[type=hidden]').val(),
	            type: 'edit'
	        },
	        success: function(data) {
	            data = $.parseJSON(data);
	            if (data['status'] == 1) {
	                alert(data['msg']);
	                location.reload();
	            } else {
	                alert(data['msg']);
	            }
	        }
	    });
	}, 
	
	//用户主页菜单选择
	menu_select: function(index) {
		var menu = $('.menu ul li');
		var list = $('.weibo_list .row .col-lg-9');
		for(var i = 0; i < menu.length; i ++) {
			if(menu.eq(i).children('span').hasClass('active') && i != index) {
				menu.eq(i).children('span').removeClass('active');
				list.eq(i).hide(500);
			}
		}
		menu.eq(index).children('span').addClass('active');
		list.eq(index).show(500);
	}
}