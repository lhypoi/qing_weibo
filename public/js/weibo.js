/**
 * 
 */

window.weibo = {
	type: '',
	showHTML: function(data) {
		data = $.parseJSON(data);
        if (data['status'] == 1) {
			if(this.type == "short_content" || this.type == "pic_text" || this.type == "music") {
				$('.weibo_box').prepend(data['html']);
	            $('#' + this.type).val('');
	            $('#tag').val('');
	            $('.tags').eq(0).html('');
	            $('#main .weibo_content .tab-content .pic_file_see').empty();
			}else if(this.type == "video") {
				$('#video_progress').attr('style', 'width:0%');
	            $('.weibo_box').prepend(data['html']);
	            $('#' + this.type).val('');
	            $('#tag').val('');
	            $('.tags').eq(0).html('');
			}
        }
	},
	
	ajaxDo: function(fd, xhrOnProgress) {
		var text = $('#' + this.type).val();
		fd.append('type', this.type);
		fd.append('weibo_content', text);
		if(this.type == "video") {
			$.ajax({
	            url: "index.php?control=weibo&action=sendWeibo",
	            type: "POST",
	            contentType: false,
	            processData: false,
	            xhr:xhrOnProgress(function(e){
	                var percent=e.loaded / e.total;//计算百分比
	                $('#video_progress').attr('style', 'width:'+(percent * 100)+'%');
	            }),
	            data: fd,
	            success: rtnData => {
	            	this.showHTML(rtnData);
	            }
	        });
		} else {
			$.ajax({
	            url: "index.php?control=weibo&action=sendWeibo",
	            type: "POST",
	            contentType: false,
	            processData: false,
	            data: fd,
	            success: rtnData => {
	            	this.showHTML(rtnData);
	            }
	        });
		}
	},

	submit_weibo: function(tagname_arr) {
		if (!user.haslogin()) {
            alert('请先登陆');
            return;
        }
		this.type = $('.menu_box input[type=hidden]').val();
		var fd = new FormData();
		var xhr=new XMLHttpRequest();
		xhr.upload.onprogress=function(e){};
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
		if (this.type == "pic_text") {
			fd.append('pic_file', $('#pic_file').get(0).files[0]);
			$.each(tagname_arr, function(key, val) {
                fd.append('tagname_arr[]', val);
            });
		}else if (this.type == "music") {
			fd.append('music_file', /id\=([0-9]*)/.exec($('#tab3 iframe').attr('src'))[1]);
			$.each(tagname_arr, function(key, val) {
                fd.append('tagname_arr[]', val);
            });
		}else if (this.type == "video") {
			fd.append('video_file', $('#video_file').get(0).files[0]);
			$.each(tagname_arr, function(key, val) {
                fd.append('tagname_arr[]', val);
            });
		}
		this.ajaxDo(fd,xhrOnProgress);
	},
}