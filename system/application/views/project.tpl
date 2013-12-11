<link href="/source/css/form.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="/source/js/niceform.js"></script>
<script type="text/javascript">
{literal}
function getFile() {
	var file = $('select[@name=links] option:selected').val();
	if (file) {
		window.location = '/content/get_file/?file=' + file;
	}
}
$(function(){
	$("#project_slider").slider({w:451,h:450});
});
{/literal}
</script>
<div class="bread"> <!-- bread crumbs -->
	<a href="/content/products/" style="color:#FFF;">CUSTOM PROJECTS</a> / {$product->p_name}
</div> <!-- end bread crumbs -->
<div class="clearfix">
	<div class="phots">

		<div id="project_slider" class="slider">
			<div class="prev">
				{foreach from=$product->reversed_images name=images item=node}
				<img src="/source/images/site_images/{$node}" />
				{/foreach}
			</div>
			<div class="checker clearix">
				<div class="btns">
					<ul class="clearix">
						{foreach from=$product->reversed_images name=images item=node}
						<li><a href="#"></a></li>
						{/foreach}
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="descr clearfix">
		<h1>{$product->p_name}</h1>
		<h2>{$product->p_name_ex}</h2>
		<p>
		<b>Series:</b> {$product->p_series}<br />
		<b>Specifier:</b> {$product->p_spec}<br />
		<b>Location:</b> {$product->p_location}</p>
		<br />
		{$product->p_desc}
		<br />
	</div>
{if  $total_nodes > 1}
		{if $page+1 > $total_nodes}
			{assign var="next" value=`$page`}
		{else}
			{assign var="next" value=`$page+1`}
		{/if}
		{if $page-1 > 0}
			{assign var="prev" value=`$page-1`}
		{else}
			{assign var="prev" value=0}
		{/if} 
		<div style="font-weight:bold; float:right; color:#fff; margin-right:32px; margin-top:260px; font-size:13px;">
			{if $page > 1}&nbsp;<a style="color:#FFF;" href="/content/project_show/1/"><<</a>&nbsp;&nbsp;<a style="color:#FFF;" href="/content/project_show/{$prev}/"><</a>{/if}
			{assign var="no_dots" value="yes"}
			{section name=foo start=0 loop=$total_nodes step=1}
				{if $smarty.section.foo.iteration > 5 && $smarty.section.foo.iteration > $page+5  && $smarty.section.foo.iteration+5 < $total_nodes}
					{if $no_dots eq "yes"}...{/if}
					{assign var="no_dots" value="no"}
				{else}	
					{if $smarty.section.foo.iteration+5 > $page && $smarty.section.foo.iteration-5 < $total_nodes}
						{if $smarty.section.foo.iteration eq $page}
							<span style="color:#FF0000">{$smarty.section.foo.iteration}</span>
						{else}
							<a style="color:#FFF;" href="/content/project_show/{$smarty.section.foo.iteration}/" title="{$smarty.section.foo.iteration}">{$smarty.section.foo.iteration}</a>
						{/if}
					{/if}
				{/if}
			{/section}
			{if $page < $total_nodes}&nbsp;<a style="color:#FFF;" href="/content/project_show/{$next}/">></a>&nbsp;&nbsp;
			<a style="color:#FFF;" href="/content/project_show/{$total_nodes}/">>></a>&nbsp;&nbsp;{/if}
		</div>
	{/if}
</div>
