<?php 
defined('BASEPATH') or die('No direct script access.');

$config['images_path'] = '/source/images/';
$config['files_path'] = '/source/files/';
$config['menu_items'] = array(
	'System' => array( 
		'__users'=>'System users', 
		'site_admins' => 'Site admins',
		'meta_info' => 'META management',
		'pages' => 'Static pages',
		'mails' => 'Spec. Registr. Email',
		'photometry' => 'skip_Photometry',
		'matrix' => 'skip_Matrix',
		'file_storage' => 'File storage'),
	'Content' => array(
		'images_on_main' => 'Images on main',
		'products_on_main' => 'Products on main',
		'featured' => 'Featured products',
		'project' => 'Custom projects',
		'product_cats' => 'Product cats',
		'products' => 'Products',
    'quick_ship_inventory' => 'Quick ship inventory',
		'team' => 'Team',
		'office' => 'Offices',
		'reps_cats' => 'Reps cats',
		'reps_articles' => 'Reps articles',				
    'event_calendar' => 'Event calendar'));
$config['default_module'] = 'pages';
$config['site_name'] = 'archltgworks.com';


$config['__users'] = array (
	'title' => 'System users',
	'fields' => array (
		'__users_id'=> array(
			'type' => 'id',
			'value'=> 'ID',
			'show' => true,
			'disabled' >true,
			'main' =>true,
			'width'=>'5%'
		),
		'user_name'=> array(
			'type' => 'input',
			'value'=> 'Login',
			'validation'=> array ('type' => 'regex', 'value' => '/^[a-z0-9_]{2,20}$/i'),
			'main'=>true
		),
		'user_pass'=> array(
			'type' => 'password',
			'value'=> 'Password',
			'style'=>'width:150px;',
			'function' => 'md5'
		),
		'user_email'=> array(
			'type' => 'input',
			'value'=> 'E-mail',
			'validation'=> array ('type' => 'email'),
			'main'=>true
		),
		'user_pers' => array (
			'type' => 'select',
			'value'=> 'Group',
			'from' => array('mode'=>'from_table', 'data' => array('table'=>'__groups', 'selected_id'=>0, 'fields'=>array('group_id', 'group_name'), 'order_by'=>'group_id', 'order_type'=>'asc')),
			'display' => '__groups.group_name',
			'main' =>true
		)
	),
	'table_id' => '__users_id',		
	'per_page' => 50,
	'no_owner' => true,
	'default_sort' => array('field'=>'__users_id', 'type'=>'asc'),
	'joins' => array(array('type'=>'left join', 'table' => '__groups', 'condition'=>'this.user_pers = table.group_id'))	
);

$config['mails'] = array (
	'title' => 'Spec. Registr. Email',
	'fields' => array (
		'mails_id'=> array(
			'type' => 'id',
			'value'=> 'ID',
			'show' => true,
			'disabled' >true,
			'main' =>true,
			'width'=>'5%'
		),
		'mails_name'=> array(
			'type' => 'input',
			'value'=> 'Name',
			'style'=> "width:220px;",
			'main'=>true
		),
		'mails_mail'=> array(
			'type' => 'input',
			'value'=> 'Name',
			'style'=> "width:220px;",
			'main'=>true
		),
	),
	'table_id' => 'mails_id',		
	'per_page' => 50,
	'no_owner' => true,
	'default_sort' => array('field'=>'mails_id', 'type'=>'asc')
);

$config['site_admins'] = array (
	'title' => 'Site admins',
	'fields' => array (
		'site_admins_id'=> array(
			'type' => 'id',
			'value'=> 'ID',
			'show' => true,
			'disabled' >true,
			'main' =>true,
			'width'=>'5%'
		),
		'admin_login'=> array(
			'type' => 'input',
			'value'=> 'Login',
			'style'=> "width:150px;",
			'validation'=> array ('type' => 'regex', 'value' => '/^[a-z0-9_]{2,20}$/i'),
			'main'=>true
		),
		'admin_password'=> array(
			'type' => 'password',
			'value'=> 'Password',
			'style'=>'width:150px;',
			'function' => 'md5'
		)
	),
	'table_id' => 'site_admins_id',		
	'per_page' => 50,
	'no_owner' => true,
	'default_sort' => array('field'=>'site_admins_id', 'type'=>'asc')
);

