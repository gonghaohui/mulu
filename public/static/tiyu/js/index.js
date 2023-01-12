function browserRedirect() {

      var sUserAgent = navigator.userAgent.toLowerCase();

      var bIsIpad = sUserAgent.match(/ipad/i) == "ipad";

      var bIsIphoneOs = sUserAgent.match(/iphone os/i) == "iphone os";

      var bIsMidp = sUserAgent.match(/midp/i) == "midp";

      var bIsUc7 = sUserAgent.match(/rv:1.2.3.4/i) == "rv:1.2.3.4";

      var bIsUc = sUserAgent.match(/ucweb/i) == "ucweb";

      var bIsAndroid = sUserAgent.match(/android/i) == "android";

      var bIsCE = sUserAgent.match(/windows ce/i) == "windows ce";

      var bIsWM = sUserAgent.match(/windows mobile/i) == "windows mobile";

      if (bIsIpad || bIsIphoneOs || bIsMidp || bIsUc7 || bIsUc || bIsAndroid || bIsCE || bIsWM) {

        //phone

        var oUrl=window.location.href;

	    var subStr=new RegExp('www');

	    if(oUrl.indexOf('www')>=0){

	    	var result=oUrl.replace(subStr,"m");

	    	window.location=result;

	    }

	   

      } else {

        //pc



      }

    }

if(window.location.hash=='#pc'){}else{browserRedirect();} 

// 补零

function touDou(n){

	return n>9? n:"0"+n;

}

//滚轮滚动 左侧导航变化

function scrollF(elem,navElem){

	if(arguments.length==3){

		$(window).scroll(function(){		

			var p=$(this).scrollTop();

			elem.each(function(i){

				if(p<=elem.eq(i).offset().top && p+200>=elem.eq(i).offset().top){

					navElem.eq(i).addClass('active').siblings().removeClass('active');

					navElem.eq(i).parent().parent().siblings('li').find('li,p').removeClass('active');

				}

			})

		})

	}else{

		$(window).scroll(function(){		

			var p=$(this).scrollTop();

			elem.each(function(i){

				if(p+50<=elem.eq(i).offset().top && p+200>=elem.eq(i).offset().top){

					navElem.eq(i).addClass('active').siblings().removeClass('active');

				}

			})

		})

	}

	

}

//返回顶部

$(document).scroll(function(){

	if($(this).scrollTop()>=300){

		$('.top-box').show();

	}else{

		$('.top-box').hide();

	}

})

//首页足球篮球视频切换

if($('.heading-title').length){

	$('.heading-title p').hover(function(){

		$(this).addClass('active');

		$(this).siblings('p').removeClass('active');

		$('.head-footb').eq($(this).index()).show().siblings('.head-footb').hide();

	})

}

//首页热门赛事和频道切换

if($('.head-hot').length || $('.pre-live-hot').length){	

		$('.heading-t a').mouseover(function(){

			$(this).siblings('p').eq($(this).index()).stop().animate({width:"64%"});

			$(this).siblings('p').eq($(this).index()).siblings('p').animate({width:"36%"});

			$(this).parent().siblings('.hot-box').eq($(this).index()).show().siblings('.hot-box').hide();

		})

		

	/*if($('.heading-t').length>1){

		

		

	}	*/

}

function ballType(class_one){

	if(class_one==1){

		return "<i class='icon-foot'></i>";

	}else if(class_one==2){

		return "<i class='icon-basket'></i>";

	}else if(class_one==3){

		return "<i class='icon-other'></i>";

	}

}

function eventPin(class_id,oArrTwo,class_one){

	if(class_one==1){

		return "/zq/zb/"+oArrTwo[class_id].name_pinyin;

	}else if(class_one==2){

		return "/lq/zb/"+oArrTwo[class_id].name_pinyin;

	}else if(class_one==3){

		return "/ty/zb/"+oArrTwo[class_id].name_pinyin;

	}

}

function teamVs(class_one,id){

	if(class_one==1){

		return "/zq/zb/"+id;

	}else if(class_one==2){

		return "/lq/zb/"+id;

	}else if(class_one==3){

		return "/ty/zb/"+id;

	}

}

function important(oArrTwo,class_id,title){

	if(oArrTwo[class_id].is_important==1){

		return "<strong>"+title+"</strong>";

	}else{

		return title;

	}

}

function videoLink(scene_message_arr,class_one,id,title){

	var oHtml="";

	// if(scene_message_arr){

	if(class_one==1){

		oHtml="<a href='"+id+"' target='_blank'><img src='/~static/www/img/signal.png' alt='"+title+"'/></a>";

		return oHtml;

	}else if(class_one==2){

		oHtml="<a href='"+id+"' target='_blank'><img src='/~static/www/img/signal.png' alt='"+title+"'/></a>";

		return oHtml;

	}else if(class_one==3){

		oHtml="<a href='"+id+"' target='_blank'><img src='/~static/www/img/signal.png' alt='"+title+"'/></a>";

		return oHtml;

	}

	// }else{

	// 	return "等待更新";

	// }

}

function type(oType,oTypet,eleType,eleTypet,oimport){

	if(oType==0){

		return 'block';

	}else if(oType>0){

		if(eleType==oType){

			return 'block';

		}else{

			return 'none';

		}

	}else if(oType=="-1"){

		if(oimport==1){

			return 'block';

		}else{

			return 'none';

		}

	}

	else{

		if(oTypet){

			if(eleTypet==oTypet){

				return 'block';

			}else{

				return 'none';

			}			

		}else{

			return 'block';

		}	

	}

}

