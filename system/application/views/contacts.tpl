<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.7/jquery-ui.js"></script>
<script type="text/javascript">
{literal}
	$(document).ready(function() {
		$( "#draggable" ).draggable();
		$( "#draggable" ).draggable( "option", "opacity", 0.55 );
		$( "#draggable" ).draggable( "option", "cursor", "pointer");
		 //if close button is clicked  
		 $('.closeBtn').click(function (e) {  
			 //Cancel the link behavior  
			 e.preventDefault();  
			 $('.dragWindow').hide(); 
			if ($('.pimp1').attr("class").indexOf('active') > 0) {
				$('.pimp1').stop().animate({width:"54px",height:"46px",top:"224px",left:"122px"}, 400);
				$('.pimp1').attr("src","/source/images/pimp.png");
				$('.pimp1').removeClass('active');
			}
			if ($('.pimp2').attr("class").indexOf('active') > 0) {
				$('.pimp2').stop().animate({width:"54px",height:"46px",top:"167px",left:"417px"}, 400);
				$('.pimp2').attr("src","/source/images/pimp.png");
				$('.pimp2').removeClass('active');
			}
			if ($('.pimp3').attr("class").indexOf('active') > 0) {
				$('.pimp3').stop().animate({width:"54px",height:"46px",top:"224px"}, 400);
				$('.pimp3').attr("src","/source/images/pimp.png");
				$('.pimp3').removeClass('active');
			}
		 });  
		$('#head').show(); 
		$('#address').html($('#usa').html());
		$('.pimp1').stop().animate({width:"83px",height:"71px",top:"200px",left:"115px"}, 400);
		$('.pimp1').attr("src", "/source/images/pimpBig.png");
		$('.pimp1').addClass('active');
		$('.dragWindow').offset({ top: 160, left: $('.pimp2').offset().left+35 });
	});
	
	$(window).resize(function() {
		$('.dragWindow').offset({ top: 160, left: $('.pimp2').offset().left+35 });
	});

</script>
<script type="text/javascript" src="/source/js/reflection.js"></script>
<script type="text/javascript" src="/source/js/js.js"></script>
<script type="text/javascript" src="/source/js/jScrollPane.js"></script>
<script type="text/javascript">$(function()
{
	$('.scroll-pane').jScrollPane({scrollbarWidth:7, dragMinHeight:36, dragMaxHeight:36, showArrows:true});
});
</script>
<script type="text/javascript">

