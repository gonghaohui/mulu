if(lo.indexOf('上海') >= 0 || lo.indexOf('北京') >= 0) {

} else {
	if($('.main').length){
		var quzhaitlIndex="<div class='wrap'><div style='color:#de1e30;display: inline-block;font-size:12px;width:1080px;height:60px;margin-top:15px;margin-bottom:-5px;position:relative'><a href='http://www.123xm.com' target='_blank' style='color:#de1e30;margin:0;'><img src='/~static/www/img/gg/1.png' style='width:100%;height:100%;display:block'></a><p style='position:absolute;right:0;top:0;background:rgba(0,0,0,0.8);color:#fff;font-size:12px;width:40px;height:24px;line-height:24px;text-align:center'>广告</p></div></div>";
		$('.main').before(quzhaitlIndex);
	}
}

