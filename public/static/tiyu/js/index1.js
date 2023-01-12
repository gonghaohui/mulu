// JavaScript Document
$(function(){
	$(".tab-1 a").eq(0).addClass("active")
	,$(".tab-content-1 .tab-content").eq(0).show()
	,$(".tab-1 a").on("click",function(){
		var index = $(this).index();
		$(".tab-1 a.active").removeClass("active")
		,$(this).addClass("active")
		,$(".tab-content-1 .tab-content").hide()
		,$(".tab-content-1 .tab-content").eq(index).show();
		return false;
	});
	var mySwiper = new Swiper('.swiper-container', {
		autoplay: false,
		navigation: {
			nextEl: '.swiper-btn-next',
			prevEl: '.swiper-btn-prev',
		},
		pagination: {
			el: '.swiper-pagination',
			clickable:true
		},
	});
	initFixedMenu();
	initSearchForm();
});
function initFixedMenu()
{
	$(".ui-menu-btn").bind("click touchstart",function(){
		$("html").addClass("active");
		return false;
	});
	$(".ui-menu-close").bind("click touchstart",function(){
		$("html").removeClass("active");
		$(".ui-menu-down li.open").removeClass("open");
		return false;
	});
	$(".nav li").each(function(idx,item){
		$(item).children("ul").children("li").size() > 0 ? $(item).addClass("sub") : $(item).children("ul").remove();
	});
	$(".ui-menu-down li").each(function(idx,item){
		$(item).children("ul").children("li").size() > 0 ? $(item).addClass("sub") : $(item).children("ul").remove();	
		$(item).children("ul").size() > 0 ? $(item).children("ul").prepend("<li><a class=\"return-p\"><span>"+ $(item).children("a").eq(0).text() +"</span></a></li>") : null;
	});
	$(".ui-menu-down li .return-p").on("click",function(){
		$(this).parents("li.open").removeClass("open"),$(".ui-menu-fixed .ui-menu-box").removeClass("lock");
		return false;
	});	
	$(".ui-menu-down li a").on("click",function(e){
		if($(this).parent().find("ul").size() > 0){
			$(this).parent().addClass("open"),$(".ui-menu-fixed .ui-menu-box").addClass("lock");
			e.preventDefault();
			return false;
		}else{
			if(!$(this).is(".return-p")){
				$(".ui-menu-close").trigger("click");
			}
		}
	});
}

function initSearchForm()
{
	var $val = $(".ui-menu-fixed .m-header .search input[name='keyword']").val();
		$val&&$val.replace(/\s/g,'').length > 0 ? $(".ui-menu-fixed .m-header .searchform-wrapper").addClass("width-reset") : $(".ui-menu-fixed .m-header .searchform-wrapper").removeClass("width-reset");	
	$(".prop-search-open").on("click",function(){
		$(".cd-popup").addClass("is-visible");	
	}),
	$(".cd-popup-close").on("click",function(){
		$(".cd-popup").removeClass("is-visible");	
	}),
	$(".ui-menu-fixed .m-header .search input[name='keyword']").on("input keyup keydown",function(){
		var $val = $(this).val();
		$val&&$val.replace(/\s/g,'').length > 0 ? $(".ui-menu-fixed .m-header .searchform-wrapper").addClass("width-reset") : $(".ui-menu-fixed .m-header .searchform-wrapper").removeClass("width-reset");	
	}),
	$(".searchform-cancel").on("click",function(){
		$(".ui-menu-fixed .m-header .search input[name='keyword']").val('').trigger('keyup');	
	}),
	$(".ui-search-form").on("submit",function(){
		return DoSearch($(this));
	}),
	$(".search-submit").on("click",function(){
		var $frm = $(this).parents("form"); 
		$frm.submit();
		return false;
	});	
}