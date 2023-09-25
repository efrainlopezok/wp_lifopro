<?php
/**
 * Template Name: About Us Pages
 */
get_header(); ?>
			
	<!-- BEGIN of main content -->
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<!-- HERO SECTION -->
			<?php show_template('hero_section'); ?>

			<!-- BREADCRUMBS -->
			<?php show_template('breadcrumbs'); ?>
			
			<?php if (has_nav_menu( 'sub-menu-about' )): ?>
				<div class="subpage-menu-wrap">
					<div class="sub_page_menu service_menu">
						<div class="row">
							<?php 
							wp_nav_menu( array( 
							    'theme_location' => 'sub-menu-about', 
							    'container_class' => '' ) ); 
							?>
						</div>
					</div>
				</div>

				<div class="sub_page_menu input_menu">
					<div class="row">
						<select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
						<?php

						$menu_name = 'sub-menu-about';
						$locations = get_nav_menu_locations();
						$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
						$menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'ASC' ) );

						foreach ( $menuitems as $item ):

						    $id = get_post_meta( $item->ID, '_menu_item_object_id', true );
						    $page = get_page( $id );
						    $link = get_page_link( $id ); ?>	

						    <option value="<?php echo $link; ?>"><?php echo $page->post_title; ?></option>

						<?php endforeach; ?>
						</select>
					</div>
				</div>
			<?php endif ?>

			<div class="wrapper">
				<div class="row">
					<div class="medium-12 columns main_content_inner">
						<div class="content_buttons">
							<button class="copy" aria-label="Link copied">
								<i class="fas fa-link"></i>
								<span class="copied">Copied</span>
							</button>
							<!-- <a href="" class="email"><i class="far fa-envelope"></i></a> -->
							<button class="cloud" onclick="window.print()"><i class="fas fa-print"></i></button>
						</div>
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
	<!-- END of main content -->	

<?php get_footer(); ?>