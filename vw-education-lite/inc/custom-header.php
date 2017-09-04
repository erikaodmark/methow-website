<?php
/**
 * @package VW Education Lite
 * @subpackage vw-education-lite
 * @since vw-education-lite 1.0
 * Setup the WordPress core custom header feature.
 *
 * @uses vw_education_lite_header_style()
*/

function vw_education_lite_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'vw_education_lite_custom_header_args', array(

		//'default-image'          => get_template_directory_uri().'/images/banner_bg.jpg',

		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'wp-head-callback'       => 'vw_education_lite_header_style',
		'admin-head-callback'    => 'vw_education_lite_admin_header_style',
		'admin-preview-callback' => 'vw_education_lite_admin_header_image',

	) ) );

}

add_action( 'after_setup_theme', 'vw_education_lite_custom_header_setup' );

if ( ! function_exists( 'vw_education_lite_header_style' ) ) :

/**
 * Styles the header image and text displayed on the blog
 *
 * @see vw_education_lite_custom_header_setup().
 */

function vw_education_lite_header_style() {
	$header_text_color = get_header_textcolor();
	?>
	<style type="text/css">
	<?php
		//Check if user has defined any header image.
		if ( get_header_image() ) :
	?>
		.header{
			background: url(<?php echo esc_url(get_header_image()); ?>) no-repeat;
			background-position: center top;
		}
	<?php endif; ?>	
	</style>
	<?php
}

endif; // vw_education_lite_header_style

if ( ! function_exists( 'vw_education_lite_admin_header_style' ) ) :

/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see vw_education_lite_custom_header_setup().
 */

function vw_education_lite_admin_header_style() {?>
	<style type="text/css">
		.appearance_page_custom-header #headimg { border: none; }
	</style><?php
}
endif; // vw_education_lite_admin_header_style

add_action( 'admin_head', 'vw_education_lite_admin_header_css' );
function vw_education_lite_admin_header_css(){ ?>
	<style>pre{white-space: pre-wrap;}</style><?php
}
if ( ! function_exists( 'vw_education_lite_admin_header_image' ) ) :

/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see vw_education_lite_custom_header_setup().
 */

function vw_education_lite_admin_header_image() {
	$style = sprintf( ' style="color:#%s;"', get_header_textcolor() );
?>
	<div id="headimg">
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
	</div>
<?php
}
endif; // vw_education_lite_admin_header_image 