$(function(){
	$('.pimp1').hover(function(){
			$(this).stop().animate({width:"83px",height:"71px",top:"200px",left:"115px"}, 400);
			$(this).attr("src","/source/images/pimpBig.png");
		},
		function(){
			if ($(this).attr("class").indexOf('active') == -1) {
				$(this).stop().animate({width:"54px",height:"46px",top:"224px",left:"122px"}, 400);
				$(this).attr("src","/source/images/pimp.png");
			}
		});
	$('.pimp2').hover(function(){
			$(this).stop().animate({width:"83px",height:"71px",top:"143px",left:"410px"}, 400);
			$(this).attr("src","/source/images/pimpBig.png");
		},
		function(){
			if ($(this).attr("class").indexOf('active') == -1) {
				$(this).stop().animate({width:"54px",height:"46px",top:"167px",left:"417px"}, 400);
				$(this).attr("src","/source/images/pimp.png");
			}
		});
	$('.pimp3').hover(function(){
			$(this).stop().animate({width:"83px",height:"71px",top:"199px"}, 400);
			$(this).attr("src","/source/images/pimpBig.png");
		},
		function(){
			if ($(this).attr("class").indexOf('active') == -1) {
				$(this).stop().animate({width:"54px",height:"46px",top:"224px"}, 400);
				$(this).attr("src","/source/images/pimp.png");
			}
		});
		
	$('.pimp1').click(function() {
		$(this).addClass('active');
		$('#head').show();
		$('.dragWindow').fadeIn('slow');
// 		$('.dragWindow').offset({ top: 160, left: $('.pimp2').offset().left+35 });
		//$('.dragWindow').offset({ top: 160, left: 365 });
		//$('.dragWindow').offset({ top: 160, left: 350 });
		$('#country').html('NORTH AMERICA');
		$('#address').html($('#usa').html());
		$('.pimp2').removeClass('active');
		$('.pimp3').removeClass('active');
		$( "#dragable" ).draggable( "option", "appendTo", $('.pimp1'));
		$('.pimp2').stop().animate({width:"54px",height:"46px",top:"167px",left:"417px"}, 400);
		$('.pimp2').attr("src","/source/images/pimp.png");
		$('#scr_pane').html($('#usa_team').html());
		$('.scroll-pane').jScrollPane({scrollbarWidth:7, dragMinHeight:36, dragMaxHeight:36, showArrows:true});
		$('.pimp3').stop().animate({width:"54px",height:"46px",top:"224px"}, 400);
		$('.pimp3').attr("src","/source/images/pimp.png");
	});
	
	$('.pimp2').click(function() {
		$(this).addClass('active');
		$('#head').hide();
		$('.dragWindow').fadeIn('slow');
// 		$('.dragWindow').offset({ top: 160, left: $('.pimp2').offset().left+35 });
		//$('.dragWindow').offset({ top: 160, left: 365 });	
		//$('.dragWindow').offset({ top: 182, left: 713 });
		$('#country').html('EUROPE');
		$('#address').html($('#uk').html());
		
		if ($('.pimp1').attr("class").indexOf('active') > 0) {
			$('.pimp1').removeClass('active');
			$('.pimp1').stop().animate({width:"54px",height:"46px",top:"224px",left:"122px"}, 400);
			$('.pimp1').attr("src","/source/images/pimp.png");
		}
		$('#scr_pane').html($('#uk_team').html());
		$('.scroll-pane').jScrollPane({scrollbarWidth:7, dragMinHeight:36, dragMaxHeight:36, showArrows:true});
		$('.pimp3').removeClass('active');
		$('.pimp3').stop().animate({width:"54px",height:"46px",top:"224px"}, 400);
		$('.pimp3').attr("src","/source/images/pimp.png");
	});
	
	$('.pimp3').click(function() {
		$(this).addClass('active');
		$('#head').hide();
		$('.dragWindow').fadeIn('slow');
// 		$('.dragWindow').offset({ top: 160, left: $('.pimp2').offset().left+35 });
		//$('.dragWindow').offset({ top: 160, left: 365 });	
		//$('.dragWindow').offset({ top: 182, left: 903 });
		$('#country').html('ASIA');
		$('#address').html($('#china').html());
		$( "#dragable" ).draggable( "option", "appendTo", $('.pimp3'));
		if ($('.pimp1').attr("class").indexOf('active') > 0) {
			$('.pimp1').removeClass('active');
			$('.pimp1').stop().animate({width:"54px",height:"46px",top:"224px",left:"122px"}, 400);
			$('.pimp1').attr("src","/source/images/pimp.png");
		}
		$('#scr_pane').html($('#china_team').html());
		$('.scroll-pane').jScrollPane({scrollbarWidth:7, dragMinHeight:36, dragMaxHeight:36, showArrows:true});
		if ($('.pimp2').attr("class").indexOf('active') > 0) {
			$('.pimp2').removeClass('active');
			$('.pimp2').stop().animate({width:"54px",height:"46px",top:"167px",left:"417px"}, 400);
			$('.pimp2').attr("src","/source/images/pimp.png");
		}
	});
	
});
{/literal}
</script> 
<div class="contact_us clearfix"> <!-- contact us -->
<div class="mapContact">
	<img src="/source/images/pimp.png" alt="" class="pimp1 zoom" />
	<img src="/source/images/pimp.png" alt="" class="pimp2 zoom" />
	<img src="/source/images/pimp.png" alt="" class="pimp3 zoom" />
	<div class="dragWindow ui-widget-content ui-draggable" id="draggable">
		<a href="#" class="closeBtn ui-dialog-titlebar-close ui-corner-all button">&nbsp;</a>
	<!-- 	<div class="dragWindow_top">&nbsp;</div>    -->
		<div class="dragWindow_mid">
			<div class="dragWindow_in_mid">
				<div class="dragWindow_in_top">
					<span id="head" style="display:none;"><img src="/source/images/head.jpg" /></span>
					<h1 id="country">NORTH AMERICA</h1>
					<span id="address">
				   
					</span>
				</div>
				<div class="dragWindow_in_bot">
					<div class="scrollbar_out">
						<div id="scr_pane" class="scroll-pane" style="height:280px;">
							<ul>
							{foreach name=user from=$team.usa item=node}
								<li>
									<div class="clearfix">
										<div class="contactL">
											<a href="#"><img src="/source/images/team/{$node->t_image}" width="58" height="58" alt="" /></a>
										</div>
										<div class="contactR">
											<h2>{$node->t_name}</h2>
											<p>{$node->t_position}</p>
											<div>&nbsp;</div>
											<p>{$node->t_phone} (Ph)</p>
											<p>{$node->t_fax} (FX)</p>
											<div>&nbsp;</div>
											<p class="redText"><a href="mailto:{$node->t_email}" style="color:#FF0000; font-size:12px;">Email {$node->name}</a></p>
										</div>
									</div>
								</li>
							{/foreach}
							{*
								<li>
									<div class="clearfix">
										<div class="contactL">
											<a href="#"><img src="/source/images/p2.jpg" alt="" /></a>
										</div>
										<div class="contactR">
											<h2>JIM PRIOR</h2>
											<p>President</p>
											<div>&nbsp;</div>
											<p>(510) 732-1794 x 100 (Ph)</p>
											<p>(650) 249-0412 (FX)</p>
											<div>&nbsp;</div>
											<p class="redText">Email Jim</p>
										</div>
									</div>
								</li>
								<li>
									<div class="clearfix">
										<div class="contactL">
											<a href="#"><img src="/source/images/p1.jpg" alt="" /></a>
										</div>
										<div class="contactR">
											<h2>JIM PRIOR</h2>
											<p>President</p>
											<div>&nbsp;</div>
											<p>(510) 732-1794 x 100 (Ph)</p>
											<p>(650) 249-0412 (FX)</p>
											<div>&nbsp;</div>
											<p class="redText">Email Jim</p>
										</div>
									</div>
								</li>
								<li>
									<div class="clearfix">
										<div class="contactL">
											<a href="#"><img src="/source/images/p2.jpg" alt="" /></a>
										</div>
										<div class="contactR">
											<h2>JIM PRIOR</h2>
											<p>President</p>
											<div>&nbsp;</div>
											<p>(510) 732-1794 x 100 (Ph)</p>
											<p>(650) 249-0412 (FX)</p>
											<div>&nbsp;</div>
											<p class="redText">Email Jim</p>
										</div>
									</div>
								</li>
							*}
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="dragWindow_bot">&nbsp;</div>
	</div>
