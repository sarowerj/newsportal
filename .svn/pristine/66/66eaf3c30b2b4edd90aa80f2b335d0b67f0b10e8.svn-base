

jQuery(document).ready(function() {
	jQuery("body").append("<div class='demo-settings'></div>");
	jQuery(".demo-settings").append("<a href='#show-settings' class='demo-button'><span class='icon-text'>&#9881;</span>Settings</a>");
	jQuery(".demo-settings").append("<div class='demo-options'>"+
										"<div class='title'>Demo Settings</div>"+
										"<a href='#demo' rel='color-options' class='option'><img src='images/demo/image-2.png' class='demo-icon' alt='' /><span>Color Options</span><font>Color schemes</font></a>"+
										"<div class='option-box' rel='color-options'>"+
											"<div alt='color-scheme'>"+
												"<b class='sub-title'>Main Color Scheme</b>"+
												"<a href='#' class='color-bulb active' style='background: #264c84;'>&nbsp;</a>"+
												"<a href='#' class='color-bulb' style='background: #c71616;'>&nbsp;</a>"+
												"<a href='#' class='color-bulb' style='background: #98b71b;'>&nbsp;</a>"+
												"<a href='#' class='color-bulb' style='background: #d4671e;'>&nbsp;</a>"+
												"<a href='#' class='color-bulb' style='background: #961ed4;'>&nbsp;</a>"+
											"</div>"+
										"</div>"+
										"<div class='option-box sequal' rel='color-options'>"+
											"<div alt='link-colors'>"+
												"<b class='sub-title'>Links Color</b>"+
												"<a href='#' class='color-bulb active' style='background: #264c84;'>&nbsp;</a>"+
												"<a href='#' class='color-bulb' style='background: #c71616;'>&nbsp;</a>"+
												"<a href='#' class='color-bulb' style='background: #98b71b;'>&nbsp;</a>"+
												"<a href='#' class='color-bulb' style='background: #d4671e;'>&nbsp;</a>"+
												"<a href='#' class='color-bulb' style='background: #961ed4;'>&nbsp;</a>"+
											"</div>"+
										"</div>"+
										"<div class='option-box sequal' rel='color-options'>"+
											"<div alt='star-colors'>"+
												"<b class='sub-title'>Rating Stars Color</b>"+
												"<a href='#' class='color-bulb active' style='background: #E75835;'>&nbsp;</a>"+
												"<a href='#' class='color-bulb' style='background: #c71616;'>&nbsp;</a>"+
												"<a href='#' class='color-bulb' style='background: #98b71b;'>&nbsp;</a>"+
												"<a href='#' class='color-bulb' style='background: #264c84;'>&nbsp;</a>"+
												"<a href='#' class='color-bulb' style='background: #961ed4;'>&nbsp;</a>"+
											"</div>"+
										"</div>"+
										"<a href='#demo' rel='background' class='option'><img src='images/demo/image-3.png' class='demo-icon' alt='' /><span>Background</span><font>Backgorund textures</font></a>"+
										"<div class='option-box' rel='background'>"+
											"<div alt='background'>"+
												"<b class='sub-title'>Background Texture</b>"+
												"<a href='#' class='color-bulb active' style='background: url(images/background-texture-1.jpg);'>&nbsp;</a>"+
												"<a href='#' class='color-bulb' style='background: url(images/background-texture-2.jpg);'>&nbsp;</a>"+
												"<a href='#' class='color-bulb' style='background: url(images/background-texture-3.jpg);'>&nbsp;</a>"+
												"<a href='#' class='color-bulb' style='background: url(images/background-texture-4.jpg);'>&nbsp;</a>"+
												"<a href='#' class='color-bulb' style='background: url(images/background-texture-5.jpg);'>&nbsp;</a>"+
												"<a href='#' class='color-bulb' style='background-image: url(images/background-photo-1.jpg);background-size: 100%; background-attachment: fixed; background-position: 50% 50%; background-repeat: repeat repeat;'>&nbsp;</a>"+
												"<a href='#' class='color-bulb' style='background-image: url(images/background-photo-2.jpg);background-size: 100%; background-attachment: fixed; background-position: 50% 50%; background-repeat: repeat repeat;'>&nbsp;</a>"+
												"<a href='#' class='color-bulb' style='background-image: url(images/background-photo-3.jpg);background-size: 100%; background-attachment: fixed; background-position: 50% 50%; background-repeat: repeat repeat;'>&nbsp;</a>"+
												"<a href='#' class='color-bulb' style='background-image: url(images/background-photo-4.jpg);background-size: 100%; background-attachment: fixed; background-position: 50% 50%; background-repeat: repeat repeat;'>&nbsp;</a>"+
												"<a href='#' class='color-bulb' style='background-image: url(images/background-photo-5.jpg);background-size: 100%; background-attachment: fixed; background-position: 50% 50%; background-repeat: repeat repeat;'>&nbsp;</a>"+
											"</div>"+
										"</div>"+
										"<div class='option-box sequal' rel='background'>"+
											"<div alt='background'>"+
												"<b class='sub-title'>Background Color</b>"+
												"<a href='#' class='color-bulb' style='background: #3c1805;'>&nbsp;</a>"+
												"<a href='#' class='color-bulb' style='background: #525510;'>&nbsp;</a>"+
												"<a href='#' class='color-bulb' style='background: #19686E;'>&nbsp;</a>"+
												"<a href='#' class='color-bulb' style='background: #682E88;'>&nbsp;</a>"+
												"<a href='#' class='color-bulb' style='background: #A72222;'>&nbsp;</a>"+
											"</div>"+
										"</div>"+
										"<a href='#demo' rel='page-width' class='option'><img src='images/demo/image-4.png' class='demo-icon' alt='' /><span>Change Width</span><font>Boxed or Full-Width</font></a>"+
										"<div class='option-box' rel='page-width'>"+
											"<div alt='option-box'>"+
												"<b class='sub-title'>Switch Page Width</b>"+
												"<a href='#' class='option-bulb active' rel='full'>Full-Width</a>"+
												"<a href='#' class='option-bulb' rel='boxed'>Boxed-Width</a>"+
											"</div>"+
										"</div>"+
									"</div>");
	
	jQuery(".demo-settings a[href=#demo]").click(function(){
		var thiselem = jQuery(this);
		thiselem.parent().find("div[rel="+thiselem.attr("rel")+"]").toggle();
		return false;
	});
	
	jQuery(".option-box div .color-bulb").click(function(){
		var thiselem = jQuery(this);
		var newcolor = thiselem.css("background-color");
		thiselem.siblings().removeClass("active");
		thiselem.addClass("active");

		if(thiselem.parent().attr("alt") == "color-scheme"){
			jQuery(".content-article-title").css("color",newcolor).css("border-bottom", "4px solid "+newcolor);
			jQuery(".breaking-news .breaking-title, .breaking-news .breaking-controls, .main-content-right .panel h3, .content-panel .panel-header b, .page-pager > span, .page-pager > a:hover, .shortcode-content .spacer-break-2, .shortcode-content .spacer-break-3, .shortcode-content .spacer-break-4, .shortcode-content table thead, .shortcode-content .accordion > div > a, .content .filter a.active, .article-array li:before").css("background-color",newcolor);
		}else
		if(thiselem.parent().attr("alt") == "link-colors"){
			jQuery(".content a, .footer a").css("color",newcolor);
		}else
		if(thiselem.parent().attr("alt") == "star-colors"){
			jQuery(".article-rating .icon-text.active").css("color",newcolor);
		}

		return false;
	});
	
	jQuery(".option-box div .color-bulb").click(function(){
		var thiselem = jQuery(this);
		var newcolor = thiselem.css("background");
		thiselem.siblings().removeClass("active");
		thiselem.addClass("active");

		if(thiselem.parent().attr("alt") == "background"){
			jQuery("body").css("background", newcolor);
		}

		return false;
	});
	
	jQuery(".option-box div .font-bulb").click(function(){
		var thiselem = jQuery(this);
		var newfont = thiselem.css("font-family");
		thiselem.siblings().removeClass("active");
		thiselem.addClass("active");

		if(thiselem.parent().attr("alt") == "font-options"){
			jQuery(".widget-event .event-wdget-date, .accordion > div > a, .menu-cart .subtotal .subtotal-amount, .menu-cart > div i, .menu-cart strong, h1, h2, h3, h4, h5, h6, .content .main-title span, .coupon .coupon-content b, .widget ul li a, .user-nick a, .user-nick i, #wp-calendar caption, .widget-product .product-content span.price, .price-range-content #amount").css("font-family", newfont);
		}else
		if(thiselem.parent().attr("alt") == "font-menu"){
			jQuery(".main-menu ul li > a").css("font-family", newfont);
		}

		return false;
	});
	
	jQuery(".option-box div .option-bulb").click(function(){
		var thiselem = jQuery(this);
		var newsize = thiselem.attr("rel");
		thiselem.siblings().removeClass("active");
		thiselem.addClass("active");

		if(thiselem.parent().attr("alt") == "option-box"){
			if(newsize == "boxed"){
				jQuery(".boxed").addClass("active");
			}else
			if(newsize == "full"){
				jQuery(".boxed").removeClass("active");
			}
		}

		return false;
	});
	
	jQuery(".demo-settings").mouseleave(function(){
		var thiselem = jQuery(this);
		thiselem.removeClass("active");
		return false;
	});
	
	jQuery(".demo-settings .demo-button").click(function(){
		jQuery(".demo-settings").addClass("active");
		return false;
	});
});

