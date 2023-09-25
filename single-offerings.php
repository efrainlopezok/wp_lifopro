<?php
/**
 * Single
 *
 * Loop container for single post content
 */
get_header(); ?>

	<!-- BEGIN of main content -->
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<!-- HERO SECTION -->
			<?php show_template('hero_section'); ?>

			<!-- BREADCRUMBS -->
			<?php show_template('breadcrumbs'); ?>

			<!-- SUB MENU -->
			<div class="subpage-menu-wrap">
				<div class="sub_page_menu service_menu">
					<div class="wrapper">
						<div class="row">
							<?php
							//echo get_field('lifo_services_menus');
							$menu = get_field('lifo_services_menus');
							if( !isset($menu) || !strlen($menu) )
								$menu = 'service-page-sub-menu';

							//if (has_nav_menu($menu)) {
								wp_nav_menu( array( 'menu' => $menu, 'menu_class' => 'service-page-sub-menu','depth'=>1));
							//}
							?>
						</div>
					</div> <!-- /. wrapper -->
				</div>
			</div>
			<div class="sub_page_menu input_menu">
				<div class="row">
					<?php
					$menu_name = 'service-page-sub-menu';
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

			<!-- TABS SERVICES -->
			<?php show_template('content-tabbed-offerings'); ?>

			<!-- FEATURED SERVICES -->
			<?php show_template('featured-services') ?>

			<!-- MAIN CONTENT -->
			<?php //show_template('main_content'); ?>

			<!-- BLUE SECTION -->
			<?php show_template('blue_section'); ?>

			<!-- SLIDER -->
			<?php show_template('resources_slider'); ?>

			<!-- SUBSCRIBE -->
			<?php show_template('subscribe'); ?>

		<?php endwhile; ?>
	<?php endif; ?>
	<!-- END of main content -->

<?php get_footer(); ?>