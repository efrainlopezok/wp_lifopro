<?php 
?>

			<!-- CONTACT FORM -->
			<div class="section_updates">
				<div class="row">
					<div class="large-6 medium-12 columns">
						<?php if($left_column_label = get_field('left_column_label')): ?>
							<?php echo $left_column_label; ?>
						<?php endif; ?>
					</div>
					<div class="large-6 medium-12 columns contact_form">
						<?php $link_contact = get_field( 'link_contact' ); ?>
						<?php if ($link_contact['url'] != '' && $link_contact['title'] != ""): ?>
							<a href="<?php echo $link_contact['url'] ?>" target="<?php echo $link_contact['target'] ?>" class="btn pagelink green"><?php echo $link_contact['title']; ?></a>
						<?php else: ?>
							<?php if($contact_form = get_field('contact_form')): ?>
								<?php echo do_shortcode($contact_form); ?>
							<?php endif; ?>
						<?php endif ?>
					</div>
				</div>
			</div>