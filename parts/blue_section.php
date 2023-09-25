<div class="blue_section">
	<div class="row">
		<div class="medium-12 columns">
			<?php if($blue_label = get_field('blue_label')): ?>
				<?php echo $blue_label; ?>
			<?php endif; ?>
		</div>
		<div class="medium-12 columns">
			<?php if($green_page_link = get_field('green_page_link')): ?>
				<a class="pagelink green" href="<?php echo $green_page_link['url']; ?>"><?php echo $green_page_link['title']; ?></a>
			<?php endif; ?>
		</div>
	</div>
</div>