<?php /* Smarty version 2.6.18, created on 2013-12-15 17:45:49
         compiled from contacts.tpl */ ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.7/jquery-ui.js"></script>
<script type="text/javascript">
<?php echo '
	$(document).ready(function() {
		$( "#draggable" ).draggable();
		$( "#draggable" ).draggable( "option", "opacity", 0.55 );
		$( "#draggable" ).draggable( "option", "cursor", "pointer");
		 //if close button is clicked  
		 $(\'.closeBtn\').click(function (e) {  
			 //Cancel the link behavior  
			 e.preventDefault();  
			 $(\'.dragWindow\').hide(); 
			if ($(\'.pimp1\').attr("class").indexOf(\'active\') > 0) {
				$(\'.pimp1\').stop().animate({width:"54px",height:"46px",top:"224px",left:"122px"}, 400);
				$(\'.pimp1\').attr("src","/source/images/pimp.png");
				$(\'.pimp1\').removeClass(\'active\');
			}
			if ($(\'.pimp2\').attr("class").indexOf(\'active\') > 0) {
				$(\'.pimp2\').stop().animate({width:"54px",height:"46px",top:"167px",left:"417px"}, 400);
				$(\'.pimp2\').attr("src","/source/images/pimp.png");
				$(\'.pimp2\').removeClass(\'active\');
			}
			if ($(\'.pimp3\').attr("class").indexOf(\'active\') > 0) {
				$(\'.pimp3\').stop().animate({width:"54px",height:"46px",top:"224px"}, 400);
				$(\'.pimp3\').attr("src","/source/images/pimp.png");
				$(\'.pimp3\').removeClass(\'active\');
			}
		 });  
		$(\'#head\').show(); 
		$(\'#address\').html($(\'#usa\').html());
		$(\'.pimp1\').stop().animate({width:"83px",height:"71px",top:"200px",left:"115px"}, 400);
		$(\'.pimp1\').attr("src", "/source/images/pimpBig.png");
		$(\'.pimp1\').addClass(\'active\');
		$(\'.dragWindow\').offset({ top: 160, left: $(\'.pimp2\').offset().left+35 });
	});
	
	$(window).resize(function() {
		$(\'.dragWindow\').offset({ top: 160, left: $(\'.pimp2\').offset().left+35 });
	});

</script>
<script type="text/javascript" src="/source/js/reflection.js"></script>
<script type="text/javascript" src="/source/js/js.js"></script>
<script type="text/javascript" src="/source/js/jScrollPane.js"></script>
<script type="text/javascript">$(function()
{
	$(\'.scroll-pane\').jScrollPane({scrollbarWidth:7, dragMinHeight:36, dragMaxHeight:36, showArrows:true});
});
</script>
<script type="text/javascript">

$(function(){
	$(\'.pimp1\').hover(function(){
			$(this).stop().animate({width:"83px",height:"71px",top:"200px",left:"115px"}, 400);
			$(this).attr("src","/source/images/pimpBig.png");
		},
		function(){
			if ($(this).attr("class").indexOf(\'active\') == -1) {
				$(this).stop().animate({width:"54px",height:"46px",top:"224px",left:"122px"}, 400);
				$(this).attr("src","/source/images/pimp.png");
			}
		});
	$(\'.pimp2\').hover(function(){
			$(this).stop().animate({width:"83px",height:"71px",top:"143px",left:"410px"}, 400);
			$(this).attr("src","/source/images/pimpBig.png");
		},
		function(){
			if ($(this).attr("class").indexOf(\'active\') == -1) {
				$(this).stop().animate({width:"54px",height:"46px",top:"167px",left:"417px"}, 400);
				$(this).attr("src","/source/images/pimp.png");
			}
		});
	$(\'.pimp3\').hover(function(){
			$(this).stop().animate({width:"83px",height:"71px",top:"199px"}, 400);
			$(this).attr("src","/source/images/pimpBig.png");
		},
		function(){
			if ($(this).attr("class").indexOf(\'active\') == -1) {
				$(this).stop().animate({width:"54px",height:"46px",top:"224px"}, 400);
				$(this).attr("src","/source/images/pimp.png");
			}
		});
		
	$(\'.pimp1\').click(function() {
		$(this).addClass(\'active\');
		$(\'#head\').show();
		$(\'.dragWindow\').fadeIn(\'slow\');
// 		$(\'.dragWindow\').offset({ top: 160, left: $(\'.pimp2\').offset().left+35 });
		//$(\'.dragWindow\').offset({ top: 160, left: 365 });
		//$(\'.dragWindow\').offset({ top: 160, left: 350 });
		$(\'#country\').html(\'NORTH AMERICA\');
		$(\'#address\').html($(\'#usa\').html());
		$(\'.pimp2\').removeClass(\'active\');
		$(\'.pimp3\').removeClass(\'active\');
		$( "#dragable" ).draggable( "option", "appendTo", $(\'.pimp1\'));
		$(\'.pimp2\').stop().animate({width:"54px",height:"46px",top:"167px",left:"417px"}, 400);
		$(\'.pimp2\').attr("src","/source/images/pimp.png");
		$(\'#scr_pane\').html($(\'#usa_team\').html());
		$(\'.scroll-pane\').jScrollPane({scrollbarWidth:7, dragMinHeight:36, dragMaxHeight:36, showArrows:true});
		$(\'.pimp3\').stop().animate({width:"54px",height:"46px",top:"224px"}, 400);
		$(\'.pimp3\').attr("src","/source/images/pimp.png");
	});
	
	$(\'.pimp2\').click(function() {
		$(this).addClass(\'active\');
		$(\'#head\').hide();
		$(\'.dragWindow\').fadeIn(\'slow\');
// 		$(\'.dragWindow\').offset({ top: 160, left: $(\'.pimp2\').offset().left+35 });
		//$(\'.dragWindow\').offset({ top: 160, left: 365 });	
		//$(\'.dragWindow\').offset({ top: 182, left: 713 });
		$(\'#country\').html(\'EUROPE\');
		$(\'#address\').html($(\'#uk\').html());
		
		if ($(\'.pimp1\').attr("class").indexOf(\'active\') > 0) {
			$(\'.pimp1\').removeClass(\'active\');
			$(\'.pimp1\').stop().animate({width:"54px",height:"46px",top:"224px",left:"122px"}, 400);
			$(\'.pimp1\').attr("src","/source/images/pimp.png");
		}
		$(\'#scr_pane\').html($(\'#uk_team\').html());
		$(\'.scroll-pane\').jScrollPane({scrollbarWidth:7, dragMinHeight:36, dragMaxHeight:36, showArrows:true});
		$(\'.pimp3\').removeClass(\'active\');
		$(\'.pimp3\').stop().animate({width:"54px",height:"46px",top:"224px"}, 400);
		$(\'.pimp3\').attr("src","/source/images/pimp.png");
	});
	
	$(\'.pimp3\').click(function() {
		$(this).addClass(\'active\');
		$(\'#head\').hide();
		$(\'.dragWindow\').fadeIn(\'slow\');
// 		$(\'.dragWindow\').offset({ top: 160, left: $(\'.pimp2\').offset().left+35 });
		//$(\'.dragWindow\').offset({ top: 160, left: 365 });	
		//$(\'.dragWindow\').offset({ top: 182, left: 903 });
		$(\'#country\').html(\'ASIA\');
		$(\'#address\').html($(\'#china\').html());
		$( "#dragable" ).draggable( "option", "appendTo", $(\'.pimp3\'));
		if ($(\'.pimp1\').attr("class").indexOf(\'active\') > 0) {
			$(\'.pimp1\').removeClass(\'active\');
			$(\'.pimp1\').stop().animate({width:"54px",height:"46px",top:"224px",left:"122px"}, 400);
			$(\'.pimp1\').attr("src","/source/images/pimp.png");
		}
		$(\'#scr_pane\').html($(\'#china_team\').html());
		$(\'.scroll-pane\').jScrollPane({scrollbarWidth:7, dragMinHeight:36, dragMaxHeight:36, showArrows:true});
		if ($(\'.pimp2\').attr("class").indexOf(\'active\') > 0) {
			$(\'.pimp2\').removeClass(\'active\');
			$(\'.pimp2\').stop().animate({width:"54px",height:"46px",top:"167px",left:"417px"}, 400);
			$(\'.pimp2\').attr("src","/source/images/pimp.png");
		}
	});
	
});
'; ?>

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
							<?php $_from = $this->_tpl_vars['team']['usa']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['user'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['user']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['node']):
        $this->_foreach['user']['iteration']++;
?>
								<li>
									<div class="clearfix">
										<div class="contactL">
											<a href="#"><img src="/source/images/team/<?php echo $this->_tpl_vars['node']->t_image; ?>
" width="58" height="58" alt="" /></a>
										</div>
										<div class="contactR">
											<h2><?php echo $this->_tpl_vars['node']->t_name; ?>
</h2>
											<p><?php echo $this->_tpl_vars['node']->t_position; ?>
</p>
											<div>&nbsp;</div>
											<p><?php echo $this->_tpl_vars['node']->t_phone; ?>
 (Ph)</p>
											<p><?php echo $this->_tpl_vars['node']->t_fax; ?>
 (FX)</p>
											<div>&nbsp;</div>
											<p class="redText"><a href="mailto:<?php echo $this->_tpl_vars['node']->t_email; ?>
" style="color:#FF0000; font-size:12px;">Email <?php echo $this->_tpl_vars['node']->name; ?>
</a></p>
										</div>
									</div>
								</li>
							<?php endforeach; endif; unset($_from); ?>
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
<?php $_from = $this->_tpl_vars['team']['usa']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['user'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['user']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['node']):
        $this->_foreach['user']['iteration']++;
?>
	<li>
		<div class="clearfix">
			<div class="contactL">
				<a href="#"><img src="/source/images/team/<?php echo $this->_tpl_vars['node']->t_image; ?>
" width="58" height="58" alt="" /></a>
			</div>
			<div class="contactR">
				<h2><?php echo $this->_tpl_vars['node']->t_name; ?>
</h2>
				<p><?php echo $this->_tpl_vars['node']->t_position; ?>
</p>
				<div>&nbsp;</div>
				<p><?php echo $this->_tpl_vars['node']->t_phone; ?>
 (Ph)</p>
				<p><?php echo $this->_tpl_vars['node']->t_fax; ?>
 (FX)</p>
				<div>&nbsp;</div>
				<p class="redText"><a href="mailto:<?php echo $this->_tpl_vars['node']->t_email; ?>
" style="color:#FF0000; font-size:12px;">Email <?php echo $this->_tpl_vars['node']->name; ?>
</a></p>
			</div>
		</div>
	</li>
<?php endforeach; endif; unset($_from); ?>
</ul>
</div>

<div id="uk_team" style="display:none;">
<ul>
<?php $_from = $this->_tpl_vars['team']['uk']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['user'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['user']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['node']):
        $this->_foreach['user']['iteration']++;
?>
	<li>
		<div class="clearfix">
			<div class="contactL">
				<a href="#"><img src="/source/images/team/<?php echo $this->_tpl_vars['node']->t_image; ?>
" width="58" height="58" alt="" /></a>
			</div>
			<div class="contactR">
				<h2><?php echo $this->_tpl_vars['node']->t_name; ?>
</h2>
				<p><?php echo $this->_tpl_vars['node']->t_position; ?>
</p>
				<div>&nbsp;</div>
				<p><?php echo $this->_tpl_vars['node']->t_phone; ?>
 (Ph)</p>
				<p><?php echo $this->_tpl_vars['node']->t_fax; ?>
 (FX)</p>
				<div>&nbsp;</div>
				<p class="redText"><a href="mailto:<?php echo $this->_tpl_vars['node']->t_email; ?>
" style="color:#FF0000; font-size:12px;">Email <?php echo $this->_tpl_vars['node']->name; ?>
</a></p>
			</div>
		</div>
	</li>
<?php endforeach; endif; unset($_from); ?>
</ul>
</div>

<div id="china_team" style="display:none;">
<ul>
<?php $_from = $this->_tpl_vars['team']['cn']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['user'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['user']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['node']):
        $this->_foreach['user']['iteration']++;
?>
	<li>
		<div class="clearfix">
			<div class="contactL">
				<a href="#"><img src="/source/images/team/<?php echo $this->_tpl_vars['node']->t_image; ?>
" width="58" height="58" alt="" /></a>
			</div>
			<div class="contactR">
				<h2><?php echo $this->_tpl_vars['node']->t_name; ?>
</h2>
				<p><?php echo $this->_tpl_vars['node']->t_position; ?>
</p>
				<div>&nbsp;</div>
				<p><?php echo $this->_tpl_vars['node']->t_phone; ?>
 (Ph)</p>
				<p><?php echo $this->_tpl_vars['node']->t_fax; ?>
 (FX)</p>
				<div>&nbsp;</div>
				<p class="redText"><a href="mailto:<?php echo $this->_tpl_vars['node']->t_email; ?>
" style="color:#FF0000; font-size:12px;">Email <?php echo $this->_tpl_vars['node']->name; ?>
</a></p>
			</div>
		</div>
	</li>
<?php endforeach; endif; unset($_from); ?>
</ul>
</div>