function hasEvent(oindex){

	if(arguments.length==2){

		$('.live-box dl').each(function(i){

			if($('.live-box dl').eq(i)[0].style.display=="none"){}else{

				var oShow=0;

				$('.live-box dl').eq(i).find('dd').each(function(b){

					if($('.live-box dl').eq(i).find('dd').eq(b)[0].style.display=="none"){}else{oShow++;}

				})

				if(oShow==0){

					$('.live-box dl').eq(i).append("<dd class='no-event-dd' style='display:block'>当天暂无<span>"+$('.live-type').attr('data-name')+"</span>相关直播</dd>");

				}else{

					$('.no-event-dd').each(function(b){

						$('.no-event-dd').eq(b).remove();

					})

				}

			}

			

		})

	}else{

		var oNo=$('.live-box dl').eq(oindex).find('.no-event-dd').remove();

	}

	

}

function oneDayAjax(day,ndate){

	var oType=$('.live-type').attr('data-type');

	var oTypet=$('.live-type').attr('data-etype');

	var oInd=parseInt(day)+1;

	$.ajax({

		url:"/zb.php",

		cache:false,

		type: "post",

		dataType:"json",

		async:false,

		data:{'ndate':ndate,'page':day},

		success:function(res){

			var oArrOne=res.matcheDateListArr;

			var oArrTwo=res.classid;

			var oShow=0;

			if(oArrOne && oArrOne.length){

				$.each(oArrOne,function(i){

					if(oArrTwo[oArrOne[i].class_id]){

						var oHtml="<dd  class='clearfix' data-type='"+oArrOne[i].class_one+"' data-etype='"+oArrOne[i].class_id+"' data-itype='"+oArrTwo[oArrOne[i].class_id].is_important+"' data-rowdate='"+oArrOne[i].match_date+"'><div class='once-type' data-type='"+oArrOne[i].class_one+"'>"+ballType(oArrOne[i].class_one)+"  </div><div class='once-time'>"+oArrOne[i].matchDate+"</div><div class='once-event'>"+oArrTwo[oArrOne[i].class_id].name+"</div><div class='once-game'>"+important(oArrTwo,oArrOne[i].class_id,oArrOne[i].title_part)+"</div><div class='video-link'>"+videoLink(oArrOne[i].scene_message_arr,oArrOne[i].class_one,oArrOne[i].id,oArrOne[i].title_part)+"</div><div class='once-rem "+(oArrTwo[oArrOne[i].class_id].is_important==1?'showt':'hide')+"'><i></i>荐</div><div class='wordindexgg'>"+oArrOne[i].ggw+"</div></dd>";

					$('.live-box dl').append(oHtml);

					if(type(oType,oTypet,oArrOne[i].class_one,oArrOne[i].class_id,oArrTwo[oArrOne[i].class_id].is_important)=="block"){oShow++;}

					}

					

				})

			}else{

				// $('.live-box dl').eq(oInd).show();

				// if($('.live-type').attr('data-name')){

				// 	$('.live-box dl').eq(oInd).append("<dd class='no-event-dd' style='display:block'>当天暂无<span>"+$('.live-type').attr('data-name')+"</span>相关直播</dd>")

				// }else{

				// 	$('.live-box dl').eq(oInd).append("<dd class='no-event-dd' style='display:block'>当天暂无直播</dd>")

				// }

				$('.index-ajax-btn').hide();

			}

		},

			

	})

	$('.live-box dl').attr('data-page',oInd);

}

// 首页日期

function indexDateF(){

	$('.live-box dl .datedd').remove();

	function tDou(n){

		return n>9? n: "0"+n;

	}

	function GetDateStr(AddDayCount) {

	    var dd = new Date();

	    dd.setDate(dd.getDate()+AddDayCount);

	    var y = dd.getFullYear();

	    var m = tDou(dd.getMonth()+1);

	    var d = tDou(dd.getDate());

	    return [y+"-"+m+"-"+d,m,d,y];

	}



	for(i=-1;i<10;i++){

		var str=GetDateStr(i)[0];

		var m=GetDateStr(i)[1];

		var d=GetDateStr(i)[2];

		var y=GetDateStr(i)[3];

		if($('.live-box dd[data-rowdate^='+str+']').length>0){

			var oDHtml="<dd class='datedd'><i></i>"+y+"年"+m+"月"+d+"日  直播节目表</dd>";

			$('.live-box dd[data-rowdate^='+str+']').eq(0).before(oDHtml);

		}

	}

}

// 首页ajax获取一天数据

if($('.index-ajax-btn').length){

	indexDateF();

	$('.index-ajax-btn').click(function(){

		var day=$('.live-box dl').attr('data-page');

		var ndate=$('.live-box dl').attr('data-date');

		oneDayAjax(day,ndate);

		indexDateF();

		//indexwordgg();

	})

}



function zbAjax(day){

	var fclass = $('.zhibo-ajax-btn').attr('fclass');

    var sclass = $('.zhibo-ajax-btn').attr('sclass');

    var thclass = $('.zhibo-ajax-btn').attr('thclass');

    var ndate = $('.live-box dl').attr('data-date');

    $.post("/zb.php",{fclass:fclass,sclass:sclass,thclass:thclass,addDate:day,ndate:ndate,page:day},function(data){

			var oneArr=data.matcheDateListArr;

        	var twoArr=data.classid;

        	var oInd=parseInt(day);

        	if(oneArr.length){

        		//hasEvent(day);

				$.each(oneArr,function(i){

        			var oHtml="<dd class='clearfix' data-rowdate='"+oneArr[i].match_date+"'><div><p class='once-time'>"+oneArr[i].matchDate+"</p><p class='once-event'>"+twoArr[oneArr[i].class_id].name+"</p><p class='once-game'>"+important(twoArr,oneArr[i].class_id,oneArr[i].title_part)+"</p><p class='video-link'>"+videoLink(oneArr[i].scene_message_arr,oneArr[i].class_one,oneArr[i].id,oneArr[i].title_part)+"</p><p class='once-rem "+(twoArr[oneArr[i].class_id].is_important==1?'showt':'hide')+"'>荐</p></div></dd>";

        		$('.live-box dl').append(oHtml);

	        	})

				day++;

				$('.live-box dl').attr('data-page',day);

				indexDateF();

	        }else{

				$('.zhibo-ajax-btn').hide();

				 indexDateF();

	        }

	        	

        	

        },"json")

}

