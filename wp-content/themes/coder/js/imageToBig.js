function getStyle(obj, attr){
	return obj.currentStyle?obj.currentStyle[attr]:getComputedStyle(obj, false)[attr];
}

function startMove(obj, json, onEnd){
	clearInterval(obj.timer);
	obj.timer=setInterval(function (){
		doMove(obj, json, onEnd);
	}, 30);
}
function doMove(obj, json, onEnd){
	var attr='';
	var bStop=true;
	for(attr in json){
		var iCur=0;
		if(attr=='opacity'){
			iCur=parseInt(parseFloat(getStyle(obj, attr))*100);
		}else{
			iCur=parseInt(getStyle(obj, attr));
		}
		var iSpeed=(json[attr]-iCur)/5;
		iSpeed=iSpeed>0?Math.ceil(iSpeed):Math.floor(iSpeed);
		
		if(iCur != json[attr]){
			bStop=false;
		}
		if(attr=='opacity'){
			obj.style.filter='alpha(opacity:'+(iCur+iSpeed)+')';
			obj.style.opacity=(iCur+iSpeed)/100;
		}else{
			obj.style[attr]=iCur+iSpeed+'px';
		}
		if(bStop){
			clearInterval(obj.timer);		
			if(onEnd){
				onEnd();
			}
		}
	}
}

var frameId = "image_to_big_frame";
function createFrame() {
	return $('<div id="' + frameId + '" style="border-radius: 5px;background:#f5f5f5;padding:3px;position:absolute;z-index:200;display:none;filter:alpha(opacity:0);opacity:0;text-align:center;"></div>');
}

function removeFrame() {
	$("#" +　frameId).hide();
	$("#" +　frameId).remove();
}

function imageToBig(images) {
	removeFrame();
	if (images) {
		images.click(function(){
			var frame = createFrame();
			$("body").append(frame);
			var offset = $(this).offset();
			
			var startLeft = offset.left;
			var startTop = offset.top;
			var startWidth = $(this).width();
			var startHeight = $(this).height();
			with(frame[0].style){display = 'block',top = startTop +'px',left = startLeft +'px', width = startWidth +'px',height = startHeight +'px';}
			var src = $(this).attr("src");
			var img = $('<img src="' + src + '"/>');
			frame.html(img);
			frame.width(0);
			frame.height(0);
			var w = img.width();
			var h = img.height();
			var endLeft = parseInt((document.documentElement.clientWidth / 2) - (w /2));			
			var endTop = $(window).height() / 2 - (h /2) + $(document).scrollTop() - 50;
			with(img[0].style){height = width = '100%';}
			var startJson = {opacity:0, left:startLeft, top:startTop, width:startWidth, height:startHeight};
			var endJson = {opacity:100, left:endLeft, top:endTop, width:w, height:h};
			startMove(frame[0],  endJson);
			
			
			
			img.click(function(){
				startMove(frame[0], startJson, function(){
					removeFrame();
				});
			});
		});
	}
}

imageToBig($(".article-content img"));





