<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.7/jquery-ui.js"></script>
<script type="text/javascript" src="/source/js/jScrollPane.js"></script>
<script type="text/javascript">
{literal}
(function($) {

	$.fn.scrollAnimate = function(params) {

		params = $.extend({ startFromElement: false, 
                        scrollType: 'vertical', 
                        startScroll: 0, 
                        endScroll: 0, 
                        cssProperty: '', 
                        before: 0, 
                        after: 0,
                        backgroundimgLeft:'',
                        backgroundimgRight:'' }, params);

		var scrollRange = params.endScroll - params.startScroll;

		var element = $(this);

		// create objects literal and assign the variable property for before and after
		var cssArgsBefore = {};
		cssArgsBefore[params.cssProperty] = params.before;
		var cssArgsAfter = {};
		cssArgsAfter[params.cssProperty] = params.after;

		// setup startFromElement
		if(params.startFromElement) {

			startingElement = $(params.startFromElement);

			startingElementOffset = startingElement.offset();
			startingElementOffsetTop = startingElementOffset.top;
			startingElementOffsetLeft = startingElementOffset.left;

			var windowWidth = $(window).width();
			var windowHeight = $(window).height();

			var scrollFromTop = startingElementOffsetTop - windowHeight;
			var scrollFromLeft = startingElementOffsetLeft - windowWidth;

			$(window).bind('resize', function() {

				windowWidth = $(window).width();
				windowHeight = $(window).height();

				scrollFromTop = startingElementOffsetTop - windowHeight;
				scrollFromLeft = startingElementOffsetLeft - windowWidth;

			});

		}

		// setup css3 transform
		if(params.cssProperty == 'transform') {

			// set css3 transform webkit and moz fallbacks
			cssArgsBefore['-webkit-transform'] = params.before;
			cssArgsAfter['-webkit-transform'] = params.after;
			cssArgsBefore['-moz-transform'] = params.before;
			cssArgsAfter['-moz-transform'] = params.after;

			// get int from css3 transform rotate and skew
			if(params.before.indexOf('deg') != -1) {

				var before = params.before.split('(');
				before = before[1].split('deg');
				before = parseFloat(before[0]);

				var after = params.after.split('(');
				after = after[1].split('deg');
				after = parseFloat(after[0]);

			} else

			// get int from css3 transform scale
			if(params.before.indexOf('scale') != -1) {

				var before = params.before.split('(');
				before = before[1].split(')');
				before = parseFloat(before[0]);

				var after = params.after.split('(');
				after = after[1].split(')');
				after = parseFloat(after[0]);

			}

		}

		var currentCss = {};

		this.each(function() {

			scrollAnimate();

			$(window).bind('scroll', function() {
			    scrollAnimate();

			});
			function scrollAnimate() {
				if(params.scrollType == 'vertical') {

					var scroll = $(window).scrollTop();

					if(params.startFromElement) {

						scroll = scroll - scrollFromTop;

					}

				} else if(params.scrollType == 'horizontal') {

					var scroll = $(window).scrollLeft();

					if(params.startFromElement) {

						scroll = scroll - scrollFromLeft;

					}

				}

				var scrollPercentage = (scroll - params.startScroll) / scrollRange;

				if(scroll < params.startScroll) {

					element.css(cssArgsBefore);

				} else if(scroll > params.endScroll) {

					element.css(cssArgsAfter);

				} else {

					if(params.cssProperty == 'transform') {

						var currentTransformValue = before + (after - before) * scrollPercentage;

						if(params.before.indexOf('rotate') != -1)
							var currentTransform = 'rotate(' + currentTransformValue + 'deg)';

						else if(params.before.indexOf('skew') != -1)
							var currentTransform = 'skew(' + currentTransformValue + 'deg)';

						else if(params.before.indexOf('scale') != -1)
							var currentTransform = 'scale(' + currentTransformValue + ')';

						currentCss[params.cssProperty] = currentTransform;
						currentCss['-moz-transform'] = currentTransform;
						currentCss['-webkit-transform'] = currentTransform;

						element.css(currentCss);

					} else  {
  						currentCss[params.cssProperty] = params.before + (params.after - params.before) * scrollPercentage;
  						element.css(currentCss);
              if(params.cssProperty == 'left' && params.backgroundimgLeft != "" && scroll == params.startScroll) {
                 element.css('background-image', params.backgroundimgLeft);  
              } 
              if(params.cssProperty == 'left' && params.backgroundimgRight != "" && scroll == params.endScroll) {
                 element.css('background-image', params.backgroundimgRight);  
              }
  					}

				}

			}

		});

		return this;
	};

})(jQuery);
$(document).ready(function() { 
  var mytop = $('.quickship_top').offset().top;
//   $(window).scroll(function (event) {
//       var y = $(this).scrollTop();
//       if (y >= mytop) {
//         $('.quickship_top').css('position','fixed');
//         $('.quickship_top').css('top','0');
//       } else {
//         $('.quickship_top').css('position','');
//         $('.quickship_top').css('top','');
//       }
//     });
  $('.quickship_scroll_red').scrollAnimate({
		startScroll: 150,
    endScroll: 2550,
		cssProperty: 'height',
		before: 0,
		after: 2990
	});
  $('.quickship_truck').scrollAnimate({
		startScroll: 270,
    endScroll: 650,
		cssProperty: 'left',
		before: 420,
		after: 650,
    backgroundimgLeft: 'url("/source/images/quickship_truck_leer.png")',
    backgroundimgRight: 'url("/source/images/quickship_truck_full.png")'
	});
  $('.quickship_van').scrollAnimate({
		startScroll: 650,
    endScroll: 800,
		cssProperty: 'left',
		before: 420,
		after: 300
	});
  $('.quickship_date7').scrollAnimate({
		startScroll: 650,
    endScroll: 651,
		cssProperty: 'opacity',
		before: 1,
		after: 0
	});  
  $('.quickship_date6').scrollAnimate({
		startScroll: 680,
    endScroll: 681,
		cssProperty: 'opacity',
		before: 1,
		after: 0
	});  
   $('.quickship_date5').scrollAnimate({
		startScroll: 730,
    endScroll: 731,
		cssProperty: 'opacity',
		before: 1,
		after: 0
	});  
   $('.quickship_date4').scrollAnimate({
		startScroll: 779,
    endScroll: 780,
		cssProperty: 'opacity',
		before: 1,
		after: 0
	}); 
   $('.quickship_date3').scrollAnimate({
		startScroll: 830,
    endScroll: 831,
		cssProperty: 'opacity',
		before: 1,
		after: 0
	}); 
   $('.quickship_date2').scrollAnimate({
		startScroll: 880,
    endScroll: 881,
		cssProperty: 'opacity',
		before: 1,
		after: 0
	}); 
  $('.quickship_flag').scrollAnimate({
		startScroll: 950,
    endScroll: 1270,
		cssProperty: 'opacity',
		before: 0,
		after: 1
	});
  
  $('.quickship_map_red').scrollAnimate({
		startScroll: 950,
    endScroll: 1270,
		cssProperty: 'opacity',
		before: 0,
		after: 1
	}); 

  $('.quickship_lamp_black').scrollAnimate({
		startScroll: 1260,
    endScroll: 1350,
		cssProperty: 'left',
		before: 170,
		after: 161
	}); 
  $('.quickship_lamp_red').scrollAnimate({
		startScroll: 1330,
    endScroll: 1331,
		cssProperty: 'opacity',
		before: 0,
		after: 1
	}); 
  $('.quickship_lamp_black').scrollAnimate({
		startScroll: 1320,
    endScroll: 1530,
		cssProperty: 'height',
		before: 310,
		after: 0
	}); 
  $('.quickship_lamp_light').scrollAnimate({
		startScroll: 1400,
    endScroll: 1530,
		cssProperty: 'opacity',
		before: 0,
		after: 1
	});
  $('.quickship_assembly2').scrollAnimate({
		startScroll: 1550,
    endScroll: 1551,
		cssProperty: 'opacity',
		before: 0,
		after: 1
	}); 
  $('.quickship_assembly3').scrollAnimate({
		startScroll: 1630,
    endScroll: 1631,
		cssProperty: 'opacity',
		before: 0,
		after: 1
	});    
  $('.quickship_assembly4').scrollAnimate({
		startScroll: 1770,
    endScroll: 1771,
		cssProperty: 'opacity',
		before: 0,
		after: 1
	}); 
  $('.quickship_tools2').scrollAnimate({
		startScroll: 1800,
    endScroll: 1805,
		cssProperty: 'opacity',
		before: 0,
		after: 1
	});
  $('.quickship_tools2').scrollAnimate({
		startScroll: 1860,
    endScroll: 2000,
		cssProperty: 'left',
		before: 90,
		after: 240
	});
  $('.quickship_tools2').scrollAnimate({
		startScroll: 1900,
    endScroll: 2100,
		cssProperty: 'top',
		before: 120,
		after: 250
	});   
  $('.quickship_tools3').scrollAnimate({
		startScroll: 1750,
    endScroll: 1755,
		cssProperty: 'opacity',
		before: 0,
		after: 1
	});  
  $('.quickship_tools3').scrollAnimate({
		startScroll: 1955,
    endScroll: 2100,
		cssProperty: 'top',
		before: 180,
		after: 280
	});
  $('.quickship_tools4').scrollAnimate({
		startScroll: 1840,
    endScroll: 1855,
		cssProperty: 'opacity',
		before: 0,
		after: 1
	});
  $('.quickship_tools4').scrollAnimate({
		startScroll: 1860,
    endScroll: 1900,
		cssProperty: 'left',
		before: 160,
		after: 280
	});
  $('.quickship_tools4').scrollAnimate({
		startScroll: 1850,
    endScroll: 2100,
		cssProperty: 'top',
		before: 160,
		after: 360
	});
  $('.quickship_tools5').scrollAnimate({
		startScroll: 1840,
    endScroll: 1845,
		cssProperty: 'opacity',
		before: 0,
		after: 1
	});
  $('.quickship_tools5').scrollAnimate({
		startScroll: 1845,
    endScroll: 2000,
		cssProperty: 'left',
		before: 160,
		after: 250
	});
  $('.quickship_tools5').scrollAnimate({
		startScroll: 1930,
    endScroll: 2100,
		cssProperty: 'top',
		before: 170,
		after: 340
	});
  $('.quickship_tools6').scrollAnimate({
		startScroll: 1860,
    endScroll: 1865,
		cssProperty: 'opacity',
		before: 0,
		after: 1
	});
  $('.quickship_tools6').scrollAnimate({
		startScroll: 1865,
    endScroll: 2080,
		cssProperty: 'left',
		before: 200,
		after: 290
	});
  $('.quickship_tools6').scrollAnimate({
		startScroll: 1930,
    endScroll: 2100,
		cssProperty: 'top',
		before: 160,
		after: 310
	});
 $('.quickship_design_photo2').scrollAnimate({
		startScroll: 2200,
    endScroll: 2500,
		cssProperty: 'top',
		before: 340,
		after: 150
	});  
 $('.quickship_design_photo1').scrollAnimate({
		startScroll: 2200,
    endScroll: 2500,
		cssProperty: 'top',
		before: 155,
		after: 340
	});        
});
{/literal}
</script> 
<div class="quickship_top" style="position:relative">
  <div style="position:absolute;top:px;">
  <img alt="" src="/source/images/toplogo_quickship.jpg">
  </div>
  <div style="top:80px; position:absolute; left:300px">
  <p >NO MORE WAITING. MEET CONSTRUCTION DEADLINES WITH</p>
  <p style="font-size:65px;font-weight:bold">QUICK SHIP</p>
  </div>
