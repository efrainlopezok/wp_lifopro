<?php
/**
 * Header
 */
?>
<!DOCTYPE html>
<!--[if !(IE)]><!-->
<html <?php language_attributes(); ?>> <!--<![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9 ie8" lang="en"><![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<!--[if gte IE 9]>
<style type="text/css">
	.gradient {
		filter: none;
	}
</style>
<![endif]-->

<head>
	<!-- Set up Meta -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta charset="<?php bloginfo('charset'); ?>">

	<!-- Set the viewport width to device width for mobile -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

	<!-- Add Google Fonts -->
	<link rel="stylesheet" href="https://use.typekit.net/wos5sct.css">
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<!-- <div class="preloader hide-for-medium-only">
	<div class="preloader__icon"></div>
</div> -->

<!-- BEGIN of header -->
<header class="header">
	<div class="top_links">
		<div class="row">
			<div class="medium-12 columns">
				<?php if( have_rows('top_links','options') ):
				    while ( have_rows('top_links','options') ) : the_row();
				 		$link = get_sub_field('link'); ?>
				         <a href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
				   <?php endwhile;
				endif; ?>
			</div>
		</div>
	</div>
	<div class="row medium-uncollapse small-collapse header_main">
		<div class="medium-12 columns menu_main">
			<div class="title-bar" data-responsive-toggle="main-menu" data-hide-for="large">
				<?php show_custom_logo(); ?>
				<button class="menu-icon" type="button" data-toggle></button>
				<div class="title-bar-title"></div>
			</div>
			<nav class="top-bar" id="main-menu">
				<?php
				if (has_nav_menu('mobile-menu')) {
					wp_nav_menu(array('theme_location' => 'mobile-menu',
						'menu_class' => 'menu mobile-menu dropdown',
						'items_wrap' => '<ul id="%1$s" class="%2$s" data-responsive-menu="accordion large-dropdown" data-close-on-click-inside="false">%3$s</ul>',
						'walker' => new Foundation_Navigation()));
				}
				?>
				<div class="top_links hide-for-large">
					<?php if( have_rows('top_links','options') ):
					    while ( have_rows('top_links','options') ) : the_row();
					 		$link = get_sub_field('link'); ?>
					         <a href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
					   <?php endwhile;
					endif; ?>
				</div>
			</nav>
			<?php
			if (has_nav_menu('header-menu')) {
				wp_nav_menu(array('theme_location' => 'header-menu',
					'menu_class' => 'menu header-menu dropdown',
					'items_wrap' => '<ul id="%1$s" class="%2$s" data-responsive-menu="accordion medium-dropdown" data-close-on-click-inside="false">%3$s</ul>',
					'walker' => new Foundation_Navigation()));
			}
			?>
		</div>
	</div>
</header>
<!-- END of header -->
