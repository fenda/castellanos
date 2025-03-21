<div class="contactpage">
  <div class="is-flex contactblocks font-secondary">
    <div class="contactblocks__item contactblocks__item--content">
      <?php if( have_rows('footer', 'option') ): ?>
        <?php while( have_rows('footer', 'option') ): the_row(); ?>
          <div class="footer">
            <div class="wrapper">
              <div class="color-accent text--md">
                <?php the_sub_field('address'); ?>
              </div>
              <div class="">
                <span>Call today</span>
                <a href="tel:<?php the_sub_field('phone_number'); ?>" class="link color-light"><?php the_sub_field('phone_number'); ?></a>
              </div>
              <div class="">
                <a href="mailto:<?php the_sub_field('email'); ?>" class="link color-light"><?php the_sub_field('email'); ?></a>
              </div>
              <?php if( have_rows('social_networks') ): ?>
                <div class="social">
                  <?php while( have_rows('social_networks') ) : the_row(); ?>
                    <a href="<?php the_sub_field('link'); ?>" target="_blank" class="marginleft-1">
                      <svg class='icon color-accent'>
                        <use xlink:href='<?php echo get_template_directory_uri(); ?>/img/font-awesome.svg#<?php the_sub_field('network'); ?>'></use>
                      </svg>
                    </a>
                  <?php endwhile; ?>
                </div>
              <?php endif; ?>

              <div class="copyright">
                <div class="copyright__text">Designed and Developed by: <a href="https://www.crush-interative.com" target="_blank" class=" color-light" >Crush Interactive</a></div>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
    <div class="contactblocks__item">
      <?php the_field('map_iframe', 'option'); ?>
    </div>
  </div>

  <?php
      $image = get_field('background_image_contact_form', 'option');
      $url = esc_url($image['url']);
    ?>

  <div class="contactform is-relative">
    <img src="<?php echo $url ?>" class="img-parallax" data-speed="-1" />
    <div class="wrapper wrapper--md">
      <div class="headline headline--md is-center marginbottom-4 color-light">- QUESTIONS? -</div>
      <div class="headline headline--sm is-center marginbottom-12 color-accent">Contact Us and get a Free Consultation</div>
      <!-- do shortcode CF7 -->
      <?php echo do_shortcode('[contact-form-7 id="f8e1bbc" title="Contact form 1"]'); ?>
    </div>
  </div>
</div>
