<?php 
/**
 * Extra content at the bottom of pages
 */
?>

			<!-- LINKS -->
			<div class="section_links section_links-fix">
				<div class="row">
					<?php if( have_rows('custom_links') ):
					while ( have_rows('custom_links') ) : the_row();
						?>
						<div class="large-3 medium-6 columns link_columns ">
							<a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('title'); ?></a>
						</div>
					<?php endwhile;
					endif; ?>
				</div>
			</div>