<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
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
<link rel="profile" href="http://gmpg.org/xfn/11">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentyseventeen' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<?php if ( has_nav_menu( 'top' ) ) : ?>
			<div class="navbar">
				<div class="wrap">
					<h2 class="banner-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Warren Olfert</a></h2>
					<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
				</div><!-- .wrap -->
			</div><!-- .navigation-top -->
		<?php endif; ?>

		<div class="banner-wrap">
			<div class="banner-image" style="background-image: url(<?php the_field('banner_image'); ?>);"></div>

			<div class="banner-details">
				<?php the_title( '<h1 class="banner-title">', '</h1>' ); ?>
				<div class="red-underline"></div>
				<p class="banner-subtitle"><?php the_field('page_subtitle') ?></p>
			</div>
		</div>

	</header><!-- #masthead -->

	<?php

	/*
	 * If a regular post or page, and not the front page, show the featured image.
	 * Using get_queried_object_id() here since the $post global may not be set before a call to the_post().
	 */
	if ( ( is_single() || ( is_page() && ! twentyseventeen_is_frontpage() ) ) && has_post_thumbnail( get_queried_object_id() ) ) :
		echo '<div class="single-featured-image-header">';
		echo get_the_post_thumbnail( get_queried_object_id(), 'twentyseventeen-featured-image' );
		echo '</div><!-- .single-featured-image-header -->';
	endif;
	?>

	<div class="site-content-contain">

	<?php
		if ( is_page( 'media-gallery' )) {
			echo '<div id="media-gallery-content" class="site-content">';
		} else {
			echo '<div id="content" class="site-content">';
		}
	?>