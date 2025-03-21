<?php
/**
 * The template for difaraying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package il
 */

get_header();
?>

	<main id="primary" class="site-main">
		<?php if( have_rows('blog', 'option') ):
			while( have_rows('blog', 'option') ): the_row(); 
					$image = get_sub_field('header_image');
					$tablet_image = get_sub_field('tablet_header_image');
					$mobile_image = get_sub_field('mobile_header_image');
					$subhealine = get_sub_field('header_subheadline');
				?>
				<div class="featured">
					<div class="featured__image">	
						<picture>
							<source media="(min-width: 768px)" srcset="<?php echo esc_url($image['url']); ?>" />
							<source media="(min-width: 530px)" srcset="<?php echo esc_url($tablet_image['url']); ?>" />
							<img src="<?php echo esc_url($mobile_image['url']); ?>" alt="Services header image" />
						</picture>
					</div>
					<div class="featured__content color-light">
						<div class="wrapper">
							<h1 class="headline headline--xl is-uppercase marginbottom-2">Blog</h1>
							<div class="text--md"><?php echo $subhealine; ?></div>
						</div>
					</div>
				</div>
			<?php endwhile;
		endif;
		?>
		<div class="color-bg-lightgrey wpb-content-wrapper">
			<div class="paddingtop-10 paddingleft-15 paddingright-15 paddingbottom-10 ">
				<div class="is-flex blog-archive">
					<div class="col-8">
						<?php 
					if ( have_posts() ) : ?>
							<div class="headline headline--md is-uppercase weight-bold color-blue marginbottom-6">
								<?php
									the_archive_title( '<div class="page-title">', '</div>' );
									the_archive_description( '<div class="archive-description">', '</div>' );
								?>
							</div>
							<div class="is-flex is-flex--gaplg">
								<?php
									while ( have_posts() ) :
										the_post();
										get_template_part( 'template-parts/content', get_post_type() );
									endwhile;
									the_posts_navigation();
								?>
							</div>
					<?php
					else :
						get_template_part( 'template-parts/content', 'none' );
					endif;
					?>
				</div>
				<div class="col-4 is-flexitem">
					<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		</div>
	</main>

	<style>
	.featured__image img {
		object-position: <?php if( get_field('header_image_alignment') ): the_field('header_image_alignment'); else: echo '50'; endif; ?>% 50%;
    }
  </style>

<?php
get_footer();
