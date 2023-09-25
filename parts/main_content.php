<div class="wrapper">

	<div class="row">
		<div class="medium-12 columns main_content_inner">
			<div class="content_buttons">
				<button class="copy" aria-label="Link copied">
					<i class="fas fa-link"></i>
					<span class="copied">Copied</span>
				</button>
				<?php //if($email_icon = get_field('email_icon','options')): ?>
					<!-- <a href="<?php echo $email_icon; ?>" class="email"><i class="far fa-envelope"></i></a> -->
				<?php //endif; ?>
				<button class="cloud" onClick="window.print()"><i class="fas fa-print"></i></button>
			</div>
			<h2 class="sp-title"><?php the_title(); ?></h2>
			
			<?php the_content(); ?>
		</div>
	</div>

</div>