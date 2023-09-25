<?php
/**
 * Home
 *
 * Standard loop for the blog-page
 */
get_header(); ?>

	<!-- HERO SECTION -->
	<div class="thumbnail_image" style="background: url('<?php echo get_field('background',  get_option('page_for_posts')); ?>') no-repeat center / cover;">
		<div class="thumbnail_wrap">
			<div class="row">
				<div class="medium-12 columns">
					<h1><?php the_field('title', get_option('page_for_posts')); ?></h1>
				</div>
			</div>
		</div>
	</div>

	<main class="main-content main-blog">
		<div class="row posts-list">
			<div class="<?php echo is_dynamic_sidebar('Sidebar Right') ? 'large-8 medium-12' : 'large-12 medium-12'; ?> small-12 columns">
					<div class="row">
					<?php if (have_posts()) : ?>
						<?php while (have_posts()) : the_post(); ?>
							<!-- BEGIN of Post -->
								<div class="xxl-4 medium-6 columns matchHeight">
									<div class="blog_item matchHeight">
							      	<div class="blog_item_inner">
							      		<h5><?php the_title(); ?></h5>
								      	<?php the_excerpt(); ?>
								      	<a class="pagelink blue" href="<?php the_permalink(); ?>">
											<?php _e('View full article'); ?></a>
							      	</div>
							      	<div class="bottom">
							      		<div class="blog_item-btm">
										  	<div class="date bi-date">
							      				<?php the_time(get_option('date_format')); ?>
							      			</div>
											<div class="bi-author">
												By: <?php echo get_the_author(); ?>
											</div>
										</div>

							      		<div class="category"></div>
							      	</div>
							      </div>
								</div>
							<!-- END of Post -->
						<?php endwhile; ?>
					<?php endif; ?>
					</div>
					<!-- BEGIN of pagination -->
					<?php foundation_pagination(); ?>
					<!-- END of pagination -->
			</div>

			<!-- BEGIN of sidebar -->
			<div class="large-4 medium-12 small-12 columns sidebar">
				<?php get_sidebar('right'); ?>
			</div>
			<!-- END of sidebar -->
		</div>
	</main>

	<!-- SUBSCRIBE -->
	<?php show_template('subscribe'); ?>

<?php get_footer(); ?>