<?php
/**
 * Page
 */
get_header(); ?>

	<!-- BEGIN of main content -->
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<!-- HERO SECTION -->
			<?php show_template('hero_section'); ?>

			<!-- BREADCRUMBS -->
			<?php show_template('breadcrumbs'); ?>

			<!-- MAIN CONTENT -->
			<?php show_template('main_content'); ?>

			<!-- CONTACT FORM -->
			<div class="row contact_form">
				<div class="medium-12 columns">
					<?php if($contact_form = get_field('contact_form')): ?>
						<?php echo do_shortcode($contact_form); ?>
					<?php endif; ?>
				</div>
			</div>

			<!-- SUBSCRIBE -->
			<?php show_template('subscribe'); ?>

		<?php endwhile; ?>
	<?php endif; ?>
	<!-- END of main content -->

<?php get_footer(); ?>