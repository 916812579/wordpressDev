
function highlightText(selector, cls) {
     var eles =  $(selector);
	 if (eles) {
	    for (var i = 0; i < eles.length; i++) {
	        var ele = eles[i];
			var styleStr = $(ele).attr('style');
			if (styleStr) {
		        if (styleStr.indexOf("background-color") != -1) {
			        $(ele).addClass(cls);
				}
	        }
	    }	 
	}
}

highlightText(".container-section p span", "hl_text");
