
<?php get_header(); ?>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/styles/css/single_page.css" ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/styles/css/royal_orig.css" />





	<section id="">
        <div class="container-fluid" id="">


            <div class="row">
            	<div class="col-sm-3">
            		<img class="responsive-image photo-student-image single-student-portrait" src="<?php the_field('photographer_headshot'); ?>" alt="Photographer Headshot" /> 
				</div>


				<div class="col-md-6 about-student pad-sidebar"> 
					<h3 class="student-name text-uppercase"><?php the_field('photograper_name');?></h3>

					<!--skills-->
					<div class="photographer_skills">
					<?php if( have_rows('photo_skills_web') ): ?>
					<?php while( have_rows('photo_skills_web') ): the_row(); ?>
						<p class="inline-text text-uppercase photo-category"> <?php the_sub_field('photo_primary_skill_web'); ?></p>
						<p class="inline-text pipe">|</p>
						<p class="inline-text text-uppercase photo-category"><?php the_sub_field('photo_secondary_skill_web'); ?></p>
						<p class="inline-text pipe">|</p>
						<p class="inline-text text-uppercase photo-category"><?php the_sub_field('photo_tertiary_skill_web'); ?></p>
					<?php endwhile; ?>
					<?php endif; ?>
					</div><!--designer_skills closes-->


					<a href="<?php the_field('photographer_website_url'); ?>" class="student-url" target="blank"><?php the_field('photographer_website');?></a>


					<!--social media-->
						<?php if( have_rows('social_media') ): ?>
							<?php while( have_rows('social_media') ): the_row(); ?>


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
						<?php endif; ?>
				



					<p class="student-description"><?php the_field('personal_description');?></p> 


				</div><!--col 6 closes--> 

				<div class="col-sm-5"></div>
        	</div> <!--row-->

	



	    	<div class="row">
	        	<div class="col-sm-12">
					<div class="royalSlider rsDefault">
						<!-- lazy loaded image with thumbnail -->

						<?php while(the_flexible_field("gallery_photos")): ?>" 
							<?php if(get_row_layout() == "gallery_photos"): // layout: Content ?>
								<a class="rsImg" 
									data-rsBigImg="<?php the_sub_field('fullsize_photo'); ?>" 
									href="<?php the_sub_field('fullsize_photo'); ?>" 
									data-rsVideo="<?php the_sub_field('video_url'); ?>">
									<p class="photo-text"><?php the_sub_field('photo_description');?> </p>

									<div class="col-sm-4"></div>

									<div class="col-sm-4">
										<img src="<?php the_sub_field("gallery_thumbnail"); ?>" class="rsTmb" />
									</div>

									<div class="col-sm-4"></div>

								</a>
							<?php endif; ?>
						<?php endwhile; ?>

					</div><!--slider-->


				</div><!--col-->	
	    	</div> <!--row-->






            <div class="row">
            	<div class="col-sm-2"></div>
            	<div class="col-sm-8">
            		<p class="process-statement"><?php the_field('photo_process');?></p> 
				</div> 
				<div class="col-sm-2"></div>				
        	</div> <!--row-->
 

	  

		<!--previous/next nav -->

	    	<!-- <div class="row pad_nav_photo">
				<div class="col-xs-12  col-sm-6">

					<div class="ppara-photo2 navigation">
					<p class="ppad_nav_photo">
					<?php c2c_previous_or_loop_post_link('%link') ?></p>
					</div>
					
				</div>
					
	   
	        	<div class="col-xs-12 col-sm-6">	

					<div class="ppara-photo navigation">
						<p class="ppad_nav_photo">
						<?php c2c_next_or_loop_post_link('%link')?></p>
					</div>
				
				</div>

	    	</div> --> <!--row-->


		</div> <!--container-->
	</section> <!--section -->


	    
    
	  


	<!-- jQuery -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>')</script>


	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/royalslider.js"></script>



	<!--royal slider script-->
	        <script>
	            jQuery(document).ready(function($) {
	                $(".royalSlider").royalSlider({
	                    keyboardNavEnabled: true,
	                    loop: true,
	                    autoScaleSlider: true,
	                    usePreloader: true,
	                    arrows: true,
	                    controlsInside: true,
	                    controlNavigation: 'tabs',
	                    thumbs: {
	                            // thumbnails options go gere
	                            spacing: 10,
	                            arrowsAutoHide: false,
	                            },

	                    fullscreen: {
	                        // fullscreen options go gere
	                        enabled: true,
	                        nativeFS: false,
	                    },

	                    globalCaption: true,
	                    fitInViewport: true,

	                    arrowsNavAutoHide: true,

	                    autoScaleSlider:true,
	                    autoScaleSliderHeight: 400,
	                    autoScaleSliderWidth: 800,
                    
	                    autoPlay: {
	                    	// autoplay options go gere
	                    	enabled: true,
	                    	pauseOnHover: true,
	                    },

	                    imageScaleMode:'fit',
	                    imageAlignCenter: true,

	                });  
	            });
	        </script>







<?php get_footer(); ?>
	                