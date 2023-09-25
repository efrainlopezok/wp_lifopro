<?php
// Create HOME Slider
function home_slider_template() { ?>

	<script type="text/javascript">
		jQuery(document).ready(function () {
			jQuery('.slick-slider').slick({
				cssEase: 'ease',
				fade: true,  // Cause trouble if used slidesToShow: more than one
				arrows: false,
				dots: true,
				infinite: true,
				speed: 500,
				autoplay: true,
				autoplaySpeed: 5000,
                pauseOnHover:false,
				slidesToShow: 1,
				slidesToScroll: 1,
				slide: '.slick-slide', // Cause trouble with responsive settings
			});
		});
	</script>

	<?php $arg = array(
		'post_type'      => 'slider',
		'order'          => 'ASC',
		'orderby'        => 'menu_order',
		'posts_per_page' => - 1
	);
	$slider    = new WP_Query( $arg );
	if ( $slider->have_posts() ) : ?>

		<div id="home-slider" class="slick-slider">
			<?php while ( $slider->have_posts() ) : $slider->the_post(); ?>
				<div class="slick-slide" <?php bg( get_attached_img_url( get_the_ID(), 'full_hd' ) ); ?>>
					<div class="slide-overlay">
						<div class="slider-caption">
							<h3><?php the_title(); ?></h3>
							<?php the_content(); ?>
							<?php if($page_link = get_field('page_link')): ?>
								<a class="pagelink green" href="<?php echo $page_link['url']; ?>"><?php echo $page_link['title']; ?></a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
		</div><!-- END of  #home-slider-->

		<div id="home-slider" class="slick-slider mobile">
		<?php while ( $slider->have_posts() ) : $slider->the_post(); ?>
			<?php $bg_img = get_field( 'image_mobile' ); ?>
			<?php if ($bg_img['url'] != ''): ?>
				<?php $bg_img = $bg_img['url']; ?>
			<?php else: ?>
				<?php $bg_img = get_attached_img_url( get_the_ID(), 'full_hd' ) ?>
			<?php endif ?>
			
			<div class="slick-slide" <?php bg( $bg_img ); ?>>
				<div class="slide-overlay">
					<div class="slider-caption">
						<h3><?php the_title(); ?></h3>
						<?php the_content(); ?>
						<?php if($page_link = get_field('page_link')): ?>
							<a class="pagelink green" href="<?php echo $page_link['url']; ?>"><?php echo $page_link['title']; ?></a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
		</div><!-- END of  #home-slider-->

	<?php endif;
	wp_reset_query(); ?>
<?php }

// HOME Slider Shortcode

function home_slider_shortcode() {
	ob_start();
	home_slider_template();
	$slider = ob_get_clean();

	return $slider;
}

add_shortcode( 'slider', 'home_slider_shortcode' );