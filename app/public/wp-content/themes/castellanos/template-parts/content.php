<?php
/**
 * Template part for difaraying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package il
 */

?>

<article class="cards__item" id="post-<?php the_ID(); ?>">
	<?php if (has_post_thumbnail()) : ?>
		<div class="cards__image">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="">
				<?php the_post_thumbnail('blog_thumb'); ?>
			</a>
		</div>
	<?php endif; ?>
	<div class="cards__content is-center">
		<h3 class="headline headline--xs"><?php the_title(); ?></h3>
		<a href="<?php the_permalink(); ?>" class="link">Read More >></a>
	</div>
</article>

