<?php
function enqueue_custom_styles()
{
    $theme_directory = get_stylesheet_directory_uri();

    $styles = array(
        'post-card' => '/template-parts/post-card.css',
        'widgets-styles' => '/widgets.css',
        // 'custom-font' => '/fonts/fonts.css',
        'custom-styles' => '/style.css',
        // 'searchform-styles' => '/searchform.css',
        'header-styles' => '/header.css',
        // 'footer-styles' => '/footer.css',
        'sidebar-styles' => '/sidebar.css',
        // 'comments-styles' => '/comments.css',
        // 'archive-styles' => '/archive.css',
        'single-styles' => '/single.css',
        // '404-styles' => '/404.css',
        // 'fontawesome' => '/fonts/fontawesome/css/all.min.css',
    );

    foreach ($styles as $handle => $file) {
        wp_enqueue_style($handle, $theme_directory . $file, array(), '1', 'all');
    }
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');


// Theme Support
add_theme_support('post-thumbnails');
add_theme_support("title-tag");
add_theme_support('automatic-feed-links');
add_theme_support('html5', array(
    'comment-list',
    'comment-form',
    'search-form',
    'gallery',
    'caption',
));
add_theme_support('align-wide');
add_theme_support('responsive-embeds');

// Load the wordpress comment script from the “\wordpress\wp-includes\js” directory.
// This allows the comment response form to be located below the corresponding comment
// and not at the very bottom of the page.
function clean_space_enqueue_comments_reply()
{
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'clean_space_enqueue_comments_reply');


// For the translation
function clean_space_load_theme_textdomain()
{
    load_theme_textdomain('clean-space', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'clean_space_load_theme_textdomain');


// defaults to the feed as the homepage
function clean_space_set_default_front_page()
{
    update_option('show_on_front', 'posts');
}
add_action('after_setup_theme', 'clean_space_set_default_front_page');


function clean_space_register_menus()
{
    register_nav_menus(
        array(
            'header-menu' => __('Header Menu', 'clean-space'),
            'footer-menu' => __('Footer Menu', 'clean-space')
        )
    );
}
add_action('init', 'clean_space_register_menus');

function clean_space_register_sidebar()
{
    register_sidebar(array(
        'name' => __('Sidebar', 'clean-space'),
        'id' => 'my-sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'clean_space_register_sidebar');

function clean_space_register_landigpage_widget_area()
{
    register_sidebar(array(
        'name' => __('Landingpage Widget Area', 'landingpage-widget-area'),
        'id' => 'landingpage-widget-area',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'clean_space_register_landigpage_widget_area');

// Number of words previewed in the feed
function clean_space_custom_excerpt_length($length)
{
    return get_theme_mod('words_in_snippet', 30);
}
add_filter('excerpt_length', 'clean_space_custom_excerpt_length', 999);

// Characters after snippet
function clean_space_custom_excerpt_more($more)
{
    return ' ...';
}
add_filter('excerpt_more', 'clean_space_custom_excerpt_more');
