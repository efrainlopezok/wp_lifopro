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

	<div class="row single_post">
		<!-- BEGIN of post content -->
		<div class="large-8 medium-8 small-12 columns">
			<main class="main-content">
				<div class="top-date">
					<div class="date-author">

						<?php $author_id = $post->post_author; ?>
						<?php $author_link = get_author_posts_url( $author_id ); ?>
						<?php
						$user_url = get_the_author_meta( 'user_url' , $author_id );
						if ($user_url != '') {
							$user_url = get_the_author_meta( 'user_url' , $author_id );
						}else{
							$user_url = $author_link;
						}
						?>

						<p><a href="<?php echo $user_url; ?>"><?php echo the_author_meta( 'display_name' , $author_id ); ?></a> <time class="entry-date"><?php echo get_the_date('M d, Y'); ?></time></p>
						<p></p>

					</div>
				</div>
				<div class="content_buttons">
					<div class="date-author-post">
						<div class="author"></div>
						<div class="date"></div>
					</div>
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
