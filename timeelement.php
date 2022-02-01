<?php

/**
 * Plugin Name: Time Element
 * Description: Add new Elementor control for currencies selection.
 * Plugin URI:  https://elementor.com/
 * Version:     1.0.0
 * Author:      Elementor Developer
 * Author URI:  https://developers.elementor.com/
 * Text Domain: timeelement
 *
 * Elementor tested up to: 3.5.0
 * Elementor Pro tested up to: 3.5.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

function register_timer_widget($widgets_manager)
{
    require_once(__DIR__ . '/widgets/timer-widget.php');

    $widgets_manager->register(new \Elementor_Timer_Widget());
}
add_action('elementor/widgets/register', 'register_timer_widget');

function frontend_assets_styles()
{
    wp_register_style('flipclock-css', plugins_url('assets/css/flipclock.css', __FILE__));

    wp_enqueue_style('flipclock-css');
}
add_action('elementor/frontend/after_enqueue_styles', 'frontend_assets_styles()');

function frontend_assets_scripts()
{
    wp_register_script('flipclock-js', plugins_url('assets/js/flipclock.min.js', __FILE__), ['jquery'], '1.0', true);
    wp_register_script('timerelement-helper-js', plugins_url('assets/js/scripts.js', __FILE__), ['jquery', 'flipclock-js'], time(), true);

    wp_enqueue_script('flipclock-js');
    wp_enqueue_script('timerelement-helper-js');
}
add_action('elementor/frontend/after_register_scripts', 'frontend_assets_scripts');