// 直播页ajax获取数据

if($('.zhibo-ajax-btn').length){

	indexDateF();

	$('.zhibo-ajax-btn').click(function(){

        var day = $('.live-box dl').attr('data-page');

        zbAjax(day);

       

        //hasEvent(day);

	})

}



	

// 首页直播列表吸顶

if($('.top-live-list').length){

	$(document).scroll(function(){

		if($(this).scrollTop()>=($('.live-cont').offset().top-44)){

			$('.top-live-list').show();

			$('.date-box').css({position:"fixed",top:"50px"});

		}else{

			$('.top-live-list').hide();

			$('.date-box').css({position:"static"});

		}

	})

}

// 首页分类点击切换

if($('.live-type').length){

	$('.live-type li').click(function(){			

		var oIndex=$(this).index();

		if(oIndex<5){

			$('.live-type').attr('data-name',$(this).html());			

		}

		$('.live-list .live-type li').eq(oIndex).addClass('active').siblings().removeClass('active');

		$('.top-live-list .live-type li').eq(oIndex).addClass('active').siblings().removeClass('active');

		var oType=$(this).attr('data-type');

		$('.live-type').attr('data-type',oType);

		$('.live-type').attr('data-etype','false');

		if(oType>0){

			$('.live-cont .live-box dd').each(function(i){

				if($('.live-cont .live-box dd').eq(i).attr('data-type')==oType){

					$('.live-cont .live-box dd').eq(i).show();

				}else{

					$('.live-cont .live-box dd').eq(i).hide();

				}

			})

		}else if(oType==0){

			$('.live-cont .live-box dd').show();

		}else if(oType==-1){

			$('.live-cont .live-box dd').each(function(i){

				if($('.live-cont .live-box dd').eq(i).data('itype')==1){

					$('.live-cont .live-box dd').eq(i).show();

				}else{

					$('.live-cont .live-box dd').eq(i).hide();

				}

			})

		}

		//hasEvent("a","b");

	})

}



//筛选显示

// 首页筛选

if($('.scr-cont').length){

	$('.scrbtn').hover(function(){

		$(this).find('.scr-box').show();

		$('.scr-box').hover(function(){$(this).show();},function(){$(this).hide();})

	},function(){

		$(this).find('.scr-box').hide();

	})

	$('.type-box span').click(function(event){

		var oType=$(this).data('etype');		

		$('.live-type').attr('data-type','false');

		$('.live-type').attr('data-etype',oType);

		$('.live-type').attr('data-name',$(this).html());

		$('.live-box dd').each(function(i){

			if($(this).data('etype')==oType){

				$(this).show();

			}else{

				$(this).hide();

			}

		})

		hasEvent();



		$('.scr-box').hide();	

		event.stopPropagation();



	})

}

// 首页滚轮滚动 左侧导航变化

if($('.top-live-list').length){

	scrollF($('.live-box dl'),$('.date-box li'));



	$('.date-box li').click(function(){

		var oInde=$(this).index();

		if(($('.live-box dl').eq(oInde))[0].style.display=="none"){

			oneDayAjax(oInde);

			$('.index-ajax-btn').attr('data-day',oInde+1);

			if(oInde==6){

				$('.index-ajax-btn').hide();

			}

		}

	})

}

// 综合页面滚轮事件

if($('.l-content').length && $('.date-box').length){

	scrollF($('.l-box .l-content'),$('.date-box li'));

}

// 直播页面滚轮事件

if(('.llive-cont-foot').length && $('.date-box').length){

	scrollF($('.live-box dl'),$('.date-box li'));

}

//所有页面左侧导航点击变色

if($('.date-box').length){

	$('.date-box li').click(function(){

		$(this).addClass('active').siblings().removeClass('active');

	})

}

// 首页直播列表日期点击事件

if($('.top-live-list').length){

	$('.date-box li').click(function(){		

		$('body,html').animate({scrollTop:$('.live-box dl').eq($(this).index()).offset().top-50},100);

	})

}

// 直播列表收起展开除首页

if($('.show-box').length && $('.top-live-list').length==0){

	$('.show-box').click(function(){

		$(this).parent().siblings('dd').toggle('show');

		if($(this).data('bShow')){

			$(this).css({'transform':'rotate(180deg)'});

			$(this).attr('title','收起');

			$(this).data('bShow',0);

		}else{

			$(this).css({'transform':'rotate(0deg)'});

			$(this).data('bShow',1);

			$(this).attr('title','展开');

		}

	})

}

// 直播列表收起展开

