<?php
/**
 * Footer
 */
?>

<!-- BEGIN of footer -->
<footer class="footer">
	<div class="row">
		<div class="large-5 medium-12 small-12 columns footer_left">
			<?php if($footer_logo = get_field('footer_logo','options')): ?>
				<a href="<?php echo get_home_url(); ?>"><img src="<?php echo $footer_logo['sizes']['medium']; ?>" alt="<?php echo $footer_logo['alt']; ?>" /></a>
   		<?php endif; ?>
			<?php if($footer_top_left_column = get_field('footer_top_left_column','options')): ?>
				<?php echo $footer_top_left_column; ?>
			<?php endif; ?>
		</div>

		<div class="small-12 columns footer_bottom hide-for-medium">
			<?php if($footer_bottom_left_column = get_field('footer_bottom_left_column','options')): ?>
				<?php echo $footer_bottom_left_column; ?>
			<?php endif; ?>
		</div>

		<div class="small-12 columns social_icons hide-for-medium">
			<?php
				if( have_rows('social_icons','options') ):
				    while ( have_rows('social_icons','options') ) : the_row();
				 		$link = get_sub_field('link');
				 		$icon = get_sub_field('icon'); ?>
				 		<a target="_blank" class="social-icon" href="<?php echo $link; ?>">
								<i class="<?php echo $icon; ?>"></i>
							</a>
				   <?php endwhile;
				endif;
			?>
		</div>

		<div class="large-7 medium-12 small-12 columns footer_menu">
		<?php if( have_rows('footer_menu','options') ):
		   while ( have_rows('footer_menu','options') ) : the_row(); ?>
				<div class="footer_menu_columns">
				<?php
					if( have_rows('columns') ):
					   while ( have_rows('columns') ) : the_row();
					   $link = get_sub_field('link'); ?>
						<a href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
						<?php endwhile;
					endif;
				?>
				</div>
			<?php endwhile;
		endif;?>
		</div>
	</div>
	<div class="row">
		<div class="large-2 medium-6 columns footer_bottom mobile">
			<?php if($footer_bottom_left_column = get_field('footer_bottom_left_column','options')): ?>
				<?php echo $footer_bottom_left_column; ?>
			<?php endif; ?>
		</div>

		<div class="large-3 medium-6 columns social_icons mobile">
			<?php
				if( have_rows('social_icons','options') ):
				    while ( have_rows('social_icons','options') ) : the_row();
				 		$link = get_sub_field('link');
				 		$icon = get_sub_field('icon'); ?>
				 		<a target="_blank" class="social-icon" href="<?php echo $link; ?>">
								<i class="<?php echo $icon; ?>"></i>
							</a>
				   <?php endwhile;
				endif;
			?>
		</div>

		<div class="large-7 medium-12 columns footer_links">
			<?php
				if( have_rows('footer_links','options') ):
				    while ( have_rows('footer_links','options') ) : the_row();
				 		$link = get_sub_field('link'); ?>
							<a href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
				   <?php endwhile;
				endif;
			?>
			<?php if($copyright = get_field('copyright','options')): ?>
				<?php echo $copyright; ?>
			<?php endif; ?>
		</div>
	</div>
</footer>
<!-- END of footer -->

<div class="sp-footer">
	<p><?php echo get_the_permalink(); ?></p>
</div>

<?php wp_footer(); ?>


<!--<script type="text/javascript" src="https://mylivechat.com/chatinline.aspx?HCCID=77091202
&InPageTemplate=1&InPagePosition=bottomright"></script>-->
<!--middle left script <script type="text/javascript" async="async" defer="defer" data-cfasync="false" src="http://mylivechat.com/chatwidget.aspx?hccid=77091202"></script>-->
<!--MIDDLE LEFT BOTTOM LEFT STARTING 8-5-19 Add the following script at the bottom of the web page (before </body></html>)-->
<!--Add the following script at the bottom of the web page (before </body></html>)
<script type="text/javascript">function add_chatwidget(){var hccid=77091202&WidgetPosition=bottomleft;var nt=document.createElement("script");nt.async=true;nt.src="https://www.mylivechat.com/chatwidget.aspx?hccid="+hccid;var ct=document.getElementsByTagName("script")[0];ct.parentNode.insertBefore(nt,ct);}
add_chatwidget();</script>-->


<!--Add the following script at the bottom of the web page (before </body></html>)-->
<script type="text/javascript">function add_chatwidget(){var hccid=77091202&WidgetStartPos=middleleft&WidgetPosition=bottomleft;var nt=document.createElement("script");nt.async=true;nt.src="https://www.mylivechat.com/chatwidget.aspx?hccid="+hccid;var ct=document.getElementsByTagName("script")[0];ct.parentNode.insertBefore(nt,ct);}
add_chatwidget();</script>

</body>
</html>