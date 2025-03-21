<?php
/**
 * Template part for difaraying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package il
 */

?>

<section class="no-results not-found">
	<div class="wrapper">

		<div class="postcol paddingtop-10 paddingbottom-10">

			<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'il' ); ?></h1>
			<?php
				if ( is_home() && current_user_can( 'publish_posts' ) ) :

					printf(
						'<p>' . wp_kses(
							/* translators: 1: link to WP admin new post page. */
							__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'il' ),
							array(
								'a' => array(
									'href' => array(),
								),
							)
						) . '</p>',
						esc_url( admin_url( 'post-new.php' ) )
					);

				elseif ( is_search() ) :
					?>
					<div class="contactform">
						<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'il' ); ?></p>
						<?php get_search_form();?>
					</div>
					<?php
				else :
					?>
					<div class="contactform">
						<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'il' ); ?></p>
						<?php get_search_form();?>
					</div>
					<?php

				endif;
			?>
		</div>
	</div>
	

	
</section>
