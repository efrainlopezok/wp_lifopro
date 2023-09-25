<?php
	$args = array(
		'order'                  => 'ASC',
		'orderby'                => 'menu_order',
		'output'                 => ARRAY_A,
		'output_key'             => 'menu_order',
		'update_post_term_cache' => false,
	);

	$menu_items  = wp_get_nav_menu_items( $menu_name , $args );
	$menu_list = '<select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);" id="menu-' . $menu_name . '"><option value="*"></option>';

	foreach ( (array) $menu_items as $key => $menu_item ){
		$menu_list .= '<option value="' . $menu_item->url . '">' . $menu_item->title . '</option>';
	}

	$menu_list .= '</select>';
	echo $menu_list;
?>