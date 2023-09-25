<?php
?>

            <div class="solutions">
				<div class="row">
					<div class="medium-12 xs-sm columns">
						<?php if($main_label = get_field('main_label')): ?>
							<h2><?php echo $main_label; ?></h2>
						<?php endif; ?>
					</div>
					<p>&nbsp;</p>
				</div>
				<?php
				$blocks = get_field('blocks') ? get_field('blocks') : '';
				$blocks = get_field('blocks') ? get_field('blocks') : '';
				$number_col =  count( get_field('blocks') ); 
				$col = "";
				if ($number_col == 2) {
					$col = '6';
				}
				if ($number_col == 3) {
					$col = '4';
				}
				if ($number_col == 4) {
					$col = '3';
				}
				if ($number_col > 4) {
					$col = '3';
				}
				if ($blocks) {
					?>
					<div class="row solutions-grid">
						<?php
						if(have_rows('blocks')):
							while(have_rows('blocks')) : the_row();
								$link = get_sub_field('link');
								?>
								<div class="medium-<?php echo $col;?> columns">
									<div class="content-block">
										<h3><?php echo get_sub_field('title'); ?></h3>
										<p><?php echo get_sub_field('content_block'); ?></p>
										<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
									</div>
								</div>
								<?php
							endwhile;
						endif;
						?>
					</div>
					<?php
				}
				?>
			</div>