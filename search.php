<?php get_header(); ?>


<div class="container-fluid">
<div class="row" id="studentlist">
<div class="col-sm-12"> <!--put designer results in a row-->

<h3 class="col-md-12">All Everything relating to  "<?php the_search_query(); ?>"</h3>
    <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>

        <?php if( get_post_type() == 'design' ) { ?>
           <div class="scca-student col-sm-4 col-xs-6" data-skills="<?php $rows = get_field('design_skills'); if($rows) { foreach($rows as $row) { echo $row['design_primary_skill'] . " " . $row['design_secondary_skill'] . " " . $row['design_tertiary_skill'] . " " . $row['design_additional_skill'] . " " . $row['design_additional_skill_2'] ;}} ?>">
                <h3><a href="<?php the_permalink(); ?>"><?php the_field('designer_name'); ?></a></h3>
                <div class="scca-student-group">
                    <div class="col-xs-8 scca-student-profile-image">
                        <a href="<?php the_permalink(); ?>"><img src="<?php the_field('designer_headshot'); ?>" alt="Portrait of Student Name" class="scca-student-portrait"></a>
                    </div>
                    <div class="col-xs-4 scca-thumbnail-holder">
                        <a href="<?php the_permalink(); ?>">
                        <?php
                            $rows = get_field('project_thumbnails');
                            if($rows) {
                                foreach($rows as $row) {
                                    echo '<img src="'. $row['project_thumbnail']. '">';
                                }
                            }
                        ?>
                        <a href="<?php the_permalink(); ?>"></a>
                    </div>
                </div>
        </div>
        <?php } ?>
        <?php if( get_post_type() == 'photography' ) { ?>
            <div class="scca-student col-sm-4 col-xs-6">
                <h3><a href="<?php the_permalink(); ?>"><?php the_field('photograper_name'); ?></a></h3>
                <div class="scca-student-group">
                    <div class="col-xs-8 scca-student-profile-image">
                        <a href="<?php the_permalink(); ?>"><img src="<?php the_field('photographer_headshot'); ?>" alt="Portrait of Student Name" class="scca-student-portrait"></a>
                    </div>
                    <div class="col-xs-4 scca-thumbnail-holder">
                        <a href="<?php the_permalink(); ?>">
                        <?php
                            $rows = get_field('project_thumbnails');
                            if($rows) {
                                foreach($rows as $row) {
                                    echo '<img src="'. $row['thumbnail']. '">';
                                }
                            }
                        ?>
                        </a>
                    </div>
                </div>

        </div>
        <?php } ?>
      

    <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_query(); ?>

         

</div>




<?php get_footer(); ?>