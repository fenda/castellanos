<?php
/**
 * The template for difaraying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package il
 */

get_header(); ?>

	<main id="primary" class="site-main">

		<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content-single', get_post_type() );
			endwhile; 
		?>

	</main>

<?php
get_footer();
