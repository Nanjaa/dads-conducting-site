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
					<h1 class="banner-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Warren Olfert</a></h1>
					<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
				</div><!-- .wrap -->
			</div><!-- .navigation-top -->
		<?php endif; ?>

		<div class="banner-wrap">
			<div class="banner-image" style="background-image: url(<?php the_field('banner_image'); ?>);"></div>

			<div class="banner-details">
				<h1 class="banner-title">Archive Results</h1>
				<div class="red-underline"></div>
				<?php the_archive_title( '<p class="banner-subtitle">', '</p>' ); ?>
			</div>
		</div>

	</header><!-- #masthead -->

	<div class="site-content-contain">
		<div id="content" class="site-content">

				<header class="page-header search-header">
					<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
				</header><!-- .page-header -->

				<div id="primary" class="content-area">
					<main id="main" class="site-main" role="main">

						<?php
						if ( have_posts() ) : ?>
							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();
								if ( in_category( '3' ) ) :
									?><div class="thoughts-link-wrap">
										<?php
										the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>');?>
										<p><?php the_field('blurb')?></p>
									</div>
									<?php
								endif;
							endwhile;

							the_posts_pagination( array(
								'prev_text' => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
								'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
							) );

						else :

							get_template_part( 'template-parts/post/content', 'none' );

						endif; ?>

						</main><!-- #main -->
					</div><!-- #primary -->
					<?php get_sidebar(); ?>
				</div><!-- .wrap -->

				<?php get_footer();
