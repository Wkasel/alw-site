/**
 * Nice Form js, jQuery 
 * @author "cedage"
 * @padLR          - устанавливает левый и правый padding для элементов выпадающего списка
 * @padTB          - устанавливает верхний и нижний padding для элементов выпадающего списка
 * @leftImg        - путь к части изображения@@@
 * @styledColor    - цвет текста выбранного елемента (шапка выпадающего списка)
 * @checkedBg      - background шапки выпадающего списка@@@
 * @checkedLeftImgUrl - background указателя в левой части checked@@@
 * @color          - optons color@@@
 * @bg             - optons background@@@
 * @@@ -  значение может быть как цвет #fff... так и изображение url(../img/blabla.jpg) repeat...
 **/
var options = {
	padLR : 5,
	padTB : 6,
	styledColor : "#fff",
	checkedBg : "url(/source/images/nf/sel_checked_bg.jpg) repeat-x",
	checkedLeftImgUrl : "/source/images/nf/sel_left.jpg",
	checkedRightImg : "url(/source/images/nf/sel_right.jpg) no-repeat top right",
	checkedFontSize : "13px",
	checkedFontWeight : "bold",
	color : "#fff",
	bg : "#333",
	maxHeight : 200,
	minWidth  : 200,
	top : 27,
	hoverBg : "#7e7e7e",
	zIndex : 50
}
var nf = {
	init:function(){
		$("input").each(function(){
			$t = $(this);
			if($t.is(":radio") || $t.is(":checkbox") && $t.hasClass("styled")){
				nf.radioCheck($t);
			}
		});
		$("select").each(function(){
			$t = $(this);
			if($t.hasClass("styled")){
				nf.select($t);
			}
		});
		nf.setEv();
	},
	radioCheck : function(o){
	//Check for element checked
		var spanBgPos = "0 0";
		var disabled = false;
		if(o.is(":checked")){
			spanBgPos = "0 -30px";
		}
		if(o.is(":disabled")){
			disabled = true;
			spanBgPos = "0 -45px";
		}
		var img = "ch.jpg";
		if(o.is(":radio")){
			img = "r.jpg";
		}
	//Create span and set mouse events
		var span = "<span style='width:15px; height:15px; display:block; background:url(img/nf/"+img+") "+spanBgPos+"; float:left; position:relative; top:1px; left:3px;'></span>";
		$(span).appendTo(o.parent())
		.mousedown(
			function(){
				if(disabled == true) return false;
				$(this).css("backgroundPosition", "0 -15px");
			}
		)
		.mouseup(
			function(){
				if(disabled == true) return false;
			//Radio
				if(o.is(":radio")){
					var name = $(this).prev().attr("name");
					$("input[name="+name+"]").not(":disabled").next().css("backgroundPosition", "0 0");
					$(this).css("backgroundPosition", "0 -30px");
					$(this).prev().attr("checked", "checked");
			//Checkbox
				}else if(o.is(":checkbox")){
					if($(this).prev().is(":checked")){
						$(this).css("backgroundPosition", "0 0");
						$(this).prev().removeAttr("checked");
					}else{
						$(this).css("backgroundPosition", "0 -30px");
						$(this).prev().attr("checked", "checked");
					}
				}
			}
		);
		o.hide();
		o.prev().css("float","left");
		o.parent().addClass("clearfix");
	},
	select : function(o){
		var $float = "";
	//Check label
		if(o.prev().is("label")){
			o.parent().addClass("clearfix");
			o.prev().css("float", "left");
			$float = "float:left;";
		}
	//Check width
		if(o.width() == 0){
			options.width = options.minWidth;
		}else{
			options.width = o.width();
		}
		var div = "<div class='select_styled' style='width:"+options.width+"px; position:relative; color:"+options.styledColor+"; "+$float+"'>";
			var checkedLeftImg = "";
			if(options.checkedLeftImgUrl != "") checkedLeftImg = "<img style='float:left;' src='"+options.checkedLeftImgUrl+"' />";
			if($("option:selected", o)){
				div += "<div class='checked clearfix' style='padding:0; cursor:pointer; background:"+options.checkedBg+"; font-size:"+options.checkedFontSize+"; font-weight:"+options.checkedFontWeight+";'>"+checkedLeftImg+"<div style='padding:"+options.padTB+"px "+options.padLR+"px; background:"+options.checkedRightImg+";'>"+$("option:selected", o).text()+"</div></div>";
			}else{
				div += "<div class='checked clearfix' style='padding:0; cursor:pointer; background:"+options.checkedBg+";'>"+checkedLeftImg+"<div style='padding:"+options.padTB+"px "+options.padLR+"px; background:"+options.checkedRightImg+";'>"+$("option:first-child", o).text()+"</div></div>";
			}
			div += "<div style='width:"+options.width+"px; display:none; position:absolute; left:0; top:"+options.top+"px; z-index:"+options.zIndex+"; color:"+options.color+"; background:"+options.bg+"; overflow:auto; max-height:"+options.maxHeight+"px;' class='options'>";
				$("option", o).each(function(){
					if($(this).val() != ""){
						div += "<div id='index_"+$(this).index()+"' style='padding:"+options.padTB+"px "+options.padLR+"px; cursor:pointer;'>"+$(this).text()+"</div>";
					}
				});
			div += "</div>";
			div += "</div>";
		$(div).appendTo(o.parent());
		o.hide();
		options.zIndex--;
	},
	setEv : function(){
	//Set checked click
		$(".select_styled .checked").live("click",
			function(){
				if($(this).next().css("display") == "block"){
					$(this).next().slideUp(150);
				}else{
					$(this).next().slideDown(150);
				}
				
			}
		);
		$(".select_styled").mouseleave(function(){
			if($(".options", this).css("display") == "block"){
				var $this = this;
				$(".options", $this).slideUp(150);
			}
		});
	//Check option
		$(".options div").live("click",
		function(){
			str = $(this).attr("id");
			str = str.replace(/index_/g, "");
			var parent = $(this).parent().parent();
			var select = $(parent).prev();
			$(".checked div", parent).text($(this).text());
			$(this).parent().slideUp(150);
			$("option", select).eq(str).attr("selected", "selected");
			$(select).change();
		});
	//Hover option
		$(".options div").live("mouseover",
			function(){
				$(this).css({background:options.hoverBg});
			}
		);
		$(".options div").live("mouseout",
			function(){
				$(this).css({background:"none"});
			}
		);
	}
}
$(function(){
	nf.init()
});