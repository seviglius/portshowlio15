<?php
    // Enqueue the global styles and javascript into one function to call on all pages
    function global_theme_components() {
        wp_enqueue_style(   'bootstrap_css', get_template_directory_uri() . '/styles/css/bootstrap.css');
        wp_enqueue_style(   'font-awesome_min_css', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );
        wp_enqueue_style(   'master_css', get_template_directory_uri() . '/styles/css/master.css');
        wp_enqueue_style(   'responsive_css', get_template_directory_uri() . '/styles/css/responsive.css');
        wp_enqueue_script(  'jquery');
        wp_enqueue_script(  'bootstrap_min_js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js');
    }

    add_action( 'wp_enqueue_scripts', 'global_theme_components' );

    // Bind template-specific files to functions
    function homepage_components() {
        wp_enqueue_script(  'images_loaded', get_template_directory_uri() . '/js/imagesLoaded.min.js' );
        wp_enqueue_script(  'isotope', 'https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.0/isotope.pkgd.js' );
    }

    function photo_single_components() {
        wp_enqueue_style(   'single_photo_css', get_template_directory_uri() . '/styles/css/photo_page.css');
        wp_enqueue_style(   'royal_orig_css', get_template_directory_uri() . '/styles/css/royal-orig.css');
        wp_enqueue_style(   'royal_slider_css', get_template_directory_uri() . '/styles/css/rs-default.css');
        wp_enqueue_script(  'royal_slider_js', get_template_directory_uri() . '/js/royalslider.js');
        wp_enqueue_script(  'royal_slider_js', get_template_directory_uri() . '/js/royalslider.js');
    }

    function designer_single_components() {
        wp_enqueue_style(   'single_designer_css', get_template_directory_uri() . '/styles/css/single_page.css');
        wp_enqueue_script(  'sticky_sidebar', get_template_directory_uri() . '/js/theia-sticky-sidebar.js' );
        wp_enqueue_script(  'fit_vids', get_template_directory_uri() . '/js/jquery.fitvids.js' );
    }

    function about_components() {
        wp_enqueue_style(   'about_css', get_template_directory_uri() . '/styles/css/about_page.css');
        wp_enqueue_style(   'map_css', get_template_directory_uri() . '/styles/css/map.css');
        wp_enqueue_style(   'countdown_css', get_template_directory_uri() . '/styles/css/countdown.css');
    }

    function student_list_components() {
        // wp_enqueue_script(   'custom_filters_js', get_template_directory_uri() . '/js/portshowlio-filters.js' );
        wp_enqueue_script(      'checkbox_js', get_template_directory_uri() . '/js/jquery.checkboxes.min.js');
    }

    // Original bits
    require_once( ABSPATH . 'wp-load.php');

    function cc_mime_types($mimes) {
      $mimes['svg'] = 'image/svg+xml';
      return $mimes;
    }
    add_filter('upload_mimes', 'cc_mime_types');


	function remove_submenu_design() {
	  if(!current_user_can('activate_plugins')) {
	    global $submenu;
	    unset($submenu['edit.php?post_type=design'][10]); // Removes 'Add New'.
	}
	}
	add_action('admin_menu', 'remove_submenu_design');

	function remove_submenu_photo() {
	  if(!current_user_can('activate_plugins')) {
	    global $submenu;
	    unset($submenu['edit.php?post_type=photography'][10]); // Removes 'Add New'.
	}
	}
	add_action('admin_menu', 'remove_submenu_photo');

	function hide_that_design() {
	    if('design' == get_post_type())
	  echo '<style type="text/css">
	    #favorite-actions {display:none;}
	    .add-new-h2{display:none;}
	    .tablenav{display:none;}
	    </style>';
	}
	add_action('admin_head', 'hide_that_design');

	function hide_that_photo() {
	    if('photo' == get_post_type())
	  echo '<style type="text/css">
	    #favorite-actions {display:none;}
	    .add-new-h2{display:none;}
	    .tablenav{display:none;}
	    </style>';
	}
	add_action('admin_head', 'hide_that_photo');

    // you can also use .less files as mce editor style sheets
    add_editor_style( 'editor-style.sass' );


    // Dirty pre function with limited height and randomnlt changing border colours
    function pre($var) {
        echo '<pre style="background: #fcffb1; text-align: left; outline: 4px solid rgb('. rand(0, 250) .','. rand(0, 250) .','. rand(0, 250) .'); width: 100%; overflow: auto; max-height: 300px;">';
            if ($var) :
                print_r($var);
            else :
                echo "\n\n\t--- <b>No data recieved by pre() function</b> ---\n\n";
            endif;
        echo '</pre>';
    }

    // Dirty JS console logging function, for when you want to see some data, but not in the markup
    // TODO: Make this function recognise objects & arrays and display as such
    function consolelog($string){
        echo '<script>console.log("%c" + "'. $string .'", "color:brown;background:#ddd;font-weight:bold;padding:2px 4px;");</script>';
    }

     // Settings page
    require_once "admin/settings.php";


     // Add support
    add_theme_support('post-thumbnails');
    add_theme_support('menus');


    // Remove generator meta tag from head
    remove_action('wp_head', 'wp_generator');


    // If page needs pagination nav, return true
    function show_posts_nav() {
    	global $wp_query;
    	return ($wp_query->max_num_pages > 1);
    }


    // Modifies the default excerpt [...] to say something a little more useful.
    function new_excerpt_more($more) {
        global $post;
        return '&nbsp;<a href="'. get_permalink($post->ID) . '">' . 'Read more' . '</a>';
    }
    add_filter('excerpt_more', 'new_excerpt_more');


    // Remove width and height attributes from inserted images
    function remove_width_height_attribute($html) {
       $html = preg_replace('/(width|height)="\d*"\s/', "", $html);
       return $html;
    }
    add_filter('post_thumbnail_html', 'remove_width_height_attribute', 10);
    add_filter('image_send_to_editor', 'remove_width_height_attribute', 10);


    // Add first & last classes to wp_nav_menu menus
    function add_first_and_last($output) {
        $output = preg_replace('/class="menu-item/', 'class="first-menu-item menu-item ', $output, 1);
        $output = substr_replace($output, 'class="last-menu-item menu-item ', strripos($output, 'class="menu-item'), strlen('class="menu-item'));
        return $output;
    }
    add_filter('wp_nav_menu', 'add_first_and_last');


    // Add featured image to feeds
    // http://app.kodery.com/s/1314
    function insertThumbnailRSS($content) {
        global $post;
        if (has_post_thumbnail($post->ID)){
            $content = '' . get_the_post_thumbnail($post->ID, 'thumbnail', array('alt' => get_the_title(), 'title' => get_the_title(), 'style' => 'float:right;')) . '' . $content;
        }
        return $content;
    }
    add_filter('the_excerpt_rss', 'insertThumbnailRSS');
    add_filter('the_content_feed', 'insertThumbnailRSS');


    // Make search prefix pretty
    function change_search_url_rewrite() {
        if (is_search() && ! empty($_GET['s'])) {
            wp_redirect(home_url("/search/") . urlencode(get_query_var('s')));
            exit();
        }
    }
    if (get_option('permalink_structure') !== '') {
        add_action('template_redirect', 'change_search_url_rewrite');
    }


    // Gets the page content by ID, useful if you're trimming it down
    function get_the_content_by_id($gcbid) {
        $my_postid = $gcbid; //This is page id or post id
        $content_post = get_post($my_postid);
        $content = $content_post->post_content;
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]>', $content);
        return $content;
    }


    // Trim a string by words, so words don't get cut up
    function trim_by_words($string, $count, $ellipsis = false){
        $words = explode(' ', $string);
        if (count($words) > $count){
            array_splice($words, $count);
            $string = implode(' ', $words);
            if (is_string($ellipsis)){
                $string .= $ellipsis;
            } elseif ($ellipsis){
                $string .= '...';
            }
        }
        return $string;
    }


    /*****
        Menu highlighing fix
        ---
        Means if you have the blog page as a subpage and added to wp_nav_menu, single/archive pages will highlight correctly
    *****/
    add_filter('nav_menu_css_class', 'add_parent_url_menu_class', 10, 2);
    function add_parent_url_menu_class($classes = array(), $item = false) {
        $current_url = current_url();
        $homepage_url = trailingslashit(get_bloginfo('url'));
        if (is_404() or $item->url == $homepage_url) return $classes;
        if (strstr($current_url, $item->url)) {
            $classes[] = 'current_page_item';
        }
        return $classes;
    }
    function current_url() {
        $url = ('on' == $_SERVER['HTTPS']) ? 'https://' : 'http://';
        $url .= $_SERVER['SERVER_NAME'];
        $url .= ('80' == $_SERVER['SERVER_PORT']) ? '' : ':' . $_SERVER['SERVER_PORT'];
        $url .= $_SERVER['REQUEST_URI'];
        return trailingslashit( $url );
    }


    /*****
        Has children action
    *****/
    function add_menu_parent_class($items) {
        $parents = array();
        foreach ($items as $item) {
            if ($item->menu_item_parent && $item->menu_item_parent > 0) {
                $parents[] = $item->menu_item_parent;
            }
        }
        foreach ($items as $item) {
            if (in_array( $item->ID, $parents)) {
                $item->classes[] = 'has-children';
            }
        }
        return $items;
    }
    add_filter('wp_nav_menu_objects', 'add_menu_parent_class');

    function filter_search($query) {
        if ($query->is_search) {
        $query->set('post_type', array('design', 'photography'));
        };
        return $query;
    };
    add_filter('pre_get_posts', 'filter_search');