</div>
<div class="quickship_scroll_black">     
<!--- <div style="z-index:99;position:absolute; top:420px; left:440px; color:#000000">Meet Construction deadlines</div> -->
<div class="quickship_warehouse">
 <div style="display:block; padding-top:50px; padding-right:180px;text-align: center;">
     <p class="quickship_fontbig">IN STOCK &</p>
     <p class="quickship_fontbig">READY TO SHIP</p>
     Pre-assembled and ready to install
  </div>
</div>
<div class="quickship_truck">
</div>
<div class="quickship_truck_full">
</div>
<div class="quickship_date">
 <div style="display:block; padding-top:50px; padding-left:250px;text-align: center;">
     <p class="quickship_fontbig">5-7 DAYS</p>
     <p class="quickship_fontbig">TURN AROUND</p>
     Keep projects on time and <br />running smoothly
  </div>
 <div class="quickship_date1"></div>
 <div class="quickship_date2"></div>
 <div class="quickship_date3"></div>
 <div class="quickship_date4"></div>
 <div class="quickship_date5"></div>
 <div class="quickship_date6"></div>
  <div class="quickship_date7"></div>
</div>
<div class="quickship_van">
</div>
<div class="quickship_map_black">
 <div style="display:block; padding-right:430px;text-align: center;">
     <p class="quickship_fontbig">CANADA</p>
     <p class="quickship_fontbig">READY</p>
     Complete with Canadian Quick Connect Hardware
  </div>
  <div class="quickship_flag"></div>
