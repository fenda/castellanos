<div class="testimonials paddingtop-15 paddingbottom-15 color-bg-greysecondary">
    <div class="wrapper wrapper--md is-center">
        <div class="headline headline--lg is-center marginbottom-12">Patient Testimonials</div>
        <div class="testimonials__list margintop-4">
            <div class="splide js-testimonials">
                <div class="splide__track">
                    <div class="splide__list">
                        <?php
                            $args = array('post_type' => 'testimonials', 'posts_per_page' => 9);
                            $loop = new WP_Query( $args );
                            while ( $loop->have_posts() ) : $loop->the_post();
                        ?>
                            <div class="splide__slide testimonials__item">
                                <div class="testimonials__container">
                                    <?php if( has_post_thumbnail() ): ?>
                                        <div class="testimonials__image">
                                            <?php the_post_thumbnail('testimonials'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="testimonials__content">
                                        <div class="headline headline--md"><?php the_title(); ?></div>
                                        <div class="text--sm text-semi"><?php the_field('service'); ?></div>
                                        <div class="text--sm"><?php cstln_excerpt(); ?></div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; wp_reset_query(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/testimonials.min.js"></script>