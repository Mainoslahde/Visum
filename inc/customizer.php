<?php
/**
 * Visum Theme Customizer
 *
 * @package Visum
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function visum_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    $wp_customize->add_setting( 'font-color', array( 'default' => '#444444', 'sanitize_callback' => 'sanitize_hex_color', )); 
    $wp_customize->add_setting( 'shadow-color', array( 'default' => '#000000', 'sanitize_callback' => 'sanitize_hex_color', )); 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'font-color', array( 'label' => 'Fontin väri', 'section' => 'colors', 'settings' => 'font-color' )));
}
add_action( 'customize_register', 'visum_customize_register' );

function mytheme_customize_css()
{
    ?>
<style type="text/css">
 body { 
     color:<?php echo get_theme_mod('font-color', '#000000'); ?>; 
 }
</style>
    <?php
}
add_action( 'wp_head', 'mytheme_customize_css');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function visum_customize_preview_js() {
	wp_enqueue_script( 'visum_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'visum_customize_preview_js' );
