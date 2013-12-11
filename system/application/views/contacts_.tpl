<div class="contact_us clearfix"> <!-- contact us -->


	<h1>Interested in a Catalog?</h1>
	<a href="mailto:shira@archltgworks.com" class="btn">
		CONTACT US
	</a>
	{foreach name=user from=$team item=node}
	<div class="user clearfix {if $smarty.foreach.user.iteration%2==0}odd{/if}">
		<img src="/source/images/team/{$node->t_image}" width="154" height="128" alt="" />
		<div class="data">
			<h2>{$node->t_name}</h2>

			<h3>{$node->t_position}</h3>
			<p>
				{$node->t_phone} (Ph) <br />
				{$node->t_fax} (FX)
			</p>
			<a href="mailto:{$node->t_email}">{$node->t_email}</a>
		</div>
	</div>
	{/foreach}
</div>
<br /><br />
<script type="text/javascript">
init();
</script>