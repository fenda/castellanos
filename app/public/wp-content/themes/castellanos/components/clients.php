<?php if( have_rows('community_work_clients', 'option') ): ?>
  <div class="awards color-bg-light paddingbottom-0">
    <div class="wrapper wrapper--md">
      <div class="headline headline--lg is-center is-uppercase marginbottom-15">- PROUD TO WORK WITH THESE CLIENTS -</div>
      <div class="awards__list">
        <?php while( have_rows('awards', 'option') ): the_row(); 
          $image = get_sub_field('logo');
          ?>
          <div class="awards__item">
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
<?php endif; ?>

<script src="<?php echo get_template_directory_uri(); ?>/js/awards.min.js"></script>