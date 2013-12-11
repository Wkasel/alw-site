$.fn.slider = function(options){
	var set = {
		w:100,
		h:100
	};
	set = $.extend(set, options);
	var prev = $(".prev", this);
	var checker = $(".checker", this);
	var names = $(".names", this);
	var name = $(".name span", this);
	var interval;
	var elLen = $(".prev img", this).length;
//Set size for slider
	$(this).width(set.w).height(set.h);
//Set first img to visible and first btn to active
	$("img:first-child", prev).addClass("active").show();
	$(".btns ul li:first-child", checker).addClass("active");
//Slide fn
	function slide(){
		interval = setInterval(function(){
			var activeIndex = $(".btns ul li.active", checker).index(); activeIndex++;
		//Check last element
			if(activeIndex == elLen){
				$("img:first-child", prev).addClass("active").show();
				$("img:last-child", prev).fadeOut(750, function(){
					$(this).removeAttr("class");
				});
				$(".btns ul li:first-child", checker).addClass("active");
				$(".btns ul li:last-child", checker).removeAttr("class");
				name.text($("li:first-child", names).text());
			}else{
				var activeImg = $("img.active", prev);
					activeImg.next().fadeIn(750, function(){
						$(this).addClass("active");
						activeImg.removeAttr("class").hide();
					});
				var activeBtn = $(".btns ul li.active", checker);
					activeBtn.next().addClass("active");
					activeBtn.removeAttr("class");
					name.text($("li", names).eq(activeIndex).text());
			}
		}, 3000);
	};
//Click
	$("a", checker).click(function(){
		if(elLen==1)return false;
		clearInterval(interval); interval=false;
		var activeIndex = $(".btns ul li.active", checker).index(); activeIndex++;
		var activeImg = $("img.active", prev);
		var activeBtn = $(".btns ul li.active", checker);
	//Get new index
		var newIndex = $(this).parent().index(); newIndex++;
		if(newIndex > activeIndex){
			$("img", prev).eq(newIndex-1).fadeIn(750, function(){
				$(this).addClass("active");
				activeImg.hide().removeAttr("class");
			});
		}else{
			$("img", prev).eq(newIndex-1).addClass("active").show();
			activeImg.fadeOut(750, function(){
				$(this).removeAttr("class");
			});
		}
		name.text($("li", names).eq(newIndex-1).text());
		$(this).parent().addClass("active");
		activeBtn.removeAttr("class");
		slide();
		return false;
	});
//Start Slide
	if(elLen>1)slide();
}