<?php
/**
 * The template for difaraying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package il
 */

?>
	<?php if( have_rows('footer', 'option') ): ?>
		<?php while( have_rows('footer', 'option') ): the_row(); ?>
			<div class="footer">
				<div class="wrapper">
					<div class="footer__logo">
						<?php 
						$image = get_sub_field('logo');
						if( !empty( $image ) ): ?>
							<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" />
						<?php endif; ?>
					</div>
					<div class="">
						<?php the_sub_field('address'); ?>
					</div>
					<div class="">
						<a href="tel:<?php the_sub_field('phone_number'); ?>" class="link"><?php the_sub_field('phone_number'); ?></a>
					</div>
					<div class="">
						<a href="mailto:<?php the_sub_field('email'); ?>" class="link"><?php the_sub_field('email'); ?></a>
					</div>
					<?php if( have_rows('social_networks') ): ?>
						<div class="social">
							<?php while( have_rows('social_networks') ) : the_row(); ?>
								<a href="<?php the_sub_field('link'); ?>" target="_blank" class="marginleft-1" aria-label="<?php the_sub_field('network'); ?>">
									<svg class='icon'>
										<use xlink:href='<?php echo get_template_directory_uri(); ?>/img/font-awesome.svg#<?php the_sub_field('network'); ?>'></use>
									</svg>
								</a>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>

					<div class="copyright">
						<div class="copyright__text">
							&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> <br>
							<span>Designed and Developed by: <a href="https://www.crush-interative.com" target="_blank" >Crush Interactive</a></span>
						</div>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>


