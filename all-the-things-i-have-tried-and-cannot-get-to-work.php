https://codex.wordpress.org/Post_Types

$args = array( 'post_type' => 'design', 'posts_per_page' => 10 );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
  the_title();
  echo '<div class="entry-content">';
  the_content();
  echo '</div>';
endwhile;





    <?php if (have_posts('design')) : while (have_posts()) : the_post();?>
    <div class="post">
        <h2 id="post-<?php the_ID(); ?>"><?php the_title();?></h2>
        <div class="entrytext">
            <?php
                global $more;	// hack to use Read More in Pages
                $more = 0;
                the_content('<p class="serif">Read the rest of this page »</p>'); 
            ?>
        </div>
    </div>
    <?php endwhile; endif; ?>





<?php 
        $type = 'design';
       query_posts( array(
     'post_type' => array( 'design', 'photography' ),
         'post_status' => 'publish',
         'paged' => $paged,
         'posts_per_page' => 60,
         'ignore_sticky_posts'=> 1
        );
        $temp = $wp_query; // assign ordinal query to temp variable for later use  
        $wp_query = null;
        $wp_query = new WP_Query($args); 
        if ( $wp_query->have_posts() ) :
            while ( $wp_query->have_posts() ) : $wp_query->the_post();
                echo '<h2>'; 
                the_field('featured_project_name');
                echo '</h2>'; 
                echo '<h3>';
                the_field('featured_project_type');
                echo '</h3>';
            endwhile;
        else :
            echo '<h2>Not Found</h2>';
            get_search_form();
        endif;
        $wp_query = $temp;
        ?>




https://codex.wordpress.org/Page_Templates



        if ( $wp_query->have_posts() ) :
            while ( $wp_query->have_posts() ) : $wp_query->the_post();
                echo '<img src="'; 
                the_field('featured_project_image');
                echo '"/>';
                echo '<div class="scca-caption"><h5>'; 
                the_field('featured_project_name');
                echo '</h5></div>'; 
                echo '<p class="scca-labels">';
                the_field('featured_project_type');
                echo '</p>';
            endwhile;

        endif;
        $wp_query = $temp;
        ?>