$config['meta_info'] = array (
	'title' => 'Meta management',
	'fields' => array (
		'meta_info_id'=> array(
			'type' => 'id',
			'value'=> 'ID',
			'show' => true,
			'disabled' >true,
			'main' =>true,
			'width'=>'5%'
		),
		'meta_url'=> array(
			'type' => 'input',
			'style'=> 'width:300px',
			'value'=> 'URL',
			'main'=>true
		),
		'meta_title'=> array(
			'type' => 'textarea',
			'style'=> 'width:600px;height:120px',
			'value'=> 'Title',
			'main'=>true
		),
		'meta_keyword'=> array(
			'type' => 'textarea',
			'style'=> 'width:600px;height:120px',
			'value'=> 'Keywords'
		),
		'meta_desc'=> array(
			'type' => 'textarea',
			'style'=> 'width:600px;height:120px',
			'value'=> 'Description'
		)
	),
	'table_id' => 'meta_info_id',		
	'per_page' => 50,
	'no_owner' => true,
	'default_sort' => array('field'=>'meta_info_id', 'type'=>'asc')	
);

$config['pages'] = array (
	'title' => 'Pages',
	'fields' => array (
		'pages_id'=> array(
			'type' => 'id',
			'value'=> 'ID',
			'show' => true,
			'disabled' >true,
			'main' =>true,
			'width'=>'5%'
		),
		'pages_title' => array (
			'type' => 'input',
			'style' => 'width:300px',
			'value'=> 'Title',
			'main' =>true
		),	
		'pages_systemname' => array (
			'type' => 'input',
			'value'=> 'System name',
			'main' =>true
		),
		'pages_content' => array (
			'type' => 'editor',
			'height'=>250,
			'value'=> 'Content'
		)
	),
	'table_id' => 'pages_id',		
	'per_page' => 50,
	'no_owner' => true,
	'default_sort' => array('field'=>'pages_id', 'type'=>'asc')
);


$config['images_on_main'] = array (
	'title' => 'Images on main',
	'fields' => array (
		'images_on_main_id'=> array(
			'type' => 'id',
			'value'=> 'ID',
			'show' => true,
			'disabled' >true,
			'main' =>true,
			'width'=>'5%'
		),
		'desc' => array (
			'type' => 'input',
			'value'=> 'Name',
			'style'=> 'width:350px',
			'main' =>true
		),
		'image' => array (
			'type' => 'image',
			'value'=> 'Image',
			'resize'=>'true',
			'width_diplsay' => 332,
			'height_display' => 250,
			'path' => 'images_on_main',
			'extentions' => array('jpg', 'jpeg', 'png', 'gif'),
			'main' =>true
		)
	),
	'table_id' => 'images_on_main_id',		
	'per_page' => 50,
	'sortable' => true,
	'no_owner' => true,
	'default_sort' => array('field'=>'__order', 'type'=>'asc')
);

$config['quick_ship_inventory'] = array (
	'title' => 'Quick ship inventory',
  'strict_table' => 'products',
	'fields' => array (
		  'products_id'=> array(
			'type' => 'id',
			'value'=> 'ID',
			'show' => true,
			'disabled' >true,
			'main' =>true,
			'width'=>'5%'
  		),
  		'p_name'=> array(
  			'type' => 'input',
  			'value'=> 'Name',
  			'main'=>true
  		),
  		'p_desc'=> array(
  			'type' => 'editor',
  			'value'=> 'Description',
  			'height' => 250,
  			'main'=>true
  		),
  		'available_inventory'=> array(
			'type' => 'input',
			'style' => 'width:30px',
			'value'=> 'Available Inventory',
      'main'=>true
  		)
	),
	'table_id' => 'products_id',		
	'per_page' => 50,
  'where'    => array(array('quick_ship','1')),
	'no_owner' => true,
  'nodel' => true,
  'noadd' => true,
  'nofoot' => true,
  'save' => true,
  'input_field' => array('available_inventory'),
	'default_sort' => array('field'=>'__order', 'type'=>'asc')
);

