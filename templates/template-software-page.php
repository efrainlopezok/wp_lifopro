<?php
/**
 * Template Name: Software Page
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
			<div class="sub_page_menu software_menu">
				<div class="row">
					<div class="medium-12 columns">
						<?php
						if (has_nav_menu('software-page-sub-menu')) {
							wp_nav_menu( array( 'theme_location' => 'software-page-sub-menu', 'menu_class' => 'software-page-sub-menu','depth'=>1));
						}
						?>
					</div>
				</div>
			</div>
			<div class="sub_page_menu input_menu">
				<div class="row">
					<?php
					$menu_name = 'software-page-sub-menu';
					$args = array(
						'order'                  => 'ASC',
						'orderby'                => 'menu_order',
						'output'                 => ARRAY_A,
						'output_key'             => 'menu_order',
						'update_post_term_cache' => false,
					);

					$menu_items  = wp_get_nav_menu_items( $menu_name , $args );
					$menu_list = '<select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);" id="menu-' . $menu_name . '"><option value="*">Select a software</option>';

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

			<!-- BLUE SECTION -->
			<?php show_template('blue_section'); ?>

			<!-- SUBSCRIBE -->
			<?php show_template('subscribe'); ?>

		<?php endwhile; ?>
	<?php endif; ?>
	<!-- END of main content -->

<?php get_footer(); ?>