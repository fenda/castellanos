<?php
/**
 * Template part for difaraying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package il
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="wrapper">
		<div class="postcol is-flex paddingtop-10 paddingbottom-10">
			<?php if ( has_post_thumbnail() ) { ?>
				<div class="postcol__thumb is-flexitem">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_post_thumbnail('blog_thumbs'); ?>
					</a>
				</div>
			<?php } ?>
			<div class="postcol__text is-flexitem">
				<h5 class="is-uppercase margin-0 marginbottom-3">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_title(); ?>
					</a>
				</h5>
				<?php the_excerpt(); ?>
			</div>
		</div>

	</div>
</article>