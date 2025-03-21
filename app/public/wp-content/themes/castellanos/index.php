<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package il
 */

 get_header();
?>

	<main id="primary" class="site-main">

	<?php
	
	if ( have_posts() ) : ?>
			<div class="">
				<?php
					$image = get_field('header_image_blog', 'option');
					$url = esc_url($image['url']);
				?>
				<div class="featured">
					<img src="<?php echo $url ?>" class="img-parallax" data-speed="-1" />
					<div class="wrapper is-center">
						<h1 class="headline headline--xl marginbottom-2">Blog</h1>
					</div>
				</div>

				<div class="blog-archive color-bg-light paddingtop-15">
					<div class="wrapper wrapper--md is-center">
						<div class="headline headline--lg is-center is-uppercase marginbottom-4">- INDUSTRY NEWS -</div>
      			<div class="headline headline--sm color-accent is-center marginbottom-15">Stay up to date with our latest news</div>

						<div class="news cards">
							<?php
									/* Start the Loop */
								while ( have_posts() ) :
									the_post();
									get_template_part( 'template-parts/content', get_post_type() );
								endwhile;
							?>
						</div>
					</div>								
					<div class="pagination">
						<?php cstln_pagination(); ?>
					</div>
				</div>
					<?php
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif; ?>
	</main>

<?php
get_template_part('components/calltoaction');
get_footer();
