<style>
{literal}
* {
	font-family: tahoma;
	font-size: 11px;
	color: #000;
}




img {
	border: 0;
}

input, select, textarea {
	border: 1px solid #bfbebe;
}
input, textarea {
	padding: 2px;
}

input.focus, textarea.focus {
	border: 1px solid #2a7db1;
}
input.required, input.textarea {
/*
	border: 1px solid red;
	background-color: #ffb685;
*/
}




.left {
	float: left;
}
.right {
	float: right;
}
.show {
	display: block !important;
}

strong * {
    font-weight: bold;
}


table.list {
	border: 1px solid #bfbebe;
}
table.list tr {
	border-left: 1px solid #e7e5e5;
}
table.list td, table.list th {
	border: 1px solid #e7e5e5;
	border-top-width: 0;
	border-right-width: 0;

	padding: 4px;

	background-color: #FFF;
}
table.list th {
	border-top: 1px solid #e7e5e5;
	background: #fff url(i/th-bg.gif) repeat-x top left;
	text-align: center;
	font-weight: normal;
}
table.list th a {
	display: block;
	padding: 5px 0;
	color: #4369ac;
}
table.list th.asc a {
	padding-right: 10px;
	background: transparent url(i/sort-asc.gif) no-repeat center right;
}
table.list th.desc a {
	padding-right: 10px;
	background: transparent url(i/sort-desc.gif) no-repeat center right;
}


table input, table select {
	width: 94%;
}
table .actions {
	border-right-width: 1px;
}
table .actions a, .global-actions a {
	display: block;

	width: 19px;
	height: 16px;

/*	margin: 0 2px 0 2px;*/

	overflow: hidden;
	line-height: 40px;

	float: left;
}
th.actions-1 {
	width: 30px;
}
th.actions-3 {
	width: 80px;
}
th.actions-2 {
	width: 40px;
}
th.actions-5 {
	width: 100px;
}


table .odd td {
	background-color: #f8f8f8;
}

table .actions .view {
	background: transparent url(i/btn-view.gif) no-repeat top left;
}
table .actions .edit {
	background: transparent url(i/btn-edit.gif) no-repeat top left;
}
table .actions .delete {
	background: transparent url(i/btn-delete.gif) no-repeat top left;
}
table .actions .disable {
	background: transparent url(i/btn-disable.gif) no-repeat top left;
}
table .actions .select {
	width: 18px;
	background: transparent url(i/btn-select.gif) no-repeat top left;
}
table .actions .move-up {
	width: 15px;
	background: transparent url(i/btn-move-up.gif) no-repeat top left;
}
table .actions .move-down {
	width: 15px;
	background: transparent url(i/btn-move-down.gif) no-repeat top left;
}



h1 {
	margin: 0 0 15px 0;

	font-size: 25px;
	font-family: "Arial Narrow", tahoma, sans-serif;
	font-weight: normal;
}



a {
	text-decoration: none;
}
a:hover {
	text-decoration: underline;
}



#body {
	min-height: 400px;

	border-top: 40px solid #000;


	padding: 20px 20px 20px 250px;
/*
	overflow: scroll;
*/

	background: transparent url(i/body-shade.png) no-repeat top left;
}




#logo {
	position: absolute;
	top: 0;
	left: 20px;

	display: block;

	line-height: 35px;

	color: #fff;
	font-weight: bold;
	text-decoration: none;

	z-index: 1;
}



#login-panel {
	position: absolute;
	top: 12px;
	right: 20px;

	margin: 0;
	padding: 0;

	z-index: 1;
}
#login-panel li {
	color: #fff;
}
#login-panel li {
	float: left;

	margin: 0;
	padding: 0;

	padding-right: 5px;

	border-left: 1px solid #fff;
	line-height: 11px;
	list-style-type: none;
	font-size: 11px;
}
#login-panel .first {
	border-left-width: 0;
}
#login-panel li a {
	float: left;

	margin-left: 7px;

	color: #f75c26;
	font-size: 11px;
}






#primary-navigation {
	float: left;

	width: 183px;

	margin: 60px 0 0 0;
	padding: 11px 0 18px 18px;

	background: transparent url(i/nav-top.gif) no-repeat top right;
}
#primary-navigation ul {
	margin: 0;
	padding: 0;
}
#primary-navigation li {
	float: left;
	clear:left;

	width: 181px;

	margin: 0;
	padding: 0;

	border: 1px solid #c8c7c7;
	border-top-width: 0;

	line-height: 30px;
	list-style-type: none;
	background-color: #eaeaea;
}
#primary-navigation li ul {
	display: none;
}
#primary-navigation li.current ul {
	display: block;
}
#primary-navigation li li {
	border-width: 0;
	border-top: 1px solid #c8c7c7;

	background-color: #fff;
}
#primary-navigation a {
	display: block;
	height: 30px;

	padding-left: 16px;

	color: #4369ac;
	font-weight: bold;
	font-size: 11px;

	text-decoration: none;
	text-transform: uppercase;
}
#primary-navigation .current a {
	color: #000;
}
#primary-navigation li li a {
	padding-left: 40px;

	color: #333333;
	font-weight: normal;
	text-transform: none;

	background: transparent url(i/nav-button.gif) no-repeat top left;
}
#primary-navigation li li a:hover {
	color: #2f70a2;
}
#primary-navigation li li.current a {
	background-color: #f7f8f8;
	background-position: top right;
}




