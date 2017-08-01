$(function() {

    // 图片预览,绑定注册，编辑头像，发图微博
    // var fileInput = document.getElementById("register_user_pic");
    // fileInput.addEventListener('change', function(event) {
    //     var file = fileInput.files[0];
    //     var objecturl = window.URL.createObjectURL(file);
    //     $('.register_user_pic_see .col-lg-10').empty().append('<img src=' + objecturl + '>');
    // }, false);

    var fileInput2 = $("#pic_file");
    fileInput2.on('change', function(event) {
        var file = fileInput2[0].files[0];
        var objecturl = window.URL.createObjectURL(file);
        $('#main .weibo_content .tab-content .pic_file_see').empty().append('<img src=' + objecturl + '>');
    });

    var fileInput3 = $("#edit_pic");
    fileInput3.on('change', function(event) {
        var file = fileInput3[0].files[0];
        var objecturl = window.URL.createObjectURL(file);
        $('.edit_pic_see').empty().append(`<img src="${objecturl}" style="max-width:100%;height:100%;max-height:200px">`);
    });

    // 切换菜单栏改变隐藏的值,微博类型
    $('.menu_box .menu_tab').click(function() {
        if ($(this).index() == 0) {
            $('#type').val("short_content");
        } else if ($(this).index() == 1) {
            $('#type').val("pic_text");
        } else if ($(this).index() == 2) {
            $('#type').val("music");
        } else if ($(this).index() == 3) {
            $('#type').val("video");
        } else if ($(this).index() == 4) {
            location.href = 'index.php?control=longcontent&action=index';
        }
    });


    //发布微博
    $('.menu_box input[type=button]').click(function() {
        if (!haslogin()) {
            alert('请先登陆');
            return;
        }
        let type = $('.menu_box input[type=hidden]').val();
        if (type == "short_content") {
            $.ajax({
                url: "index.php?control=weibo&action=sendWeibo",
                type: "POST",
                data: {
                    weibo_content: $('textarea').eq(0).val(),
                    tagname_arr,
                    type
                },
                success: function(data) {
                    data = $.parseJSON(data);
                    if (data['status'] == 1) {
                        $('.weibo_box').prepend(data['html']);
                        $('textarea').eq(0).val('');
                    }
                }
            });
        } else if (type == "pic_text") {
            var fd = new FormData();
            fd.append('weibo_content', $('textarea').eq(1).val());
            fd.append('pic_file', $('#pic_file').get(0).files[0]);
            $.each(tagname_arr, function(key, val) {
                fd.append('tagname_arr[]', val);
            });
            fd.append('type', type);
            $.ajax({
                url: "index.php?control=weibo&action=sendWeibo",
                type: "POST",
                contentType: false,
                processData: false,
                data: fd,
                success: function(data) {
                    data = $.parseJSON(data);
                    if (data['status'] == 1) {
                        $('.weibo_box').prepend(data['html']);
                        $('textarea').eq(0).val('');
                    }
                }
            });
        } else if (type == "music") {
            var fd = new FormData();
            // fd.append('music_file', $('#music_file').get(0).files[0]);
            fd.append('weibo_content', $('textarea').eq(2).val());
            fd.append('music_file', /id\=([0-9]*)/.exec($('#tab3 iframe').attr('src'))[1]);
            fd.append('type', type);
            $.each(tagname_arr, function(key, val) {
                fd.append('tagname_arr[]', val);
            });
            $.ajax({
                url: "index.php?control=weibo&action=sendWeibo",
                type: "POST",
                contentType: false,
                processData: false,
                data: fd,
                success: function(data) {
                    data = $.parseJSON(data);
                    if (data['status'] == 1) {
                        $('.weibo_box').prepend(data['html']);
                    }
                }
            });
        } else if (type == "video") {
            var fd = new FormData();
            fd.append('weibo_content', $('textarea').eq(3).val());
            fd.append('video_file', $('#video_file').get(0).files[0]);
            fd.append('type', type);
            $.each(tagname_arr, function(key, val) {
                fd.append('tagname_arr[]', val);
            });
            var xhr=new XMLHttpRequest(); xhr.upload.onprogress=function(e){};
            var xhrOnProgress = function(fun) {
                xhrOnProgress.onprogress = fun; //绑定监听
                //使用闭包实现监听绑
                return function() {
                    //通过$.ajaxSettings.xhr();获得XMLHttpRequest对象
                    var xhr = $.ajaxSettings.xhr();
                    //判断监听函数是否为函数
                    if (typeof xhrOnProgress.onprogress !== 'function')
                        return xhr;
                    //如果有监听函数并且xhr对象支持绑定时就把监听函数绑定上去
                    if (xhrOnProgress.onprogress && xhr.upload) {
                        xhr.upload.onprogress = xhrOnProgress.onprogress;
                    }
                    return xhr;
                }
            }
            $.ajax({
                url: "index.php?control=weibo&action=sendWeibo",
                type: "POST",
                xhr:xhrOnProgress(function(e){
                    var percent=e.loaded / e.total;//计算百分比
                    $('#video_progress').attr('style', 'width:'+(percent * 100)+'%');
                  }),
                contentType: false,
                processData: false,
                data: fd,
                success: function(data) {
                    data = $.parseJSON(data);
                    if (data['status'] == 1) {
                        $('#video_progress').attr('style', 'width:0%');
                        $('.weibo_box').prepend(data['html']);
                    }
                }
            });
        }

    })


    // 更新微博
    // 发布评论
    // 删除评论

    // 事件委托绑定评论下拉框，评论增删功能
    $('.weibo_list').click(function(event) {
        let this_elm = $(event.target);
        // 评论下拉框
        if (this_elm.hasClass('commet_btn')) {
            var comment_box = this_elm.parent().parent().parent().siblings('.comment_row').find('.commont_box');
            if (comment_box.css('display') != 'block') {
                var article_id = this_elm.attr('data-num');
                $.ajax({
                    type: "POST",
                    url: 'index.php?control=comment&action=getComment',
                    data: {
                        article_id: article_id
                    },
                    success: function(rtnData) {
                        let rtnObject = JSON.parse(rtnData);
                        comment_box.find('.commont_list').html(rtnObject.html);
                    }
                });
            }
            $(this_elm).closest("li").find('.commont_box').slideToggle();
            return false;
        } else if (this_elm.hasClass('commet_send')) {
            // 评论发送
            let weibo_id = $(this_elm).closest("li").attr('weibo-id');
            if (!haslogin()) {
                alert('请先登陆');
            };
            $.ajax({
                url: "index.php?control=comment&action=add",
                type: "POST",
                data: {
                    commet_content: $(this_elm).parent().prev().find('input').val(),
                    weibo_id
                },
                success: function(data) {
                    data = $.parseJSON(data);
                    if (data['status'] == 1) {
                        $('li[weibo-id=' + weibo_id + '] .commont_list').eq(0).prepend(data['html']);
                        $(this_elm).parent().prev().find('input').val('');
                    }
                }
            });
            return false;
        } else if (this_elm.hasClass('edit_weibo')) {
            $('#edit_weibo_modal textarea').val($(this_elm).parent().parent().prev().text().trim());
            $('#edit_weibo_modal input[type=hidden]').val($(this_elm).closest('li').attr('weibo-id'));
        } else if (this_elm.hasClass('more')) { //异步加载评论
            var comment = this_elm.attr('data-page');
            var commentList = 0;
            commentList = comment * 5;
            var article_id = this_elm.attr('data-id');
            $.ajax({
                type: "POST",
                url: "index.php?control=comment&action=getComment",
                data: {
                    article_id,
                    commentList,
                    comment
                },
                success: function(data) {
                    data = $.parseJSON(data);
                    if (data['status'] == 1) {
                        this_elm.parent().parent().append(data['html']);
                        this_elm.remove();
                    }
                }
            });
            return false;
        }
    })

    // 事件委托处理音乐搜索结果
    $('.search_list').click(function(event) {
        let this_elm = $(event.target);
        let music_id = $(this_elm).attr('data-id');
        if (music_id) {
            $('#tab3').prepend(`
                <iframe frameborder="no" border="0" marginwidth="0" marginheight="0" width=330 height=86 src="//music.163.com/outchain/player?type=2&id=${music_id}&auto=0&height=66"></iframe>
            	<span class="glyphicon glyphicon-remove-circle"></span>
                `);
            $('.search_list').empty();
            $('#tab3 input').val('');
            $('#tab3 input').hide();
        }
    });
    $('#tab3').on('click', '.glyphicon', function() {
    	$('#tab3 iframe').remove();
    	$('#tab3 input').css('display', 'block');
    })


    //头像滑过
    $('.weibo_box').on("mouseenter", 'img', function(e) {
        infoTarget = $(e.target);
        let touxiang_box = infoTarget.parent().parent().find('.info-box');
        $user_id = infoTarget.parent().find('.w_img').attr('data-id');
        // console.log($user_id);
        touxiang_box.show(600);
        $.ajax({
            url: "index.php?control=weibo&action=headSelect",
            type: "POST",
            data: {
                $user_id
            },
            success: function(data) {
                data = $.parseJSON(data);
                let p_html = ""
                data.forEach(item => {
                    p_html += "<li class='photo_weibo'>" + item.weibo_content + "&nbsp;&nbsp;" + item.time + "</li>";

                })
                $('.road_list').html(p_html);
            }
        });
    }).on("mouseleave", '.head_box', function() {
        infoTarget.parent().parent().find('.info-box').hide(300);
    });

    //滑过标签显示
    $('.optb').on("mouseenter",'.tag', function(e) {
        infoTarget = $(e.target);
        let touxiang_box=infoTarget.siblings('.tag_info_box');
        touxiang_box.show(600).css("left",infoTarget.offset().left-385);
        var tag_id = infoTarget.attr('data-id');
        $.ajax({
			url: "index.php?control=tag&action=tagSelect",
			type: "POST",
			data: {
			     tag_id
			 },
			 success: function(data) {
			     data = $.parseJSON(data);
			     let p_html = ""
				 data.other.forEach(item=>{
				     p_html+= "<a href='index.php?control=tag&action=info&id="+tag_id+"'><li style='overflow:hidden;'>"+item.weibo_content+"</li></a>";
				 })
				 infoTarget.siblings('.tag_info_box').find('.road_tag').html(p_html);
			 }
        });
    }).on("mouseleave",'.tags_box', function() {
    	infoTarget.siblings('.tag_info_box').hide(300);
    });
    //进入标签显示
    // $(".tag_info_box").on("mouseenter",function  () {
    //     $(".tag_info_box").show()
    // }).on("mouseleave",function  () {
    //     $(".tag_info_box").hide()
    // })

    //判断是否是登陆状态
    if (haslogin()) {
        $.ajax({
            type: "POST",
            url: "index.php?control=user&action=check",
            data: {
                id: localStorage.getItem('uid')
            },
            success: function(data) {
                data = $.parseJSON(data);
                if (data['status'] == 1) {
                    $('#accountmenu').html(data['html']);
                }
            }
        });
    }

    //添加标签
    var tagname_arr = [];
    $('#tag').on('keydown', function(e) {
    	if(e.keyCode == 13) {
    		if($(this).val() == '') {
    			$(this).siblings('.warning').css('display','block').html('标签不能为空');
    		}else {
    			if(tagname_arr.length >= 5) {
        			$(this).siblings('.warning').css('display','block');
        		}else{
        			$(this).siblings('.warning').css('display','none');
    	    		tagname_arr.push($(this).val());
    	    		var _html = '';
    	    		for(var i = 0; i < tagname_arr.length; i ++) {
    	    			_html += '#'+tagname_arr[i]+' ';
    	    		}
    	    		$(this).siblings('.tags').html(_html);
    	    		$(this).val('');
        		}
    		}
    	}else if(e.keyCode == 8) {
    		if($(this).val() == '') {
    			tagname_arr.splice(tagname_arr.length-1, 1);
    			var _html = '';
	    		for(var i = 0; i < tagname_arr.length; i ++) {
	    			_html += '#'+tagname_arr[i]+' ';
	    		}
	    		$(this).siblings('.tags').html(_html);
    		}
    		$(this).siblings('.warning').css('display','none');
    		$(this).val('');
    	}
    })
})

