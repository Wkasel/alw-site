<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{$meta->meta_title}</title>
<META NAME="KEYWORDS" CONTENT="{$meta->meta_keyword}" />
<META NAME="DESCRIPTION" CONTENT="{$meta->meta_desc}" />
	<link rel="icon" href="/favicon.ico" type="image/x-icon" />
	<link href="/source/css/area.css" rel="stylesheet" type="text/css" />
	<link href="/source/css/opera.css" rel="stylesheet" type="opera/css" />
<!--[if IE 8]><link href="/source/css/ie8.css" rel="stylesheet" type="text/css" ><![endif]-->
<!--[if IE 7]><link href="/source/css/ie7.css" rel="stylesheet" type="text/css" ><![endif]-->
<script type="text/javascript" src="/source/js/jq.js"></script>
<script type="text/javascript" src="/source/js/reflection.js"></script>
<script type="text/javascript" src="/source/js/js.js"></script>
<script type="text/javascript" src="/source/js/dropdown.js"></script>

	</head>
	<body>
		<div class="container"> <!-- container -->
			<div class="header"> <!-- logo -->
				<div class="logo"><a href="/"><img src="/source/images/logo.jpg" alt="" /></a></a></div>
			</div> <!-- end logo -->
			<div class="content"> <!-- content -->
				{if $section == 'auth_form'}
					{include file="auth_form.tpl"}
				{elseif $section == 'main_area'}
					{include file="main_area.tpl"}
				{elseif $section == 'add_new'}
					{include file="add_new.tpl"}
				{elseif $section == 'edit_job'}
					{include file="edit_job.tpl"}
				{/if}
			</div> <!-- end content -->
			<div class="footer"> <!-- footer -->

				<p>Copyright © 2010 Architectural Lighting Works</p>
			</div> <!-- end footer -->
		</div> <!-- end container -->
		<div id="dim" style="display:none; background-color:#000; opacity: 0.7; position:absolute; top:0; left:0; width:100%; height:190%; z-index:9999;">
			<div id="center_message">
				<p style="color:#FFF; margin-bottom:5px;">Loading data, please wait...</p>
				<img src="/source/images/loading.gif" alt="loading..." />
				<div style="text-align:center; color:#FFF;">
					<span id="percent">1</span>%
				</div>
			</div>
		</div>
	</body>
</html>
