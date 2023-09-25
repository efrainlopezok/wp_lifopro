<?php
/**
 * Single
 *
 * Loop container for single post content
 */
get_header(); ?>

	<!-- HERO SECTION -->
	<?php show_template('hero_section'); ?>

	<div class="row single_post">
		<!-- BEGIN of post content -->
		<div class="large-8 medium-8 small-12 columns">
			<main class="main-content">
				<div class="content_buttons">
					<button class="copy" aria-label="Link copied"><i class="fas fa-link"></i><span class="copied">Copied</span></button>
					<!-- <a href="" class="email"><i class="far fa-envelope"></i></a> -->
					<button class="cloud" onclick="window.print()"><i class="fas fa-print"></i></button>
				</div>
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<?php the_content('',true); ?>
						</article>
					<?php endwhile; ?>
				<?php endif; ?>
			</main>
		</div>
		<!-- END of post content -->

		<!-- BEGIN of sidebar -->
		<div class="large-4 medium-4 small-12 columns sidebar">
			<?php get_sidebar('right'); ?>
		</div>
		<!-- END of sidebar -->
	</div>

	<!-- SUBSCRIBE -->
	<?php show_template('subscribe'); ?>

<?php get_footer(); ?>