<?php
/**
* Plugin Name: NC Contact and Social Details
* Plugin URI: https://www.nealchester.com/downloads/nc-contact-and-social-details/
* Description: Creates Customizer fields to add your phone number and social media links to your site. After which you can display them sitewide using shortcodes within posts, widgets, and your active theme. Use [nc-phone-link] to display your phone number link. Use [nc-main-phone] to display your number in plain text. Use [nc-main-email] to display the main email address. Use [nc-email-link] to display the main email address as a hyperlink. Use [nc-main-address] to display the main company address. Use [nc-social-links] to display all your social media links. You can also display shortcodes in your theme files and extend the social media links Learn more through the documentation.
* Version: 1.5
* Author: Neal Chester
* Author URI: https://www.nealchester.com
* License: GNU General Public License v2 or later
* License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

/* Customizer Fields */

function nc_customizer_contact_details($wp_customize) {
	$wp_customize->add_section('nc_contact_section', array(
		 'title' => 'Contact Details',
		 'panel' => '',
		 'description' => 'Add your contact details below and they\'ll be displayed throughout the site using these short codes: [nc-phone-link] [nc-main-phone] [nc-main-email] [nc-email-link] [nc-social-links] [nc-main-address].',
		 'priority' => 20,
	));
	
	// Main phone
	$wp_customize->add_setting('main_phone', array(
		 'default' => '(212) 555-0000',
		 'sanitize_callback' => 'nc_sanitize_text_c_plugin'
	));
	$wp_customize->add_control('main_phone', array(
		 'label' => 'Main phone number',
		 'section' => 'nc_contact_section',
		 'type' => 'text',
		 'priority' => 1,
	));
	
	// Main phone
	$wp_customize->add_setting('main_phone_format', array(
		 'default' => '+12125550000',
		 'sanitize_callback' => 'nc_sanitize_text_c_plugin'
	));
	$wp_customize->add_control('main_phone_format', array(
		 // 'label' => 'Main phone number formatted',
		 'section' => 'nc_contact_section',
		 'type' => 'text',
		 'priority' => 2
	));

	// Email Address
	$wp_customize->add_setting('main_email', array(
		'default' => 'info@yourwebsite.com',
		'sanitize_callback' => 'nc_sanitize_text_c_plugin'
	));
	$wp_customize->add_control('main_email', array(
		'label' => 'Main email address',
		'section' => 'nc_contact_section',
		'type' => 'email',
		'priority' => 3,
	));

	// Address
	$wp_customize->add_setting('main_address', array(
		'default' => '301 Grand Blv. Suite 15, Detroit MI 28302',
		'sanitize_callback' => 'nc_sanitize_text_c_plugin'
	));

	$wp_customize->add_control('main_address', array(
		'label' => 'Main address',
		'section' => 'nc_contact_section',
		'type' => 'textarea',
		'priority' => 4,
	));


	
	// Social media links
	
	// Facebook
	$wp_customize->add_setting('facebook_link', array(
		 'default' => 'https://facebook.com',
		 'sanitize_callback' => 'nc_sanitize_text_c_plugin'
	));
	$wp_customize->add_control('facebook_link', array(
		 'label' => 'Facebook',
		 'section' => 'nc_contact_section',
		 'type' => 'url',
		 'priority' => 5,
	));	
	
	// Twitter
	$wp_customize->add_setting('twitter_link', array(
		 'default' => 'https://twitter.com',
		 'sanitize_callback' => 'nc_sanitize_text_c_plugin'
	));
	$wp_customize->add_control('twitter_link', array(
		 'label' => 'Twitter',
		 'section' => 'nc_contact_section',
		 'type' => 'url',
		 'priority' => 6,
	));	
	
	// Linkedin
	$wp_customize->add_setting('linkedin_link', array(
		 'default' => 'https://linkedin.com',
		 'sanitize_callback' => 'nc_sanitize_text_c_plugin'
	));
	$wp_customize->add_control('linkedin_link', array(
		 'label' => 'Linkedin',
		 'section' => 'nc_contact_section',
		 'type' => 'url',
		 'priority' => 7,
	));
	
	// Tumblr
	$wp_customize->add_setting('tumblr_link', array(
		 'default' => '',
		 'sanitize_callback' => 'nc_sanitize_text_c_plugin'
	));
	$wp_customize->add_control('tumblr_link', array(
		 'label' => 'Tumblr',
		 'section' => 'nc_contact_section',
		 'type' => 'url'
	));
	
	// Instagram
	$wp_customize->add_setting('instagram_link', array(
		 'default' => '',
		 'sanitize_callback' => 'nc_sanitize_text_c_plugin'
	));
	$wp_customize->add_control('instagram_link', array(
		 'label' => 'Instagram',
		 'section' => 'nc_contact_section',
		 'type' => 'url'
	));
	
	// Pinterest
	$wp_customize->add_setting('pinterest_link', array(
		 'default' => '',
		 'sanitize_callback' => 'nc_sanitize_text_c_plugin'
	));
	$wp_customize->add_control('pinterest_link', array(
		 'label' => 'Pinterest',
		 'section' => 'nc_contact_section',
		 'type' => 'url'
	));
	
	// Youtube
	$wp_customize->add_setting('youtube_link', array(
		 'default' => '',
		 'sanitize_callback' => 'nc_sanitize_text_c_plugin'
	));
	$wp_customize->add_control('youtube_link', array(
		 'label' => 'Youtube',
		 'section' => 'nc_contact_section',
		 'type' => 'url'
	));
	
	// Vimeo
	$wp_customize->add_setting('vimeo_link', array(
		 'default' => '',
		 'sanitize_callback' => 'nc_sanitize_text_c_plugin'
	));
	$wp_customize->add_control('vimeo_link', array(
		 'label' => 'Vimeo',
		 'section' => 'nc_contact_section',
		 'type' => 'url'
	));

	// Google Play
	$wp_customize->add_setting('gplay_link', array(
		'default' => '',
		'sanitize_callback' => 'nc_sanitize_text_c_plugin'
	));
	$wp_customize->add_control('gplay_link', array(
		'label' => 'Google Play',
		'section' => 'nc_contact_section',
		'type' => 'url'
	));	


	// Apple
	$wp_customize->add_setting('apple_link', array(
		'default' => '',
		'sanitize_callback' => 'nc_sanitize_text_c_plugin'
	));
	$wp_customize->add_control('apple_link', array(
		'label' => 'Apple',
		'section' => 'nc_contact_section',
		'type' => 'url'
	));

	// Spotify
	$wp_customize->add_setting('spotify_link', array(
		'default' => '',
		'sanitize_callback' => 'nc_sanitize_text_c_plugin'
	));
	$wp_customize->add_control('spotify_link', array(
		'label' => 'Spotify',
		'section' => 'nc_contact_section',
		'type' => 'url'
	));	

	// RSS
	$wp_customize->add_setting('rss_link', array(
		'default' => '',
		'sanitize_callback' => 'nc_sanitize_text_c_plugin'
	));
	$wp_customize->add_control('rss_link', array(
		'label' => 'RSS Feed URL',
		'section' => 'nc_contact_section',
		'type' => 'url'
	));
											
}
add_action('customize_register', 'nc_customizer_contact_details');


