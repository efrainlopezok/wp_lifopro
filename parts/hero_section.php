<div class="thumbnail_image" <?php bg( get_attached_img_url( get_the_ID(), 'full_hd' ) ); ?>>
	<div class="thumbnail_wrap">
		<div class="row">
			<div class="medium-12 columns">
				<h1><?php the_title(); ?></h1>
				<?php if ( is_page_template( 'templates/template-software.php' ) ) {
			    	$second_label = get_field('second_label') ?>
						<p><?php echo $second_label; ?></p>
					<?php
				}?>
			</div>
		</div>
	</div>
</div>