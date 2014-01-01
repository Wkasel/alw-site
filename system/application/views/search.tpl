
	<div class="bread"> <!-- bread crumbs -->
		<a href="/content/products/" style="color:#000;">PRODUCTS</a> / <span>Search results for "{$keyword}"</span>
	</div> <!-- end bread crumbs -->
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
		<div style="font-weight:bold; float:right; color:#000; margin-right:32px; margin-top:-10px;">
			{if $page > 1}&nbsp;<a style="color:#000;" href="/content/search/1/?keyword={$keyword}"><<</a>&nbsp;&nbsp;<a style="color:#000;" href="/content/search/{$prev}/?keyword={$keyword}"><</a>{/if}
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
							<a style="color:#000;" href="/content/search/{$smarty.section.foo.iteration}/?keyword={$keyword}" title="{$smarty.section.foo.iteration}">{$smarty.section.foo.iteration}</a>
						{/if}
					{/if}
				{/if}
			{/section}
			{if $page < $total_nodes}&nbsp;<a style="color:#000;" href="/content/search/{$next}/?keyword={$keyword}">></a>&nbsp;&nbsp;
			<a style="color:#000;" href="/content/search/{$total_nodes}/?keyword={$keyword}">>></a>&nbsp;&nbsp;{/if}
		</div>
	{/if}
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
	<a href="/content/product/{$node->products_id}/">{$node->p_name}</a></div>
	{/foreach}
	{if count($objects) == 0}
	<h3 style="color:#000;">No Results Found</h3>
	{/if}
	</div>
</div>
</div>
