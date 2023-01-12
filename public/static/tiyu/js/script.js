$(function () {
  /*右侧time锚点*/
  $(".content_match_fixed a").click(function () {
    $(this).addClass("active").siblings().removeClass("active");
  });

  /*英超list——tab*/
  $(".corp_list_title ul").each(function () {
    $(this).children("li").eq(0).addClass("hover");
  });
  $(".corp_list_title>ul>li").click(function () {
    var _index = $(this).index();
    $(this).addClass("hover").siblings().removeClass("hover");
    $(this)
      .parent()
      .parent()
      .siblings(".corp_list_sub")
      .children("div")
      .eq(_index)
      .show()
      .siblings()
      .hide();
  });
});

function dateFormat(format, time) {
  if (time) {
    // 时间戳进行转换 否认认为是Date对象
    if (typeof time === "number" || typeof time === "string") {
      time = new Date(time);
    }
  } else {
    time = new Date();
  }
  var o = {
    "m+": time.getMonth() + 1, //month
    "d+": time.getDate(), //day
    "h+": time.getHours(), //hour
    "i+": time.getMinutes(), //minute
    "s+": time.getSeconds(), //second
    "q+": Math.floor((time.getMonth() + 3) / 3), //quarter
    e: time.getMilliseconds(), //millisecond
  };
  if (/(y+)/.test(format)) {
    format = format.replace(
      RegExp.$1,
      (time.getFullYear() + "").substr(4 - RegExp.$1.length)
    );
  }
  for (var k in o) {
    if (new RegExp("(" + k + ")").test(format)) {
      format = format.replace(
        RegExp.$1,
        RegExp.$1.length == 1 ? o[k] : ("00" + o[k]).substr(("" + o[k]).length)
      );
    }
  }
  return format;
}

// 动态添加  获取直播源  js
function addScript(url){
  var script = document.createElement('script');
  script.setAttribute('type','text/javascript');
  script.setAttribute('src',url);
  document.getElementsByTagName('body')[0].appendChild(script);
}