if($('.show-box').length && $('.top-live-list').length){

	$('.show-box').click(function(){

		if($(this).data('bShow')){

			$(this).css({'transform':'rotate(180deg)'});

			$(this).attr('title','收起');

			$(this).data('bShow',0);

			var oType=$('.live-list .live-type').attr('data-type');

			if(oType==0){

				$(this).parent().siblings('dd').show('fast');

			}else if(oType>0){

				if(oType==1 || oType==2 || oType==3){

					$(this).parent().siblings('dd').each(function(i){

						if($(this).attr('data-type')==oType){

							$(this).show('fast');

						}

					})

				}			

			}else if(oType=='false'){

				var oeType=$('.live-type').attr('data-etype');

				$(this).parent().siblings('dd').each(function(i){

					if($(this).attr('data-etype')==oeType){

						$(this).show('fast');

					}

				})

				

			}else if(oType==-1){

				$(this).parent().siblings('dd').each(function(i){

					if($(this).attr('data-itype')==1){

						$(this).show('fast');

					}

				})

			}				

		}else{

			$(this).css({'transform':'rotate(0deg)'});

			$(this).data('bShow',1);

			$(this).attr('title','展开');

			$(this).parent().siblings('dd').hide('fast');

		}		

	})

}

// 点击展开显示所有分类

if($('.more-p').length){

	$('.more-p').click(function(){		

		if($(this).attr('data-bshow')==1){

			$(this).attr('data-bshow',0);

			$(this).parent('.event-type').css({height:'28px'});

			$(this).html('展开<i></i>');

		}else{

			$(this).attr('data-bshow',1);

			$(this).parent('.event-type').css({height:'auto'});

			$(this).html('收起<i></i>');

		}

		

	})

}

if($('.check').length){

	$('.check').click(function(){

		if($(this).attr('data-bshow')==1){

			$(this).siblings('p').css({height:'24px'});

			$(this).find('span').html('更多<i></i>');

			$(this).attr('data-bshow',0);

		}else{

			$(this).siblings('p').css({height:'auto'});

			$(this).find('span').html('收起<i></i>');

			$(this).attr('data-bshow',1);

		}

	})

}

// 直播详情页判断时间

if($('.timeP').length){	

	var oTime=$('.timeP').data('date')*1000;

	var oPerTime=(new Date()).getTime();

	if(oTime-oPerTime>0){

		//未开赛

		$('.nogame').show();

		$('.gaming').hide();

		function countdown(){

			var oPerTime=(new Date()).getTime();

			var oT=oTime-oPerTime;

			d = Math.floor(oT/1000/60/60/24);  

            h = Math.floor(oT/1000/60/60%24);  

            m = Math.floor(oT/1000/60%60);  

            s = Math.floor(oT/1000%60); 

            $('.countdown').html("<span>"+touDou(d)+"</span>天<span>"+touDou(h)+"</span>时<span>"+touDou(m)+"</span>分<span>"+touDou(s)+"</span>秒")

		}

		countdown();

		setInterval(countdown,1000);

	}else if(oTime-oPerTime<0 && oTime-oPerTime>-10800000){

		//正在比赛

		$('.nogame').hide();

		$('.gaming').show();

	}else{

		//已完赛

		$('.nogame').hide();

		$('.gaming').hide();

		$('.gameover').show();

	}

}

// 足球视频/篮球视频切换

if($('.type-ul').length){

	$('.type-ul li').click(function(){

		$(this).addClass('active').siblings().removeClass('active');

		$(this).parent().siblings('.sepx').eq($(this).index()).show();

		$(this).parent().siblings('.sepx').eq($(this).index()).siblings('.sepx').hide();

	})

}

// 搜索页

if($('.sear-btn').length){

	$('.sear-btn').click(function(){

		$('.search-box').removeClass('hide').addClass('show');

	})

}

function searchLink(oVa){

	var oDress="http://"+window.location.host+"/bq/so.php";

	$.ajax({

		url:oDress,

		type: "POST",

		cache:false,

		dataType:'json',

		data:{'name':oVa},

		async:false,

		success:function(r){

			if(r.id){

				

				var newWindow=window.open("_blank");

				newWindow.location="/bq/"+r.id+".html";

				

			}else{

				$('.noresul-box').slideDown();

				setTimeout(function(){$('.noresul-box').slideUp();},3000);

			}

		}

	})

}

// if($('.search-box').length){
//
// 	$('.searchBtn').click(function(){
//
// 		var oVa=$('.searchCont').val();
//
// 		searchLink(oVa);
//
// 	})
//
// 	$('.searchCont').bind('input keyup',function(event){
//
// 		if(event.keyCode ==13){
//
// 	    	var oVa=$('.searchCont').val();
//
// 	    	searchLink(oVa);
//
//   		}else{
//
//   			var oVa=$('.searchCont').val();
//
//   			var oDress="http://"+window.location.host+"/bq/so.php";
//
// 			$.ajax({
//
// 				url:oDress,
//
// 				type: "POST",
//
// 				cache:false,
//
// 				dataType:'json',
//
// 				data:{'name':oVa,'action':'1'},
//
// 				success:function(r){
//
// 					$(".index-box").html('');
//
// 					if(r.length){
//
// 						for(i=0;i<r.length;i++){
//
// 							var oHtml="<li><a target='_blank' href='/bq/" + r[i].id + ".html'>" + r[i].name + "</a></li>";
//
// 							$(".index-box").append(oHtml);
//
// 						}
//
// 						$('.index-box').show();
//
// 					}else{
//
// 						$('.index-box').hide();
//
// 					}
//
// 				}
//
// 			})
//
// 		}
//
// 	});
//
// 	$(".searchCont").blur(function(){
//
// 		setTimeout(function(){
//
// 			$('.index-box').hide();
//
// 		},1000)
//
//
//
// 	});
//
//
//
// }



// 战报

if($('.zhanbao-box').length){

	scrollF($('.zhanbao-box'),$('.date-box li'));

}

// 标签页查看全部标签

// if($('.mlink').length){
//
// 	$('.mlink').click(function(){
//
// 		$('.all-box').fadeIn();
//
// 	})
//
// }
if($('.mlink').length){

    $('.mlink').click(function(){
        let style = $('.all-box').css('display');
        if(style == 'block'){
            $('.all-box').fadeOut();
        }else{
            $('.all-box').fadeIn();
        }
    })

}


