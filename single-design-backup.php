<?php get_header(); ?>

<head>
	<!-- Bootstrap  -->  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<!-- Font Awesome --><link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<!--  Global styles --><link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/styles/css/global.css">
	<!-- Master Styles --><link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/styles/css/master.css">
	<!-- Single Page Style --><link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/styles/css/single_page.css">
</head>

<section class="scca-bio-section">
	<div class="container-fluid" id="design-page">
			<div class="row">
				<div class="col-sm-3">
					<img class="responsive-image student-image" src="<?php the_field('designer_headshot'); ?>"/>
				</div><!--col-3-->
				<div class="col-md-6 about-student pad-sidebar">
					<h3 class="student-name text-uppercase"> <?php the_field('designer_name'); ?> </h3>
					<p class="inline-text text-uppercase designer-category">UX Design</p>
					<p class="inline-text pipe">|</p>
					<p class="inline-text text-uppercase designer-category">Visual Design</p>
					<p class="inline-text pipe">|</p>
					<p class="inline-text text-uppercase designer-category">Web Design</p>
					<a href="#" class="student-url"> <?php the_field('designer_website'); ?> </a>

					<!--social media-->
				<?php if( have_rows('social_media_design') ): ?>
					<?php while( have_rows('social_media_design') ): the_row(); ?>


						<?php if(get_sub_field('linkedin_page') ): ?>
							<a class="social-icon" href="<?php the_sub_field('linkedin_page'); ?>" >
								<span class="fa-stack fa-lg scca-social-button">
                    				<i class="fa fa-stack-1x fa-linkedin "></i>
                				</span>
							</a>

						<?php endif; ?>

						<?php if(get_sub_field('facebook_page') ): ?>
							<a class="social-icon" href="<?php the_sub_field('facebook_page'); ?>" >
								<span class="fa-stack fa-lg scca-social-button">
                    				<i class="fa fa-stack-1x fa-facebook"></i>
                				</span>
							</a>
						<?php endif; ?>

						<?php if(get_sub_field('twitter_page') ): ?>
							<a class="social-icon" href="<?php the_sub_field('twitter_page'); ?>" >
								<span class="fa-stack fa-lg scca-social-button">
                    				<i class="fa fa-stack-1x fa-twitter"></i>
                				</span>
							</a>
						<?php endif; ?>

						<?php if(get_sub_field('instagram_page') ): ?>
							<a class="social-icon" href="<?php the_sub_field('instagram_page'); ?>" >
								<span class="fa-stack fa-lg scca-social-button">
                    				<i class="fa fa-stack-1x fa-instagram "></i>
                				</span>
							</a>
						<?php endif; ?>

						<?php if(get_sub_field('tumblr_page') ): ?>
							<a class="social-icon" href="<?php the_sub_field('tumblr_page'); ?>" >
								<span class="fa-stack fa-lg scca-social-button">
                    				<i class="fa fa-stack-1x fa-tumblr"></i>
                				</span>
							</a>
						<?php endif; ?>

						<?php if(get_sub_field('pinterest_page') ): ?>
							<a class="social-icon" href="<?php the_sub_field('pinterest_page'); ?>" >
								<span class="fa-stack fa-lg scca-social-button">
                    				<i class="fa fa-stack-1x fa-pinterest"></i>
                				</span>
							</a>
						<?php endif; ?>

				    <?php endwhile; ?>
				<?php endif; ?> <br>
				<!--social media-->

		<p class="student-description"><?php the_field('designer_description'); ?> </p>
			</div><!--col-6-->
		</div> <!--row-->
	</div> <!--container-->
</section>

<section>

<?php while(has_sub_field("projects")):  //the start of the flex content ?>
<?php if(get_row_layout() == "project"): // layout: Content ?>

<div class="container-fluid container">
<div class="row stickem-container">

				<div class="col-sm-3 aside stickem">
					<div class="dummy">

						<h3 class="project-name text-uppercase"><?php the_sub_field("project_name"); ?></h3>
						<p class="project-description"><?php the_sub_field("project_description"); ?></p>

						<!--team member repeater-->
						<?php if( have_rows('team_members') ): ?>
		    				<?php while( have_rows('team_members') ): the_row(); ?>
	
								<h5 class="inline-text"><?php the_sub_field('member_names'); ?></h5>

		    				<?php endwhile; ?>
						<?php endif; ?>


						<!--member role repeater-->
						<?php if( have_rows('team_members') ): ?>
							<?php while( have_rows('team_members') ): the_row(); ?>
								<p class="inline-text designer-role text-uppercase"> <?php the_sub_field('team_member_roles'); ?></p>
							<?php endwhile; ?>
						<?php endif; ?>

					</div><!--sidenav-->
				</div><!--col-3-->

				<div class="col-sm-9 design-page-item pad-sidebar container">

					<!--project image repeater-->
					<?php	if( have_rows('project_image') ):	?>
						<?php	  while ( have_rows('project_image') ) : the_row();	?>
							<img src="<?php the_sub_field("design_image"); ?>" class="responsive-image design-image"/>
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



<footer>

<!--
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
-->
	<!-- jQuery       <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
	<!-- Bootsrap JS  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>-->
	<!-- Isotope JS   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.0/isotope.pkgd.js"></script>-->
	<!-- imagesLoaded JS  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/imagesLoaded.min.js"></script>-->
	<!-- sticky sidebar JS  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/sticky.js"></script>-->
<!-- 
	<script>
		var $container = $('#HomepageWork');
		$container.imagesLoaded(	function()	{
			$container.isotope({
				itemSelector: '.homepage-item',
				layoutMode: 'masonry',
				transitionDuration: '1s',
				masonry: {
					columnWidth: '.homepage-item'
				}
			});
		});
	</script>
-->
</footer>

<?php get_footer(); ?>

	<script src="jquery.js"></script>
	<script src="jquery.stickem.js"></script>
	<script>
		$(document).ready(function() {
			$('.container').stickem();
		});
	</script>