<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
					<i class="material-icons open-navigation no-desktop">menu</i>
				</div><!-- .wrap -->
			</div><!-- .navigation-top -->
		<?php endif; ?>

		<div class="banner-wrap">
			<div class="banner-image" style="background-image: url(<?php the_field('banner_image'); ?>);"></div>

			<div class="banner-details">
				<h1 class="banner-title">Search Results</h1>
				<div class="red-underline"></div>
				<p class="banner-subtitle"><?php the_field('page_subtitle') ?></p>
			</div>
		</div>

	</header><!-- #masthead -->

	<div class="site-content-contain">
		<div id="content" class="site-content">

				<header class="page-header search-header">
					<?php if ( have_posts() ) : ?>
						<h2 class="page-title"><?php printf( __( 'Search Results for "%s', 'twentyseventeen' ), '<span>' . get_search_query() . '"</span>' ); ?></h2>
					<?php else : ?>
						<h2 class="page-title"><?php _e( 'Nothing Found', 'twentyseventeen' ); ?></h2>
					<?php endif; ?>
				</header><!-- .page-header -->

				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">

					<?php
					if ( have_posts() ) :
						/* Start the Loop */
						while ( have_posts() ) : the_post();
							?>
							<div class="thoughts-link-wrap">
								<?php
								the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>');?>
								<p><?php the_field('blurb')?></p>
							</div><?php

						endwhile; // End of the loop.

						the_posts_pagination( array(
							'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
							'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
							'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
						) );

					else : ?>

						<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentyseventeen' ); ?></p>
						<?php
					endif;
					?>

					</main><!-- #main -->
				</div><!-- #primary -->
				<?php get_sidebar(); ?>

			<?php get_footer();
