<head>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/styles/css/postshow_gallery.css" />
</head>


<?php

/* Template Name: Gallery Page */

get_header();

?>




<div class="container-fluid" id="postshow_gallery">
	<div class="col-sm-4 col-sm-offset-4 postshow_title">
		<h2><?php the_field('title_for_the_gallery'); ?></h2>
		<p>Thank you all for coming!</p>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<?php the_field('add_your_gallery'); ?> 
		</div> 
	</div>
</div>


<?php get_footer(); ?>