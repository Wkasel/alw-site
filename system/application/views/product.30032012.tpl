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
	<a href="/content/products/" style="color:#FFF; font-size:17px;">PRODUCTS</a> / <span><a href="/content/cat/{$cat->pc_name}/" style="color:#FFF;  font-size:17px;">{$cat->pc_name|upper}</a></span> / <span style="font-size:17px;">{$product->p_name}</span>
</div> <!-- end bread crumbs -->
<div class="clearfix">
	<div class="phots">
		<div id="slider_on_prod" class="slider">
			<div class="prev">
				{foreach from=$product->reversed_images name=images item=node}
				<img src="/source/images/site_images/{$node}" />
				{/foreach}
			</div>
			{if count($product->reversed_images) != 1}
			<div class="checker clearix">
				<div class="btns">
					<ul class="clearix">
						{foreach from=$product->reversed_images name=images item=node}
						<li><a href="#"></a></li>
						{/foreach}
					</ul>
				</div>
			</div>
			{/if}
		</div>
	</div>
	<div class="descr clearfix">
		<h1>{$product->p_name_ex}</h1>
		<h2>{$product->p_name}</h2>
		<p>{$product->p_desc}</p>
		<br />
		<a class="pdf" href="/source/files/main_files/{$product->p_download}" target="_blank">DOWNLOAD SPEC SHEET</a>
		<a class="btn" href="/source/files/main_files/{$product->p_install}" target="_blank">INSTALLATION INSTRUCTIONS</a>
		{if $product->configurator neq ""}<a class="btn" href="{$product->configurator}" target="_blank">CONFIGURATOR</a>{/if}
		<form action="" method="post">
			<div style="padding:0 0 0 9px;">
				<select class="styled" name="asd" id="link" style="width:350px; font-size:13px; font-weight:bold;">
					<option value="">PHOTOMETRY LINK</option>
					{foreach from=$files item=node}
					<option value="{$node->file_name}">{$node->file_desc}</option>
					{/foreach}
				</select>
			</div>
		</form>
		<a class="arr" onclick="getFile('link'); return false;" href="#"><img src="/source/images/arr.gif" alt="" /></a>
		{if count($matrix) > 0}
		<br />
		<form action="" method="post" style="margin-top:3px;">
			<div style="padding:0 0 0 9px;">
				<select class="styled" name="asd" id="matrix" style="width:350px; font-size:13px; font-weight:bold;">
					<option value="">LED MATRIX</option>
					{foreach from=$common_matrix item=node}
					<option value="{$node->file_name}">{$node->file_desc}</option>
					{/foreach}
					{foreach from=$matrix item=node}
					<option value="{$node->file_name}">{$node->file_desc}</option>
					{/foreach}
				</select>
			</div>
		</form>
		<a class="arr" onclick="getFile('matrix'); return false;" href="#"><img src="/source/images/arr.gif" alt="" /></a>
		{/if}
		{if $product->quick_ship}
			<div class="clearfix" style="clear:both;">
				<div style="float:left;"><a class="pdf" href="/source/files/main_files/{$product->quick_ship_pdf}" target="_blank">QUICK SHIP SPEC SHEET</a></div>
			</div>
		{/if}
	</div>
</div>