$config['products_on_main'] = array (
	'title' => 'Images on main',
	'fields' => array (
		'products_on_main_id'=> array(
			'type' => 'id',
			'value'=> 'ID',
			'show' => true,
			'disabled' >true,
			'main' =>true,
			'width'=>'5%'
		),
		'pom_name' => array (
			'type' => 'input',
			'value'=> 'Name',
			'style'=> 'width:350px',
			'main' =>true
		),
		'pom_link' => array (
			'type' => 'input',
			'value'=> 'Link',
			'style'=> 'width:350px',
			'main' =>true
		),
		'pom_new_window' => array (
			'type' => 'checkbox',
			'value'=> 'New window',
			'checked'=>0,
			'alias' =>array('No', 'Yes')
		),
		'image' => array (
			'type' => 'image',
			'value'=> 'Image',
			'resize'=>'true',
			'width_diplsay' => 332,
			'height_display' => 250,
			'path' => 'product_on_main',
			'extentions' => array('jpg', 'jpeg', 'png', 'gif'),
			'main' =>true
		)
	),
	'table_id' => 'products_on_main_id',		
	'per_page' => 50,
	'no_owner' => true,
	'sortable' => true,
	'default_sort' => array('field'=>'__order', 'type'=>'asc')
);

$config['featured'] = array (
	'title' => 'Featured products',
	'fields' => array (
		'featured_id'=> array(
			'type' => 'id',
			'value'=> 'ID',
			'show' => true,
			'disabled' >true,
			'width'=>'5%',
			'main'=>true
		),
		'p_name'=> array(
			'type' => 'input',
			'value'=> 'Name',
			'main'=>true
		),
		'p_name_ex'=> array(
			'type' => 'input',
			'value'=> 'Name (extended)',
		),
		'p_desc'=> array(
			'type' => 'editor',
			'value'=> 'Description',
			'height' => 250,
			'main'=>true
		),
		'p_download' => array (
			'type' => 'file',
			'value'=> 'Download spec sheet',
			'path' => 'main_files',
			'extentions'=>'*',
			'main' => true,
			'alias' => 'Download',
		),
		'p_install' => array (
			'type' => 'file',
			'value'=> 'Installation instructions',
			'path' => 'main_files',
			'extentions'=>'*',
			'main' => true,
			'alias' => 'Download',
		),
		
		'p_image1' => array (
			'type' => 'image',
			'value'=> 'Image 1',
			'resize'=>'true',
			'width_diplsay' => 126,
			'height_display' => 126,
			'new_width' => 600,
			'new_height' => 500,
			'path' => 'site_images',
			'extentions' => array('jpg', 'jpeg', 'png', 'gif'),
			'main' =>true
		),
		'p_image2' => array (
			'type' => 'image',
			'value'=> 'Image 2',
			'resize'=>'true',
			'width_diplsay' => 500,
			'height_display' => 600,
			'path' => 'site_images',
			'extentions' => array('jpg', 'jpeg', 'png', 'gif'),
		),
		'p_image3' => array (
			'type' => 'image',
			'value'=> 'Image 3',
			'resize'=>'true',
			'width_diplsay' => 500,
			'height_display' => 600,
			'path' => 'site_images',
			'extentions' => array('jpg', 'jpeg', 'png', 'gif'),
		),
		'p_image4' => array (
			'type' => 'image',
			'value'=> 'Image 4',
			'resize'=>'true',
			'width_diplsay' => 500,
			'height_display' => 600,
			'path' => 'site_images',
			'extentions' => array('jpg', 'jpeg', 'png', 'gif'),
		),
		'p_image5' => array (
			'type' => 'image',
			'value'=> 'Image 5',
			'resize'=>'true',
			'width_diplsay' => 500,
			'height_display' => 600,
			'path' => 'site_images',
			'extentions' => array('jpg', 'jpeg', 'png', 'gif'),
		),
		'p_image6' => array (
			'type' => 'image',
			'value'=> 'Image 6',
			'resize'=>'true',
			'width_diplsay' => 500,
			'height_display' => 600,
			'path' => 'site_images',
			'extentions' => array('jpg', 'jpeg', 'png', 'gif'),
		),
		'p_image7' => array (
			'type' => 'image',
			'value'=> 'Image 7',
			'resize'=>'true',
			'width_diplsay' => 500,
			'height_display' => 600,
			'path' => 'site_images',
			'extentions' => array('jpg', 'jpeg', 'png', 'gif'),
		),
		'p_image8' => array (
			'type' => 'image',
			'value'=> 'Image 8',
			'resize'=>'true',
			'width_diplsay' => 500,
			'height_display' => 600,
			'path' => 'site_images',
			'extentions' => array('jpg', 'jpeg', 'png', 'gif'),
		),
		'p_image9' => array (
			'type' => 'image',
			'value'=> 'Image 9',
			'resize'=>'true',
			'width_diplsay' => 500,
			'height_display' => 600,
			'path' => 'site_images',
			'extentions' => array('jpg', 'jpeg', 'png', 'gif'),
		),
		'p_image10' => array (
			'type' => 'image',
			'value'=> 'Image 10',
			'resize'=>'true',
			'width_diplsay' => 500,
			'height_display' => 600,
			'path' => 'site_images',
			'extentions' => array('jpg', 'jpeg', 'png', 'gif'),
		),
		'quick_ship' =>  array (
			'type' => 'checkbox',
			'value'=> 'Quick ship',
			'checked'=>0,
			'alias' =>array('No', 'Yes')
		),
		'quick_ship_pdf' => array (
			'type' => 'file',
			'value'=> 'Spec sheet',
			'path' => 'main_files',
			'extentions'=>'*',
			'alias' => 'Spec sheet',
		),
		'available_inventory'=> array(
			'type' => 'input',
			'style' => 'width:30px',
			'value'=> 'Available Inventory'
		),
		'configurator'=> array(
			'type' => 'input',
			'style' => 'width:200px',
			'value'=> 'Configurator'
		)
		
	),
	'table_id' => 'featured_id',		
	'per_page' => 50,
	'child_table' => array('photometry'=>array('alias' => 'Photometry'), 'matrix' => array('alias'=> 'LED Matrix')),
	'no_owner' => true,
	'sortable' => true,
	'default_sort' => array('field'=>'__order', 'type'=>'asc')
);

