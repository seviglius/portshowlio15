<?php

/* Template Name: Photo List */

get_header();

?>
<div class="container-fluid">
<!--Student Filters-->
<div id="Filters" class="scca-student-filters">

	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<!--<small class="text-uppercase">I only want to see students with these skill combinations:</small>-->
			<h4 class="text-center text-uppercase greyed-text">Select up to <strong>3</strong> skill combinations to filter students.</h4>
			<ul>
				<li><input type="checkbox" value="tag-lifestyle" id="tag-lifestyle"><label for="tag-lifestyle"><span>Lifestyle</span></label></li>
				<li><input type="checkbox" value="tag-editorial" id="tag-editorial"><label for="tag-editorial"><span>Editorial</span></label></li>
				<li><input type="checkbox" value="tag-event" id="tag-event"><label for="tag-event"><span>Event</span></label></li>
				<li><input type="checkbox" value="tag-wedding" id="tag-wedding"><label for="tag-wedding"><span>Wedding</span></label></li>
				<li><input type="checkbox" value="tag-product" id="tag-product"> <label for="tag-product"><span>Product</span></label></li>
				<li><input type="checkbox" value="tag-fashion" id="tag-fashion"><label for="tag-fashion"><span>Fashion &amp; beauty</span></label></li>
				<li><input type="checkbox" value="tag-sports" id="tag-sports"><label for="tag-sports"><span>Sports/outdoor</span></label></li>
				<li><input type="checkbox" value="tag-children" id="tag-children"><label for="tag-children"><span>Children</span></label></li>
				<li><input type="checkbox" value="tag-foodbev" id="tag-foodbev"><label for="tag-foodbev"><span>Food &amp; beverage</span></label></li>
                <li><input type="checkbox" value="tag-fineart" id="tag-fineart"><label for="tag-fineart"><span>Fine art photography</span></label></li>
                <li><input type="checkbox" value="tag-video" id="tag-video"><label for="tag-video"><span>Video</span></label></li></li>
				<li><input type="checkbox" value="tag-portrait" id="tag-portrait"><label for="tag-portrait"><span>Portrait</span></label></li>
			</ul>
            <button id="ClearButton" class="clear-button" >Clear all every filter!</button>
		</div>
	</div>
</div>
	<!--Container for Students-->
	<div class="row" id="studentlist">
	<?php
		$args = array(
			'post_type' => array('photography'),
			'orderby' => 'rand',
			'posts_per_page' => 100
		);

		$query = new WP_Query($args);

	?>
	<?php while ($query->have_posts()) : $query->the_post(); ?>
	<!--Individual Student Module-->
	<div class="scca-student col-sm-4 col-xs-6 small-phone-single" data-skills="<?php $rows = get_field('photo_skills'); if($rows) { foreach($rows as $row) { echo $row['photo_primary_skill'] . " " . $row['photo_secondary_skill'] . " " . $row['photo_tertiary_skill'] . " " . $row['photo_additional_skill'] . " " . $row['photo_additional_skill_2'] ;}} ?>">
		<h3><a href="<?php the_permalink(); ?>"><?php the_field('photograper_name');?></a></h3>
		<div class="scca-student-group">
			<div class="col-xs-8 scca-student-profile-image">
				<a href="<?php the_permalink(); ?>"><img src="<?php the_field('photographer_headshot'); ?>" alt="Portrait of <?php the_field('photographer_name'); ?>"></a>
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
	<?php wp_reset_query(); ?>
	<?php endwhile; ?>
	</div>
</div>
<script>

    // Filter Functionality
	jQuery(function($){
		// Limit maximum number of boxes checked to 3
        $('#Filters').checkboxes('max', 3);
	    // Cache jquery selectors we'll use later
	    var $filters = $('#Filters input[type="checkbox"]'),
	        $students = $('.scca-student');
	    // Set up the click handler
	    $filters.on('click', function() {
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
</script>

<!-- END CONTENT -->

<?php get_footer(); ?>