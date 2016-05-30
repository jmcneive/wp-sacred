<?php
/**
 * Implement a custom header for Twenty Thirteen
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package WordPress
 * @subpackage Avien_Light
 * @since Avien_Light
 */

/**
 * Set up the WordPress core custom header arguments and settings.
 *
 * @uses add_theme_support() to register support for 3.4 and up.
 * @uses avien_light_header_style() to style front-end.
 * @uses avien_light_admin_header_style() to style wp-admin form.
 * @uses avien_light_admin_header_image() to add custom markup to wp-admin form.
 * @uses register_default_headers() to set up the bundled header images.
 *
 * @since Avien_Light
 */
function avien_light_custom_header_setup() {
	$args = array(
		// Text color and image (empty to use none).
		'default-text-color'     => '000000',

		// Set height and width, with a maximum value for the width.
		'height'                 => 250,
		'width'                  => 1000,

		// Callbacks for styling the header and the admin preview.
		'wp-head-callback'       => 'avien_light_header_style',
		'admin-head-callback'    => 'avien_light_admin_header_style',
		'admin-preview-callback' => 'avien_light_admin_header_image',
	);

	add_theme_support( 'custom-header', $args );

}
add_action( 'after_setup_theme', 'avien_light_custom_header_setup', 11 );

/**
 * Load our special font CSS files.
 *
 * @since Avien_Light
 */
function avien_light_custom_header_fonts() {
	// Add Source Sans Pro and Bitter fonts.
	wp_enqueue_style( 'avien-light-fonts', avien-light_fonts_url(), array(), null );

	// Add Genericons font.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.03' );
}
add_action( 'admin_print_styles-appearance_page_custom-header', 'avien_light_custom_header_fonts' );

/**
 * Style the header text displayed on the blog.
 *
 * get_header_textcolor() options: Hide text (returns 'blank'), or any hex value.
 *
 * @since Avien_Light
 */
function avien_light_header_style() {
	$header_image = get_header_image();
	$text_color   = get_header_textcolor();

	// If no custom options for text are set, let's bail.
	if ( empty( $header_image ) && $text_color == get_theme_support( 'custom-header', 'default-text-color' ) )
		return;

	// If we get this far, we have custom styles.
	?>
	<style type="text/css" id="avien-light-header-css">
	<?php
		if ( ! empty( $header_image ) ) :
	?>
		.site-header {
			background: #ffffff url(<?php header_image(); ?>) no-repeat scroll top;
			background-size: 1600px auto;
		}
		@media (max-width: 767px) {
			.site-header {
				background-size: 768px auto;
			}
		}
		@media (max-width: 359px) {
			.site-header {
				background-size: 360px auto;
			}
		}
	<?php
		endif;

		// Has the text been hidden?
		if ( ! display_header_text() ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px 1px 1px 1px); /* IE7 */
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
			if ( empty( $header_image ) ) :
	?>
		.site-header .home-link {
			min-height: 0;
		}
	<?php
			endif;

		// If the user has set a custom color for the text, use that.
		elseif ( $text_color != get_theme_support( 'custom-header', 'default-text-color' ) ) :
	?>
		.site-title,
		.site-description {
			color: #<?php echo esc_attr( $text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}

/**
 * Style the header image displayed on the Appearance > Header admin panel.
 *
 * @since Avien_Light
 */
function avien_light_admin_header_style() {
	$header_image = get_header_image();
?>
	<style type="text/css" id="avien-light-admin-header-css">
	.appearance_page_custom-header #headimg {
		border: none;
		-webkit-box-sizing: border-box;
		-moz-box-sizing:    border-box;
		box-sizing:         border-box;
		<?php
		if ( ! empty( $header_image ) ) {
			echo 'background: url(' . esc_url( $header_image ) . ') no-repeat scroll top; background-size: 1600px auto;';
		} ?>
		padding: 0 20px;
	}
	#headimg .home-link {
		-webkit-box-sizing: border-box;
		-moz-box-sizing:    border-box;
		box-sizing:         border-box;
		margin: 0 auto;
		max-width: 1040px;
		<?php
		if ( ! empty( $header_image ) || display_header_text() ) {
			echo 'min-height: 230px;';
		} ?>
		width: 100%;
	}
	<?php if ( ! display_header_text() ) : ?>
	#headimg h1,
	#headimg h2 {
		position: absolute !important;
		clip: rect(1px 1px 1px 1px); /* IE7 */
		clip: rect(1px, 1px, 1px, 1px);
	}
	<?php endif; ?>
	#headimg h1 {
		font: bold 60px/1 Bitter, Georgia, serif;
		margin: 0;
		padding: 58px 0 10px;
	}
	#headimg h1 a {
		text-decoration: none;
	}
	#headimg h1 a:hover {
		text-decoration: underline;
	}
	#headimg h2 {
		font: 200 italic 24px "Source Sans Pro", Helvetica, sans-serif;
		margin: 0;
		text-shadow: none;
	}
	.default-header img {
		max-width: 230px;
		width: auto;
	}
	</style>
<?php
}

/**
 * Output markup to be displayed on the Appearance > Header admin panel.
 *
 * This callback overrides the default markup displayed there.
 *
 * @since Avien_Light
 */
function avien_light_admin_header_image() {
	$style = 'color: #' . get_header_textcolor() . ';';
	if ( ! display_header_text() ) {
		$style = 'display: none;';
	}
	?>
	<div id="headimg" style="background: url(<?php echo esc_url( get_header_image() ); ?>) no-repeat scroll top; background-size: 1600px auto;">
		<div class="home-link">
			<h1 class="displaying-header-text"><a id="name" style="<?php echo esc_attr( $style ); ?>" onclick="return false;" href="#" tabindex="-1"><?php esc_attr( bloginfo( 'name' ) ); ?></a></h1>
			<h2 id="desc" class="displaying-header-text" style="<?php echo esc_attr( $style ); ?>"><?php esc_attr( bloginfo( 'description' ) ); ?></h2>
		</div>
	</div>
<?php }