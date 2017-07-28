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
    		if(haslogin() && lock == true) {
    			pageList = page * 10;
    			$.ajax({
    	    		type: "POST",
    	    		url: "index.php?control=weibo&action=get",
    	    		data: {pageList},
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