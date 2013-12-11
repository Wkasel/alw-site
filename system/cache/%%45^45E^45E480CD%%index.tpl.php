<?php /* Smarty version 2.6.18, created on 2013-12-10 18:19:35
         compiled from index.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $this->_tpl_vars['meta']->meta_title; ?>
</title>
<META NAME="KEYWORDS" CONTENT="<?php echo $this->_tpl_vars['meta']->meta_keyword; ?>
" />
<META NAME="DESCRIPTION" CONTENT="<?php echo $this->_tpl_vars['meta']->meta_desc; ?>
" />
	<link rel="icon" href="/favicon.ico" type="image/x-icon" />
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
	<link href="/source/css/style.css" rel="stylesheet" type="text/css" />
	<link href="/source/css/slider.css" rel="stylesheet" type="text/css" />
	<link href="/source/css/opera.css" rel="stylesheet" type="opera/css" />
<!--[if IE 8]><link href="/source/css/ie8.css" rel="stylesheet" type="text/css" ><![endif]-->
<!--[if IE 7]><link href="/source/css/ie7.css" rel="stylesheet" type="text/css" ><![endif]-->
<script type="text/javascript" src="/source/js/jq.js"></script>
<script type="text/javascript" src="/source/js/reflection.js"></script>
<script type="text/javascript" src="/source/js/js.js"></script>
<script type="text/javascript" src="/source/js/dropdown.js"></script>
<script type="text/javascript" src="/source/js/carousel.js"></script>

<script type="text/javascript" src="http://m.archltgworks.com/site-detect.js?5"></script>

<script type="text/javascript">
<?php echo '
	$(function(){
		$(".main .products .about_alw .more").reflect({
			height:15
		});
		$(".nav").dropdown();
	});
'; ?>

</script>
<script>
  (function(i,s,o,g,r,a,m),i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-44610179-1', 'archltgworks.com');
  ga('send', 'pageview');

</script>
	</head>
	<body<?php if ($this->_tpl_vars['section'] == 'contacts'): ?> class="contactBody"<?php endif; ?>>
		<div class="container"> <!-- container -->
			<div class="header"> <!-- logo -->
				<div class="logo"><a href="/"><img src="/source/images/logo.png" alt="" /></a></div>
				<div class="search"> <!-- search -->
					<form action="/content/search/" method="post">
						<div>
							<input id="mainsearch" class="inp sear4" type="text" name="keyword" value="<?php echo $this->_tpl_vars['keyword']; ?>
" value="Search" />
							<input class="btn" type="image" src="/source/images/search.gif" />
						</div>
					</form>
				</div> <!-- end search -->
			</div> <!-- end logo -->
			<div class="content <?php if ($this->_tpl_vars['section'] == 'featured' || $this->_tpl_vars['section'] == 'project'): ?>prod_detail<?php else: ?><?php if ($this->_tpl_vars['section'] != 'search' && $this->_tpl_vars['section'] != 'view_all' && $this->_tpl_vars['section'] != 'quick_ship'): ?><?php echo $this->_tpl_vars['section']; ?>
<?php else: ?>products_category<?php endif; ?><?php endif; ?>"> <!-- content -->
				<div class="red_shadow_area"> <!-- red shadow area -->
					<div class="inner">
						<div class="in-inner clearfix">
							<div class="nav clearfix"> <!-- navigation -->
								<ul <?php if ($this->_tpl_vars['user_info']): ?> style="width:700px;" <?php endif; ?>class="clearfix <?php if ($this->_tpl_vars['user_info']): ?>loginUl<?php endif; ?>">
									<li class="prod">
										<a<?php if ($this->_tpl_vars['section'] == 'products_home' || $this->_tpl_vars['section'] == 'products_category'): ?> class="active"<?php endif; ?> href="/content/products/">products</a>
										<ul>
											<li><a href="/content/view_all/">View all</a></li>
											<?php $_from = $this->_tpl_vars['cats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['node']):
?>
											<li><a href="/content/cat/<?php echo $this->_tpl_vars['node']->pc_name; ?>
/"><?php echo $this->_tpl_vars['node']->pc_name; ?>
</a></li>
											<?php endforeach; endif; unset($_from); ?>
											<li><a href="/content/quick_ship/">Quick ship</a></li>
											<li><a href="/source/files/main_files/Buy_American_ARRA.pdf" target="_blank">ARRA and Buy American Provision</a></li>
											<li><a href="/content/page_bim_rev/" >BIM/Photometry Downloads</a></li>
										</ul>
									</li>
									<li><a href="/content/find_rep/"<?php if ($this->_tpl_vars['section'] == 'find_rep'): ?> class="active"<?php endif; ?>>find a rep</a></li>
									<li><a href="/content/contacts/"<?php if ($this->_tpl_vars['section'] == 'contacts'): ?> class="active"<?php endif; ?>>contact us</a></li>
									<?php if ($this->_tpl_vars['user_info']): ?><li><a href="/content/rep_area/"<?php if ($this->_tpl_vars['rep']): ?> class="active"<?php endif; ?>>rep site</a></li><?php endif; ?>
								  <li><a href="/source/files/main_files/ALW-pdf_catalog_2013-web-1.pdf" target="_blank">CATALOG</a></li>
									<li><a href="http://www.facebook.com/home.php?#!/pages/Architectural-Lighting-Works/128905350456144?ref=ts" target="_blank"><img src="/source/images/facebook.png" alt="" /></a></li>
																		<li><a href="http://visitor.r20.constantcontact.com/d.jsp?llr=5kw8jddab&p=oi&m=1102843861342" target="_blank">JOIN OUR MAILING LIST</a></li>																			
                  <li><a href="/content/event_calendar/"<?php if ($this->_tpl_vars['section'] == 'event_calendar'): ?> class="active"<?php endif; ?>>EVENTS</a></li>									
								</ul>
								<?php if (! $this->_tpl_vars['user_info']): ?>
								<form action="" method="post">
									<div>
										<label for="">Rep login</label>
										<input class="inp name" type="text" name="name" id="login" value="User" />
										<input class="inp passshow" type="text" value="Password" />
										<input class="inp passhide" type="password" id="password" name="pass" value="" />
										<input class="btn" onclick="auth(); return false;" type="image" src="/source/images/submit.jpg" />
									</div>
								</form>
								<?php else: ?>
									<div class="login"><div>Welcome <a href="/content/rep_area/"><?php echo $this->_tpl_vars['user_info']->reps_login; ?>
</a>&nbsp;&nbsp
									<a href="/content/logout/">Logout</a></div></div>
								<?php endif; ?>
							</div> <!-- end navigation -->
						<!-- red shadow contents -->
							<?php if ($this->_tpl_vars['section'] == 'main'): ?>
								<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "red_shadow/main.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
							<?php elseif ($this->_tpl_vars['section'] == 'find_rep'): ?>
								<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "red_shadow/find_rep.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
							
							
								
							<?php elseif ($this->_tpl_vars['section'] == 'products_home'): ?>
								<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "products.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
							
							<?php elseif ($this->_tpl_vars['section'] == 'products_category'): ?>
								<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cat.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	
							<?php elseif ($this->_tpl_vars['section'] == 'view_all'): ?>
								<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "view_all.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
							<?php elseif ($this->_tpl_vars['section'] == 'page_bim_rev'): ?>
								<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page_bim_rev.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>								
							<?php elseif ($this->_tpl_vars['section'] == 'quick_ship'): ?>
								<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "quick_ship.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
              <?php elseif ($this->_tpl_vars['section'] == 'quickship'): ?>
								<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "quickship.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
							<?php elseif ($this->_tpl_vars['section'] == 'prod_detail'): ?>
								<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "product.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
							<?php elseif ($this->_tpl_vars['section'] == 'featured'): ?>
								<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "featured.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
							<?php elseif ($this->_tpl_vars['section'] == 'project'): ?>
								<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "project.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
							
							<?php elseif ($this->_tpl_vars['section'] == 'page'): ?>
								<?php echo $this->_tpl_vars['content']; ?>

							<?php elseif ($this->_tpl_vars['section'] == 'rep_area'): ?>
								<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "rep_area.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
							<?php elseif ($this->_tpl_vars['section'] == 'find_job'): ?>
								<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "find_job.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
							<?php elseif ($this->_tpl_vars['section'] == 'search'): ?>
								<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "search.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
							<?php elseif ($this->_tpl_vars['section'] == 'calc'): ?>
								<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "cal.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
							<?php elseif ($this->_tpl_vars['section'] == 'show_calc'): ?>
								<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "show_calc.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
							<?php elseif ($this->_tpl_vars['section'] == 'email'): ?>
								<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "email.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
							<?php endif; ?>
						<!-- end red shadow contents -->
						</div>
					</div>
				</div> <!-- end red shadow area -->
				<div class="pages_content">
					<?php if ($this->_tpl_vars['section'] == 'main'): ?>
						<div class="main"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "main.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
					<?php elseif ($this->_tpl_vars['section'] == 'find_rep'): ?>
						<div style="padding:0 0 0 20px;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "find_rep.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
					<?php elseif ($this->_tpl_vars['section'] == 'contacts'): ?>						<div style="padding:0 0 0 20px;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "contacts.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>											<?php elseif ($this->_tpl_vars['section'] == 'event_calendar'): ?>						<div style="padding:0 0 0 20px;"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "event_calendar.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
					<?php endif; ?>
				</div>
			</div> <!-- end content -->
			<div class="footer"> <!-- footer -->
				<p>Copyright © 2013 Architectural Lighting Works</p>
			</div> <!-- end footer -->
		</div> <!-- end container -->
	<?php echo '
	<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src=\'" + gaJsHost + "google-analytics.com/ga.js\' type=\'text/javascript\'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-20127031-1");
pageTracker._trackPageview();
} catch(err) {}</script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push([\'_setAccount\', \'UA-26026732-1\']);
  _gaq.push([\'_trackPageview\']);

  (function() {
    var ga = document.createElement(\'script\'); ga.type = \'text/javascript\'; ga.async = true;
    ga.src = (\'https:\' == document.location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\';
    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(ga, s);
  })();
	var search=document.getElementById(\'mainsearch\');
	var defaultSearchText=\'Product code or description\';
	search.value=defaultSearchText;
	search.onfocus = function() {if (this.value == defaultSearchText) { this.value = "";}};
	search.onblur = function() {if (this.value == "") { this.value = defaultSearchText;}}
	
</script>

'; ?>

		</body>
</html>