$config['project'] = array (
	'title' => 'Projects',
	'fields' => array (
		'project_id'=> array(
			'type' => 'id',
			'value'=> 'ID',
			'show' => true,
			'disabled' >true,
			'main' =>true,
			'width'=>'5%'
		),
		'p_name'=> array(
			'type' => 'input',
			'value'=> 'Name',
			'main'=>true
		),
		'p_name_ex'=> array(
			'type' => 'input',
			'value'=> 'Name (extended)',
		),
		'p_desc'=> array(
			'type' => 'editor',
			'value'=> 'Description',
			'height' => 250,
			'main'=>true
		),
		'p_series'=> array(
			'type' => 'input',
			'value'=> 'Series',
		),
		'p_spec'=> array(
			'type' => 'input',
			'value'=> 'Specifier',
		),
		'p_location'=> array(
			'type' => 'input',
			'value'=> 'Location',
		),
		'p_image1' => array (
			'type' => 'image',
			'value'=> 'Image 1',
			'resize'=>'true',
			'width_diplsay' => 150,
			'height_display' => 150,
			'path' => 'site_images',
			'extentions' => array('jpg', 'jpeg', 'png', 'gif'),
			'main' =>true
		),
		'p_image2' => array (
			'type' => 'image',
			'value'=> 'Image 2',
			'resize'=>'true',
			'width_diplsay' => 500,
			'height_display' => 600,
			'path' => 'site_images',
			'extentions' => array('jpg', 'jpeg', 'png', 'gif'),
		),
		'p_image3' => array (
			'type' => 'image',
			'value'=> 'Image 3',
			'resize'=>'true',
			'width_diplsay' => 500,
			'height_display' => 600,
			'path' => 'site_images',
			'extentions' => array('jpg', 'jpeg', 'png', 'gif'),
		),
		'p_image4' => array (
			'type' => 'image',
			'value'=> 'Image 4',
			'resize'=>'true',
			'width_diplsay' => 500,
			'height_display' => 600,
			'path' => 'site_images',
			'extentions' => array('jpg', 'jpeg', 'png', 'gif'),
		),
		'p_image5' => array (
			'type' => 'image',
			'value'=> 'Image 5',
			'resize'=>'true',
			'width_diplsay' => 500,
			'height_display' => 600,
			'path' => 'site_images',
			'extentions' => array('jpg', 'jpeg', 'png', 'gif'),
		),
		'p_image6' => array (
			'type' => 'image',
			'value'=> 'Image 6',
			'resize'=>'true',
			'width_diplsay' => 500,
			'height_display' => 600,
			'path' => 'site_images',
			'extentions' => array('jpg', 'jpeg', 'png', 'gif'),
		),
		'p_image7' => array (
			'type' => 'image',
			'value'=> 'Image 7',
			'resize'=>'true',
			'width_diplsay' => 500,
			'height_display' => 600,
			'path' => 'site_images',
			'extentions' => array('jpg', 'jpeg', 'png', 'gif'),
		),
		'p_image8' => array (
			'type' => 'image',
			'value'=> 'Image 8',
			'resize'=>'true',
			'width_diplsay' => 500,
			'height_display' => 600,
			'path' => 'site_images',
			'extentions' => array('jpg', 'jpeg', 'png', 'gif'),
		),
		'p_image9' => array (
			'type' => 'image',
			'value'=> 'Image 9',
			'resize'=>'true',
			'width_diplsay' => 500,
			'height_display' => 600,
			'path' => 'site_images',
			'extentions' => array('jpg', 'jpeg', 'png', 'gif'),
		),
		'p_image10' => array (
			'type' => 'image',
			'value'=> 'Image 10',
			'resize'=>'true',
			'width_diplsay' => 500,
			'height_display' => 600,
			'path' => 'site_images',
			'extentions' => array('jpg', 'jpeg', 'png', 'gif'),
		)
		
	),
	'table_id' => 'project_id',		
	'per_page' => 50,
	'no_owner' => true,
	'sortable' => true,
	'default_sort' => array('field'=>'__order', 'type'=>'asc')
);

