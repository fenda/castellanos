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

		<?php 
      get_template_part( 'template-parts/header-services' );
    ?>
      
      <div class="serviceslist">
        <div class="js-servicesarchive serviceslist__wrapper">
          <?php
            if ( have_posts() ) :
              while ( have_posts() ) :
                the_post();
                get_template_part( 'template-parts/content', get_post_type() );
              endwhile;
            else :
              get_template_part( 'template-parts/content', 'none' );
            endif;
          ?>
        </div>
        <div class="servicesnav js-services-anchors">
          <?php if ( have_posts() ) :
            while ( have_posts() ) :
              the_post(); ?>
              <a href="#" class="servicesnav__link servicesnav__item text--md" data-index="<?php echo $wp_query->current_post ?>"><?php the_title(); ?></a>
            <?php endwhile;
          endif; ?>
        </div>
      </div>


    <!-- call to action -->
    <?php get_template_part( 'components/calltoaction-services' ); ?>

	</main>
	<style>
	.featured__image img {
		object-position: 0 50%;
    }
  </style>
  <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/services.min.js"></script>

<?php
get_footer();
