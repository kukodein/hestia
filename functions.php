<?php
if ( !defined( 'ABSPATH' ) ) exit;

if ( !function_exists( 'hestia_child_parent_css' ) ):
    function hestia_child_parent_css() {
        wp_enqueue_style( 'hestia_child_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'bootstrap' ) );
	if( is_rtl() ) {
		wp_enqueue_style( 'hestia_child_parent_rtl', trailingslashit( get_template_directory_uri() ) . 'style-rtl.css', array( 'bootstrap' ) );
	}

    }
endif;
add_action( 'wp_enqueue_scripts', 'hestia_child_parent_css', 10 );

/**
 * Import options from Hestia
 *
 * @since 1.0.0
 */
function hestia_child_get_lite_options() {
	$hestia_mods = get_option( 'theme_mods_hestia' );
	if ( ! empty( $hestia_mods ) ) {
		foreach ( $hestia_mods as $hestia_mod_k => $hestia_mod_v ) {
			set_theme_mod( $hestia_mod_k, $hestia_mod_v );
		}
	}
}
add_action( 'after_switch_theme', 'hestia_child_get_lite_options' );

/**
 * AMz Custom
 *
 */

/*
function ti_custom_javascript() {
	?>
		<style type="text/css">
			@media (max-width: 768px){
				.navbar.navbar-transparent {background: rgba(255, 255, 255, 0.80);}
			}
			.navbar-not-transparent{
				background: rgba(255, 255, 255, 0.80)!important;
				backdrop-filter: blur(9.3px);
			}
			.no-blur{
				background: #ffffff !important;
				backdrop-filter: none;   
			}
		</style>

		<script>
			jQuery(function($) {
				$(".navbar-toggle").on("click", function() {
					$(".navbar").toggleClass("no-blur");
				});
			});
		</script>
	<?php
}
add_action('wp_head', 'ti_custom_javascript');
*/
