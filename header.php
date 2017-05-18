<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

    <!-- Meta Tags & Browser Stuff -->
    
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" />

    <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

    <!--favicon code-->
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="/mstile-144x144.png">
    <meta name="theme-color" content="#ffffff">


    <!-- Make the HTML5 elements work in IE. -->
    <!--[if IE]>
        <script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <?php
     // Initialize template-specific components
        if (is_page_template('template-homepage.php')) {
            add_action('wp_enqueue_scripts', 'homepage_components');
            echo '<!--Added homepage components-->';
        }
        if (is_singular('design')) {
            add_action('wp_enqueue_scripts', 'designer_single_components');
            echo '<!--Added designer single components-->';
        }
        if (is_page_template('template-about.php')) {
            add_action('wp_enqueue_scripts', 'about_components');
            echo '<!--Added about components-->';
        }
        if (is_singular('photography')) {
            add_action('wp_enqueue_scripts', 'photo_single_components');
            echo '<!--Added single photo components-->';
        }
        if (is_page_template('template-designlist.php') or is_page_template('template-photolist.php')) {
            add_action('wp_enqueue_scripts', 'student_list_components');
            echo '<!--Added student list components-->';
        }
    ?>
    <!-- WP HEAD -->
    <?php wp_head(); ?>

    <?php $ga_tracking_code = get_option('ga_tracking_code'); if ($ga_tracking_code) : ?>
        <!-- GOOGLE ANALYTICS -->
        <script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', '<?php echo $ga_tracking_code; ?>']);
            _gaq.push(['_trackPageview']);
            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
        </script>
    <?php endif; ?>

    <?php

    $background_colors = array('#007299', '#ef5b84', '#ffc845');

    $rand_background = $background_colors[array_rand($background_colors)];

    ?>

</head>

<body <?php body_class(); ?> >


    <header style="background-color: <?php echo $rand_background ?>;" class="pinky">




        <!--
            <video autoplay loop poster="" id="bgvid">
                <source src="polina.webm" type="video/webm">
                <source src="wp-content/uploads/2015/05/small-miro.mp4" type="video/mp4">
            </video>
        -->
            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-xs-2 col-sm-4">
                        <img class="header_date pull-right" src="/wp-content/themes/portshowlio/img/17th.svg" alt="">
                    </div>
                    <div class="col-xs-12 col-sm-4 ">
                        <img class="portshowlio-label" src="/wp-content/uploads/2015/05/portshowlio_white.svg" alt="Seattle Central Creative Academy 2015 Portshowlio">
                        <a class="scca-brand" href="/"><img src="/wp-content/uploads/2015/05/logo_white.svg" alt="All Everything"></a>
                    </div>
                    <div class="col-xs-2 col-sm-4">
                        <img class="header_date pull-left" src="/wp-content/themes/portshowlio/img/18th.svg" alt="">
                    </div>
                    
                </div>
            </div>



        <div id="navbar">
            <div class="container-fluid">

              <!--<input type="search" placeholder=" " class="scca-search form-control">-->
             <div class="searchbar mobile-only">
                  <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
                      <label>
                          <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
                      </label>
                      <input type="submit" class="search-submit" value="">
                  </form>
              </div>


                <nav>
                    <ul>
                        <li><a href="/design/">Design</a></li>
                        <li><a href="/photography/">Photography</a></li>
                        <li><a href="/about/">About</a></li>
                        <li><a href="/photo_gallery/">Event Gallery</a></li>
                    </ul>
                </nav>
                <div class="searchbar desktop-only">
                     <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
                         <label>
                             <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
                         </label>
                         <input type="submit" class="search-submit" value="">
                     </form>
                 </div>

            </div>

        </div>

    </header>