$config['custom_projects'] = array (
	'title' => 'Custom projects',
	'fields' => array (
		'custom_projects_id'=> array(
			'type' => 'id',
			'value'=> 'ID',
			'show' => true,
			'disabled' >true,
			'main' =>true,
			'width'=>'5%'
		),
		'name' => array (
			'type' => 'input',
			'value'=> 'Name',
			'main' =>true
		),
		'image' => array (
			'type' => 'image',
			'value'=> 'Image',
			'resize'=>'true',
			'width_diplsay' => 332,
			'height_display' => 250,
			'path' => 'custom',
			'extentions' => array('jpg', 'jpeg', 'png', 'gif'),
			'main' =>true
		)
	),
	'table_id' => 'custom_projects_id',		
	'per_page' => 50,
	'no_owner' => true,
	'sortable' => true,
	'default_sort' => array('field'=>'__order', 'type'=>'asc')
);


$config['product_cats'] = array (
	'title' => 'Product cats',
	'fields' => array (
		'product_cats_id'=> array(
			'type' => 'id',
			'value'=> 'ID',
			'show' => true,
			'disabled' >true,
			'main' =>true,
			'width'=>'5%'
		),
		'pc_name' => array (
			'type' => 'input',
			'value'=> 'Name',
			'main' =>true
		),
		'pc_image' => array (
			'type' => 'image',
			'value'=> 'Image',
			'resize'=>'true',
			'width_diplsay' => 232,
			'height_display' => 150,
			'path' => 'cats',
			'extentions' => array('jpg', 'jpeg', 'png', 'gif'),
			'main' =>true
		)
	),
	'table_id' => 'product_cats_id',		
	'per_page' => 50,
	'sortable' => true,
	'no_owner' => true,
	'default_sort' => array('field'=>'__order', 'type'=>'asc')
);