</div>
</div> <!-- end contact us -->
<div style="display:none;" id="usa">
	<p>30984 Santana Street</p>
	<p>Hayward, CA 94544</p>
	<p>USA</p>
	<p>(510) 489-2530 (PH)</p>
	<p>(650) 249-0412 (FX)</p> 
	<a href="mailto:shira@archltgworks.com" class="contactBtn">Contact us</a>
</div>
<div style="display:none;" id="uk">
<p><a href="http://www.archltgworks.co.uk/" class="weburl">http://www.archltgworks.co.uk/</a></p>
	<p>Unit 32 Crown Trading Center</p>
	<p>Clayton Road</p>
	<p>Hayes</p>
	<p>Middlesex UB3 1DU</p>
	<p>United Kingdom</p>
	<p>T +44 (0) 208 573-7328</p>
	<p>F +44 (0) 208 090-3755</p>
	<a href="mailto:enquiry@archltgworks.com" class="contactBtn">Contact us</a>
</div>
<div style="display:none;" id="china">
<p><a href="http://www.archltgworks.co.uk/" class="weburl">http://www.archltgworks.co.uk/</a></p>
	<p>FL1-BLK1 Xing Da Jiahu Industrial Park</p>
	<p>Torch Dev. Area,</p>
	<p>Zhongshan City, Guandong. China 528437</p>
	<p>+86-760-89937038 (PH)</p>
	<p>+86-760-89937039 (FX)</p>
	<a href="mailto:admin@zsarclite.com" class="contactBtn">Contact us</a>
</div>

<div id="usa_team" style="display:none;">
<ul>
{foreach name=user from=$team.usa item=node}
	<li>
		<div class="clearfix">
			<div class="contactL">
				<a href="#"><img src="/source/images/team/{$node->t_image}" width="58" height="58" alt="" /></a>
			</div>
			<div class="contactR">
				<h2>{$node->t_name}</h2>
				<p>{$node->t_position}</p>
				<div>&nbsp;</div>
				<p>{$node->t_phone} (Ph)</p>
				<p>{$node->t_fax} (FX)</p>
				<div>&nbsp;</div>
				<p class="redText"><a href="mailto:{$node->t_email}" style="color:#FF0000; font-size:12px;">Email {$node->name}</a></p>
			</div>
		</div>
	</li>
{/foreach}
</ul>
</div>

<div id="uk_team" style="display:none;">
<ul>
{foreach name=user from=$team.uk item=node}
	<li>
		<div class="clearfix">
			<div class="contactL">
				<a href="#"><img src="/source/images/team/{$node->t_image}" width="58" height="58" alt="" /></a>
			</div>
			<div class="contactR">
				<h2>{$node->t_name}</h2>
				<p>{$node->t_position}</p>
				<div>&nbsp;</div>
				<p>{$node->t_phone} (Ph)</p>
				<p>{$node->t_fax} (FX)</p>
				<div>&nbsp;</div>
				<p class="redText"><a href="mailto:{$node->t_email}" style="color:#FF0000; font-size:12px;">Email {$node->name}</a></p>
			</div>
		</div>
	</li>
{/foreach}
</ul>
</div>

<div id="china_team" style="display:none;">
<ul>
{foreach name=user from=$team.cn item=node}
	<li>
		<div class="clearfix">
			<div class="contactL">
				<a href="#"><img src="/source/images/team/{$node->t_image}" width="58" height="58" alt="" /></a>
			</div>
			<div class="contactR">
				<h2>{$node->t_name}</h2>
				<p>{$node->t_position}</p>
				<div>&nbsp;</div>
				<p>{$node->t_phone} (Ph)</p>
				<p>{$node->t_fax} (FX)</p>
				<div>&nbsp;</div>
				<p class="redText"><a href="mailto:{$node->t_email}" style="color:#FF0000; font-size:12px;">Email {$node->name}</a></p>
			</div>
		</div>
	</li>
{/foreach}
</ul>
</div>