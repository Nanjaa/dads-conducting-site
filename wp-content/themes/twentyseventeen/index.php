<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

wp_head(); ?>
<link href="https://fonts.googleapis.com/css?family=Crimson+Text|Roboto" rel="stylesheet">

</head>

<?php  ?>
<body id="landing-body" <?php body_class();?> style="background-image:url(<?php the_field('landing_page_background', 2); ?>);">
<div class="left-fade"></div>
<div id="page" class="site">
	<header id="landing-header-wrap" role="banner">
		<nav id="landing-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'twentyseventeen' ); ?>">
			<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
				<?php
				echo twentyseventeen_get_svg( array( 'icon' => 'bars' ) );
				echo twentyseventeen_get_svg( array( 'icon' => 'close' ) );
				_e( 'Menu', 'twentyseventeen' );
				?>
			</button>

			<?php wp_nav_menu( array(
				'theme_location' => 'top',
				'menu_id'        => 'top-menu',
			) ); ?>
		</nav><!-- #site-navigation -->

		<div class="landing-header">
			<h1 class="banner-title"><?php bloginfo( 'name' ); ?></h1>
			<div class="red-underline"></div>
			<?php $description = get_bloginfo( 'description', 'display' ); ?>
			<p class="banner-subtitle"><?php echo $description; ?></p>
		</div><!-- .landing-header -->

	</header><!-- #masthead -->