<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>

<div class="featured">
	<img src="<?php echo $url ?>" class="img-parallax" data-speed="-1" />
	<div class="wrapper is-center">
		<h1 class="headline headline--xl marginbottom-2">
			<?php
				$parent_id = wp_get_post_parent_id( get_the_ID() );
				if ( $parent_id ) {
					echo get_the_title($parent_id);
				} else {
					the_title();
				}
			?>
		</h1>
	</div>
</div>
