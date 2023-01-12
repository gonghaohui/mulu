var display = function(id,plus){
	var img = $("#list_"+id+"_img").attr("src");
	var ul_data = $("#list_"+id).html();
	var isdata = (ul_data.replace(/(^\s*)|(\s*$)/g, "")) ? 1 : 0;
	if(plus == 0){
		var display = $("#list_"+id).css("display");
		if(display == "none"){
			if(isdata == 0) $("#list_"+id).html('<li><p align="center">[暂无]</p></li>');
			$("#list_"+id).css("display", "");
			$("#list_"+id+"_img").attr("src",img.replace(/_yes\.gif/, '_no.gif'));
			$("#list_"+id+"_span").html("");
		}else{
			$("#list_"+id).css("display", "none");
			$("#list_"+id+"_img").attr("src",img.replace(/_no.gif/, '_yes.gif'));
			$("#list_"+id+"_span").html('[暂无]');
		}
	}
	// if(isdata == 0 || plus == 1){
	// 	$.get(_url+'?c=ajax&a=day',{d:id},function(data){
	// 		$("#list_"+id).html(data);
	// 		dispaly_qqtixing();
	// 	});
	// }
}
window.onerror = function(){return true;} 