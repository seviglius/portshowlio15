<?php

/* Template Name: Design List */

get_header();

?>

<div class="container-fluid">
<div id="Filters" class="scca-student-filters row center-block">
<!--<small class="text-uppercase">ALL EVERY SKILL</small>-->

<div class="row showlio-filters">
	<div class="col-md-10 col-md-offset-1">
			<h4 class="text-center text-uppercase greyed-text">Select up to <strong>3</strong> skill combinations to filter students.</h4>
				<ul>
					<li><input type="checkbox" value="tag-vd" id="tag-vd"><label for="tag-vd" class="scca-check-deselect"><span>Visual design</span></label></li>
					<li><input type="checkbox" value="tag-book" id="tag-book"><label for="tag-book" class="scca-check-deselect"><span>Book design</span></label></li>
					<li><input type="checkbox" value="tag-brand" id="tag-brand"><label for="tag-brand" class="scca-check-deselect"><span>Branding &amp; identity</span></label></li>
					<li><input type="checkbox" value="tag-package" id="tag-package"><label for="tag-package" class="scca-check-deselect"><span>Packaging</span></label></li>
					<li><input type="checkbox" value="tag-illustration" id="tag-illustration"><label for="tag-illustration" class="scca-check-deselect"><span>Illustration</span></label></li>
					<li><input type="checkbox" value="tag-lettering" id="tag-lettering"><label for="tag-lettering" class="scca-check-deselect"><span>Lettering</span></label></li>
					<li><input type="checkbox" value="tag-ui" id="tag-ui"><label for="tag-ui" class="scca-check-deselect"><span>User interface design</span></label></li>
                    <li><input type="checkbox" value="tag-ux" id="tag-ux"><label for="tag-ux" class="scca-check-deselect"><span>User experience design</span></label></li>
					<li><input type="checkbox" value="tag-dataviz" id="tag-dataviz"><label for="tag-dataviz" class="scca-check-deselect"><span>Data visualization</span></label></li>
					<li><input type="checkbox" value="tag-production" id="tag-production"><label for="tag-production" class="scca-check-deselect"><span>Production</span></label></li>
					<li><input type="checkbox" value="tag-motion" id="tag-motion"><label for="tag-motion" class="scca-check-deselect"><span>Motion graphics</span></label></li>
					<li><input type="checkbox" value="tag-artdir" id="tag-artdir"><label for="tag-artdir" class="scca-check-deselect"><span>Art direction</span></label></li>
					<li><input type="checkbox" value="tag-content" id="tag-content"><label for="tag-content" class="scca-check-deselect"><span>Content strategy</span></label></li>
					<li><input type="checkbox" value="tag-mobile" id="tag-mobile"><label for="tag-mobile" class="scca-check-deselect"><span>Mobile design</span></label></li>
					<li><input type="checkbox" value="tag-webdes" id="tag-webdes"><label for="tag-webdes" class="scca-check-deselect"><span>Web design</span></label></li>
					<li><input type="checkbox" value="tag-frontend" id="tag-frontend"><label for="tag-frontend" class="scca-check-deselect"><span>Front-end web</span></label></li>
				</ul>
				<button id="ClearButton" class="clear-button" >Clear all every filter!</button>
		</div><!--filters close-->
	</div>
</div>
<!--Things I need to fix:
make student link actually link to the url and open in new page
fix project thumbnail
make thumbnails pull two separate images rather than same
-->


<div class="row" id="studentlist">

<?php

	$args = array(
		'post_type' => array('design'),
		'orderby' => 'rand',
		'posts_per_page' => 100
	);

	$query = new WP_Query($args);

?>

<?php while ($query->have_posts()) : $query->the_post(); ?>


		<div class="scca-student col-sm-4 col-xs-6 small-phone-single" data-skills="<?php $rows = get_field('design_skills'); if($rows) { foreach($rows as $row) { echo $row['design_primary_skill'] . " " . $row['design_secondary_skill'] . " " . $row['design_tertiary_skill'] . " " . $row['design_additional_skill'] . " " . $row['design_additional_skill_2'] ;}} ?>">
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
				        </a>
					</div>
				</div>

		</div>



<?php wp_reset_query(); ?>

<?php endwhile; ?>

</div><!--div row closes-->
</div><!--container-fluid closes-->
<script>

    // Filter Functionality
	jQuery(function($){
		// Limit maximum number of boxes checked to 3
        $('#Filters').checkboxes('max', 3);

	    // Cache jquery selectors we'll use later
	    var $filters = $('#Filters input[type="checkbox"]'),
	        $students = $('.scca-student');

	    // Set up the click handler
	    $filters.on('click', function(event) {
	        var tags = [];
	        var	i;
	        var $activeFilters = $filters.filter(':checked');

	        // Build an array of active filters
	        for (i = 0; i < $activeFilters.length; i++) {
	            tags.push($($activeFilters[i]).val());
	        }
	        // Call the filterStudents function
	        filterStudents(tags);
	    });
        $('#ClearButton').click(function(){
            event.preventDefault();
            $($students).show();
            $('#Filters input[type="checkbox"]').prop('checked', false);
        })

	    function filterStudents(tags) {
	    	var i;
	        //If there are no tags, show all the students
	        if (tags.length <= 0) {
	            $students.show();
	            return;
	        }
	        // Show or hide students based on what checkboxes are checked
	        for (i = 0; i < $students.length; i++) {
	        	// Store EACH of student's skills they have attached to them in an array
	        	var studentSkills = $($students[i]).data('skills').split(' ');
	        	// Do the student's skills match the selected tags?
	        	var matchSkills = skillMatch(studentSkills);
	        	if(matchSkills) {
	        		$($students[i]).show('fast');
	        	} else {
	        		$($students[i]).hide('slow');
	        	}
	        }
	        function skillMatch(studentSkills) {
			// If the student's skills match the selected tags show them
			return tags.every(function(el){
				 	if (studentSkills.indexOf(el) === -1) {
				 		return false;
				 	} else {
				 		// If the student's skills don't match the selected tags hide them
				 		return true;
				 	}
				});
	    	}
	    }
	});

	jQuery(function($) {
	  $('a[href*=#]:not([href=#]) #Filters input[type="checkbox"]').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html,body').animate({
	          scrollTop: target.offset().top
	        }, 1000);
	        return false;
	      }
	    }
	  });
	});
</script>

<!-- END CONTENT -->

<?php get_footer(); ?>






