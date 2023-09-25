<div class="blog_title resources_slider">
	<div class="row">
		<div class="medium-12 columns">
			<?php if($slider_title = get_field('slider_title','options')): ?>
				<h2><?php echo $slider_title; ?></h2>
			<?php endif; ?>
		</div>
	</div>
</div>
<div class="blog_section resources_slider">
	<div class="blog_slider">
	<?php $arg = array(
     'post_type'	    => 'resources',
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
		      	<?php if($home_page_text = get_field('home_page_text')): ?>
		      		<?php echo $home_page_text; ?>
		      	<?php endif; ?>
		      	<a class="pagelink blue" href="<?php the_permalink(); ?>">
					<?php _e('Read more'); ?></a>
	      	</div>
	      </div>
	      <?php endwhile; ?>
	      <!-- END of Post -->
	<?php endif; wp_reset_query(); ?>
	</div>
</div>