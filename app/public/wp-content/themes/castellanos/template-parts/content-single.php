<?php
/**
 * Template part for difaraying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package il
 */

?>
	<?php
    $image = get_field('header_image_blog', 'option');
    $url = esc_url($image['url']);
  ?>

  <div class="featured">
    <img src="<?php echo $url ?>" class="img-parallax" data-speed="-1" />
    <div class="wrapper is-center">
      <h1 class="headline headline--xl headline--max marginbottom-2"><?php the_title(); ?></h1>
    </div>
  </div>

	<article class="postcontainer color-bg-light paddingbottom-15 paddingtop-15" id="post-<?php the_ID(); ?>">
		<div class="wrapper wrapper--md">
			<?php the_content(); ?>
		</div>
	</article>

<!-- call to action -->
<?php get_template_part('components/calltoaction'); ?>
