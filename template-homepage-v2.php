<?php

/* Template Name: Homepage */

get_header();

?>

<div class="container-fluid row" id="HomepageWork">

<!-- insert beginning of query here -->

<?php

    $args = array(
		'post_type' => array('design', 'photography'),
    	'orderby' => 'rand',
    	'posts_per_page' => 100
	);

	$query = new WP_Query( $args );

?>

<?php while ($query->have_posts()) : $query->the_post(); ?>

<!-- Now that the query has been made, the code below will repeat over and over pulling the information requested below -->

	<div class="col-sm-3 col-xs-6 scca-homepage-item">
		<?php the_title(); ?>
		<img src="<?php the_field('featured_project_image'); ?>">
		<div class="scca-caption">
			<h5><?php the_field('featured_project_name'); ?></h5>
		</div>
		<p class="scca-labels">
			<?php the_field('featured_project_type'); ?>
		</p>
</div>

<?php wp_reset_query(); ?>

<?php endwhile; ?>

</div><!--hompagework closes-->
<script>
	jQuery(document).ready(function($) {
	    var $container = $('#HomepageWork');
	    $container.imagesLoaded(    function()  {
	        $container.isotope({
	            itemSelector: '.scca-homepage-item',
	            layoutMode: 'masonry',
	            transitionDuration: '1s',
	            masonry: {
	                columnWidth: '.scca-homepage-item'
	            }
	        });
	    });
	});

</script>
<?php get_footer(); ?>