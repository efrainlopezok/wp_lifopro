<?php
/**
 * Template Name: Home Page
 */
get_header(); ?>

	<!--HOME PAGE SLIDER-->
	<?php home_slider_template(); ?>
	<!--END of HOME PAGE SLIDER-->

	<!-- BEGIN of main content -->
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<!-- SOLUTINS SECTION -->
			<div class="solutions">
				<div class="row">
					<div class="medium-12 columns pdf">
						<?php the_content(); ?>
					</div>

					<?php
						if( have_rows('lifo_solutions') ):
					   	while ( have_rows('lifo_solutions') ) : the_row();
					   	$icon = get_sub_field('icon');
			 				$item = get_sub_field('item');
			 				$text = get_sub_field('text'); ?>

							<div class="large-4 medium-6 columns text-center solution_column">
								<a class="" href="<?php echo $item->guid; ?>"><div class="solution_inner">
									<div class="wrap matchHeight">
										<img class="icon" src="<?php echo $icon['sizes']['medium']; ?>" alt="<?php echo $icon['alt']; ?>" />
										<?php echo $text; ?>						   		</div>
									
										<span class="pagelink blue"><?php _e('Learn more'); ?></span>
								</div></a>
							</div>

					<?php endwhile;
						endif;
					?>
				</div>
			</div>

			<!-- RESOURCES SECTION -->
			<div class="resources">
				<div class="row">
					<div class="medium-12 columns ">
						<?php if($top_label = get_field('top_label')): ?>
							<h2><?php echo $top_label; ?></h2>
						<?php endif; ?>
					</div>
					<?php $posts = get_field('resources');
					$i = 1;
			   	if( $posts ): ?>
		      	<?php foreach( $posts as $post):?>
						   <div class="large-4 medium-6 columns ">
						   	<div class="wrap matchHeight">
							   	<h3 class="number"><?php echo $i++; ?></h3>
						   		<h3 class="title"><?php the_title(); ?></h3>
						   		<?php if($home_page_text = get_field('home_page_text')): ?>
						   			<?php echo $home_page_text; ?>
						   		<?php endif; ?>
					            <a class="permalink" href="<?php the_permalink(); ?>">
									<?php _e('Learn more'); ?></a>
								</div>
			            </div>
							<?php endforeach; ?>
					   <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
					<?php endif; ?>
				</div>
			</div>

			<!-- GUIDES SECTION -->
			<div class="guides">
				<div class="row">
					<div class="medium-12 columns">
						<?php if($guides_and_white_papers = get_field('guides_and_white_papers')): ?>
							<?php echo $guides_and_white_papers; ?>
						<?php endif; ?>
						<?php if($page_link = get_field('page_link')): ?>
							<a class="pagelink blue" href="<?php echo $page_link['url']; ?>"><?php echo $page_link['title']; ?></a>
						<?php endif; ?>
					</div>
				</div>
			</div>


			<!-- BLOG SLIDER -->
			<div class="blog_title">
				<div class="row">
					<div class="medium-12 columns">
						<?php if($blog_title = get_field('blog_title')): ?>
							<h2><?php echo $blog_title; ?></h2>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="blog_section">
				<div class="blog_slider">
				<?php $arg = array(
			     'post_type'	    => 'post',
			     'order'		    => 'DESC',
			     'posts_per_page'    => -1
				);
				$the_query = new WP_Query( $arg );
				if ( $the_query->have_posts() ) : ?>
				   <?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
				      <!-- BEGIN of Post -->
				      <div class="blog_item">
				      	<div class="blog_item_inner matchHeight">
				      		<h5><?php the_title(); ?></h5>
					      	<?php the_excerpt(); ?>
					      	<a class="pagelink blue" href="<?php the_permalink(); ?>">
								<?php _e('Read more'); ?></a>
				      	</div>
				      	<div class="bottom">
				      		<div class="date">
				      			<?php the_time(get_option('date_format')); ?>
				      		</div>
				      		<div class="category">
				      			<?php the_category(', '); ?>
				      		</div>
				      	</div>
				      </div>
				      <?php endwhile; ?>
				      <!-- END of Post -->
				<?php endif; wp_reset_query(); ?>
				</div>
			</div>

			<!-- BLUE SECTION -->
			<?php show_template('blue_section'); ?>

			<!-- SUBSCRIBE -->
			<?php show_template('subscribe'); ?>


		<?php endwhile; ?>
	<?php endif; ?>
	<!-- END of main content -->

<?php get_footer(); ?>