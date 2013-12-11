<style>
{literal}
* {
	font-family: tahoma;
	font-size: 11px;
	color: #000;
}

html {
	height: 100%;
	min-height: 100%;
/*
	min-width: 800px;
*/
	overflow: auto;
	background-color: #3e3830;
}

body {
	min-height: 100%;
	min-width: 920px;

	position: absolute;

	min-width: 97%;
	margin: 0 1.5%;
/*
	background: #e9e8e5 url(i/body-bg.gif) repeat-x left 40px;
*/
	background: #e9e8e5 url(i/sidebar-bg.gif) repeat-y top left;
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


<h1>Опции </h1>

	<form name="form_options" action="/admin/options" method="post">
		<table cellpadding="5" width="100%" cellspacing="0" border="1" class="view">
		<tr><th>Логаут таймаут, мин</th><td><input name="account_logout_timeout" type="text" value="{$account_logout_timeout}" /></td></tr>
		<tr><th>Таймаут на создание аккаунта, мин</th><td><input name="account_create_timeout" type="text" value="{$account_create_timeout}" /></td></tr>
		<tr><th>Таймаут на удаление аккаунта, дней</th><td><input name="standby_duration" type="text" value="{$standby_duration}" /></td></tr>
		<tr><th>Таймаут на удаление файлов переписки, дней</th><td><input name="file_ttl" type="text" value="{$file_ttl}" /></td></tr>

		<tr><th>Фрилансеров на главной</th><td><input name="home_freelancers" type="text" value="{$home_freelancers}" /></td></tr>

		<tr><th>Макс. работ в категории</th><td><input name="portfolio_limit" type="text" value="{$portfolio_limit}" /></td></tr>

		<tr><th>Разрешенные HTML тэги</th><td><input name="input_allowed_html_tags" type="text" value="{$input_allowed_html_tags}" /></td></tr>
		<tr><th>Длит. привилегированного аккаунта, дней</th><td><input name="privileged_duration" type="text" value="{$privileged_duration}" /></td></tr>
		<tr><th>Длит. платной площадки, дней</th><td><input name="paid_area_duration" type="text" value="{$paid_area_duration}" /></td></tr>
		<tr><th>Длит. featured project, дней</th><td><input name="featured_project_duration" type="text" value="{$featured_project_duration}" /></td></tr>


		<tr><th colspan="2" class="title">Расчет рейтинга</th></tr>
		<tr><th>Рейтинг за &lt;5 проектов</th><td><input name="rating_lt5" type="text" value="{$rating_lt5}" /></td></tr>
		<tr><th>Рейтинг за 5-15 проектов</th><td><input name="rating_5to15" type="text" value="{$rating_5to15}" /></td></tr>
		<tr><th>Рейтинг за &gt;15 проектов</th><td><input name="rating_gt15" type="text" value="{$rating_gt15}" /></td></tr>
		<tr><th>Рейтинг за комментарий</th><td><input name="rating_per_comment" type="text" value="{$rating_per_comment}" /></td></tr>
		<tr><th>Рейтинг за предложение</th><td><input name="rating_per_offer" type="text" value="{$rating_per_offer}" /></td></tr>
		{*<tr><th>Рейтинг за 100 у.е.</th><td><input name="rating_per_money100" type="text" value="{$rating_per_money100}" /></td></tr>*}
		<tr><th>Мин. рейтинг для 2 ранга</th><td><input name="rank_2" type="text" value="{$rank_2}" /></td></tr>
		<tr><th>Мин. рейтинг для 3 ранга</th><td><input name="rank_3" type="text" value="{$rank_3}" /></td></tr>
		<tr><th>Мин. рейтинг для 4 ранга</th><td><input name="rank_4" type="text" value="{$rank_4}" /></td></tr>
		<tr><th>Мин. рейтинг для 5 ранга</th><td><input name="rank_5" type="text" value="{$rank_5}" /></td></tr>

		<tr><th colspan="2" class="title">Курсы валют</th></tr>
		<tr><th>$1 = x EUR</th><td><input name="currency_eur" type="text" value="{$currency_eur}" /></td></tr>
		<tr><th>$1 = x RUB</th><td><input name="currency_rub" type="text" value="{$currency_rub}" /></td></tr>
		<tr><th>$1 = x UAH</th><td><input name="currency_uah" type="text" value="{$currency_uah}" /></td></tr>

		<tr><th colspan="2" class="title">Настройки webmoney</th></tr>
		<tr><th>WMZ кошелек</th><td><input name="wmz" type="text" value="{$wmz}" /></td></tr>
		<tr><th>WME кошелек</th><td><input name="wme" type="text" value="{$wme}" /></td></tr>
		<tr><th>WMR кошелек</th><td><input name="wmr" type="text" value="{$wmr}" /></td></tr>
		<tr><th>WMU кошелек</th><td><input name="wmu" type="text" value="{$wmu}" /></td></tr>
		<tr><th>WMID</th><td><input name="wmid" type="text" value="{$wmid}" /></td></tr>
		<tr><th>WM Secret Key</th><td><input name="wm_secretkey" type="text" value="{$wm_secretkey}" /></td></tr>
		<tr><th>Тестовый режим</th><td><select name="wm_test" style="width:50px">
		<option value="0">Нет</option>
		<option value="1" {if $wm_test eq 1}selected="selected"{/if}>Да</option>
		</select></td></tr>

		<tr><th colspan="2" class="title">Настройки LiqPay</th></tr>
		<tr><th>Login</th><td><input name="p24_account" type="text" value="{$p24_account}" /></td></tr>
		<tr><th>Key</th><td><input name="p24_key" type="text" value="{$p24_key}" /></td></tr>

		<tr><th colspan="2" class="title">Настройки E-Gold</th></tr>
		<tr><th>E-Gold аккаунт</th><td><input name="egold_account" type="text" value="{$egold_account}" /></td></tr>
		<tr><th>AltPassPhrase</th><td><input name="egold_secretkey" type="text" value="{$egold_secretkey}" /></td></tr>
		{*
		<tr><th colspan="2" class="title">Настройки MoneyBookers</th></tr>
		<tr><th>Емэйл аккаунта</th><td><input name="mb_account" type="text" value="{$mb_account}" /></td></tr>
		<tr><th>Secret Key</th><td><input name="mb_secretkey" type="text" value="{$mb_secretkey}" /></td></tr>
		*}
		<tr><th colspan="2" class="title">Стоимость услуг</th></tr>
		<tr><th>Привилегированый, $</th><td><input name="price_pro" type="text" value="{$price_pro}" /></td></tr>
		<tr><th>Платная площадка (Главная), $</th><td><input name="price_paidarea" type="text" value="{$price_paidarea}" /></td></tr>
		<tr><th>Платная площадка (Общ.кат.), $</th><td><input name="price_paidarea_maincat" type="text" value="{$price_paidarea_maincat}" /></td></tr>
		<tr><th>Платная площадка (Подкат.), $</th><td><input name="price_paidarea_cat" type="text" value="{$price_paidarea_cat}" /></td></tr>
		<tr><th>Featured Project, $</th><td><input name="price_featured" type="text" value="{$price_featured}" /></td></tr>
		<tr><th>Проведение конкурса</th><td><input name="price_competition" type="text" value="{$price_competition}" /></td></tr>
		<tr><th>Безопасная сделка, %</th><td><input name="price_safedeal" type="text" value="{$price_safedeal}" /></td></tr>
	
		<tr><th colspan="2" class="title">Скидки на услуги в зависимости от ранга</th></tr>
		<tr><td colspan="2" style="padding-right:0">
			<table cellpadding="3" cellspacing="0" border="0" class="view">

			<tr>
				<th>&nbsp;</th>
				<th>Привилегированый, %</th>
				<th>Платная площадка, %</th>
				<th>Featured Project, %</th>
				<th>Проведение конкурса, %</th>
				<th>Безопасная сделка, %</th>
				{*<th>Бесплатный Sell/Buy</th>*}
			</tr>
			<tr>
				<th>Ранг 1</th>
				<td><input name="rank_1_pro" type="text" value="{$rank_1_pro}" /></td>
				<td><input name="rank_1_paidarea" type="text" value="{$rank_1_paidarea}" /></td>
				<td><input name="rank_1_featured" type="text" value="{$rank_1_featured}" /></td>
				<td><input name="rank_1_competition" type="text" value="{$rank_1_competition}" /></td>
				<td><input name="rank_1_safedeal" type="text" value="{$rank_1_safedeal}" /></td>
				{*<td><select name="rank_1_sellbuy">
				<option value="0">Нет</option>
				<option value="1" {if $rank_1_sellbuy eq 1}selected="selected"{/if}>Да</option>
				</select>
				</td>*}
			</tr>
			<tr>
				<th>Ранг 2</th>
				<td><input name="rank_2_pro" type="text" value="{$rank_2_pro}" /></td>
				<td><input name="rank_2_paidarea" type="text" value="{$rank_2_paidarea}" /></td>
				<td><input name="rank_2_featured" type="text" value="{$rank_2_featured}" /></td>
				<td><input name="rank_2_competition" type="text" value="{$rank_2_competition}" /></td>
				<td><input name="rank_2_safedeal" type="text" value="{$rank_2_safedeal}" /></td>
				{*<td><select name="rank_2_sellbuy">
				<option value="0">Нет</option>
				<option value="1" {if $rank_2_sellbuy eq 1}selected="selected"{/if}>Да</option>
				</select>
				</td>*}
			</tr>
			<tr>
				<th>Ранг 3</th>
				<td><input name="rank_3_pro" type="text" value="{$rank_3_pro}" /></td>
				<td><input name="rank_3_paidarea" type="text" value="{$rank_3_paidarea}" /></td>
				<td><input name="rank_3_featured" type="text" value="{$rank_3_featured}" /></td>
				<td><input name="rank_3_competition" type="text" value="{$rank_3_competition}" /></td>
				<td><input name="rank_3_safedeal" type="text" value="{$rank_3_safedeal}" /></td>
				{*<td><select name="rank_3_sellbuy">
				<option value="0">Нет</option>
				<option value="1" {if $rank_3_sellbuy eq 1}selected="selected"{/if}>Да</option>
				</select>
				</td>*}
			</tr>
			<tr>
				<th>Ранг 4</th>
				<td><input name="rank_4_pro" type="text" value="{$rank_4_pro}" /></td>
				<td><input name="rank_4_paidarea" type="text" value="{$rank_4_paidarea}" /></td>
				<td><input name="rank_4_featured" type="text" value="{$rank_4_featured}" /></td>
				<td><input name="rank_4_competition" type="text" value="{$rank_4_competition}" /></td>
				<td><input name="rank_4_safedeal" type="text" value="{$rank_4_safedeal}" /></td>
				{*<td><select name="rank_4_sellbuy">
				<option value="0">Нет</option>
				<option value="1" {if $rank_4_sellbuy eq 1}selected="selected"{/if}>Да</option>
				</select>
				</td>*}
			</tr>
			<tr>
				<th>Ранг 5</th>
				<td><input name="rank_5_pro" type="text" value="{$rank_5_pro}" /></td>
				<td><input name="rank_5_paidarea" type="text" value="{$rank_5_paidarea}" /></td>
				<td><input name="rank_5_featured" type="text" value="{$rank_5_featured}" /></td>
				<td><input name="rank_5_competition" type="text" value="{$rank_5_competition}" /></td>
				<td><input name="rank_5_safedeal" type="text" value="{$rank_5_safedeal}" /></td>
				{*<td><select name="rank_5_sellbuy">
				<option value="0">Нет</option>
				<option value="1" {if $rank_5_sellbuy eq 1}selected="selected"{/if}>Да</option>
				</select>
				</td>*}
			</tr>
			</table>
		</td></tr>
		{*
		<tr><th colspan="2" class="title">Коррекция статистики на главной странице</th></tr>
		<tr><th>+ проекты</th><td><input name="stat_projects" type="text" value="{$stat_projects}" /></td></tr>
		<tr><th>+ фрилансеры</th><td><input name="stat_freelancers" type="text" value="{$stat_freelancers}" /></td></tr>
		<tr><th>+ заказчики</th><td><input name="stat_clients" type="text" value="{$stat_clients}" /></td></tr>
		<tr><th>+ завершенные сделки</th><td><input name="stat_safedeals" type="text" value="{$stat_safedeals}" /></td></tr>
		*}
		</table>
		<input type="submit" name="save" value="Сохранить" />
	</form>