$config['products'] = array (
	'title' => 'Products',
	'fields' => array (
		'products_id'=> array(
			'type' => 'id',
			'value'=> 'ID',
			'show' => true,
			'disabled' >true,
			'width'=>'5%',
			'main' => true
		),
		'p_cat' => array (
			'type' => 'select',
			'value'=> 'Product cat',
			'from' => array('mode'=>'from_table', 'data' => array('table'=>'product_cats', 'selected_id'=>0, 'fields'=>array('product_cats_id', 'pc_name'), 'order_by'=>'product_cats_id', 'order_type'=>'asc')),
			'display' => 'pc_name',
			'main' =>true
		),
		'p_name'=> array(
			'type' => 'input',
			'value'=> 'Name',
			'main'=>true
		),
		'p_name_ex'=> array(
			'type' => 'input',
			'value'=> 'Name (extended)',
		),
		'p_desc'=> array(
			'type' => 'editor',
			'value'=> 'Description',
			'height' => 250,
			'main'=>true
		),
		'p_download' => array (
			'type' => 'file',
			'value'=> 'Download spec sheet',
			'path' => 'main_files',
			'extentions'=>'*',
			'main' => true,
			'alias' => 'Download',
		),
		'p_install' => array (
			'type' => 'file',
			'value'=> 'Installation instructions',
			'path' => 'main_files',
			'extentions'=>'*',
			'main' => true,
			'alias' => 'Download',
		),
		
		'p_image1' => array (
			'type' => 'image',
			'value'=> 'Icon',
			'resize'=>'true',
			'width_diplsay' => 150,
			'height_display' => 150,
			'new_width' => 600,
			'new_height' => 500,
			'path' => 'site_images',
			'extentions' => array('jpg', 'jpeg', 'png', 'gif'),
			'main' =>true
		),
		'p_image2' => array (
			'type' => 'image',
			'value'=> 'Image 1',
			'resize'=>'true',
			'width_diplsay' => 500,
			'height_display' => 600,
			'path' => 'site_images',
			'extentions' => array('jpg', 'jpeg', 'png', 'gif'),
		),
		'p_image3' => array (
			'type' => 'image',
			'value'=> 'Image 2',
			'resize'=>'true',
			'width_diplsay' => 500,
			'height_display' => 600,
			'path' => 'site_images',
			'extentions' => array('jpg', 'jpeg', 'png', 'gif'),
		),
		'p_image4' => array (
			'type' => 'image',
			'value'=> 'Image 3',
			'resize'=>'true',
			'width_diplsay' => 500,
			'height_display' => 600,
			'path' => 'site_images',
			'extentions' => array('jpg', 'jpeg', 'png', 'gif'),
		),
		'p_image5' => array (
			'type' => 'image',
			'value'=> 'Image 4',
			'resize'=>'true',
			'width_diplsay' => 500,
			'height_display' => 600,
			'path' => 'site_images',
			'extentions' => array('jpg', 'jpeg', 'png', 'gif'),
		),
		'p_image6' => array (
			'type' => 'image',
			'value'=> 'Image 5',
			'resize'=>'true',
			'width_diplsay' => 500,
			'height_display' => 600,
			'path' => 'site_images',
			'extentions' => array('jpg', 'jpeg', 'png', 'gif'),
		),
		'p_image7' => array (
			'type' => 'image',
			'value'=> 'Image 6',
			'resize'=>'true',
			'width_diplsay' => 500,
			'height_display' => 600,
			'path' => 'site_images',
			'extentions' => array('jpg', 'jpeg', 'png', 'gif'),
		),
		'p_image8' => array (
			'type' => 'image',
			'value'=> 'Image 7',
			'resize'=>'true',
			'width_diplsay' => 500,
			'height_display' => 600,
			'path' => 'site_images',
			'extentions' => array('jpg', 'jpeg', 'png', 'gif'),
		),
		'p_image9' => array (
			'type' => 'image',
			'value'=> 'Image 8',
			'resize'=>'true',
			'width_diplsay' => 500,
			'height_display' => 600,
			'path' => 'site_images',
			'extentions' => array('jpg', 'jpeg', 'png', 'gif'),
		),
		'p_image10' => array (
			'type' => 'image',
			'value'=> 'Image 9',
			'resize'=>'true',
			'width_diplsay' => 500,
			'height_display' => 600,
			'path' => 'site_images',
			'extentions' => array('jpg', 'jpeg', 'png', 'gif'),
		),
		'quick_ship' =>  array (
			'type' => 'checkbox',
			'value'=> 'Quick ship',
			'checked'=>0,
			'alias' =>array('No', 'Yes')
		),
		'quick_ship_pdf' => array (
			'type' => 'file',
			'value'=> 'Spec sheet',
			'path' => 'main_files',
			'extentions'=>'*',
			'alias' => 'Spec sheet',
		),
		'available_inventory'=> array(
			'type' => 'input',
			'style' => 'width:30px',
			'value'=> 'Available Inventory'
		),
		'configurator'=> array(
			'type' => 'input',
			'style' => 'width:200px',
			'value'=> 'Configurator'
		)
	),
	'table_id' => 'products_id',		
	'per_page' => 50,
	'no_owner' => true,
	'sortable' => true,
	'child_table' => array('photometry'=>array('alias' => 'Photometry'), 'matrix' => array('alias'=> 'LED Matrix')),
	'default_sort' => array('field'=>'products.__order', 'type'=>'asc'),
	'joins' => array(array('type'=>'left join', 'table' => 'product_cats', 'condition'=>'this.p_cat = table.product_cats_id'))	
);

