<?php
/**
 * Template part for difaraying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package il
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( is_front_page() ) : 
		get_template_part('template-parts/content', 'home');
	else : 
		get_template_part('template-parts/header', 'page');
	endif;

	$parent_id = wp_get_post_parent_id( get_the_ID() );
	if ( $parent_id ) { ?>
		<div class="pagetitle color-light is-flex">
			<div class="pagetitle__parent color-bg-accent">
				<div class="text--md">
					<?php echo get_the_title($parent_id); ?>
				</div>
			</div>
			<div class="pagetitle__self color-bg-secondary is-flex is-flex--middle">
				<div class="text--md"><?php the_title(); ?></div>
				<svg class='icon'>
						<use xlink:href='<?php echo get_template_directory_uri(); ?>/img/font-awesome.svg#arrow-down-right'></use>
					</svg>
			</div>
		</div>
	<?php } ?>

	<?php if ( is_page('about-the-firm') || is_page('practice-areas') ) { ?>
		<div class="pagetitle color-light is-flex">
			<div class="pagetitle__parent color-bg-accent">
				<div class="text--md">
					<?php the_title(); ?>
				</div>
			</div>
			<div class="pagetitle__self color-bg-secondary is-flex is-flex--middle">
				<div class="text--md">Main</div>
				<svg class='icon'>
						<use xlink:href='<?php echo get_template_directory_uri(); ?>/img/font-awesome.svg#arrow-down-right'></use>
					</svg>
			</div>
		</div>
	<?php } ?>

	<?php if ( is_page('community-work') ) { ?>
		<?php include(locate_template('components/clients.php')); ?>
	<?php } ?>
		
	<?php if ( get_the_content() ) { ?>
		<div class="is-relative color-bg-light paddingtop-15" style="z-index:1;">
			<div class="<?php if (!get_field('wrapper_width')) { echo 'wrapper wrapper--md'; } ?>">
				<?php the_content(); ?>
			</div>
		</div>
	<?php } ?>

	<?php if ( is_page('about-the-firm') ) { ?>
		<?php get_template_part( 'template-parts/content', 'about' ); ?>
	<?php } ?>

	<?php if ( is_page('contact') ) { ?>
		<?php get_template_part( 'template-parts/content', 'contact' ); ?>
	<?php } ?>

	<?php if( get_field('display_awards') ) { ?>
		<?php include(locate_template('components/awards.php')); ?>
	<?php } ?>
	
	<!-- call to action -->
	<?php
		if( get_field('display_calltoaction') ) {
			get_template_part('components/calltoaction');
		}
	?>
	
</article>