</div>
<div class="quickship_map_red">
</div>
<div class="quickship_lamp">
  <div style="display:block; padding-top:85px; padding-left:355px; text-align: center;">
     <p class="quickship_fontbig">PLUG & PLAY</p>
     Simple 'plug and play' quick connect technology
  </div>
</div>
<div class="quickship_lamp_red">
</div>
<div class="quickship_lamp_black">
</div>
<div class="quickship_lamp_light">
</div>
<div class="quickship_assembly">
   <div style="display:block; padding-right:300px;text-align: center;">
     <p class="quickship_fontbig">ASSEMBLY</p>
     Units can be individual (stand-alone), or easily connected for continuous row mounting in field 
  </div>
  <div class="quickship_assembly1">
  </div>
  <div class="quickship_assembly2">
  </div>
  <div class="quickship_assembly3">
  </div> 
  <div class="quickship_assembly4">
  </div>   
</div>
<div class="quickship_tools">
  <div style="display:block; padding-top:105px; padding-left:340px; text-align: center;">
     <p class="quickship_fontbig">TOOLS</p>
     All Installation Hardware Included, Lens removal tool, philips screwdriver, Joiner hardware 
  </div>
  <div class="quickship_tools2">
  </div> 
  <div class="quickship_tools3">
  </div> 
  <div class="quickship_tools4">
  </div> 
  <div class="quickship_tools5">
  </div> 
  <div class="quickship_tools6">
  </div> 
</div>
<div class="quickship_design">
   <div style="display:block; padding-right:300px;padding-top:30px;text-align: center;">
     <p class="quickship_fontbig">DESIGN</p>
     <div style="display:block;padding-left:40px;padding-top:10px;text-align: left;">
     <ul>
      <li class="quickship_liste">Durable powdercoat paint finish</li>
      <li class="quickship_liste">High Perfomance reflectors for maximum light output and minimal lamp image</li>
     <ul>
     </div>
     <div style="display:block;padding-left:40px;text-align: left;width:160px;">
     <ul>
      <li class="quickship_liste">Satin White Opal diffusers</li>
      <li class="quickship_liste">Complete with Canadian Quick Connect Hardware</li>
     </ul>
    </div>
  </div>
  <div class="quickship_design_photo1">
  </div> 
  <div class="quickship_design_photo2">
  </div>   
  <div class="quickship_design_photo3">
  </div>
</div>
<div class="quickship_scroll_red">
</div>
<a href="http://www.archltgworks.com/content/quick_ship/">
<div class="quickship_end_red">
<div style="padding-top:18px;"><strong>VIEW QUICK SHIP PRODUCTS</strong></div>
</div>
<a>
</div>