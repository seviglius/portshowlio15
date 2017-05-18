<?php

/* Template Name: Homepage */

get_header();

?>

<div class="container-fluid row" id="HomepageWork">

<!--Still need to fix:
header vid size - will talk with Tomo to loop video and get smaller file
-->


<?php
    remove_all_filters('posts_orderby');

    $args = array(
        'post_type' => array('design', 'photography'),
        'posts_per_page' => 100,
        'orderby'        => 'rand',
    );

    $query = new WP_Query($args);
    $featuredimage = get_field_objects();
?>


<?php while ($query->have_posts()) : $query->the_post(); ?>
    <div class="scca-homepage-group">
    <div class="col-sm-3 col-xs-6 scca-homepage-item">
    
    
        <a href="<?php the_permalink(); ?>"><img src="<?php the_field('featured_project_image'); ?>"></a>
    
            <div class="scca-caption">
               <h5><?php the_field('featured_project_name'); ?></h5>
            </div><!--scca-caption closes-->
            <p class="scca-labels"><?php the_field('featured_project_type'); ?></p>
    
    </div><!--scca-homepage-item closes-->
    </div><!--scca-homepage-group closes-->
<?php wp_reset_query(); ?>

<?php endwhile; ?>


</div><!--hompagework closes-->

<script>
    jQuery(document).ready(function ($) {
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