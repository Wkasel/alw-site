/*

»зменени€
- инициализаци€ каждого контрола вынесена в отдельный метод (можно использовать дл€ конкретного объекта)
- добавлено состо€ние disabled дл€ флажков и радиокнопок
- добавлена поддержка label
- стили вынесены из js
- проверки if (value == true) заменены на if (value) :)
- исправлено объ€вление локальных переменных 

*/

var selectWidth = "190";
var cfHeight = { "checkbox": 25, "radio": 25 }

/* No need to change anything after this */

var Custom = {
	init: function() {
		var inputs = document.getElementsByTagName("input");
		for(var a = 0; a < inputs.length; a++) {
			if((inputs[a].type == "checkbox" || inputs[a].type == "radio") && inputs[a].className == "styled") {
				Custom.initCheckRadio(inputs[a]);
			}
		}
		inputs = document.getElementsByTagName("select");
		for(var a = 0; a < inputs.length; a++) {
			if(inputs[a].className == "styled") {
			    Custom.initSelect(inputs[a]);
			}
		}
	},
	pushed: function() {
		element = this.nextSibling;
		if (element.checked) {
			this.style.backgroundPosition = "0 -" + cfHeight[element.type] * 3 + "px";
		} else {
			this.style.backgroundPosition = "0 -" + cfHeight[element.type] + "px";
		}
	},
	check: function() {
		element = this.nextSibling;
		if(element.checked && element.type == "checkbox") {
			this.style.backgroundPosition = "0 0";
			element.checked = false;
		} else {
			this.style.backgroundPosition = "0 -" + cfHeight[element.type]*2 + "px";
			if(element.type == "radio") {
				group = this.nextSibling.name;
				inputs = document.getElementsByTagName("input");
				for(a = 0; a < inputs.length; a++) {
					if(inputs[a].name == group && inputs[a] != this.nextSibling) {
						inputs[a].previousSibling.style.backgroundPosition = "0 0";
					}
				}
			}
			element.checked = true;
		}
	},
	clear: function() {
		inputs = document.getElementsByTagName("input");
		for(var b = 0; b < inputs.length; b++) {
	        if (inputs[b].className == "styled_")
	        {
    			var _span = inputs[b].previousSibling;
        		_span.style.backgroundPosition = Custom._getBgPos(inputs[b]);
    		}
		}
	},
	choose: function() {
		option = this.getElementsByTagName("option");
		for(var d = 0; d < option.length; d++) {
			if(option[d].selected) {
				document.getElementById("select" + this.name).childNodes[0].nodeValue = option[d].childNodes[0].nodeValue;
			}
		}
	},
	
	// инициализаци€ отдельного select
	initSelect: function(obj) {
		var option = obj.getElementsByTagName("option");
		var active = option[0].childNodes[0].nodeValue;
		var textnode = document.createTextNode(active);
		for (var b = 0; b < option.length; b++)
        {
			if (option[b].selected == true)
            {
				textnode = document.createTextNode(option[b].childNodes[0].nodeValue);
			}
		}
		var _span = document.createElement("span");
		_span.className = "select";
		_span.id = "select" + obj.name;
		_span.appendChild(textnode);
		obj.parentNode.insertBefore(_span, obj);
		obj.onchange = Custom.choose;
		obj.className = "styled_";
    },
    
    // инициализаци€ отдельного флажка или радиокнопки
    initCheckRadio: function(obj) {
		var _span = document.createElement("span");
		_span.className = obj.type;
        var _position = Custom._getBgPos(obj);
		_span.style.backgroundPosition = _position;
		obj.parentNode.insertBefore(_span, obj);
		
        if (!obj.disabled)
        {
            obj.onchange = obj.onclick = Custom.clear;
    		_span.onmousedown = Custom.pushed;
    		_span.onmouseup = Custom.check;
    		document.onmouseup = Custom.clear;
    	}
		obj.className = "styled_";
    },
    
    _getBgPos: function(obj) {
        var _pos = "0 0";
		if (obj.disabled) {
            _pos = "0 -" + (cfHeight[obj.type] * 4) + "px";
        } else if (obj.checked) {
            _pos = "0 -" + (cfHeight[obj.type] * 2) + "px";
		}
		return _pos;
    }
}
window.onload = Custom.init;