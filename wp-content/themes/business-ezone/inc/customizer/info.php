<?php
/**
 * Business Ezone Theme Info
 *
 * @package business_ezone
 */

function business_ezone_customizer_theme_info( $wp_customize ) {
	
    $wp_customize->add_section( 'theme_info' , array(
		'title'       => __( 'Theme Information' , 'business-ezone' ),
		'priority'    => 6,
		));

     // Theme info
    $wp_customize->add_setting(
		'setup_instruction',
		array(
			'sanitize_callback' => 'wp_kses_post'
		)
	);

	$wp_customize->add_control(
		new business_ezone_Theme_Info( 
			$wp_customize,
			'setup_instruction',
			array(
				'settings'		=> 'setup_instruction',
				'section'		=> 'theme_info',
				'label'	=> __('Some Important Links','business-ezone'),
			)
		)
	);

	$wp_customize->add_setting('theme_info_theme',array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post',
		));
    
    $theme_info = '';
	$theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'Theme Documentation', 'business-ezone' ) . ': </label><a href="' . esc_url( 'http://prosystheme.com/documentation/business-ezone/' ) . '" target="_blank">' . __( 'here', 'business-ezone' ) . '</a></span><br />';
    $theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'Theme Demo', 'business-ezone' ) . ': </label><a href="' . esc_url( 'http://prosystheme.com/preview/business-ezone/' ) . '" target="_blank">' . __( 'here', 'business-ezone' ) . '</a></span><br />';
    $theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'Support Ticket', 'business-ezone' ) . ': </label><a href="' . esc_url( 'http://prosystheme.com/request-a-support/' ) . '" target="_blank">' . __( 'here', 'business-ezone' ) . '</a></span><br />';
	$theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'Rate this theme', 'business-ezone' ) . ': </label><a href="' . esc_url( 'https://wordpress.org/support/theme/business-ezone/reviews' ) . '" target="_blank">' . __( 'here', 'business-ezone' ) . '</a></span><br />';


	$wp_customize->add_control( 
		new Business_Ezone_Theme_Info( 
			$wp_customize,
			'theme_info_theme',
			array(
				'section' => 'theme_info',
				'description' => $theme_info
			)
		)
	);

	$wp_customize->add_setting('theme_info_more_theme',array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post',
		));

}
add_action( 'customize_register', 'business_ezone_customizer_theme_info' );


if( class_exists( 'WP_Customize_control' ) ){

	class Business_Ezone_Theme_Info extends WP_Customize_Control
	{
    	/**
       	* Render the content on the theme customizer page
       	*/
       	public function render_content()
       	{
       		?>
       		<label>
       			<strong class="customize-text_editor"><?php echo esc_html( $this->label ); ?></strong>
       			<br />
       			<span class="customize-text_editor_desc">
       				<?php echo wp_kses_post( $this->description ); ?>
       			</span>
       		</label>
       		<?php
       	}
    }//editor close
    
}//class close

