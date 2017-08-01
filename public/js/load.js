/**
 * 
 */
$(function() {
	//异步加载微博列表
    var page = 1;
    var pageList = 0;
    var lock = true;
    $(window).scroll(function() {
    	if($(window).scrollTop() == $(document).height() - $(window).height()) {
    		if(user.haslogin() && lock == true) {
    			var page_mark = $('#page-mark').attr('data-page');
    			var id = getUrlParam('id');
    			pageList = page * 10;
    			$.ajax({
    	    		type: "POST",
    	    		url: "index.php?control=weibo&action=get",
    	    		data: {pageList, page_mark, id},
    	    		success: function(data) {
    	    			data = $.parseJSON(data);
    	                if (data['status'] == 1) {
    	                    $('.weibo_box').eq(0).append(data['html']);
    	                    lock = true;
    	                } else {
    	                	lock = false;
    	                }
    	    		}
    	    	});
    			page += 1;
    		}
    	}
    })
})

function getUrlParam(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) return unescape(r[2]); return null;
}