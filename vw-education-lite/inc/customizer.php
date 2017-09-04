<?php
/**
 * VW Education Lite Theme Customizer
 *
 * @package VW Education Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_education_lite_customize_register( $wp_customize ) {

	//add home page setting pannel
	$wp_customize->add_panel( 'vw_education_lite_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'vw-education-lite' ),
	    'description' => __( 'Description of what this panel does.', 'vw-education-lite' ),
	) );

	//Layouts
	$wp_customize->add_section( 'vw_education_lite_left_right', array(
    	'title'      => __( 'General Settings', 'vw-education-lite' ),
		'priority'   => 30,
		'panel' => 'vw_education_lite_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_education_lite_theme_options',array(
	        'default' => '',
	        'sanitize_callback' => 'vw_education_lite_sanitize_choices'	        
	    )
    );

	$wp_customize->add_control('vw_education_lite_theme_options',
	    array(
	        'type' => 'radio',
	        'label' => 'Change Layouts',
	        'section' => 'vw_education_lite_left_right',
	        'choices' => array(
	            'Left Sidebar' => __('Left Sidebar','vw-education-lite'),
	            'Right Sidebar' => __('Right Sidebar','vw-education-lite'),
	            'One Column' => __('One Column','vw-education-lite'),
	            'Three Columns' => __('Three Columns','vw-education-lite'),
	            'Four Columns' => __('Four Columns','vw-education-lite'),
	            'Grid Layout' => __('Grid Layout','vw-education-lite')
	        ),
	    )
    );
	    
	$wp_customize->add_section('vw_education_lite_headercont_section',array(
		'title'	=> __('Topbar Contact','vw-education-lite'),
		'description'	=> __('Add topbar contact details here','vw-education-lite'),
		'priority'	=> null,
		'panel' => 'vw_education_lite_panel_id'
	));
	
	$wp_customize->add_setting('vw_education_lite_cont_phone',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_education_lite_cont_phone',array(
		'label'	=> __('Add contact number','vw-education-lite'),
		'section'	=> 'vw_education_lite_headercont_section',
		'setting'	=> 'vw_education_lite_cont_phone',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('vw_education_lite_cont_email',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_education_lite_cont_email',array(
		'label'	=> __('Add email address here','vw-education-lite'),
		'section'	=> 'vw_education_lite_headercont_section',
		'setting'	=> 'vw_education_lite_cont_email',
		'type'		=> 'text'
	));

	//Social Icons(topbar)
	$wp_customize->add_section('vw_education_lite_topbar_header',array(
		'title'	=> __('Social Icon Section','vw-education-lite'),
		'description'	=> __('Add Header Content here','vw-education-lite'),
		'priority'	=> null,
		'panel' => 'vw_education_lite_panel_id',
	));

	$wp_customize->add_setting('vw_education_lite_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('vw_education_lite_youtube_url',array(
		'label'	=> __('Add Youtube link','vw-education-lite'),
		'section'	=> 'vw_education_lite_topbar_header',
		'setting'	=> 'vw_education_lite_youtube_url',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_education_lite_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('vw_education_lite_facebook_url',array(
		'label'	=> __('Add Facebook link','vw-education-lite'),
		'section'	=> 'vw_education_lite_topbar_header',
		'setting'	=> 'vw_education_lite_facebook_url',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('vw_education_lite_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('vw_education_lite_twitter_url',array(
		'label'	=> __('Add Twitter link','vw-education-lite'),
		'section'	=> 'vw_education_lite_topbar_header',
		'setting'	=> 'vw_education_lite_twitter_url',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('vw_education_lite_rss_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('vw_education_lite_rss_url',array(
		'label'	=> __('Add RSS link','vw-education-lite'),
		'section'	=> 'vw_education_lite_topbar_header',
		'setting'	=> 'vw_education_lite_rss_url',
		'type'	=> 'text'
	));


	//home page slider
	$wp_customize->add_section( 'vw_education_lite_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'vw-education-lite' ),
		'priority'   => 30,
		'panel' => 'vw_education_lite_panel_id'
	) );

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'vw_education_lite_slidersettings-page-' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		) );

		$wp_customize->add_control( 'vw_education_lite_slidersettings-page-' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'vw-education-lite' ),
			'section'  => 'vw_education_lite_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//OUR services
	$wp_customize->add_section('vw_education_lite_our_courses',array(
		'title'	=> __('Our Featured Courses','vw-education-lite'),
		'description'=> __('This section will appear below the slider.','vw-education-lite'),
		'panel' => 'vw_education_lite_panel_id'
	));	
	
	$wp_customize->add_setting('vw_education_lite_sec1_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_education_lite_sec1_title',array(
		'label'	=> __('Section Title','vw-education-lite'),
		'section'=> 'vw_education_lite_our_courses',
		'setting'=> 'vw_education_lite_sec1_title',
		'type'=> 'text'
	));	
	
	for ( $count = 0; $count <= 2; $count++ ) {

		$wp_customize->add_setting( 'vw_education_lite_courses_settings-page-' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		));
		$wp_customize->add_control( 'vw_education_lite_courses_settings-page-' . $count, array(
			'label'    => __( 'Select Courses Page', 'vw-education-lite' ),
			'section'  => 'vw_education_lite_our_courses',
			'type'     => 'dropdown-pages'
		));
	}
	
	$wp_customize->add_section('vw_education_lite_footer_section',array(
		'title'	=> __('Footer Text','vw-education-lite'),
		'description'	=> __('Add some text for footer like copyright etc.','vw-education-lite'),
		'priority'	=> null,
		'panel' => 'vw_education_lite_panel_id'
	));
	
	$wp_customize->add_setting('vw_education_lite_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	
	$wp_customize->add_control('vw_education_lite_footer_copy',array(
		'label'	=> __('Copyright Text','vw-education-lite'),
		'section'	=> 'vw_education_lite_footer_section',
		'type'		=> 'text'
	));
    
}
add_action( 'customize_register', 'vw_education_lite_customize_register' );

//Integer
function vw_education_lite_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return absint( $input );
    }
}

function vw_education_lite_css(){
	?>
    	<style>
			a, 
			.tm_client strong,
			#footer ul li:hover a, 
			#footer ul li.current_page_item a,
			.postmeta a:hover,
			.footer-menu ul li a:hover,
			#sidebar ul li a:hover,
			.blog-post h3.entry-title,
			.woocommerce ul.products li.product .price,
			.services-box h2:hover{
				color:<?php echo esc_html(get_theme_mod('color_scheme','#A0CD6C')); ?>;
			}
			a.blog-more:hover,
			.pagination ul li .current, 
			.pagination ul li a:hover,
			#commentform input#submit,
			input.search-submit,
			.nivo-controlNav a.active,
			.top-right .social-icons a:hover,
			.blog-date .date{
				background-color:<?php echo esc_html(get_theme_mod('color_scheme','#29c9fd')); ?>;
			}
		</style>
	<?php }
add_action('wp_head','vw_education_lite_css');



/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class vw_education_lite_customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'vw_education_lite_customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new vw_education_lite_customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'title'    => esc_html__( 'VW Education Pro', 'vw-education-lite' ),
					'pro_text' => esc_html__( 'Go Pro',         'vw-education-lite' ),
					'pro_url'  => 'http://www.vwthemes.net/vw-education-theme/'
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-education-lite-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-education-lite-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
vw_education_lite_customize::get_instance();