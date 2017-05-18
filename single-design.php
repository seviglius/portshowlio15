<?php get_header(); ?>


<section class="scca-bio-section">
	<div class="container-fluid" id="design-page">
			<div class="row">
				
					<div class="col-sm-3 col-xs-12" >
						<img class="responsive-image student-image" src="<?php the_field('designer_headshot'); ?>"/>
					</div><!--col-3-->
				
				<div class="col-md-8 about-student pad-sidebar">
					<h3 class="student-name text-uppercase"> <?php the_field('designer_name'); ?> </h3>

					<div class="designer_skills">
					<?php if( have_rows('design_skills_web') ): ?>
					<?php while( have_rows('design_skills_web') ): the_row(); ?>
						<p class="inline-text text-uppercase designer-category"> <?php the_sub_field('design_primary_skill_web'); ?></p>
						<p class="inline-text pipe">|</p>
						<p class="inline-text text-uppercase designer-category"><?php the_sub_field('design_secondary_skill_web'); ?></p>
						<p class="inline-text pipe">|</p>
						<p class="inline-text text-uppercase designer-category"><?php the_sub_field('design_tertiary_skill_web'); ?></p>
					<?php endwhile; ?>
					<?php endif; ?>
					</div><!--designer_skills closes-->

					<a href="<?php the_field('designer_website_url'); ?>" class="student-url" target="blank"> <?php the_field('designer_website'); ?> </a>
					

					<!--social media-->
				<?php if( have_rows('social_media_design') ): ?>
					<?php while( have_rows('social_media_design') ): the_row(); ?>


						<?php if(get_sub_field('linkedin_page') ): ?>
							<a class="social-icon" href="<?php the_sub_field('linkedin_page'); ?>" target="_blank">
								<span class="fa-stack fa-lg scca-social-button">
                    				<i class="fa fa-stack-1x fa-linkedin "></i>
                				</span>
							</a>

						<?php endif; ?>

						<?php if(get_sub_field('facebook_page') ): ?>
							<a class="social-icon" href="<?php the_sub_field('facebook_page'); ?>" target="_blank">
								<span class="fa-stack fa-lg scca-social-button">
                    				<i class="fa fa-stack-1x fa-facebook"></i>
                				</span>
							</a>
						<?php endif; ?>

						<?php if(get_sub_field('twitter_page') ): ?>
							<a class="social-icon" href="<?php the_sub_field('twitter_page'); ?>" target="_blank">
								<span class="fa-stack fa-lg scca-social-button">
                    				<i class="fa fa-stack-1x fa-twitter"></i>
                				</span>
							</a>
						<?php endif; ?>

						<?php if(get_sub_field('instagram_page') ): ?>
							<a class="social-icon" href="<?php the_sub_field('instagram_page'); ?>"target="_blank" >
								<span class="fa-stack fa-lg scca-social-button">
                    				<i class="fa fa-stack-1x fa-instagram "></i>
                				</span>
							</a>
						<?php endif; ?>

						<?php if(get_sub_field('tumblr_page') ): ?>
							<a class="social-icon" href="<?php the_sub_field('tumblr_page'); ?>" target="_blank">
								<span class="fa-stack fa-lg scca-social-button">
                    				<i class="fa fa-stack-1x fa-tumblr"></i>
                				</span>
							</a>
						<?php endif; ?>

						<?php if(get_sub_field('pinterest_page') ): ?>
							<a class="social-icon" href="<?php the_sub_field('pinterest_page'); ?>" target="_blank">
								<span class="fa-stack fa-lg scca-social-button">
                    				<i class="fa fa-stack-1x fa-pinterest"></i>
                				</span>
							</a>
						<?php endif; ?>

				    <?php endwhile; ?>
				<?php endif; ?> <br>
				<!--social media-->

		<p class="student-description"><?php the_field('designer_description'); ?> </p>
			</div><!--col-8-->
		</div> <!--row-->
	</div> <!--container-->
</section>

<section>

<?php while(has_sub_field("projects")):  //the start of the flex content ?>
<?php if(get_row_layout() == "project"): // layout: Content ?>

<div class="container-fluid">
<div class="row">

				<div class="col-sm-3 sticky-sidebar">

						<h3 class="project-name text-uppercase"><?php the_sub_field("project_name"); ?></h3>
						<p class="project-description"><?php the_sub_field("project_description"); ?></p>

						<!--team member repeater-->

						<?php if( have_rows('team_members') ): ?>
							<h4>Team Members</h4>
		    				<?php while( have_rows('team_members') ): the_row(); ?>
								<a href=<?php the_sub_field('team_member_link'); ?> target="_blank"><h5 class=""><?php the_sub_field('member_names'); ?></h5></a>
		    				<?php endwhile; ?>
						<?php endif; ?>



						<!--member role repeater--><!--galyn commenting out - seems too bulky to have their roles. Should just have team member names-->
						<?php /* <?php if( have_rows('team_members') ): ?> */
							/* <?php while( have_rows('team_members') ): the_row(); ?>
								<p class="designer-role text-uppercase"> <?php the_sub_field('team_member_roles'); ?></p>
							<?php /* <?php endwhile; ?>
						<?php /* <?php endif; ?>* */ ?>

				</div><!--col-3-->

				<div class="col-sm-9 design-page-item pad-sidebar sticky-content">

					<!--project image repeater-->


					<?php	if( have_rows('project_image') ):	?>
						<?php	  while ( have_rows('project_image') ) : the_row();	?>
							<img src="<?php the_sub_field("design_image"); ?>" class="responsive-image design-image"/>
							
							<div class="embed-container iframe ">
								<div class="video-test">
								<?php the_sub_field('video_iframe'); ?></div>
							<!--<iframe class="iframe fluid-width-video-wrapper"></iframe>-->
							</div>
						<?php endwhile;	?>
						<?php	else :	?>
					<?php	endif;	?>



					<div class="hline"></div>
				</div> <!--col-9-->



</div> <!--row-->
</div> <!--container-->


<?php endif; ?>
<?php endwhile; // closing flex content ?>
         

</section>

<!--
previous/next nav 
	<section id="">
	    <div class="container-fluid" id="">

	    	<div class="row pad_nav_photo">
				<div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-2">
					<div class="para-photo2 navigation"><p class="pad_nav_photo"><?php c2c_previous_or_loop_post_link('%link') ?></p></div>
				</div>
	   
	        	<div class="col-xs-8 col-xs-offset-2 col-sm-offset-2 col-sm-4">	
					<div class="para-photo navigation"><p class="pad_nav_photo">

					<?php c2c_next_or_loop_post_link('%link') ?></p></div>
	    	</div> 
		</div> 
	</section>
-->	

<script type="text/javascript">
 jQuery(document).ready(function() {
   jQuery('.sticky-content, .sticky-sidebar').theiaStickySidebar({
     // Settings
     additionalMarginTop: 30
   });
 }); 
</script>
<script>
  $(document).ready(function(){
    // Target your .container, .wrapper, .post, etc.
    $(".embed-container").fitVids();
  });
</script>

<?php get_footer(); ?>



