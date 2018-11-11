<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

		</div><!-- #content -->
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<footer>
	<p>&copy;<?php echo date('Y'); ?> warrenolfert.com | <?php the_field('email', 14); ?></p>
</footer><!-- #colophon -->
<?php wp_footer(); ?>
</body>
</html>
