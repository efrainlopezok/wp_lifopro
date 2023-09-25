<div class="subscribe">
	<div class="row">
		<div class="large-8 medium-6 columns left">
			<?php if($subscribe_content = get_field('subscribe_content','options')): ?>
				<?php echo $subscribe_content; ?>
			<?php endif; ?>
		</div>
		<div class="large-4 medium-6 columns right">
			<?php if($sign_up = get_field('sign_up','options')): ?>
				<a class="pagelink green" href="<?php echo $sign_up['url']; ?>"><?php echo $sign_up['title']; ?></a>
			<?php endif; ?>
		</div>
	</div>
</div>