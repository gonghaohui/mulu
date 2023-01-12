/**
 * common.js
**/
/*获取网站域名*/


$(function(){
    //返回顶部
    $(window).scroll(function(e) {
        if($(window).scrollTop()>100){
            $('.toolsList .i04').css("visibility","visible");
        }else {
            $('.toolsList .i04').css("visibility","hidden");
        }
    });
    $('.moveTop').click(function(e) {
        $('body,html').animate({'scrollTop':'0'},500);

    });
	
	$('.swp-hd-list li').eq(0).addClass('current');
	var num=0;
	var piclength=Number($('.swp-hd-list li').size())*950+'px';
	var len=$('.swp-hd-list li').size();
    $('.swp-hd-list').css({'width':piclength,'position':'relative'});
	$('.swp-next').click(function(){
		num++;
		if(num>len-1){num=0;}
		$('.swp-hd-list li').eq(num).addClass('current').siblings().removeClass('current');
		$('.swp-hd-list').css("left",-num*950+'px');
	});
	$('.swp-prev').click(function(){
		num--;
		if(num==-1){num=len-1;}
		$('.swp-hd-list li').eq(num).addClass('current').siblings().removeClass('current');
		$('.swp-hd-list').css("left",-num*950+'px');
	});
	

	$('#myCarousel .right').hide();
	$('#myCarousel .left').hide();
	var lbnum=0;
	function lbtab(){
		lbnum++;
		if(lbnum==4){lbnum=0;}
		$('.carousel-indicators li').eq(lbnum).addClass('active').siblings().removeClass('active');
		$('.carousel-inner .item').eq(lbnum).addClass('active').siblings().removeClass('active');
	}
    var timer=setInterval(lbtab,1500);
	$('#myCarousel .right').click(function(){
		lbnum++;
		if(lbnum==4){lbnum=0;}
		$('.carousel-indicators li').eq(lbnum).addClass('active').siblings().removeClass('active');
		$('.carousel-inner .item').eq(lbnum).addClass('active').siblings().removeClass('active');
	});
	$('#myCarousel .left').click(function(){
		lbnum--;
		if(lbnum==-1){lbnum=3;}
		$('.carousel-indicators li').eq(lbnum).addClass('active').siblings().removeClass('active');
		$('.carousel-inner .item').eq(lbnum).addClass('active').siblings().removeClass('active');
	});

	$('#myCarousel').mouseover(function(){
	  $('#myCarousel .right').show();
	  $('#myCarousel .left').show();
	  clearInterval(timer);
	});
	$('#myCarousel').mouseout(function(){
	  $('#myCarousel .right').hide();
	  $('#myCarousel .left').hide();
      timer=setInterval(lbtab,1500);
	});
	
	
	
	var oul = $('.dlList ul');
	var oulHtml = oul.html();
	oul.html(oulHtml+oulHtml)
	var timeId = null;
	var ali = $('.dlList ul li');
	var aliHeight = ali.eq(0).height();
	var aliSize = ali.size();
	var aliHeight = aliHeight*aliSize;
	oul.height(aliHeight);	//1600px
	
	var speed = 2;

	function slider(){

		if(speed<0){
			if(oul.css('top')==-aliHeight/2+'px'){
	 		oul.css('top',0);
		 	}
		 	oul.css('top','+=-2px');
		}

	 	
		if(speed>0){
			if(oul.css('top')=='0px'){
	 		oul.css('top',-aliHeight/2+'px');
		 	}
		 	oul.css('top','+='+speed+'px');
		}
	 	
	 }
	
	// setInterval()函数的作用是：每隔一段时间，执行该函数里的代码
	 timeId = setInterval(slider,50);

	oul.mouseover(function(){
		// clearInterval()函数的作用是用来清除定时器
		clearInterval(timeId);
	});

	oul.mouseout(function(){
		timeId = setInterval(slider,50);
	});

	$('.als-prev').click(function(){
		speed=-2;
	});

	$('.als-next').click(function(){
		speed=2;
	});
	
})


 /**
 +----------------------------------------------------------
 * 收藏本站
 +----------------------------------------------------------
 */
function AddFavorite(title, url) {
    try {
        window.external.addFavorite(url, title);
    }
    catch (e) {
        try {
            window.sidebar.addPanel(title, url, "");
        }
        catch (e) {
            alert("\u62b1\u6b49\uff0c\u60a8\u6240\u4f7f\u7528\u7684\u6d4f\u89c8\u5668\u65e0\u6cd5\u5b8c\u6210\u6b64\u64cd\u4f5c\u3002\u52a0\u5165\u6536\u85cf\u5931\u8d25\uff0c\u8bf7\u4f7f\u7528Ctrl+D\u8fdb\u884c\u6dfb\u52a0\uff01");
        }
    }
}


/**
 +----------------------------------------------------------
 * 延迟加载
 +----------------------------------------------------------
 */
function lazyload(){
    if($("img.lazy").length > 0) {
        $("img.lazy").lazyload({
            placeholder: staticDomain+"/Public/Images/loading.png",
            effect: "fadeIn",
            threshold: 150,
            failurelimit: 100
        });
    }
}

