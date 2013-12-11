	<!-- products -->
		<div class="products clearfix">
		{foreach from=$pom item=node}
		<div class="prod">
		<a href="{$node->pom_link}"{if $node->pom_new_window} target="_blank"{/if}>
			<img src="/source/images/product_on_main/{$node->image}" alt="" />
		</a>
		<br /><a href="{$node->pom_link}"{if $node->pom_new_window} target="_blank"{/if}>{$node->pom_name}</a></div>
		{/foreach}
		
			<div class="about_alw">
				<img class="h" src="/source/images/about-alw.jpg" alt="" />
				<p class="text" style="line-height: 20px;">{$about->pages_content|truncate:150}</p><br />
				<a href="/content/pages/about/">
				<img class="more" src="/source/images/read-more.jpg" alt=""  class="more" />
				</a>
			</div>
		</div>
	<!-- end products -->
<!-- end main page -->