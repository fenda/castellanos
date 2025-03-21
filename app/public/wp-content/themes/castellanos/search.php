<?php
/**
 * The template for difaraying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package il
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="wrapper ">
			<div class="featured">
				<picture>
					<source srcset="<?php the_field('header_image_desktop', 'options');?>" media="(min-width: 980px)">
					<source srcset="<?php the_field('header_image_tablet', 'options');?>" media="(min-width: 540px)">
					<img src="<?php the_field('header_image_mobile', 'options');?>" alt="<?php the_title(); ?>" class="" width="1404" height="405" loading="lazy">
				</picture>

				<div class="featured__content">
					<div class="wrapper">
						<h1>
						<?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Search Results for: %s', 'il' ), '<br><span>' . get_search_query() . '</span>' );
						?>
						</h1>
						
					</div>
				</div>
			</div>
			<div class="postcontainer color-bg-light">
				<?php if ( have_posts() ) : ?>

					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'search' );

					endwhile;

					?>
						<hr>
						<div class="pagination">
							<?php cstln_pagination(); ?>
						</div>
					<?php

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
			</div>
		</div>
	</main><!-- #main -->

<?php
get_footer();
