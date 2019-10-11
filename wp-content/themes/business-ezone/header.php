<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Business_Ezone
 */

	/**
	 * Doctype Hook
	 * 
	 * @hooked  business_ezone_doctype_cb
	 */
	do_action('business_ezone_doctype');

?>

<head>
<?php 
    
    /**
     * Before wp_head
     * 
     * @hooked business_ezone_head
    */
    do_action( 'business_ezone_before_wp_head' );
    
    wp_head(); 

?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
<?php
	/**
	 * Business_Ezone_Page Header
	 * 
	 * @see business_ezone_header_start  - 10 
	 * @see business_ezone_header_top 	 - 20 
	 * @see business_ezone_header_bottom - 30 
	 * @see business_ezone_header_menu 	 - 40 
	 * @see business_ezone_header_end 	 - 50 
	*/
	do_action( 'business_ezone_header');

/**
 * business_ezone Content
 * 
 * @see business_ezone_content_start
*/
do_action( 'business_ezone_before_content' );
