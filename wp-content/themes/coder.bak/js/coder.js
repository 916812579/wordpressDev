var mainNav = $("#main-navigation");
var mainNavTop = mainNav.offset().top;
window.onscroll = function() {
	var topScroll = getScrollTop();
	if (topScroll >= mainNavTop) {
		mainNav.css("margin-top", "0px")
		mainNav.addClass("navbar-fixed-top");
		mainNav.addClass("fix_nav");
	} else {
		mainNav.css("margin-top", "2em")
		mainNav.removeClass("navbar-fixed-top");
		mainNav.removeClass("fix_nav");
	}
}

function getScrollTop() {  
    var scrollPos;  
    if (window.pageYOffset) {  
    scrollPos = window.pageYOffset; }  
    else if (document.compatMode && document.compatMode != 'BackCompat')  
    { scrollPos = document.documentElement.scrollTop; }  
    else if (document.body) { scrollPos = document.body.scrollTop; }   
    return scrollPos;   
} 

$(document).ready(function(){
	 // 文字滚动
	 $(".scrollDiv").textSlider({
	     line:1,
	     speed:600,
	     timer:6000
	 });
	 
	  $("#fontsize li").click(function() {
		  	var text = $(this).text();
		  	if (text == "A+") {
		  		$(this).text("A-");
		  		$("html").addClass("bigHtml");
		  	} else {
		  		$(this).text("A+");
		  		$("html").removeClass("bigHtml");
		  	}
	  });
	  
	  $('.scroll-h').click(function(){
          $('html,body').animate({scrollTop:0},'slow');
      });

	  $('.scroll-b').click(function(){
		  var h = $(document).height()-$(window).height();
          $('html,body').animate({scrollTop:h},'slow');
      });
	  
	  $("pre").addClass("brush:bash;gutter:true;");
	  
});

function pr() {
	var sidebar = $(".sidebar");
	var content = $(".main-content");
	if (sidebar.is(":hidden")) {
		content.removeClass("main-content_full");
		sidebar.show();
	} else {
		sidebar.hide();
		content.addClass("main-content_full");
	}
}

function printme() {
	global_Html = document.body.innerHTML;
	document.body.innerHTML = document.getElementById('primary').innerHTML;
	window.print();
	window.setTimeout(function() {
		document.body.innerHTML = global_Html;
	}, 500);
}

 