window.onload = function () {
	
	var tr, tbody, tables = document.getElementById("content").getElementsByTagName('TABLE');
	var t_tr, t_table = tables.length;
	var cache, i, j, n;
	for (var i = 0; i < t_table; i++) {
		tbody = tables[i].getElementsByTagName('TBODY')[0];
		if (tbody.className.indexOf("tbody") != -1) {
			tr     = tbody.rows;
			t_tr   = tr.length;
			overed = tbody.className.indexOf("overed") != -1;
			
			for (var j = 0; j < t_tr; j++) {
				if (overed) {
					tr[j].onmouseover = function () {
						cache = this.style.backgroundColor;
						if (this.className != 'clicked')
							this.style.backgroundColor = "#E5EEFD";
					}
					tr[j].onmouseout = function () {
						if (this.className != 'clicked')
							this.style.backgroundColor = cache;
					}
					tr[j].onclick = function () {
						cache = this.style.backgroundColor;
						this.style.backgroundColor = "#CCC";
						this.className = 'clicked';
					}
				}
			}
		}			
	}
	
}

function delItem(item_id){
	return confirm('Удалить запись с ID "' + item_id + '"?');
}

function getElementsByClassName(classname, node)  {
    if(!node) node = document.getElementsByTagName("body")[0];
    var a = [];
    var re = new RegExp('\\b' + classname + '\\b');
    var els = node.getElementsByTagName("*");
    for(var i=0,j=els.length; i<j; i++)
        if(re.test(els[i].className))a.push(els[i]);
    return a;
}

function deleteFilter() {
	var nodes = getElementsByClassName('field');
	for (node in nodes) {
		nodes[node].value = '';
	}
}
/*
function validateForm() {
	var fields = document.getElementById('all_fields').value;
	fields = fields.split(',');
	data = new Array();
	for (field in fields) {
		if (indexof('FCK', field) !== false) {
			
		} else {
			
		}
	}
	$.ajax({
		type: "POST",
  		url: "/admin/index/test/validate/",
  		cache: false,
  		success: function(html){
   		 $("#error").append(html);
  	}
});
}
*/