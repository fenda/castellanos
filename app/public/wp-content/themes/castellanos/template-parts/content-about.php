<!-- display list of team members -->
<?php include(locate_template('components/team.php')); ?>

<!-- display list of testimonials -->
<?php include(locate_template('components/testimonials.php')); ?>

<!-- display list of community work cpt -->
<?php if (get_field('display_community_work')): ?>
	<?php $community_work_bg = get_field('community_work_background_image'); ?>
	<div class="community-work is-relative color-light">
		<img src="<?php echo esc_url($community_work_bg['url']); ?>" alt="<?php echo esc_attr($community_work_bg['alt']); ?>" />
		<div class="wrapper wrapper--md">
			<div class="headline headline--lg is-center marginbottom-4">- COMMUNITY WORK -</div>
			<div class="headline headline--md is-center color-accent marginbottom-12">Giving Back</div> 
			<div class="community-work__list marginbottom-15">
				<?php $community_work = get_posts(array(
					'post_type' => 'community_work',
					'posts_per_page' => -1,
				)); ?>
				<?php foreach ($community_work as $post): setup_postdata($post); ?>
					<div class="community-work__item">
						<div class="text--md weight-bold font-secondary marginbottom-4"><?php the_title(); ?></div>
						<div class="text--sm marginbottom-4"><?php echo wp_trim_words( get_the_content(), 20, '' ); ?></div>
						<a href="<?php the_permalink(); ?>" class="link">Read More »</a>
					</div>
				<?php endforeach; wp_reset_postdata(); ?>
			</div>
			<p class="is-flex is-flex--center margintop-8">
				<a href="/community-work" class="button">View Our Community Work »</a>
			</p>
		</div>
	</div>
<?php endif; ?>