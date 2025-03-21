
<?php
$calltoaction = get_field('call_to_action', 'option');
if( $calltoaction ): ?>
  <div class="calltoaction color-light">
    <?php if( $calltoaction['background_image'] ): ?>
      <img src="<?php echo esc_url( $calltoaction['background_image']['url'] ); ?>" alt="<?php echo esc_attr( $calltoaction['background_image']['alt'] ); ?>" class="img-parallax" data-speed="-1" />
    <?php endif; ?>
    <div class="wrapper wrapper--md">
      <div class="headline headline--lg is-center marginbottom-5"><?php echo $calltoaction['headline']; ?></div>
      <div class="headline headline--md is-center marginbottom-15 color-accent"><?php echo $calltoaction['subheadline']; ?></div>
      <p class="is-flex is-flex--center margintop-8 marginbottom-0">
        <a href="<?php echo $calltoaction['link_to_page']; ?>" class="button">Let's Talk »</a>
      </p>
    </div>
  </div>
<?php endif; ?>
