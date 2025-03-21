<?php

// Register shortcode
add_shortcode( 'testimonials_list', 'shortcode_for_testimonials' );
add_shortcode( 'faqs_list', 'shortcode_for_faqs' );
add_shortcode( 'rep_cases_list', 'shortcode_for_rep_cases' );
add_shortcode( 'comm_work_list', 'shortcode_for_comm_work' );
add_shortcode( 'practice_areas_list', 'shortcode_for_practice_areas' );

function shortcode_for_testimonials( $atts ) {
    $args = array(
        'post_type' => 'testimonials',
    );

    $query = new WP_Query( $args );
    if ( !$query->have_posts() ) {
        return '<p>No Testimonials found.</p>';
    }
    
    // Initialize Reviews Schema array
    $schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => get_bloginfo('name'),
        'aggregateRating' => array(
            '@type' => 'AggregateRating',
            'ratingValue' => '5', // Assuming all reviews are 5-star
            'reviewCount' => $query->post_count,
            'bestRating' => '5',
            'worstRating' => '1'
        ),
        'review' => array()
    );
    
    ob_start(); ?>
    <div class="testimonials__wrapper">
        <div class="testimonialslist">
            <?php while ( $query->have_posts() ) : $query->the_post(); 
                // Add each testimonial to the schema array
                $schema['review'][] = array(
                    '@type' => 'Review',
                    'reviewRating' => array(
                        '@type' => 'Rating',
                        'ratingValue' => '5' // Assuming all reviews are 5-star
                    ),
                    'reviewBody' => wp_strip_all_tags(get_the_content()),
                    'author' => array(
                        '@type' => 'Person',
                        'name' => get_the_title()
                    )
                );
            ?>
                <div class="testimonialslist__item">
                    <div class="wrapper wrapper--md">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="testimonialslist__thumb">
                                <?php the_post_thumbnail(); ?>
                            </div>
                        <?php endif; ?>
                        <div class="weight-bold"><?php the_title(); ?></div>
                        <div><i><?php the_content(); ?></i></div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <!-- Output Schema JSON-LD -->
    <script type="application/ld+json">
    <?php echo json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); ?>
    </script>
    <?php
    wp_reset_postdata();
    return ob_get_clean();
}

function shortcode_for_faqs( $atts ) {
    $args = array(
        'post_type' => 'faq',
    );

    $query = new WP_Query( $args );
    if ( !$query->have_posts() ) {
        return '<p>No FAQs found.</p>';
    }
    
    ob_start(); 
    
    // Initialize FAQ Schema array
    $schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => array()
    );
    ?>
    <div class="faqlist">
        <div class="headline headline--sm is-center color-accent marginbottom-10">
        Find the answers you need
        </div>
        <div class="wrapper wrapper--md">
            <?php 
            while ( $query->have_posts() ) : $query->the_post(); 
                // Add each FAQ to the schema array
                $schema['mainEntity'][] = array(
                    '@type' => 'Question',
                    'name' => get_the_title(),
                    'acceptedAnswer' => array(
                        '@type' => 'Answer',
                        'text' => wp_strip_all_tags(get_the_content())
                    )
                );
            ?>
                <div class="faqlist__item">
                    <div class="faqlist__icon js-openQ">
                        <svg class="icon">
                            <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/font-awesome.svg#arrow-up-right"></use>
                        </svg>
                    </div>
                    <div class="weight-bold faqlist__question js-openQ">
                        <?php the_title(); ?>
                    </div>
                    <div class="faqlist__answer">
                        <?php the_content(); ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/faqs-min.js"></script>
    
    <!-- Output Schema JSON-LD -->
    <script type="application/ld+json">
    <?php echo json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); ?>
    </script>
    <?php
    wp_reset_postdata();
    return ob_get_clean();
}
