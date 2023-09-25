<?php
/**
 * Template Name: Our Team
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
							    'container_class' => 'sub-menu-class' ) ); 
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

			<!-- OUR TEAM -->
			<div class="row our_team">
				<?php $arg = array(
			     'post_type'	    => 'our_team',
			     'order'		    => 'ASC',
			     'posts_per_page'    => -1
			);
			$the_query = new WP_Query( $arg );
			if ( $the_query->have_posts() ) : ?>
			   <?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
			      <!-- BEGIN of Post -->
			      <div class="large-6 medium-12 columns team_column">
			      	<div class="row team_member">
			      		<?php $photo = get_field('photo'); ?>
			      		<div class="photo medium-5 columns matchHeight" <?php bg($photo['url'], 'medium'); ?>>
			      		</div>
			      		<div class="member_info medium-7 columns matchHeight">
			      			<h4><?php the_title(); ?></h4>
			      			<?php if($position = get_field('position')): ?>
			      				<h6><?php echo $position; ?></h6>
			      			<?php endif; ?>
			      			<?php the_excerpt(); ?>
			      			<a class="pagelink blue" href="<?php the_permalink(); ?>">
									<?php _e('Learn more'); ?></a>
			      		</div>
			      	</div>
			      </div>
			      <?php endwhile; ?>
			      <!-- END of Post -->
			<?php endif; wp_reset_query(); ?>
			</div>

			<!-- SUBSCRIBE -->
			<?php show_template('subscribe'); ?>

		<?php endwhile; ?>
	<?php endif; ?>
	<!-- END of main content -->

<?php get_footer(); ?>