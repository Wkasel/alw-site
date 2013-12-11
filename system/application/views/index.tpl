<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{$meta->meta_title}</title>
<META NAME="KEYWORDS" CONTENT="{$meta->meta_keyword}" />
<META NAME="DESCRIPTION" CONTENT="{$meta->meta_desc}" />
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
{literal}
	$(function(){
		$(".main .products .about_alw .more").reflect({
			height:15
		});
		$(".nav").dropdown();
	});
{/literal}
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-44610179-1', 'archltgworks.com');
  ga('send', 'pageview');

</script>
	</head>
	<body{if $section == 'contacts'} class="contactBody"{/if}>
		<div class="container"> <!-- container -->
			<div class="header"> <!-- logo -->
				<div class="logo"><a href="/"><img src="/source/images/logo.png" alt="" /></a></div>
				<div class="search"> <!-- search -->
					<form action="/content/search/" method="post">
						<div>
							<input id="mainsearch" class="inp sear4" type="text" name="keyword" value="{$keyword}" value="Search" />
							<input class="btn" type="image" src="/source/images/search.gif" />
						</div>
					</form>
				</div> <!-- end search -->
			</div> <!-- end logo -->
			<div class="content {if $section == 'featured' || $section == 'project'}prod_detail{else}{if $section != 'search' && $section != 'view_all' && $section != 'quick_ship'}{$section}{else}products_category{/if}{/if}"> <!-- content -->
				<div class="red_shadow_area"> <!-- red shadow area -->
					<div class="inner">
						<div class="in-inner clearfix">
							<div class="nav clearfix"> <!-- navigation -->
								<ul {if $user_info} style="width:700px;" {/if}class="clearfix {if $user_info}loginUl{/if}">
									<li class="prod">
										<a{if $section == 'products_home' || $section == 'products_category'} class="active"{/if} href="/content/products/">products</a>
										<ul>
											<li><a href="/content/view_all/">View all</a></li>
											{foreach from=$cats item=node}
											<li><a href="/content/cat/{$node->pc_name}/">{$node->pc_name}</a></li>
											{/foreach}
											<li><a href="/content/quick_ship/">Quick ship</a></li>
											<li><a href="/source/files/main_files/Buy_American_ARRA.pdf" target="_blank">ARRA and Buy American Provision</a></li>
											<li><a href="/content/page_bim_rev/" >BIM/Photometry Downloads</a></li>
										</ul>
									</li>
									<li><a href="/content/find_rep/"{if $section == 'find_rep'} class="active"{/if}>find a rep</a></li>
									<li><a href="/content/contacts/"{if $section == 'contacts'} class="active"{/if}>contact us</a></li>
									{if $user_info}<li><a href="/content/rep_area/"{if $rep} class="active"{/if}>rep site</a></li>{/if}
								  <li><a href="/source/files/main_files/ALW-pdf_catalog_2013-web-1.pdf" target="_blank">CATALOG</a></li>
									<li><a href="http://www.facebook.com/home.php?#!/pages/Architectural-Lighting-Works/128905350456144?ref=ts" target="_blank"><img src="/source/images/facebook.png" alt="" /></a></li>
									{*<li class="fLike"><iframe src="http://www.facebook.com/plugins/like.php?href=http://archltgworks.com&amp;layout=button_count&amp;show_faces=false&amp;width=108&amp;action=like&amp;colorscheme=dark&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:80px; height:21px;" allowTransparency="true"></iframe></li>
									*}
									<li><a href="http://visitor.r20.constantcontact.com/d.jsp?llr=5kw8jddab&p=oi&m=1102843861342" target="_blank">JOIN OUR MAILING LIST</a></li>																			
                  <li><a href="/content/event_calendar/"{if $section == 'event_calendar'} class="active"{/if}>EVENTS</a></li>									
								</ul>
								{if !$user_info}
								<form action="" method="post">
									<div>
										<label for="">Rep login</label>
										<input class="inp name" type="text" name="name" id="login" value="User" />
										<input class="inp passshow" type="text" value="Password" />
										<input class="inp passhide" type="password" id="password" name="pass" value="" />
										<input class="btn" onclick="auth(); return false;" type="image" src="/source/images/submit.jpg" />
									</div>
								</form>
								{else}
									<div class="login"><div>Welcome <a href="/content/rep_area/">{$user_info->reps_login}</a>&nbsp;&nbsp
									<a href="/content/logout/">Logout</a></div></div>
								{/if}
							</div> <!-- end navigation -->
						<!-- red shadow contents -->
							{if $section == 'main'}
								{include file="red_shadow/main.tpl"}
							{elseif $section == 'find_rep'}
								{include file="red_shadow/find_rep.tpl"}
							
							
								
							{elseif $section == 'products_home'}
								{include file="products.tpl"}
							
							{elseif $section == 'products_category'}
								{include file="cat.tpl"}	
							{elseif $section == 'view_all'}
								{include file="view_all.tpl"}
							{elseif $section == 'page_bim_rev'}
								{include file="page_bim_rev.tpl"}								
							{elseif $section == 'quick_ship'}
								{include file="quick_ship.tpl"}
              {elseif $section == 'quickship'}
								{include file="quickship.tpl"}
							{elseif $section == 'prod_detail'}
								{include file="product.tpl"}
							{elseif $section == 'featured'}
								{include file="featured.tpl"}
							{elseif $section == 'project'}
								{include file="project.tpl"}
							
							{elseif $section == 'page'}
								{$content}
							{elseif $section == 'rep_area'}
								{include file="rep_area.tpl"}
							{elseif $section == 'find_job'}
								{include file="find_job.tpl"}
							{elseif $section == 'search'}
								{include file="search.tpl"}
							{elseif $section == 'calc'}
								{include file="cal.tpl"}
							{elseif $section == 'show_calc'}
								{include file="show_calc.tpl"}
							{elseif $section == 'email'}
								{include file="email.tpl"}
							{/if}
						<!-- end red shadow contents -->
						</div>
					</div>
				</div> <!-- end red shadow area -->
				<div class="pages_content">
					{if $section == 'main'}
						<div class="main">{include file="main.tpl"}</div>
					{elseif $section == 'find_rep'}
						<div style="padding:0 0 0 20px;">{include file="find_rep.tpl"}</div>
					{elseif $section == 'contacts'}						<div style="padding:0 0 0 20px;">{include file="contacts.tpl"}</div>											{elseif $section == 'event_calendar'}						<div style="padding:0 0 0 20px;">{include file="event_calendar.tpl"}</div>
					{/if}
				</div>
			</div> <!-- end content -->
			<div class="footer"> <!-- footer -->
				<p>Copyright © 2013 Architectural Lighting Works</p>
			</div> <!-- end footer -->
		</div> <!-- end container -->
	{literal}
	<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-20127031-1");
pageTracker._trackPageview();
} catch(err) {}</script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-26026732-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
	var search=document.getElementById('mainsearch');
	var defaultSearchText='Product code or description';
	search.value=defaultSearchText;
	search.onfocus = function() {if (this.value == defaultSearchText) { this.value = "";}};
	search.onblur = function() {if (this.value == "") { this.value = defaultSearchText;}}
	
</script>

{/literal}
		</body>
</html>