$config['photometry'] = array (
	'title' => 'files',
	'fields' => array (
		'photometry_id'=> array(
			'type' => 'id',
			'value'=> 'ID',
			'show' => true,
			'disabled' >true,
			'main' =>true,
			'width'=>'5%'
		),
		'photometry_name'=> array(
			'type' => 'input',
			'value'=> 'Name',
			'main'=>true
		),
		'photometry_file' => array (
			'type' => 'file',
			'value'=> 'File',
			'path' => 'main_files',
			'extentions'=>'*',
			'main' => true,
			'alias' => 'Download',
		)
	),
	'table_id' => 'photometry_id',		
	'per_page' => 50,
	'no_owner' => true,
	'default_sort' => array('field'=>'photometry_id', 'type'=>'asc')
);

$config['matrix'] = array (
	'title' => 'files',
	'fields' => array (
		'matrix_id'=> array(
			'type' => 'id',
			'value'=> 'ID',
			'show' => true,
			'disabled' >true,
			'main' =>true,
			'width'=>'5%'
		),
		'matrix_name'=> array(
			'type' => 'input',
			'value'=> 'Name',
			'main'=>true
		),
		'matrix_file' => array (
			'type' => 'file',
			'value'=> 'File',
			'path' => 'main_files',
			'extentions'=>'*',
			'main' => true,
			'alias' => 'Download',
		)
	),
	'table_id' => 'matrix_id',		
	'per_page' => 50,
	'no_owner' => true,
	'default_sort' => array('field'=>'matrix_id', 'type'=>'asc')
);

$config['team'] = array (
	'title' => 'Team',
	'fields' => array (
		'team_id'=> array(
			'type' => 'id',
			'value'=> 'ID',
			'show' => true,
			'disabled' >true,
			'main' =>true,
			'width'=>'5%'
		),
		't_name' => array (
			'type' => 'input',
			'value'=> 'Name',
			'main' =>true
		),
		't_position' => array (
			'type' => 'input',
			'value'=> 'Position',
			'main' =>true
		),
		't_phone' => array (
			'type' => 'input',
			'value'=> 'Phone',
			'main' =>true
		),
		't_fax' => array (
			'type' => 'input',
			'value'=> 'Fax',
			'main' =>true
		),
		't_email' => array (
			'type' => 'input',
			'value'=> 'E-mail',
			'main' =>true
		),
		't_country' => array(
			'type' => 'select',
			'value'=> 'Country',
			'main' => true,
			'from' => array('mode'=>'simple_list', 'values' => array('usa'=>'USA', 'uk'=>'UK', 'cn'=>'China'), 'selected_value'=>'uk')
		),
		't_image' => array (
			'type' => 'image',
			'value'=> 'Image',
			'resize'=>'true',
			'width_diplsay' => 200,
			'height_display' => 190,
			'path' => 'team',
			'extentions' => array('jpg', 'jpeg', 'png', 'gif'),
			'main' =>true
		)
	),
	'table_id' => 'team_id',		
	'per_page' => 50,
	'sortable' => true,
	'no_owner' => true,
	'default_sort' => array('field'=>'__order', 'type'=>'asc')
);


$config['reps_cats'] = array (
	'title' => 'Reps cats',
	'fields' => array (
		'reps_cats_id'=> array(
			'type' => 'id',
			'value'=> 'ID',
			'show' => true,
			'disabled' >true,
			'main' =>true,
			'width'=>'5%'
		),
		'rc_name' => array (
			'type' => 'input',
			'value'=> 'Name',
			'main' =>true,
			'mand'=> true
		)
	),
	'table_id' => 'reps_cats_id',		
	'per_page' => 50,
	'no_owner' => true,
	'sortable' => true,
	'default_sort' => array('field'=>'__order', 'type'=>'asc')
);

