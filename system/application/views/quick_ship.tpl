<div class="prod_phot"> <!-- products photo -->
	
	</div> <!-- end products photo -->
	<div class="bread"> <!-- bread crumbs -->
		<span style="font-size:17px;"><a href="/content/products/" style="color:#FFF;">PRODUCTS</a> / <span>QUICK SHIP</span></span>
	</div> <!-- end bread crumbs -->
	

	<div class="prods clearfix">
	{foreach from=$objects item=node}
	<div>
	<a href="/content/product/{$node->products_id}/">
		<img src="/source/images/site_images/preview/{$node->p_image1}" style="max-width:126px;" alt="{$node->p_name}" />
	</a>
	<a href="/content/product/{$node->products_id}/" style="font-size:12px;">{$node->p_name}</a></div>
	{/foreach}
	</div>
</div>
</div>
