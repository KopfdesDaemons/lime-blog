<?php
function clean_space_custom_feed($wp_customize)
{
    // Section
    $wp_customize->add_section('custom_feed', array(
        'title' => __('Feed', 'clean-space'),
        'priority' => 30,
    ));

    // Maximum width of the feed
    $wp_customize->add_setting('maximum_width_of_the_feed', array(
        'default' => '70',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('maximum_width_of_the_feed', array(
        'type' => 'range',
        'section' => 'title_tagline',
        'label' => __('Maximum width of the feed', 'clean-space'),
        'section' => 'custom_feed',
        'input_attrs' => array(
            'min' => 50,
            'max' => 100,
            'step' => 1,
        ),
    ));

    // Sidebar
    $wp_customize->add_setting('feed_sidebar', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'clean_space_sanitize_checkbox',
    ));

    $wp_customize->add_control('feed_sidebar', array(
        'type' => 'checkbox',
        'label' => __('Show sidebar', 'clean-space'),
        'section' => 'custom_feed',
    ));

    // Posts Spacing
    $wp_customize->add_setting('feed_post_card_spacing', array(
        'default' => '3',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('feed_post_card_spacing', array(
        'type' => 'range',
        'section' => 'title_tagline',
        'label' => __('Spacing between posts', 'clean-space'),
        'section' => 'custom_feed',
        'input_attrs' => array(
            'min' => 0,
            'max' => 10,
            'step' => 0.1,
        ),
    ));

    // Number of word in snippet
    $wp_customize->add_setting('words_in_snippet', array(
        'default' => 30,
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('words_in_snippet', array(
        'type' => 'number',
        'label' => __('Number of words in the snippet', 'clean-space'),
        'section' => 'custom_feed',
        'priority' => 10,
        'input_attrs' => array(
            'min' => 1,
            'max' => 100,
            'step' => 1,
        ),
    ));

    // Tags
    $wp_customize->add_setting('feed_post_card_tags', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'clean_space_sanitize_checkbox',
    ));

    $wp_customize->add_control('feed_post_card_tags', array(
        'type' => 'checkbox',
        'label' => __('Show tags', 'clean-space'),
        'section' => 'custom_feed',
    ));

    // Tags border radius
    $wp_customize->add_setting('tags_border_radius', array(
        'default' => '4',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('tags_border_radius', array(
        'type' => 'range',
        'section' => 'title_tagline',
        'label' => __('Tags border radius', 'clean-space'),
        'section' => 'custom_feed',
        'active_callback' => 'tags_active_callback',
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
            'step' => 1,
        ),
    ));

    // Read more link
    $wp_customize->add_setting('feed_post_card_read_more', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'clean_space_sanitize_checkbox',
    ));

    $wp_customize->add_control('feed_post_card_read_more', array(
        'type' => 'checkbox',
        'label' => __('Show read more button', 'clean-space'),
        'section' => 'custom_feed',
    ));

    // Comments link
    $wp_customize->add_setting('feed_post_card_comments', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'clean_space_sanitize_checkbox',
    ));

    $wp_customize->add_control('feed_post_card_comments', array(
        'type' => 'checkbox',
        'label' => __('Show comments', 'clean-space'),
        'section' => 'custom_feed',
    ));

    // Line height
    $wp_customize->add_setting('feed_post_card_line_height', array(
        'default' => '20',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('feed_post_card_line_height', array(
        'type' => 'range',
        'section' => 'title_tagline',
        'label' => __('Line height in text snippet', 'clean-space'),
        'section' => 'custom_feed',
        'input_attrs' => array(
            'min' => 15,
            'max' => 50,
            'step' => 1,
        ),
    ));

    // Border radius
    $wp_customize->add_setting('feed_post_card_border_radius', array(
        'default' => '12',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('feed_post_card_border_radius', array(
        'type' => 'range',
        'label' => __('Border radius', 'clean-space'),
        'section' => 'custom_feed',
        'input_attrs' => array(
            'min' => 0,
            'max' => 50,
            'step' => 1,
        ),
    ));

    // Padding
    $wp_customize->add_setting('feed_post_card_padding', array(
        'default' => '1',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('feed_post_card_padding', array(
        'type' => 'range',
        'label' => __('Padding', 'clean-space'),
        'section' => 'custom_feed',
        'input_attrs' => array(
            'min' => 0,
            'max' => 3,
            'step' => 1,
        ),
    ));

    // Show image
    $wp_customize->add_setting('feed_post_card_image', array(
        'default' => true,
        'transport' => 'refresh',
        'sanitize_callback' => 'clean_space_sanitize_checkbox',
    ));

    $wp_customize->add_control('feed_post_card_image', array(
        'type' => 'checkbox',
        'label' => __('Show image', 'clean-space'),
        'section' => 'custom_feed',
    ));

    // Border radius image
    $wp_customize->add_setting('feed_post_card_border_radius_image', array(
        'default' => '6',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('feed_post_card_border_radius_image', array(
        'type' => 'range',
        'section' => 'title_tagline',
        'label' => __('Image radius', 'clean-space'),
        'section' => 'custom_feed',
        'active_callback' => 'image_active_callback',
        'input_attrs' => array(
            'min' => 0,
            'max' => 150,
            'step' => 1,
        ),
    ));

    function image_active_callback($control)
    {
        return $control->manager->get_setting('feed_post_card_image')->value();
    }

    function tags_active_callback($control)
    {
        return $control->manager->get_setting('feed_post_card_tags')->value();
    }
}
add_action('customize_register', 'clean_space_custom_feed');

// Number of words previewed in the feed
function clean_space_custom_excerpt_length($length)
{
    return get_theme_mod('words_in_snippet', 30);
}
add_filter('excerpt_length', 'clean_space_custom_excerpt_length', 999);

// Characters after snippet
function clean_space_custom_excerpt_more($more)
{
    return '...';
}
add_filter('excerpt_more', 'clean_space_custom_excerpt_more');