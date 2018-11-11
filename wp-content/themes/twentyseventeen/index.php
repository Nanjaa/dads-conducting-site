<?php
/**
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php
		wp_head(); ?>
		<link href="https://fonts.googleapis.com/css?family=Crimson+Text|Roboto" rel="stylesheet">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

	</head>
	<body id="landing-body" <?php body_class();?> style="background: url(<?php the_field('landing_page_background', 14); ?>) no-repeat center 15% fixed;">

		<script>
			$(document).ready(function() {
				$('.open-navigation').on('click', function() {
					$('nav').slideDown();
				});

				$('.close-navigation').on('click', function() {
					$('nav').slideUp();
				});
			})

		</script>

		<div class="left-fade"></div>
		<div id="page" class="site">
			<header id="landing-header-wrap" role="banner">
				<nav id="landing-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'twentyseventeen' ); ?>">
					<i class="material-icons close-navigation no-desktop">clear</i>
					<?php 
						wp_nav_menu( array(
							'theme_location' => 'top',
							'menu_id'        => 'top-menu'
						) ); 
					?>
				</nav><!-- #site-navigation -->

				<div class="landing-header">
					<h1 class="banner-title"><?php bloginfo( 'name' ); ?></h1>
					<div class="red-underline"></div>
					<?php $description = get_bloginfo( 'description', 'display' ); ?>
					<p class="banner-subtitle"><?php echo $description; ?></p>
				</div><!-- .landing-header -->

				<i class="material-icons open-navigation no-desktop">menu</i>

			</header><!-- #masthead -->
		</div>
	</body>
</html>