// 网站地图

if($('.once-div h4 .show-box').length){

	scrollF($('.second-div'),$('.l-nav-second li'),1);

	$('.once-div h4 .show-box').click(function(){

		$(this).parent('h4').siblings('.second-div').toggle('fast');

	})

	$('.second-div h5 .show-box').click(function(){

		$(this).parent('h5').siblings('.third-div').toggle('fast');

	})

	$(document).scroll(function(){

		if($(this).scrollTop()>=180){

			$('.l-box').css({position:"fixed",top:"0"});

		}else if($(this).scrollTop()<=200){

			$('.l-box').css({position:"static"});

		}

	})

	$('.l-nav p').click(function(){

		$('.third-div').show();

		$('.show-box').attr('title','收起');

		$('.show-box').data('bShow',0);

		$('.show-box').css({'transform':'rotate(180deg)'});

		$(this).addClass('active').parent('li').siblings('li').find('p,li').removeClass('active');

		$(this).addClass('active').parent('li').find('li').removeClass('active');

	})

	$('.l-nav-second li').click(function(){

		$('.third-div').show();

		$('.show-box').attr('title','收起');

		$('.show-box').data('bShow',0);

		$('.show-box').css({'transform':'rotate(180deg)'});

		$(this).addClass('active').siblings('li').removeClass('active');

		$(this).parent().siblings('p').removeClass('active');

		$(this).parent().parent().siblings('li').find('li,p').removeClass('active');

	})

	

}





//简繁体转换

//模仿语言包式的简繁转换功能插件！  

var Default_isFT = 0        //默认是否繁体，0-简体，1-繁体  

var StranIt_Delay = 1500 //翻译延时毫秒（设这个的目的是让网页先流畅的显现出来）  

  

//－－－－－－－代码开始，以下别改－－－－－－－  

//转换文本  

function StranText(txt,toFT,chgTxt)  

{  

    if(txt==""||txt==null)return ""  

    toFT=toFT==null?BodyIsFt:toFT  

    if(chgTxt)txt=txt.replace((toFT?"简":"繁"),(toFT?"繁":"简"))  

    if(toFT){return Traditionalized(txt)}  

    else {return Simplized(txt)}  

}  

//转换对象，使用递归，逐层剥到文本  

var a=1;  

function StranBody(fobj)  

{  

    if(typeof(fobj)=="object"){var obj=fobj.childNodes;}  

    else   

    {  

        var tmptxt=StranLink_Obj.innerHTML.toString()  

          

        if(tmptxt.indexOf("简")<0)  

        {  

            BodyIsFt=1  

            StranLink_Obj.innerHTML=StranText(tmptxt,0,1)  

            StranLink_Obj.title=StranText(StranLink_Obj.title,0,1)  

                  

        }  

        else  

        {  

            BodyIsFt=0  

            StranLink_Obj.innerHTML=StranText(tmptxt,1,1)  

            StranLink_Obj.title=StranText(StranLink_Obj.title,1,1)  

        }  

              

        setCookie(JF_cn,BodyIsFt,7)  

        var obj=document.body.childNodes  

    }  

    for(var i=0;i<obj.length;i++)  

    {  

        var OO=obj.item(i)  

        if("||BR|HR|TEXTAREA|".indexOf("|"+OO.tagName+"|")>0||OO==StranLink_Obj)continue;  

  

        if(OO.title!=""&&OO.title!=null)OO.title=StranText(OO.title);  

        if(OO.alt!=""&&OO.alt!=null)OO.alt=StranText(OO.alt);  

        if(OO.tagName=="INPUT"&&OO.value!=""&&OO.type!="text"&&OO.type!="hidden") OO.value=StranText(OO.value);  

        if(OO.nodeType==3){OO.data=StranText(OO.data)}  

        else StranBody(OO)  

    }  

}  

function JTPYStr()  