// Create Shortcodes for main phone link, phone number and social links.

	// Use the shortcode: [nc-phone-link]
	function nc_phonelink_shortcode() {
		ob_start();
		echo '<a rel="nofollow" href="tel:'.get_theme_mod('main_phone_format').'">'.get_theme_mod('main_phone').'</a>';
		return ob_get_clean();
	}add_shortcode( 'nc-phone-link', 'nc_phonelink_shortcode' );

	// Use the shortcode: [nc-email-link]
	function nc_emaillink_shortcode() {
		ob_start();
		echo '<a rel="nofollow" href="mailto:'.get_theme_mod('main_email').'">'.get_theme_mod('main_email').'</a>';
		return ob_get_clean();
	}add_shortcode( 'nc-email-link', 'nc_emaillink_shortcode' );	
	
	// Use the shortcode: [nc-main-phone]
	function nc_mainphone_shortcode() {
		ob_start();
		echo get_theme_mod('main_phone');
		return ob_get_clean();
	}add_shortcode( 'nc-main-phone', 'nc_mainphone_shortcode' );

	// Use the shortcode: [nc-main-email]
	function nc_main_email_shortcode() {
		ob_start();
		echo get_theme_mod('main_email');
		return ob_get_clean();
	}add_shortcode( 'nc-main-email', 'nc_main_email_shortcode' );

	// Use the shortcode: [nc-main-address]
	function nc_main_address_shortcode() {
		ob_start();
		echo '<span class="prewrap">'.get_theme_mod('main_address').'</span>';
		return ob_get_clean();
	}add_shortcode( 'nc-main-address', 'nc_main_address_shortcode' );





	// Use the shortcode: [nc-social-links]
	function nc_social_links_shortcode() {?>

	<?php ob_start();?>

	<span class="ncsocial">
	
	<?php if(get_theme_mod('facebook_link')):?>
	<a href="<?php echo get_theme_mod('facebook_link','https://facebook.com');?>" target="_blank" rel="noreferrer" title="Facebook" class="ncsocial_link ncsocial_facebook">
		<?php include('svg-icons/facebook.svg.php');?>
	</a>
	<?php endif;?>
	
	<?php if(get_theme_mod('twitter_link')):?>
	<a href="<?php echo get_theme_mod('twitter_link','https://twitter.com');?>" target="_blank" rel="noreferrer" title="Twitter" class="ncsocial_link ncsocial_twitter">
		<?php include('svg-icons/twitter.svg.php');?>
	</a>
	<?php endif;?>
	
	<?php if(get_theme_mod('linkedin_link')):?>
	<a href="<?php echo get_theme_mod('linkedin_link','https://linkedin.com');?>" target="_blank" rel="noreferrer" title="Linked In" class="ncsocial_link ncsocial_linkedin">
		<?php include('svg-icons/linkedin.svg.php');?>
	</a>	
	<?php endif;?>
	
	<?php if(get_theme_mod('pinterest_link')):?>
	<a href="<?php echo get_theme_mod('pinterest_link');?>" target="_blank" rel="noreferrer" title="Pinterest" class="ncsocial_link ncsocial_pinterest">
		<?php include('svg-icons/pinterest.svg.php');?>
	</a>
	<?php endif;?>
	
	<?php if(get_theme_mod('instagram_link')):?>
	<a href="<?php echo get_theme_mod('instagram_link');?>" target="_blank" rel="noreferrer" title="Instagram" class="ncsocial_link ncsocial_instagram">
		<?php include('svg-icons/instagram.svg.php');?>
	</a>
	<?php endif;?>
	
	<?php if(get_theme_mod('tumblr_link')):?>
	<a href="<?php echo get_theme_mod('tumblr_link');?>" target="_blank" rel="noreferrer" title="Tumblr" class="ncsocial_link ncsocial_tumblr">
		<?php include('svg-icons/tumblr.svg.php');?>
	</a>
	<?php endif;?>
	
	<?php if(get_theme_mod('youtube_link')):?>
	<a href="<?php echo get_theme_mod('youtube_link');?>" target="_blank" rel="noreferrer" title="Youtube" class="ncsocial_link ncsocial_youtube">
		<?php include('svg-icons/youtube.svg.php');?>
	</a>
	<?php endif;?>
	
	<?php if(get_theme_mod('vimeo_link')):?>
	<a href="<?php echo get_theme_mod('vimeo_link');?>" target="_blank" rel="noreferrer" title="Vimeo" class="ncsocial_link ncsocial_vimeo">
		<?php include('svg-icons/vimeo.svg.php');?>
	</a>			
	<?php endif;?>

	<?php if(get_theme_mod('gplay_link')):?>
	<a href="<?php echo get_theme_mod('gplay_link');?>" target="_blank" rel="noreferrer" title="Google Play" class="ncsocial_link ncsocial_gplay">
		<?php include('svg-icons/gplay.svg.php');?>
	</a>			
	<?php endif;?>	

	<?php if(get_theme_mod('apple_link')):?>
	<a href="<?php echo get_theme_mod('apple_link');?>" target="_blank" rel="noreferrer" title="Apple iTunes" class="ncsocial_link ncsocial_apple">
		<?php include('svg-icons/apple.svg.php');?>
	</a>			
	<?php endif;?>

	<?php if(get_theme_mod('spotify_link')):?>
	<a href="<?php echo get_theme_mod('spotify_link');?>" target="_blank" rel="noreferrer" title="Spotify" class="ncsocial_link ncsocial_spotify">
		<?php include('svg-icons/spotify.svg.php');?>
	</a>			
	<?php endif;?>

	<?php if(get_theme_mod('rss_link')):?>
	<a href="<?php echo get_theme_mod('rss_link');?>" target="_blank" rel="noreferrer" title="RSS Feed" class="ncsocial_link ncsocial_rss">
		<?php include('svg-icons/rss.svg.php');?>
	</a>			
	<?php endif;?>

	<?php // Extend Links
	do_action('nc_contact_social_extend_links');?>

	</span>
	<?php return ob_get_clean();?>

	<?php
	}add_shortcode( 'nc-social-links', 'nc_social_links_shortcode' );




// Load CSS in Editor

function nc_load_social_links_css_in_editor() {
	add_editor_style( array( plugin_dir_url( __FILE__ ).'nc-social-links.css') );
}
add_action( 'admin_init', 'nc_load_social_links_css_in_editor' );

// Load CSS for Social Media links

function nc_load_social_links_css(){
	wp_register_style('nc-social-links', plugin_dir_url( __FILE__ ).'nc-social-links.css', array('nc-blocks'), '1', 'screen');
	wp_enqueue_style('nc-social-links');
}
add_action('wp_enqueue_scripts', 'nc_load_social_links_css');

// Function Sanitize

function nc_sanitize_text_c_plugin($input) {
	return esc_html($input);
}


?>