<script language="javascript" type="text/javascript" src="/source/js/nf.js"></script>
<script type="text/javascript">
{literal}
function getFile(select_name) {
	var file = $('#'+ select_name + ' option:selected').val();
	if (file) {
		window.location = '/content/get_file/?file=' + file;
	}
}
	$(function(){
		$("#slider_on_prod").slider({w:450,h:451});
	})
{/literal}
</script>
<div class="bread"> <!-- bread crumbs -->
	<a href="/content/products/" style="color:#FFF;">FEATURED PRODUCTS</a> / {$product->p_name}
</div> <!-- end bread crumbs -->
<div class="clearfix">
	<div class="phots">
	{if count($product->reversed_images) > 1}
		<div id="slider_on_featured" class="slider">
			<div class="prev">
				{foreach from=$product->reversed_images name=images item=node}
				<img src="/source/images/site_images/{$node}" alt="" />
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
	{else}
	<img src="/source/images/site_images/{$product->reversed_images[0]}" style="max-width:450px;" alt="" />  
	{/if}
	</div>
	<div class="descr clearfix">
		<h1>{$product->p_name}</h1>
		<h2>{$product->p_name_ex}</h2>
		<p>{$product->p_desc}</p>
		<br />
		<a class="pdf" href="/source/files/main_files/{$product->p_download}" target="_blank">DOWNLOAD SPEC SHEET</a>
		<a class="btn" href="/source/files/main_files/{$product->p_install}" target="_blank">INSTALLATION INSTRUCTIONS</a>
		{if $product->configurator neq ""}<a class="btn" href="{$product->configurator}" target="_blank">CONFIGURATOR</a>{/if}
		<form style='margin-right:5px;' action="" method="post">
			<div style="padding: 0 0 0 9px;">
				<select class="styled" name="asd" id="link" style="width:248px;">
					<option value="">PHOTOMETRY LINK</option>
					{foreach from=$files item=node}
					<option value="{$node->file_name}">{$node->file_desc}</option>
					{/foreach}
				</select>
			</div>
		</form>
		<a onclick="getFile('link'); return false;" href="#"><img src="/source/images/btn_download.jpg" alt="" /></a>
		{if count($matrix) > 0}
		<br />
		<form action="" method="post" style="margin-top:3px;">
			<div style="padding:0 0 0 9px;">
				<select class="styled" name="asd" id="matrix" style="width:250px; padding-right:10px; font-size:13px; font-weight:bold;">
					<option value="">LED MATRIX</option>
					{foreach from=$matrix item=node}
					<option value="{$node->file_name}">{$node->file_desc}</option>
					{/foreach}
				</select>
			</div>
		</form>
		<a class="arr" onclick="getFile('matrix'); return false;" href="#"><img src="/source/images/btn_download.jpg" alt="" /></a>
		{/if}
		{if $product->quick_ship}
			<div class="clearfix" style="clear:both;">
				<div style="float:left;"><a class="pdf" href="/source/files/main_files/{$product->quick_ship_pdf}" target="_blank">QUICK SHIP SPEC SHEET</a></div>
			</div>
		{/if}
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
		<div style="font-weight:bold; float:right; color:#fff; margin-right:32px; margin-top:90px; font-size:13px;">
			{if $page > 1}&nbsp;<a style="color:#FFF;" href="/content/featured_show/1/"><<</a>&nbsp;&nbsp;<a style="color:#FFF;" href="/content/featured_show/{$prev}/"><</a>{/if}
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
							<a style="color:#FFF;" href="/content/featured_show/{$smarty.section.foo.iteration}/" title="{$smarty.section.foo.iteration}">{$smarty.section.foo.iteration}</a>
						{/if}
					{/if}
				{/if}
			{/section}
			{if $page < $total_nodes}&nbsp;<a style="color:#FFF;" href="/content/featured_show/{$next}/">></a>&nbsp;&nbsp;
			<a style="color:#FFF;" href="/content/featured_show/{$total_nodes}/">>></a>&nbsp;&nbsp;{/if}
		</div>
	{/if}
</div>
