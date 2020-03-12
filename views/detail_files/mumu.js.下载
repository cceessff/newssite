//gg
 function AutoScroll(obj) {
            $(obj).find("ul:first").animate({
                marginTop: "-20px"
            }, 700, function () {
                $(this).css({ marginTop: "0px" }).find("li:first").appendTo(this);
            });
        }
$(document).ready(function(){
//gg
	var ggUL = $(".gg_ul li").length;
	if(ggUL>1){
		 var myar = setInterval('AutoScroll(".gg_ul")', 5000);
            //当鼠标放上去的时候，滚动停止，鼠标离开的时候滚动开始
            $(".gg_ul").hover(function () { clearInterval(myar); }, function () { myar = setInterval('AutoScroll(".gg_ul")', 5000) });
	}
//nav scroll
	var topMain=$(".top-box").outerHeight(true);
	var nav=$(".nav-m");
	$(window).scroll(function(){
		setInterval(function() {
			if ($(window).scrollTop()>topMain  && $(window).width()>768 ){
				nav.addClass("navbar-fixed-top");
			}else{
				nav.removeClass("navbar-fixed-top");
			}
			
			if ($(window).scrollTop()>100){
				$("#f-top").fadeIn(800);
			}else{
				$("#f-top").fadeOut(800);
			}
		}, 100);
		
	});
	window.onload = function(){
		$(window).trigger('scroll');
	};
	$(window).resize(function(){
		$(window).trigger('scroll');
	});
	
	$(".nav-s i").click(function(){
		$(".nav-ss").slideToggle();
	});
	
	
	if($(window).width()>980){
		$(".post-left h3 a").click(function(){
			$(this).html("页面正在加载，请稍候...");
		});
	}
//tooltip
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	})
	$(".tTop").click(function(){$("html,body").animate({scrollTop: "0px"}, 600)});
//标签云
$(".tagcloud a").hover(function(){
		var tagColor =$(this).css("color");
		$(this).css({"color":"#ffffff","background-color":tagColor});
		$(this).attr("name",tagColor);
	},function(){
		var tagColor =$(this).attr("name");
		$(this).css({"color":tagColor,"background-color":""});
	})

//关闭进度条
setTimeout(function(){jQuery("#loading").fadeOut(500)},10000);
//灯箱
$(".single-con").find("img").parent().attr("data-lightbox","roadtrip");
//图片延迟加载
$(function() {
      $("img.lazy").lazyload({effect: "fadeIn"});
  });
//--
	var my_buy_mum = Number($("#mu_views").html())+10000;
	$("#mu_buy_num").html(my_buy_mum);
})

