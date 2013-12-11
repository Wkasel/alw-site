<script type="text/javascript">
	{literal}
		$(function(){
			$("#slider_on_main").slider({w:940, h:367});
		});
	{/literal}
</script>
<div id="slider_on_main" class="slider">
	<div class="prev">
		{foreach from=$iom item=node}
			<img src="/source/images/images_on_main/{$node->image}" alt="" />
		{/foreach}
	</div>
	<div class="checker clearix">
		<div class="btns">
			<ul class="clearix">
				{foreach from=$iom name=links item=node2}
				<li><a href="#"></a></li>
				{/foreach}
			</ul>
		</div>
		<div class="name">
			<span>{$iom.0->desc}</span>
		</div>
	</div>
	<ul class="names">
		{foreach from=$iom name=links item=node2}
			<li>{$node2->desc}</li>
		{/foreach}
	</ul>
</div>