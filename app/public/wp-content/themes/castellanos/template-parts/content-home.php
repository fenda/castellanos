<?php if( have_rows('featured_area') ): ?>
  <?php while( have_rows('featured_area') ): the_row(); 
    $image = get_sub_field('background_image');
  ?>
    <div class="hero is-relative">
        <img src="<?php echo esc_url( $image['url'] ); ?>" class="img-fit img-fit--right" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
        <div class="hero__content color-accent">
          <div class="headline headline--xxl is-uppercase"><?php the_sub_field('headline'); ?></div>
          <div class="headline headline--md"><?php the_sub_field('text'); ?></div>

          <?php if(have_rows('buttons')): ?>
            <div class="hero__buttons">
              <?php while (have_rows('buttons')) : the_row(); ?>
                <a class="button <?php if (get_sub_field('style')) { echo 'button--' . get_sub_field('style'); } ?>" href="<?php the_sub_field('url'); ?>" role="button"><?php the_sub_field('label'); ?></a>
              <?php endwhile; ?>
            </div>
          <?php endif; ?>
        </div>
    </div>

  <?php endwhile; ?>
<?php endif; ?>

<?php
$tagline = get_field('tagline');
if( $tagline ): ?>
  <div class="tagline spacings">
    <div class="wrapper">
      <div class="headline headline--xl is-center"><?php echo $tagline['headline']; ?></div>
      <div class="headline headline--md is-center"><?php echo $tagline['text']; ?></div>
    </div>
  </div>
<?php endif; ?>

<?php
$section1 = get_field('first_section');
if( $section1 ): ?>
  <div class="section spacings is-relative">
    <img src="<?php echo esc_url( $section1['background_image']['url'] ); ?>" class="img-fit img-fit--right" alt="<?php echo esc_attr( $section1['background_image']['alt'] ); ?>" />
    <div class="wrapper">
      <div class="section__content">
        <div class="headline headline--md text-semi"><?php echo $section1['headline']; ?></div>
        <div><?php echo $section1['text']; ?></div>
        <div>
          <a href="<?php echo $section1['link_to_page']; ?>" class="button button--small">Learn More</a>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>

<!-- highlighted services list -->
<?php if( have_rows('featured_services') ): ?>
  <?php while( have_rows('featured_services') ): the_row(); ?>
    <div class="ft-services">
        <div class="wrapper is-center">
          <div class="headline headline--lg marginbottom-2"><?php the_sub_field('headline'); ?></div>
          <div class=""><?php the_sub_field('text'); ?></div>

          <?php $services = get_sub_field('services');
            if( $services ): ?>
              <div class="ft-services__list splide js-services-slider">
                <div class="splide__track">
                  <div class="splide__list">
                    <?php foreach( $services as $post ): 
                      setup_postdata($post); ?>
                      <div class="ft-services__item splide__slide">
                        <div class="ft-services__item-image marginbottom-2">
                          <?php the_post_thumbnail('blog_thumb'); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="text--lg text-se"><?php the_title(); ?></a>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
            <?php wp_reset_postdata(); ?>
          <?php endif; ?>
        </div>
    </div>

  <?php endwhile; ?>
<?php endif; ?>

<?php
$doctor = get_field('meet_the_doctor');
if( $doctor ): ?>
  <div class="thedoctor spacings is-relative">
    <img src="<?php echo esc_url( $doctor['background_image']['url'] ); ?>" class="img-fit" alt="<?php echo esc_attr( $section1['background_image']['alt'] ); ?>" />
    <div class="wrapper">
      <div class="thedoctor__image">
        <img src="<?php echo esc_url( $doctor['profile_picture']['url'] ); ?>" class="" alt="<?php echo esc_attr( $doctor['profile_picture']['alt'] ); ?>" />
      </div>
      <div class="thedoctor__content">
        <div class="headline headline--lg"><?php echo $doctor['headline']; ?></div>
        <div><?php echo $doctor['text']; ?></div>
        <div>
          <a href="<?php echo $doctor['link_to_page']; ?>" class="button button--small">Learn More</a>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>

<?php
$gallery = get_field('patient_gallery');
if( $gallery ): ?>
  <div class="gallery spacings is-relative">
    <div class="wrapper is-center">
      <div class="headline headline--md text-semi"><?php echo $gallery['headline']; ?></div>
      <div><?php echo $gallery['text']; ?></div>

      <div class="gallery__container">
        <div class="gallery__tall">
          <img src="<?php echo esc_url( $gallery['image_tall']['url'] ); ?>" class="" alt="<?php echo esc_attr( $gallery['image_tall']['alt'] ); ?>" />
        </div>
        <div class="gallery__right">
          <div class="gallery__squares">
            <div class="gallery__square">
              <img src="<?php echo esc_url( $gallery['image_square_1']['url'] ); ?>" class="" alt="<?php echo esc_attr( $gallery['image_square_1']['alt'] ); ?>" />
            </div>
            <div class="gallery__square">
              <img src="<?php echo esc_url( $gallery['image_square_2']['url'] ); ?>" class="" alt="<?php echo esc_attr( $gallery['image_square_2']['alt'] ); ?>" />
            </div>
          </div>
          <div class="gallery__wide">
            <img src="<?php echo esc_url( $gallery['image_wide']['url'] ); ?>" class="" alt="<?php echo esc_attr( $gallery['image_wide']['alt'] ); ?>" />
          </div> 
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>

<?php
$beforeAfter = get_field('before_after');
if( $beforeAfter ): ?>
  <div class="before-after color-bg-greylight">
    <div class="wrapper wrapper--lg">
      <div class="before-after__content">
        <div class="headline headline--md text-semi"><?php echo $beforeAfter['headline']; ?></div>
        <div><?php echo $beforeAfter['text']; ?></div>
      </div>
      <div class="before-after__images">
        <div class="sliderButton">
          <svg class='icon arrowLeft'><use xlink:href='<?php echo get_template_directory_uri(); ?>/img/font-awesome.svg#chevron-left'></use></svg>
          <svg class='icon arrowRight'><use xlink:href='<?php echo get_template_directory_uri(); ?>/img/font-awesome.svg#chevron-right'></use></svg>
        </div>
        <img class="imageBefore" src="<?php echo esc_url($beforeAfter['image_before']['url']); ?>" alt="<?php echo esc_attr($beforeAfter['image_before']['alt']); ?>">

        <img class="imageAfter" src="<?php echo esc_url($beforeAfter['image_after']['url']); ?>" alt="<?php echo esc_attr($beforeAfter['image_after']['alt']); ?>">
      </div>
    </div>
  </div>
<?php endif; ?>

<!-- testimonials -->
<?php include(locate_template('components/testimonials.php')); ?>


<script src="<?php echo get_template_directory_uri(); ?>/js/home.min.js"></script>