// 判断是否登录
function haslogin() {
    if (localStorage.getItem('uid') > 0) {
        return true;
    } else {
        return false;
    }
}

// 登录注册退出修改信息
function do_register() {
    var fd = new FormData();
    fd.append('user_nickname', $('#register_user_nickname').val());
    fd.append('user_name', $('#register_user_name').val());
    fd.append('user_pwd', $('#register_user_pwd').val());
    // fd.append('user_pic', $('#register_user_pic').get(0).files[0]);
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
}

function do_quit() {
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
}

function do_login() {
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
}

function do_edit() {
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
}

// 编辑文本类微博
function do_edit_weibo() {
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
}

// 搜索音乐
function search_music(this_elm) {
    if ($(this_elm).val().trim().length != 0) {
        $.getJSON("http://s.music.163.com/search/get/?version=1&src=lofter&type=1&filterDj=false&s=" + $(this_elm).val() + "&limit=8&offset=0&callback=?", function(rtnData) {
            console.log(rtnData)
            if (rtnData.result) {
                let li_html = ''
                rtnData.result.songs.forEach(item => {
                    li_html += "<li data-id='" + item.id + "'>" + item.name + "-" + item.artists[0].name + "</li>"
                })
                $(".search_list").html(li_html);
            } else {
                $(".search_list").html('');
            }

        })
    } else {
        $(".search_list").html('');
    }
}