#footer {
	clear: both;
}



.show-password {
	display: none;
	position: absolute;
	margin: -2px 0 0 5px;
}



.paging {
	height: 35px;
	padding-right: 1%;
}



.global-actions {
	position: absolute;
	right: 20px;

	margin: -20px .8% 0 0;

	padding: 7px 5px 7px 10px;

	background-color: #fff;
	border: 1px solid #bfbebe;
}

.global-actions {
}
.global-actions a {
	line-height: 16px;
	width: 45px;
	padding-left: 25px;
}
.global-actions .new, table .actions .new {
	width: 100px;
	background: transparent url(i/btn-new.gif) no-repeat top left;
}
.global-actions .print, table .actions .print {
	background: transparent url(i/btn-print.gif) no-repeat top left;
}
.global-actions .back, table .actions .back {
	width: 110px;
	background: transparent url(i/btn-back.gif) no-repeat top left;
}

table .actions .new {
	width: 16px;
}


span.submit {
}
span.submit button {
	padding: 3px;

	border: 1px solid #bfbebe;
	border-top: 1px solid #e7e5e5;
	border-left: 1px solid #e7e5e5;

	background-color: #f5f2f2;

	color: #4369ac;

	cursor: pointer;
	cursor: hand;

	text-align: center;
}

.button {
	padding: 2px;

	border: 1px solid #bfbebe;
	border-top: 1px solid #e7e5e5;
	border-left: 1px solid #e7e5e5;

	background-color: #f5f2f2;

	color: #4369ac;

	cursor: pointer;
	cursor: hand;

	text-decoration: none !important;
	text-align: center;
}




table.view {
	width: 99%;
	border-collapse: collapse;
	border: 1px solid #c8c7c7;
}
table.view td, table.view th {
	border: 1px solid #c8c7c7;
}
table.view th {
	width: 20%;
/*
	font-weight: normal;
*/
	text-align: right;

	background-color: #eaeaea;
}
table.view td {
	background-color: #fff;
	word-wrap: break-word;
}
table.view .title {
	text-align: center;
	font-weight: bold;
/*	text-transform: uppercase;*/
}




table.edit {
	width: 99%;
	border: 0px solid red;
}
table.edit .odd td, table.edit .odd th {
	background-color: #f4f4f4;
}
table.edit td, table.edit th {
	border: 0px solid red;
}
table.edit th {
	width: 20%;
	text-align: right;
	vertical-align: top;
	padding-top: 7px;
}
table.edit td {
}
table.edit input {
	width: 50%;
}
table.edit select {
	width: auto;
}
table.edit textarea {
	width: 70%;
	height: 100px;
}
table.edit .title {
	padding-top: 25px;
	text-align: left;
	font-size: 18px;
	font-weight: normal;
}
table.edit .submit {
	float: left;
	margin-right: 5px;
}
table.edit .submit button {
	padding: 4px;
	font-weight: bold;
}


.field-error {
	display: none;

	width: 50%;

	margin-top: 2px;
	padding: 4px 3px 4px 3px;

/*
	background-color: #fff;
	border: 1px solid red;
*/

	color: #fff;
	font-weight: bold;
	background-color: #f98f90;
}





.popup #logo {
	display: none;
}
.popup #login-panel {
	display: none;
}
.popup #primary-navigation {
	display: none;
}
.popup {
	width: 100%;
	margin-left: 0;
	margin-right: 0;
	background-image: none;
}
.popup #body {
	padding-left: 20px;
	border-top-width: 0;
	background-image: none;
}




.breadcrumbs, .breadcrumbs * {
	font-size: 12px;
	font-weight :bold;
}

{/literal}
</style>

<h1>Общая статистика сайта</h1>

	<table cellpadding="5" cellspacing="0" border="0" class="view">
	<tr><th>Аккаунтов "стандарт"</th><td>{$accounts_std_count}</td></tr>
	<tr><th>Аккаунтов-Advanced</th><td>{$accounts_pro_count}</td></tr>
	<tr><th>Аккаунтов "заказчик"</th><td>{$accounts_client_count}</td></tr>
	<tr><th>Активных баннеров</th><td>{$banners_count}</td></tr>

	<tr><th>Количество удачно проведенных безопасных сделок</th><td>{$safe_seals_count}</td></tr>
	<tr><th>Количество аккаунтов размещенных на платных площадках</th><td>{$paidarea_count}</td></tr>

	<tr><th>Объем загруженых файлов</th><td>{$files_size}</td></tr>
	<tr><th>Объем базы данных</th><td>{$db_size}</td></tr>
	</table>
