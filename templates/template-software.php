<?php
/**
 * Template Name: Software Support Page
 */
get_header(); ?>

<!-- BEGIN of main content -->
<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<!-- HERO SECTION -->
		<?php show_template('hero_section'); ?>

		<!-- BREADCRUMBS -->
		<?php show_template('breadcrumbs'); ?>

		<!-- YELLOW BLOCK -->
		<div class="wrapper container_row">
			<div class="medium-12 columns yellow_block">
				<div class="row">
					<div class="large-2 medium-12 columns attention">
						<?php if($image = get_field('image')): ?>
							<img class="image" src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" />
						<?php endif; ?>
					</div>
					<div class="large-10 medium-12 columns pdf">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
        </div>
        
        <div class="sup-accordion resources">
			<div class="wrapper">
				<div class="row column">
					<div class="sup-accordion-head">
						<?php if($top_label = get_field('before_tabs_title')): ?>
						<h2 class="sup-accordion__title"><?php echo $top_label; ?></h2>
						<?php endif; ?>
					</div>
				</div>
			</div>
        </div>

		<!-- Tabbed content -->
        <?php get_template_part( 'parts/content', 'tabbed' ); ?>

		<?php 
			get_template_part( 'parts/partial', 'links' ); 
			get_template_part( 'parts/partial', 'updates' );
		?>

		<?php endwhile; ?>
	<?php endif; ?>
	<!-- END of main content -->

	<?php get_footer(); ?>