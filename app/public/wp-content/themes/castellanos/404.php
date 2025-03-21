<?php
/**
 * The template for difaraying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package il
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="featured">
			<?php
				$image = get_field('header_image_404', 'option');
				$url = esc_url($image['url']);
			?>
			<img src="<?php echo $url ?>" class="img-parallax" data-speed="-1" />
			<div class="wrapper is-center">
				<h1 class="headline headline--xl marginbottom-2">
					<?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'il' ); ?>
				</h1>
			</div>
		</div>


		<section class="error-404 not-found paddingtop-20 paddingbottom-20">
			<div class="wrapper">

				<div class="page-content marginbottom-20" style="max-width: 300px;">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'il' ); ?></p>

					<?php get_search_form(); ?>

				</div><!-- .page-content -->
			</div>
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
