<div class="prod_phot"> <!-- products photo -->
	<ul class="clearfix">
		{foreach from=$cats item=node}
		<li>
			<a{if $current_cat eq $node->pc_name} class="active"{/if} href="/content/cat/{$node->pc_name}/">
				<img src="/source/images/cats/{$node->pc_image}" alt="{$node->pc_name}" />
				
				<span class="clearfix">
					<img src="/source/images/arrow.png" alt="" />
					{$node->pc_name|upper}
				</span>
				<img class="span_bg2" src="/source/images/prod_span_bg2.gif" alt="" />
			</a>
		</li>
	 {/foreach}
	</ul>
	</div> <!-- end products photo -->
	<div class="bread"> <!-- bread crumbs -->
		<span style="font-size:17px;"><a href="/content/products/" style="color:#000;">PRODUCTS</a> / <span>{$cat_info->pc_name|upper} </span></span>
	</div> <!-- end bread crumbs -->
	
	<br />
	<div class="prods clearfix">
	{foreach from=$objects item=node}
	<div>
		{if $node->quick_ship}
		<img class="q" src="/source/images/quick.gif" alt="Quick ship" />
		{/if}
		<a href="/content/product/{$node->products_id}/">
			<img src="/source/images/site_images/preview/{$node->p_image1}" style="max-width:126px;" alt="{$node->p_name}" />
		</a>
		<a href="/content/product/{$node->products_id}/" style="font-size:12px;">{$node->p_name}</a></div>
	{/foreach}
	</div>
</div>
</div>
