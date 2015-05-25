<?php

/**
 * Visum functions and definitions
 *
 * @package Visum
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'visum_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function visum_setup() {

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Visum, use a find and replace
         * to change 'visum' to the name of your theme in all the template files
         */
        load_theme_textdomain( 'visum', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        //add_theme_support( 'post-thumbnails' );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
        ) );

        /*
         * Enable support for Post Formats.
         * See http://codex.wordpress.org/Post_Formats
         */
        add_theme_support( 'post-formats', array(
            'aside', 'image', 'video', 'quote', 'link',
        ) );

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'visum_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );
         /*
         * Enable custom header (menu button)
         */
        $args = array(
        'width'         => 398,
        'height'        => 70,
        'default-image' => get_template_directory_uri() . '/img/valikko-btn.png',
        );
        add_theme_support( 'custom-header', $args );
    }
    endif; // visum_setup
    add_action( 'after_setup_theme', 'visum_setup' );

    /**
     * Enqueue scripts and styles.
     */
    function visum_scripts() {

        wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', false, false );
        wp_enqueue_style( 'fontawesome-css', get_template_directory_uri() . '/css/font-awesome.min.css', false, false );
        wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/css/animate.css', false, false );

        wp_enqueue_style( 'visum-style', get_stylesheet_uri() );

        wp_enqueue_script( 'visum-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

        wp_enqueue_script( 'visum-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
    }
    add_action( 'wp_enqueue_scripts', 'visum_scripts' );

    /**
     * Implement the Custom Header feature.
     */
    //require get_template_directory() . '/inc/custom-header.php';

    /**
     * Custom template tags for this theme.
     */
    require get_template_directory() . '/inc/template-tags.php';

    /**
     * Custom functions that act independently of the theme templates.
     */
    require get_template_directory() . '/inc/extras.php';

    /**
     * Customizer additions.
     */
    require get_template_directory() . '/inc/customizer.php';

    /**
     * Load Jetpack compatibility file.
     */
    require get_template_directory() . '/inc/jetpack.php';

	///////////////////////////////////////
	// Enqueue jQuery
	///////////////////////////////////////

    function jquery_script() {  
        wp_deregister_script('jquery');
        wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"), false, '1.11.2', true);
        wp_enqueue_script('jquery');
    }
    add_action( 'wp_enqueue_scripts', 'jquery_script' ); 

	///////////////////////////////////////
	// Enqueue OnePageScroll IF page is From The Grill
	///////////////////////////////////////
    function onepagescroll_script() {  
        if (is_page( 'from-the-grill' ) || is_page( 'shop' )) {
		wp_register_script( 'onepage-script', get_template_directory_uri() . '/js/jquery.onepage-scroll.js',  array( 'jquery' ), '1', true );  
        wp_register_script( 'fromthegrill-script', get_template_directory_uri() . '/js/fromthegrill.js',  array( 'jquery' ), '1', true ); 

		wp_enqueue_script( 'onepage-script' );
        wp_enqueue_script( 'fromthegrill-script' );
        }
	}
	add_action( 'wp_enqueue_scripts', 'onepagescroll_script' ); 

	///////////////////////////////////////
	// Enqueue Bootstrap JavaScript
	///////////////////////////////////////
    function bootstrap_script() {  
		wp_register_script( 'bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js',  array( 'jquery' ), '1', true );  

		wp_enqueue_script( 'bootstrap-script' );  
	}
	add_action( 'wp_enqueue_scripts', 'bootstrap_script' ); 

	///////////////////////////////////////
	// jQuery validation
	///////////////////////////////////////
    function validate_script() {  
		wp_register_script( 'validate-script', get_template_directory_uri() . '/js/jquery.validate.min.js',  array( 'jquery' ), '1', true );  

		wp_enqueue_script( 'validate-script' );  
	}
	add_action( 'wp_enqueue_scripts', 'validate_script' ); 

	///////////////////////////////////////
	// Enqueue UnSlider JavaScript
	///////////////////////////////////////
    function unslider_script() {  
		wp_register_script( 'unslider-script', get_template_directory_uri() . '/js/slick.min.js',  array( 'jquery' ), '1', true );  

		wp_enqueue_script( 'unslider-script' );  
	}
	add_action( 'wp_enqueue_scripts', 'unslider_script' ); 

	///////////////////////////////////////
	// Enqueue Classie
	///////////////////////////////////////
    function classie_script() {  
		wp_register_script( 'classie-script', get_template_directory_uri() . '/js/classie.js',  array( 'jquery' ), '1', true );  

		wp_enqueue_script( 'classie-script' );  
	}
	add_action( 'wp_enqueue_scripts', 'classie_script' ); 


	///////////////////////////////////////
	// Enqueue Navigation JavaScript
	///////////////////////////////////////
    function navigation_script() {  
		wp_register_script( 'nav-script', get_template_directory_uri() . '/js/main.js',  array( 'jquery' ), '1', true );  

		wp_enqueue_script( 'nav-script' );  
	}
	add_action( 'wp_enqueue_scripts', 'navigation_script' ); 


	///////////////////////////////////////
	// Enqueue Custom Scripts
	///////////////////////////////////////
    function custom_script() {  
		wp_register_script( 'custom-script', get_template_directory_uri() . '/js/scripts.js',  array( 'jquery' ), '1', true );  

		wp_enqueue_script( 'custom-script' );  
	}
	add_action( 'wp_enqueue_scripts', 'custom_script' ); 	

	///////////////////////////////////////
	// Wordpress Theme Support
	///////////////////////////////////////

    add_theme_support( 'post-thumbnails', array( 'post', 'page', 'player', 'product' ) );
    
    $args = array(
        'default-color' => '000000',
        'default-image' => '',
    );
    add_theme_support( 'custom-background', $args );

	///////////////////////////////////////
	// Register Menus
	///////////////////////////////////////

    register_nav_menus( array(
        'right_menu' => __( 'Oikea Paneeli', 'visum' ),
        'left_menu' => __( 'Vasen Paneeli', 'visum' ),
        'top_menu' => __( 'Yläpaneeli', 'visum' ),
        'bottom_menu' => __( 'Alapaneeli', 'visum' ),
        'full_menu' => __( 'Kokonäyttö', 'visum' ),
    ) );

	///////////////////////////////////////
	// Register Sidebar
	///////////////////////////////////////
    
    if ( ! function_exists( 'menu_sidebar' ) ) {

    // Register Sidebar
    function menu_sidebar() {

        $args = array(
            'id'            => 'menu-sidebar',
            'description'   => 'Ensimmäinen sivupalkki',
            'name'          => __( 'Menu Right', 'visum' ),
            'class'         => 'sidebar-widget',
            'before_title'  => '<h3>',
            'after_title'   => '</h3>',
            'before_widget' => '<div class="widget">',
            'after_widget'  => '</div>',
        );
        register_sidebar( $args );

    }

    // Hook into the 'widgets_init' action
    add_action( 'widgets_init', 'menu_sidebar' );

    }

    if ( ! function_exists( 'menu_sidebar_2' ) ) {

    // Register Sidebar
    function menu_sidebar_2() {

        $args = array(
            'id'            => 'menu-sidebar-2',
            'description'   => 'Toinen sivupalkki',
            'name'          => __( 'Menu Right 2', 'visum' ),
            'class'         => 'sidebar-widget-2',
            'before_title'  => '<h3>',
            'after_title'   => '</h3>',
            'before_widget' => '<div class="widget">',
            'after_widget'  => '</div>',
        );
        register_sidebar( $args );

    }

    // Hook into the 'widgets_init' action
    add_action( 'widgets_init', 'menu_sidebar_2' );

    }

	///////////////////////////////////////
	// Advanced Custom Fields 
	///////////////////////////////////////

    // 1. customize ACF path
    add_filter('acf/settings/path', 'my_acf_settings_path');

    function my_acf_settings_path( $path ) {

        // update path
        $path = get_stylesheet_directory() . '/acf/';

        // return
        return $path;

    }


    // 2. customize ACF dir
    add_filter('acf/settings/dir', 'my_acf_settings_dir');

    function my_acf_settings_dir( $dir ) {

        // update path
        $dir = get_stylesheet_directory_uri() . '/acf/';

        // return
        return $dir;

    }

    // 3. Hide ACF field group menu item
    //add_filter('acf/settings/show_admin', '__return_false');


    // 4. Include ACF
    include_once( get_stylesheet_directory() . '/acf/acf.php' );

    if( function_exists('acf_add_options_page') ) {

        acf_add_options_page('Visom asetukset');

    }

    ///////////////////////////////////////
	// SHORTCODES
	///////////////////////////////////////



    ///////////////////////////////////////
	// INCLUDES CUSTOM POST TYPES TO RSS FEED
	///////////////////////////////////////

    function myfeed_request($qv) {
        if (isset($qv['feed']))
            $qv['post_type'] = get_post_types();
        return $qv;
    }
    add_filter('request', 'myfeed_request');

    ///////////////////////////////////////
	//  replacing the default "Enter title here" placeholder text in the title input box
    //  with something more descriptive can be helpful for custom post types 
    //
    //  source: http://flashingcursor.com/wordpress/change-the-enter-title-here-text-in-wordpress-963
	///////////////////////////////////////

    function change_default_title( $title ){

        $screen = get_current_screen();

        if ( 'tuote' == $screen->post_type ){
            $title = 'Lisää tuotteen nimi tähän';
        }

        return $title;
    }

    add_filter( 'enter_title_here', 'change_default_title' );

	///////////////////////////////////////
	// CPT to search results
	///////////////////////////////////////

    function searchAll( $query ) {
        if ( $query->is_search ) {
            $query->set( 'post_type', array( 'post', 'page', 'feed', 'mainos', 'tuote', 'ohjelma_post_type'));
        }
        return $query;
    }

    // The hook needed to search ALL content
    add_filter( 'the_search_query', 'searchAll' );

	///////////////////////////////////////
	// Include custom post type taxonomies in archive.php
	///////////////////////////////////////

    function add_custom_types_to_tax( $query ) {
    if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {

    // Get all your post types
    $post_types = get_post_types();

    $query->set( 'post_type', $post_types );
    return $query;
    }
    }
    add_filter( 'pre_get_posts', 'add_custom_types_to_tax' );


    ///////////////////////////////////////
	// Custom kommentti template
	///////////////////////////////////////

    function visum_comments($comment, $args, $depth) {

        $GLOBALS['comment'] = $comment;

        if (get_comment_type() == 'pingback' || get_comment_type() == 'trackback') : ?>

        <?php elseif (get_comment_type() == 'comment') : ?>

        <li id="comment-<?php comment_ID(); ?>" <?php comment_class('media') ?>>
            <a class="media-left" href="#">
              <?php 
                $avatar_size = 64;
                if ($comment->comment_parent != 0) {
                    $avatar_size = 50;
                }

                echo get_avatar($comment, $avatar_size);
              ?>
            </a>
            <div class="media-body">
              <h4 class="media-heading"><?php comment_author_link(); ?></h4>
              <p><span><?php comment_date(); ?>, klo <?php comment_time(); ?> - </span><?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?></p>
              <?php if ($comment->comment_approved == '0') : ?>
              <p class="awaiting-moderation">Kommenttisi odottaa hyväksyntää.</p>
              <?php endif; ?>
              <?php comment_text(); ?>
            </div>
        </li>

        <?php endif; 

    }

	///////////////////////////////////////
	// Simplify UI
	///////////////////////////////////////

	//add_action('admin_menu', 'my_remove_menu_pages');
    	if (!current_user_can('delete_others_posts')) {
    		add_action( 'admin_menu', 'my_remove_menu_pages' );
    	}
	function my_remove_menu_pages() {
	remove_menu_page( 'edit.php' ); // Posts
	remove_menu_page( 'admin.php?page=wpcf7' ); // Posts
	//remove_menu_page( 'upload.php' ); // Media
	remove_menu_page( 'link-manager.php' ); // Links
	remove_menu_page( 'edit-comments.php' ); // Comments
    remove_menu_page( 'index.php' ); // Dashboard
	//remove_menu_page( 'edit.php?post_type=page' ); // Pages
	//remove_menu_page( 'plugins.php' ); // Plugins
	//remove_menu_page( 'themes.php' ); // Appearance
	//remove_menu_page( 'users.php' ); // Users
	remove_menu_page( 'tools.php' ); // Tools
	//remove_menu_page( 'profile.php' ); // Tools
	//remove_menu_page('options-general.php'); // Settings
	
	//remove_submenu_page ( 'index.php', 'update-core.php' );    //Dashboard->Updates
	//remove_submenu_page ( 'themes.php', 'themes.php' ); // Appearance-->Themes
	//remove_submenu_page ( 'themes.php', 'widgets.php' ); // Appearance-->Widgets
	//remove_submenu_page ( 'themes.php', 'theme-editor.php' ); // Appearance-->Editor
	//remove_submenu_page ( 'options-general.php', 'options-general.php' ); // Settings->General
	//remove_submenu_page ( 'options-general.php', 'options-writing.php' ); // Settings->writing
	//remove_submenu_page ( 'options-general.php', 'options-reading.php' ); // Settings->Reading
	//remove_submenu_page ( 'options-general.php', 'options-discussion.php' ); // Settings->Discussion
	//remove_submenu_page ( 'options-general.php', 'options-media.php' ); // Settings->Media
	//remove_submenu_page ( 'options-general.php', 'options-privacy.php' ); // Settings->Privacy
	}

	///////////////////////////////////////
	// Customize UI
	///////////////////////////////////////

	// remove some metaboxes
	function remove_post_custom_fields() {
		remove_meta_box('postexcerpt', 'post', 'normal'); // removes excerpt metabox
		remove_meta_box('trackbacksdiv', 'post', 'normal'); // removes trackbacks metabox
		remove_meta_box('commentstatusdiv', 'post', 'normal'); // removes discussion metabox
		remove_meta_box('postcustom', 'post', 'normal'); // removes custom metaboxes (other than defined here)
		remove_meta_box('commentsdiv', 'post', 'normal'); // removes comments metabox
		//remove_meta_box('revisionsdiv', 'post', 'normal'); // removes revision metabox
		//remove_meta_box('authordiv', 'post', 'normal'); // removes author metabox
		remove_meta_box('sqpt-meta-tags', 'post', 'normal'); // removes  metabox
		remove_meta_box('categorydiv', 'post', 'normal'); // removes categories metabox
		remove_meta_box('slugdiv', 'post', 'normal'); // removes slugs metabox
		remove_meta_box('formatdiv', 'post', 'normal'); // removes formats metabox
		remove_meta_box('tagsdiv-post_tag', 'post', 'normal'); // removes tags metabox
		remove_meta_box('pageparentdiv', 'post', 'normal'); // removes attributes metabox
	}
	add_action( 'admin_menu' , 'remove_post_custom_fields' );
	// remove some customization options for admins
	if (current_user_can('delete_others_posts')) {
		add_action( 'admin_menu', 'admin_remove_menu_pages' );
	}
	function admin_remove_menu_pages() {
	//
	//remove_menu_page( 'edit.php' ); // Posts
	//remove_menu_page( 'upload.php' ); // Media
	remove_menu_page( 'link-manager.php' ); // Links
	remove_menu_page( 'edit-comments.php' ); // Comments
	//remove_menu_page( 'edit.php?post_type=page' ); // Pages
	//remove_menu_page( 'plugins.php' ); // Plugins
	//remove_menu_page( 'themes.php' ); // Appearance
	//remove_menu_page( 'users.php' ); // Users
	//remove_menu_page( 'tools.php' ); // Tools
	remove_menu_page( 'index.php' ); // Tools
	//remove_menu_page('options-general.php'); // Settings
	}
	
	///////////////////////////////////////
	// Customize backend footer
	///////////////////////////////////////

	function remove_footer_admin () {
	echo 'Made by <a href="http://www.mainoslahde.fi/">Mainoslähde Oy</a></p>';
	}
	add_filter('admin_footer_text', 'remove_footer_admin');

	// Disable the Admin Bar.
	//add_filter( 'show_admin_bar', '__return_false' );
	
	function remove_admin_bar_links() {
		global $wp_admin_bar;
		$wp_admin_bar->remove_menu('wp-logo');
		//$wp_admin_bar->remove_menu('new-content');
		$wp_admin_bar->remove_menu('comments');
	}
	add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );

	///////////////////////////////////////
	// Remove dashboard widgets
	///////////////////////////////////////

    function remove_dashboard_meta() {
            remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
            remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
            remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
            remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
            remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
            remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
            remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
            remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
            remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8
    }
    add_action( 'admin_init', 'remove_dashboard_meta' );

    remove_action( 'welcome_panel', 'wp_welcome_panel' ); // remove welcome panel

	///////////////////////////////////////
	// Active TGM Plugin (required plugins)
	///////////////////////////////////////

    require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

    add_action( 'tgmpa_register', 'brewhouse_recommend_plugin' );
    function brewhouse_recommend_plugin() {  

        $plugins = array(
            // Include plugin from the WordPress Plugin Repository

            array(
                'name'		=> 'Simple Custom Post Order', // https://wordpress.org/plugins/simple-custom-post-order/
                'slug'		=> 'simple-custom-post-order',
                'required'	=> false
            ),
                 
            array(
                'name'               => 'Visom Admin Theme', // The plugin name.
                'slug'               => 'VisomAdminTheme', // The plugin slug (typically the folder name).
                'source'             => get_stylesheet_directory() . '/plugins/VisomAdminTheme.zip', // The plugin source.
                'required'           => true, // If false, the plugin is only 'recommended' instead of required.
                'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
                'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
                'external_url'       => '', // If set, overrides default API URL and points to an external URL.
            ),            
            array(
                'name'               => 'Visom - Mainokset', // The plugin name.
                'slug'               => 'VisomMainos', // The plugin slug (typically the folder name).
                'source'             => get_stylesheet_directory() . '/plugins/VisomMainos.zip', // The plugin source.
                'required'           => false, // If false, the plugin is only 'recommended' instead of required.
                'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
                'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
                'external_url'       => '', // If set, overrides default API URL and points to an external URL.
            ),          
            array(
                'name'               => 'Visom - Ohjelmat', // The plugin name.
                'slug'               => 'VisomOhjelma', // The plugin slug (typically the folder name).
                'source'             => get_stylesheet_directory() . '/plugins/VisomOhjelma.zip', // The plugin source.
                'required'           => false, // If false, the plugin is only 'recommended' instead of required.
                'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
                'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
                'external_url'       => '', // If set, overrides default API URL and points to an external URL.
            ),            
            array(
                'name'               => 'Visom - Tuote', // The plugin name.
                'slug'               => 'VisomTuote', // The plugin slug (typically the folder name).
                'source'             => get_stylesheet_directory() . '/plugins/VisomTuote.zip', // The plugin source.
                'required'           => false, // If false, the plugin is only 'recommended' instead of required.
                'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher.
                'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
                'external_url'       => '', // If set, overrides default API URL and points to an external URL.
            ),
            
        );

        tgmpa( $plugins);

    }


// add_action( 'all', create_function( '', 'var_dump( current_filter() );' ) );

?>