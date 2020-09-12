<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="page-wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php

				// Media gallery
				if ( is_page(18)) {
					echo '<h2>';
					echo the_field('content_title');
					echo '</h2>';

					// overlay
					echo '<div class="imgOverlay"><div class="overlayBg"></div><i class="material-icons closeOverlay">clear</i><img src=""></div>';
					
					// Media Gallery Page
				    $categories = get_categories( array(
					    'orderby' => 'name',
					    'order'   => 'ASC',
					    'exclude' => 6
					) );
					 
					$i = 0;
					$len = count($categories);
					
					foreach( $categories as $category ) {
					    echo '<div class="media-category';
					    // rounded corners for the first and last
					    if ($i == 0) {
					        echo ' first-category';
					    } else if ($i == $len - 1) {
					        echo ' last-category';
					    }
					    $i++;

					    echo '"><p>' . $category->name . '</p><i class="material-icons accordion-status closed">add</i><i class="material-icons accordion-status open">remove</i></div>';
					    $category_id = get_cat_ID($category->name);


					    $args = array(
						  'category' => $category_id,
						  'numberposts' => -1,
						  'orderby' => 'title',
					    	'order' => 'ASC'
						);
						$category_posts = get_posts( $args );

						if ($category_posts) {
							echo '<div class="posts-wrap accordion-closed">';

							foreach ($category_posts as $post):
								setup_postdata($post); ?>
								<div class="col-3">
									<?php if (get_field('youtube_link')) {
										echo '<div class="iframe-wrap">'; echo the_field('youtube_link'); echo '</div>';
									} else if (get_field('image')) {
										echo '<img class="media-gallery-img" alt="'; echo the_title(); echo '" src="'; echo the_field('image'); echo '">';
									} ?>
									
									<h3 class="media-title"><?php the_title(); ?></h3>
									<p class="media-subtitle"><?php the_field('post_subtitle');?></p>
									<p class="media-content"><?php echo get_the_content();?></p>
								</div>
							<?php
							endforeach;
							echo '</div>';
						}
					}
				// End of Media Gallery

				// Thoughts Landing
				}  else if ( is_page(31)) {
					echo '<h2>';
					echo the_field('content_title');
					echo '</h2>';

					// Media Gallery Page
				    $posts = get_posts( array(
					    'category' => 6
					) );

					foreach ($posts as $post):
						setup_postdata($post); ?>
						<div class="thoughts-link-wrap">
							<?php
							the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>');?>
							<p><?php the_field('blurb')?></p>
						</div>
					<?php
					endforeach;

					get_sidebar();

				// End of Thoughs Landing

				// Repertoire Page
				} else if ( is_page(34)) {
					echo '<h2>';
					echo the_field('content_title');
					echo '</h2>';

					$terms = get_terms( 'genre' );
					if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
					    echo '<div class="filter-list"><h3>Filter Repertoire</h3><ul>';
					    echo '<li class="filter-reset filter-active">All</li>';
					    foreach ( $terms as $term ) {
					        echo '<li id="' . str_replace(" ","-", $term->name) . '">' . $term->name . '</li>';
					    }
					    echo '</ul></div>';
					}

					?><h3>Pieces:</h3><div class="repertoire-pieces">

					<?php $posts = get_posts( array(
					    'post_type' => 'repertoire_pieces',
					    'meta_key' => 'composer',
					    'orderby' => 'meta_value',
					    'order' => 'ASC',
					    'numberposts' => -1
					) );
						foreach ($posts as $post):
							setup_postdata($post); 

							$post_terms = get_the_terms( get_the_ID(), 'genre' );
							if ( $post_terms && ! is_wp_error( $post_terms ) ) : 
							 
							    $genres = array();
							 
							    foreach ( $post_terms as $post_terms ) {
							        $genres[] = $post_terms->name;
							    }
							                         
							    $joined_terms = join( " ", str_replace(" ", "-", $genres) );
							    ?>
							 
							 	<div class="<?php echo $joined_terms; ?> rep-piece">
							 		<div class="fifty">
										<p><?php echo the_field('composer');?></p>
									</div>
									<div class="fifty">
										<p><?php echo get_the_title();?></p>
									</div>
							 	</div>
							<?php endif;
						endforeach;
					?> </div> <?php

				// End of repertoire page
				// All other pages
				} else {
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/page/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
				}
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