$config['reps_articles'] = array (
	'title' => 'Reps articles',
	'fields' => array (
		'reps_articles_id'=> array(
			'type' => 'id',
			'value'=> 'ID',
			'show' => true,
			'disabled' >true,
			'main' =>true,
			'width'=>'5%'
		),
		'ra_cat' => array (
			'type' => 'select',
			'value'=> 'Article cat',
			'from' => array('mode'=>'from_table', 'data' => array('table'=>'reps_cats', 'selected_id'=>0, 'fields'=>array('reps_cats_id', 'rc_name'), 'order_by'=>'reps_cats_id', 'order_type'=>'asc')),
			'display' => 'rc_name',
			'main' =>true
		),
		'ra_name'=> array(
			'type' => 'input',
			'value'=> 'Name',
			'main'=>true
		),
		'ra_desc'=> array(
			'type' => 'editor',
			'value'=> 'Content',
			'height' => 450,
			'main'=>true
		),
	),
	'table_id' => 'reps_articles_id',		
	'per_page' => 50,
	'no_owner' => true,
	'sortable' => true,
	'default_sort' => array('field'=>'reps_articles.__order', 'type'=>'asc'),
	'joins' => array(array('type'=>'left join', 'table' => 'reps_cats', 'condition'=>'this.ra_cat = table.reps_cats_id'))	
);

$config['file_storage'] = array (
	'title' => 'File storage',
	'fields' => array (
		'file_storage_id'=> array(
			'type' => 'id',
			'value'=> 'ID',
			'show' => true,
			'disabled' >true,
			'main' =>true,
			'width'=>'5%'
		),
		'file_desc'=> array(
			'type' => 'input',
			'value'=> 'Name',
			'main'=>true
		),
		'file_name' => array (
			'type' => 'file',
			'value'=> 'File',
			'path' => 'main_files',
			'extentions'=>'*',
			'main' => true,
			'alias' => 'Download',
		)
	),
	'table_id' => 'file_storage_id',		
	'per_page' => 50,
	'no_owner' => true,
	'sortable' => true,
	'default_sort' => array('field'=>'__order', 'type'=>'asc')
);



$config['office'] = array (
	'title' => 'Offices',
	'fields' => array (
		'office_id'=> array(
			'type' => 'id',
			'value'=> 'ID',
			'show' => true,
			'disabled' >true,
			'main' =>true,
			'width'=>'5%'
		),
		'office_country' => array (
			'type' => 'select',
			'value'=> 'Country',
			'from' => array('mode'=>'simple_list', 'values' => array('USA'=>'USA', 'Canada'=>'Canada', 'UK'=>'UK'), 'selected_value'=>'three'),
			'main' => true
		),
		'office_state'=> array(
			'type' => 'input',
			'value'=> 'State/Province',
			'style'=> 'width:40px',
			'main'=>true
		),
		'office_name'=> array(
			'type' => 'input',
			'value'=> 'Name',
			'style'=> 'width:220px',
			'main'=>true
		),
		'office_desc'=> array(
			'type' => 'input',
			'value'=> 'Description',
			'style'=> 'width:220px',
			'main'=>true
		),
		'office_address'=> array(
			'type' => 'editor',
			'value'=> 'Address',
			'height' => 250,
			'main'=>true
		),
		'office_url'=> array(
			'type' => 'input',
			'value'=> 'URL',
			'style'=> 'width:220px',
			'main'=>true
		),
		'reps_login'=> array(
			'type' => 'input',
			'value'=> 'Login',
			'style'=> "width:150px;",
			'validation'=> array ('type' => 'regex', 'value' => '/^[a-z0-9_]{2,20}$/i'),
			'main'=>true
		),
		'reps_password'=> array(
			'type' => 'password',
			'value'=> 'Password',
			'style'=>'width:150px;',
			'function' => 'md5'
		),
		'reps_email'=> array(
			'type' => 'input',
			'value'=> 'E-mail',
			'style'=> 'width:220px'
		)
	),
	'table_id' => 'office_id',		
	'per_page' => 50,
	'no_owner' => true,
	'sortable' => true,
	'default_sort' => array('field'=>'__order', 'type'=>'asc')
);$config['event_calendar'] = array (	'title' => 'Event calendar',		'fields' => array (		'event_calendar_id'=> array(			'type' => 'id',			'value'=> 'ID',			'show' => true,			'disabled' >true,			'main' =>true,			'width'=>'10%'		),				'event_calendar_content'=> array(			'type' => 'editor',			'value'=> 'Content',			'show' => true,			'disabled' >true,			'main' =>true,			'width'=>'55%'		),				'event_calendar_updatetime'=> array(			'type' => '',			'value'=> 'Update time',			'show' => true,			'disabled' >true,			'main' =>true,			'width'=>'20%'		),	),		'table_id' => 'event_calendar_id',			'per_page' => 50,	'no_owner' => true,	'sortable' => true,	'default_sort' => array('field'=>'event_calendar_id', 'type'=>'desc'));
?>