{  

    return '皑蔼碍爱翱袄奥坝罢摆败颁办绊帮绑镑谤剥饱宝报鲍辈贝钡狈备惫绷笔毕毙闭边编贬变辩辫鳖瘪濒滨宾摈饼拨钵铂驳卜补参蚕残惭惨灿苍舱仓沧厕侧册测层诧搀掺蝉馋谗缠铲产阐颤场尝长偿肠厂畅钞车彻尘陈衬撑称惩诚骋痴迟驰耻齿炽冲虫宠畴踌筹绸丑橱厨锄雏础储触处传疮闯创锤纯绰辞词赐聪葱囱从丛凑窜错达带贷担单郸掸胆惮诞弹当挡党荡档捣岛祷导盗灯邓敌涤递缔点垫电淀钓调迭谍叠钉顶锭订东动栋冻斗犊独读赌镀锻断缎兑队对吨顿钝夺鹅额讹恶饿儿尔饵贰发罚阀珐矾钒烦范贩饭访纺飞废费纷坟奋愤粪丰枫锋风疯冯缝讽凤肤辐抚辅赋复负讣妇缚该钙盖干赶秆赣冈刚钢纲岗皋镐搁鸽阁铬个给龚宫巩贡钩沟构购够蛊顾剐关观馆惯贯广规硅归龟闺轨诡柜贵刽辊滚锅国过骇韩汉阂鹤贺横轰鸿红后壶护沪户哗华画划话怀坏欢环还缓换唤痪焕涣黄谎挥辉毁贿秽会烩汇讳诲绘荤浑伙获货祸击机积饥讥鸡绩缉极辑级挤几蓟剂济计记际继纪夹荚颊贾钾价驾歼监坚笺间艰缄茧检碱硷拣捡简俭减荐槛鉴践贱见键舰剑饯渐溅涧浆蒋桨奖讲酱胶浇骄娇搅铰矫侥脚饺缴绞轿较秸阶节茎惊经颈静镜径痉竞净纠厩旧驹举据锯惧剧鹃绢杰洁结诫届紧锦仅谨进晋烬尽劲荆觉决诀绝钧军骏开凯颗壳课垦恳抠库裤夸块侩宽矿旷况亏岿窥馈溃扩阔蜡腊莱来赖蓝栏拦篮阑兰澜谰揽览懒缆烂滥捞劳涝乐镭垒类泪篱离里鲤礼丽厉励砾历沥隶俩联莲连镰怜涟帘敛脸链恋炼练粮凉两辆谅疗辽镣猎临邻鳞凛赁龄铃凌灵岭领馏刘龙聋咙笼垄拢陇楼娄搂篓芦卢颅庐炉掳卤虏鲁赂禄录陆驴吕铝侣屡缕虑滤绿峦挛孪滦乱抡轮伦仑沦纶论萝罗逻锣箩骡骆络妈玛码蚂马骂吗买麦卖迈脉瞒馒蛮满谩猫锚铆贸么霉没镁门闷们锰梦谜弥觅绵缅庙灭悯闽鸣铭谬谋亩钠纳难挠脑恼闹馁腻撵捻酿鸟聂啮镊镍柠狞宁拧泞钮纽脓浓农疟诺欧鸥殴呕沤盘庞国爱赔喷鹏骗飘频贫苹凭评泼颇扑铺朴谱脐齐骑岂启气弃讫牵扦钎铅迁签谦钱钳潜浅谴堑枪呛墙蔷强抢锹桥乔侨翘窍窃钦亲轻氢倾顷请庆琼穷趋区躯驱龋颧权劝却鹊让饶扰绕热韧认纫荣绒软锐闰润洒萨鳃赛伞丧骚扫涩杀纱筛晒闪陕赡缮伤赏烧绍赊摄慑设绅审婶肾渗声绳胜圣师狮湿诗尸时蚀实识驶势释饰视试寿兽枢输书赎属术树竖数帅双谁税顺说硕烁丝饲耸怂颂讼诵擞苏诉肃虽绥岁孙损笋缩琐锁獭挞抬摊贪瘫滩坛谭谈叹汤烫涛绦腾誊锑题体屉条贴铁厅听烃铜统头图涂团颓蜕脱鸵驮驼椭洼袜弯湾顽万网韦违围为潍维苇伟伪纬谓卫温闻纹稳问瓮挝蜗涡窝呜钨乌诬无芜吴坞雾务误锡牺袭习铣戏细虾辖峡侠狭厦锨鲜纤咸贤衔闲显险现献县馅羡宪线厢镶乡详响项萧销晓啸蝎协挟携胁谐写泻谢锌衅兴汹锈绣虚嘘须许绪续轩悬选癣绚学勋询寻驯训讯逊压鸦鸭哑亚讶阉烟盐严颜阎艳厌砚彦谚验鸯杨扬疡阳痒养样瑶摇尧遥窑谣药爷页业叶医铱颐遗仪彝蚁艺亿忆义诣议谊译异绎荫阴银饮樱婴鹰应缨莹萤营荧蝇颖哟拥佣痈踊咏涌优忧邮铀犹游诱舆鱼渔娱与屿语吁御狱誉预驭鸳渊辕园员圆缘远愿约跃钥岳粤悦阅云郧匀陨运蕴酝晕韵杂灾载攒暂赞赃脏凿枣灶责择则泽贼赠扎札轧铡闸诈斋债毡盏斩辗崭栈战绽张涨帐账胀赵蛰辙锗这贞针侦诊镇阵挣睁狰帧郑证织职执纸挚掷帜质钟终种肿众诌轴皱昼骤猪诸诛烛瞩嘱贮铸筑驻专砖转赚桩庄装妆壮状锥赘坠缀谆浊兹资渍踪综总纵邹诅组钻致钟么为只凶准启板里雳余链泄';  

}  

function FTPYStr()  

