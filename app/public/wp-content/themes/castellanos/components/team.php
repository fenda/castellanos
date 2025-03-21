<?php $team_bg = get_field('meet_the_team_background_image'); ?>

<div class="team is-relative">
  <img src="<?php echo esc_url($team_bg['url']); ?>" alt="<?php echo esc_attr($team_bg['alt']); ?>" />

  <div class="wrapper wrapper--md">
    <div class="headline headline--md is-center marginbottom-4 color-light">MEET THE TEAM</div>
    <div class="headline headline--sm is-center marginbottom-12 color-accent">A Team of Floridians You Can Trust</div>
    <div class="team__list cards">
      <?php
        $args = array('post_type' => 'team', 'posts_per_page' => -1);
        $loop = new WP_Query( $args );

        while ( $loop->have_posts() ) : $loop->the_post();
      ?>
        <div class="team__item cards__item">
          <div class="cards__image team__image">
            <?php the_post_thumbnail(); ?>
          </div>
          <div class="cards__content is-center">
            <div class="headline headline--xs paddingtop-2"><?php the_title(); ?></div>
            <div class="headline headline--xs color-accent"><?php the_field('position'); ?></div>
          </div>
        </div>
      <?php endwhile; wp_reset_query(); ?>
    </div>
  </div>
</div>