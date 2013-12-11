
	<script type="text/javascript">
	{literal}
	//--------------------------------
	// Save functions
	//--------------------------------
	var ajaxObjects = new Array();
	
	// Use something like this if you want to save data by Ajax.
	function saveMyTree()
	{
			saveString = treeObj.getNodeOrders();
			var ajaxIndex = ajaxObjects.length;
			ajaxObjects[ajaxIndex] = new sack();
			var url = '/admin/save_order/' + saveString + '/';
			ajaxObjects[ajaxIndex].requestFile = url;	// Specifying which file to get
			ajaxObjects[ajaxIndex].onCompletion = function() { saveComplete(ajaxIndex); } ;	// Specify function that will be executed after file has been found
			ajaxObjects[ajaxIndex].runAJAX();		// Execute AJAX function			
		
	}
	function saveComplete(index)
	{
		alert(ajaxObjects[index].response);			
	}

	
	// Call this function if you want to save it by a form.
	function saveMyTree_byForm()
	{
		document.myForm.elements['saveString'].value = treeObj.getNodeOrders();
		document.myForm.submit();		
	}
	{/literal}
	</script>
<div class="inline" id="back">
		<a href="javascript: history.go(-1);"><img src="/source/images/admin/back.gif" width="21" height="21" alt="" /></a>
		<span>Структура сайта</span>

	</div>
	<h2>Структура сайта</h2><br />
	<a href="#" onclick="treeObj.collapseAll()">Свернуть</a> | 
	<a href="#" onclick="treeObj.expandAll()">Развернуть</a><br /><br />
	<ul id="dhtmlgoodies_tree2" class="dhtmlgoodies_tree">
		<li id="node1" noDrag="true" noSiblings="true" noDelete="true"><a href="#"><b>{$site_name}</b></a>
			{$tree_nodes}
		</li>
	</ul>
	<form>
	<br />
	<a href="#" onclick="treeObj.collapseAll()">Свернуть</a> | 
	<a href="#" onclick="treeObj.expandAll()">Развернуть</a>
	<br /><br />
	<input type="button" onclick="saveMyTree()" value="Сохранить сортировку">
	</Form>
	<script type="text/javascript">	
	{literal}
	treeObj = new JSDragDropTree();
	treeObj.setTreeId('dhtmlgoodies_tree2');
	treeObj.setMaximumDepth(25);
	treeObj.setMessageMaximumDepthReached('Maximum depth reached');
	treeObj.initTree();
	{/literal}
	{if $expand}
		treeObj.expandAll();
	{else}
		treeObj.showHideNode(false, 'node1');
	{/if}
	{literal}
	x = (parseInt(screen.width)-620)/2;
	y = 50;
	function setVisible(obj)
	{
		obj = document.getElementById(obj);
		obj.style.visibility = (obj.style.visibility == 'visible') ? 'hidden' : 'visible';
	}
	function placeIt(obj)
	{
		obj = document.getElementById(obj);
		if (document.documentElement)
		{
			theLeft = document.documentElement.scrollLeft;
			theTop = document.documentElement.scrollTop;
		}
		else if (document.body)
		{
			theLeft = document.body.scrollLeft;
			theTop = document.body.scrollTop;
		}
		theLeft += x;
		theTop += y;
		obj.style.left = theLeft + 'px' ;
		obj.style.top = theTop + 'px' ;
		setTimeout("placeIt('add_object')",500);
	}
	window.onscroll = setTimeout("placeIt('add_object')",500);	
	{/literal}
	</script>
	
	
	<form name="myForm" method="post" action="/admin/save_order/">
		<input type="hidden" name="saveString">
	</form>

	<div id="add_object">
  <span id="close"><a href="javascript:setVisible('add_object')" style="text-decoration: none"><strong>Hide</strong></a></span>
  <br /><br />
  <form action="/admin/add_object/" method="POST">
	<table cellspacing="0" cellpadding="0">
	<tbody><tr>
	<td width="20%">Тип объекта</td>
	<td>
		<select name="module">
		{foreach from=$menu key=key item=node}
		{if $key != 'tree'}
		<option value="{$key}">{$node}</option>
		{/if}
		{/foreach}
		</select>
	</td>
	<td width="5%">Название</td>
	<td width="10%"><input type="text" size="20" name="label"/></td>
	<td><input type="submit" value="Дальше"/></td>
	</tr>
	
	</tbody></table>
	<input type="hidden" name="parent_id" value="" id="parent_id" />
	<input type="hidden" name="object_type" value="" id="object_type" />
	</form>
</div>

