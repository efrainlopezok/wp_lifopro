<?php
/**
 * Single
 *
 * Loop container for single post content
 */
get_header(); ?>

		<!-- HERO SECTION -->
		<?php show_template('hero_section'); ?>

		<!-- BREADCRUMBS -->
		<?php show_template('breadcrumbs'); ?>

		<!-- SUB MENU -->
		<div class="sub_page_menu resources_menu">
			<div class="row">
				<?php
				//echo get_field('lifo_menu_selection');
				$menu = get_field('lifo_menu_selection');
				if( !isset($menu) || !strlen($menu) )
					$menu = 'resource-page-sub-menu';

				//if (has_nav_menu($menu)) {
					wp_nav_menu( array( 'menu' => $menu, 'menu_class' => 'resource-page-sub-menu','depth'=>1));
				//}
				/* if (has_nav_menu('resource-page-sub-menu')) {
					wp_nav_menu( array( 'theme_location' => 'resource-page-sub-menu', 'menu_class' => 'resource-page-sub-menu','depth'=>1));
				} */
				?>
			</div>
		</div>
		<div class="sub_page_menu input_menu">
			<div class="row">
				<?php
				$menu_name = $menu;
				$args = array(
					'order'                  => 'ASC',
					'orderby'                => 'menu_order',
					'output'                 => ARRAY_A,
					'output_key'             => 'menu_order',
					'update_post_term_cache' => false,
				);

				$menu_items  = wp_get_nav_menu_items( $menu_name , $args );
				$menu_list = '<select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);" id="menu-' . $menu_name . '"><option value="*">Select a service</option>';

				foreach ( (array) $menu_items as $key => $menu_item ){
					$menu_list .= '<option value="' . $menu_item->url . '">' . $menu_item->title . '</option>';
				}

				$menu_list .= '</select>';
				echo $menu_list;
				?>
			</div>
		</div>

		<!-- MAIN CONTENT -->
		<?php show_template('main_content'); ?>

		<!-- Tabbed content -->
        <?php get_template_part( 'parts/content', 'tabbed' ); ?>

		<!-- SLIDER -->
		<?php show_template('resources_slider'); ?>

		<!-- BLUE SECTION -->
		<?php show_template('blue_section'); ?>

		<!-- SUBSCRIBE -->
		<?php show_template('subscribe'); ?>

<?php get_footer(); ?>