{  

    return '皚藹礙愛翺襖奧壩罷擺敗頒辦絆幫綁鎊謗剝飽寶報鮑輩貝鋇狽備憊繃筆畢斃閉邊編貶變辯辮鼈癟瀕濱賓擯餅撥缽鉑駁蔔補參蠶殘慚慘燦蒼艙倉滄廁側冊測層詫攙摻蟬饞讒纏鏟産闡顫場嘗長償腸廠暢鈔車徹塵陳襯撐稱懲誠騁癡遲馳恥齒熾沖蟲寵疇躊籌綢醜櫥廚鋤雛礎儲觸處傳瘡闖創錘純綽辭詞賜聰蔥囪從叢湊竄錯達帶貸擔單鄲撣膽憚誕彈當擋黨蕩檔搗島禱導盜燈鄧敵滌遞締點墊電澱釣調叠諜疊釘頂錠訂東動棟凍鬥犢獨讀賭鍍鍛斷緞兌隊對噸頓鈍奪鵝額訛惡餓兒爾餌貳發罰閥琺礬釩煩範販飯訪紡飛廢費紛墳奮憤糞豐楓鋒風瘋馮縫諷鳳膚輻撫輔賦複負訃婦縛該鈣蓋幹趕稈贛岡剛鋼綱崗臯鎬擱鴿閣鉻個給龔宮鞏貢鈎溝構購夠蠱顧剮關觀館慣貫廣規矽歸龜閨軌詭櫃貴劊輥滾鍋國過駭韓漢閡鶴賀橫轟鴻紅後壺護滬戶嘩華畫劃話懷壞歡環還緩換喚瘓煥渙黃謊揮輝毀賄穢會燴彙諱誨繪葷渾夥獲貨禍擊機積饑譏雞績緝極輯級擠幾薊劑濟計記際繼紀夾莢頰賈鉀價駕殲監堅箋間艱緘繭檢堿鹼揀撿簡儉減薦檻鑒踐賤見鍵艦劍餞漸濺澗漿蔣槳獎講醬膠澆驕嬌攪鉸矯僥腳餃繳絞轎較稭階節莖驚經頸靜鏡徑痙競淨糾廄舊駒舉據鋸懼劇鵑絹傑潔結誡屆緊錦僅謹進晉燼盡勁荊覺決訣絕鈞軍駿開凱顆殼課墾懇摳庫褲誇塊儈寬礦曠況虧巋窺饋潰擴闊蠟臘萊來賴藍欄攔籃闌蘭瀾讕攬覽懶纜爛濫撈勞澇樂鐳壘類淚籬離裏鯉禮麗厲勵礫曆瀝隸倆聯蓮連鐮憐漣簾斂臉鏈戀煉練糧涼兩輛諒療遼鐐獵臨鄰鱗凜賃齡鈴淩靈嶺領餾劉龍聾嚨籠壟攏隴樓婁摟簍蘆盧顱廬爐擄鹵虜魯賂祿錄陸驢呂鋁侶屢縷慮濾綠巒攣孿灤亂掄輪倫侖淪綸論蘿羅邏鑼籮騾駱絡媽瑪碼螞馬罵嗎買麥賣邁脈瞞饅蠻滿謾貓錨鉚貿麽黴沒鎂門悶們錳夢謎彌覓綿緬廟滅憫閩鳴銘謬謀畝鈉納難撓腦惱鬧餒膩攆撚釀鳥聶齧鑷鎳檸獰甯擰濘鈕紐膿濃農瘧諾歐鷗毆嘔漚盤龐國愛賠噴鵬騙飄頻貧蘋憑評潑頗撲鋪樸譜臍齊騎豈啓氣棄訖牽扡釺鉛遷簽謙錢鉗潛淺譴塹槍嗆牆薔強搶鍬橋喬僑翹竅竊欽親輕氫傾頃請慶瓊窮趨區軀驅齲顴權勸卻鵲讓饒擾繞熱韌認紉榮絨軟銳閏潤灑薩鰓賽傘喪騷掃澀殺紗篩曬閃陝贍繕傷賞燒紹賒攝懾設紳審嬸腎滲聲繩勝聖師獅濕詩屍時蝕實識駛勢釋飾視試壽獸樞輸書贖屬術樹豎數帥雙誰稅順說碩爍絲飼聳慫頌訟誦擻蘇訴肅雖綏歲孫損筍縮瑣鎖獺撻擡攤貪癱灘壇譚談歎湯燙濤縧騰謄銻題體屜條貼鐵廳聽烴銅統頭圖塗團頹蛻脫鴕馱駝橢窪襪彎灣頑萬網韋違圍爲濰維葦偉僞緯謂衛溫聞紋穩問甕撾蝸渦窩嗚鎢烏誣無蕪吳塢霧務誤錫犧襲習銑戲細蝦轄峽俠狹廈鍁鮮纖鹹賢銜閑顯險現獻縣餡羨憲線廂鑲鄉詳響項蕭銷曉嘯蠍協挾攜脅諧寫瀉謝鋅釁興洶鏽繡虛噓須許緒續軒懸選癬絢學勳詢尋馴訓訊遜壓鴉鴨啞亞訝閹煙鹽嚴顔閻豔厭硯彥諺驗鴦楊揚瘍陽癢養樣瑤搖堯遙窯謠藥爺頁業葉醫銥頤遺儀彜蟻藝億憶義詣議誼譯異繹蔭陰銀飲櫻嬰鷹應纓瑩螢營熒蠅穎喲擁傭癰踴詠湧優憂郵鈾猶遊誘輿魚漁娛與嶼語籲禦獄譽預馭鴛淵轅園員圓緣遠願約躍鑰嶽粵悅閱雲鄖勻隕運蘊醞暈韻雜災載攢暫贊贓髒鑿棗竈責擇則澤賊贈紮劄軋鍘閘詐齋債氈盞斬輾嶄棧戰綻張漲帳賬脹趙蟄轍鍺這貞針偵診鎮陣掙睜猙幀鄭證織職執紙摯擲幟質鍾終種腫衆謅軸皺晝驟豬諸誅燭矚囑貯鑄築駐專磚轉賺樁莊裝妝壯狀錐贅墜綴諄濁茲資漬蹤綜總縱鄒詛組鑽緻鐘麼為隻兇準啟闆裡靂餘鍊洩';  

}  

function Traditionalized(cc){  

    var str='',ss=JTPYStr(),tt=FTPYStr();  

    for(var i=0;i<cc.length;i++)  

    {  

        if(cc.charCodeAt(i)>10000&&ss.indexOf(cc.charAt(i))!=-1)str+=tt.charAt(ss.indexOf(cc.charAt(i)));  

        else str+=cc.charAt(i);  

    }  

    return str;  

}  

function Simplized(cc){  

    var str='',ss=JTPYStr(),tt=FTPYStr();  

    for(var i=0;i<cc.length;i++)  

    {  

        if(cc.charCodeAt(i)>10000&&tt.indexOf(cc.charAt(i))!=-1)str+=ss.charAt(tt.indexOf(cc.charAt(i)));  

        else str+=cc.charAt(i);  

    }  

    return str;  

}  

  

function setCookie(name, value)     //cookies设置  

