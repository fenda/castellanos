<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package il
 */

?>

<aside id="secondary" class="widget-area">
	<div class="headline headline--md is-uppercase weight-bold color-blue marginbottom-6 is-flex paddingleft-4">Categories</div>
	<div class="categories">
		<?php
			$args = array( 'hide_empty' => '0', 'orderby' => 'name', 'order' => 'DSC' );
			$categories = get_categories($args);
			if($categories){
				foreach($categories as $category) {
					$image = get_field('category_image', 'category_'.$category->term_id);
					$current_category = is_category($category->term_id) ? 'categories__item--active' : ''; ?>


						<div class="categories__item <?php echo $current_category; ?>" style="background-image: url('<?php echo $image; ?>')">
							<a href="<?php echo get_category_link($category->term_id); ?>" class="no-decoration">
								<span class="headline headline--lg weight-bold is-uppercase color-light"><?php echo $category->name; ?></span>
							</a>
						</div>
				<?php } 
			}    
		?>
	</div>
</aside>