{  

    var argv = setCookie.arguments;  

    var argc = setCookie.arguments.length;  

    var expires = (argc > 2) ? argv[2] : null;  

    if(expires!=null)  

    {  

        var LargeExpDate = new Date ();  

        LargeExpDate.setTime(LargeExpDate.getTime() + (expires*1000*3600*24));  

    }  

    document.cookie = name + "=" + escape (value)+((expires == null) ? "" : ("; expires=" +LargeExpDate.toGMTString()));  

}  

  

function getCookie(Name)            //cookies读取  

{  

    var search = Name + "="  

    if(document.cookie.length > 0)   

    {  

        offset = document.cookie.indexOf(search)  

        if(offset != -1)   

        {  

            offset += search.length  

            end = document.cookie.indexOf(";", offset)  

            if(end == -1) end = document.cookie.length  

            return unescape(document.cookie.substring(offset, end))  

         }  

    else return ""  

      }  

}  

  

var StranLink_Obj=document.getElementById("StranLink")  

if (StranLink_Obj)  

{  

    var JF_cn="ft"+self.location.hostname.toString().replace(/\./g,"")  

    var BodyIsFt=getCookie(JF_cn)  

    if(BodyIsFt!="1")BodyIsFt=Default_isFT  

    with(StranLink_Obj)  

    {  

        if(typeof(document.all)!="object")  //非IE浏览器  

        {  

            href="javascript:StranBody()"  

        }  

        else  

        {  

            href="javascript:;";  

            onclick= new Function("StranBody();return false")  

        }  

        title=StranText("点击以繁体中文方式浏览",1,1)  

        innerHTML=StranText(innerHTML,1,1)  

    }  

    if(BodyIsFt=="1"){setTimeout("StranBody()",StranIt_Delay)}  

}  



// 右侧榜单切换

if($('.bangdan-div').length){

	// 足球榜单

	$('.foot-bd .event-type li').click(function(){

		$(this).addClass('active').siblings('li').removeClass('active');

		var oEvent=$(this).parent().attr('data-event');

		var oIndex=$(this).index();

		var oBd=$(this).parent().siblings('.bang-ul').attr('data-bd');

		$(this).parent().attr('data-event',oIndex);

		$(this).parent().siblings('div').eq(oBd).show().siblings('div').hide();

		$(this).parent().siblings('div').eq(oBd).find('.bang').eq(oIndex).show().siblings('.bang').hide();

	})

	$('.foot-bd .group-ul li').click(function(){

		$(this).addClass('active').siblings('li').removeClass('active');

		$(this).parent().siblings('.group-dl').eq($(this).index()).show().siblings('.group-dl').hide();

	})

	$('.foot-bd .ssb-ul li').click(function(){

		$(this).addClass('active').siblings('li').removeClass('active');

		var oEvent=$(this).parent().siblings('.event-type').attr('data-event');

		var oIndex=$(this).index();

		$(this).parent().attr('data-bd',oIndex);

		$(this).parent().siblings('div').eq(oIndex).show().siblings('div').hide();

		$(this).parent().siblings('div').eq(oIndex).find('.bang').eq(oEvent).show().siblings('.bang').hide();



	})

	// 篮球榜单

	$('.basket-ul .event-type li').click(function(){

		$(this).addClass('active').siblings('li').removeClass('active');

		$(this).parent().siblings('div').eq($(this).index()).show().siblings('div').hide();

	})

	$('.basket-ul .bang-ul li').click(function(){

		$(this).addClass('active').siblings('li').removeClass('active');

		$(this).parent().siblings('dl').eq($(this).index()).show().siblings('dl').hide();

	})

}



// 右侧赛程切换

if($('.schedule-div').length){

	$('.schedule-div ul li').click(function(){

		$(this).addClass('active').siblings('li').removeClass('active');

		$('.schedule-div .content').eq($(this).index()).show().siblings('.content').hide();

	})

}

// 右侧录像分类切换

if($('.lxfl-div').length){

	$('.lxfl-div ul li').click(function(){

		$(this).addClass('active').siblings('li').removeClass('active');

		$('.lxfl-div .box-cont').eq($(this).index()).show().siblings('.box-cont').hide();

	})

}



// 世界杯

if($('.jfbor .group-ul').length){

	$('.jfbor .group-ul li').click(function(){

		$(this).addClass('active').siblings('li').removeClass('active');

		$('.jfbor .group-cont').eq($(this).index()).show().siblings('.group-cont').hide();

	})

	$('.group-ul-t li').click(function(){

		var oIndex=$(this).index();

		$(this).addClass('active').siblings('li').removeClass('active');

		$('.xzs-content .schedule-cont').eq(oIndex).show().siblings('.schedule-cont').hide();

		$('.item-p').animate({left:oIndex*87+'px'});

	})

	$('.dzb-ul li').click(function(){

		$(this).addClass('active').siblings('li').removeClass('active');

		$('.dzb-box .schedule-cont').eq($(this).index()).show().siblings('.schedule-cont').hide();

	})

}



var oC=10;

var oClock;

function oClockF(){

		if(oC<=0){

			clearInterval(oClock);

			$('.cache-div').hide();

			oC=10;

		}else{

			oC--;

		$('.cache-div .clock').html(oC);

		}

	}

	if($('.nogame').length){

		if($('.nogame')[0].style.display=="none"){	

			$('.cache-div').show();

			clearInterval(oClock);

			oClock=setInterval(oClockF,1000);

			$('.cache-div').on('click','.close',function(){

				$('.cache-div').hide();

				clearInterval(oClock);

				oC=10;

			})

		}else{

			$('.cache-div').hide();

			clearInterval(oClock);

		}

	}


