# Documentation

**NC Contact Social Details** is a WordPress plugin that displays your main contact details and social media links anywhere on your site using shortcodes.

**Problem:** sometimes you need to place your contact information in multiple places on your WordPress site. What happens if you have to change that information? Now, you have to remember, find, and edit every page, block, and widget, you placed that information.

**Solution:** With this plugin, you can update that information from one place and it updates everywhere you used those shortcodes.

This plugin creates a new Customizer panel with fields to add the following details:

* main phone number
* main office/store address
* main email address
* various social media links

After this, you can display them sitewide using shortcodes within posts, widgets, blocks, and your active theme file templates.

## How to add your contact details

While you’re logged, go to “Appearance > Customize” and find the panel “Contact Details”. Or you can find the Customize link in the administration bar and find the “Contact Details” panel.

## The shortcodes

You can start displaying your contact details within your posts, widgets, and blocks.

Display your main phone number as a hyperlink using this code:

    [nc-phone-link]
Display your main phone number in plain text using this code:

    [nc-main-phone]
Display the main email address in plain text using this code:

    [nc-main-email]
Display the main email address as a hyperlink using this code:

    [nc-email-link]
Display your main company address using this code:

    [nc-main-address]
Display all your social media links using this code:

    [nc-social-links]

The above shortcode will display a link to each social media page and its icon.

### Using shortcodes in your theme files

You can also display shortcodes in your theme files using this function:

    <?php echo do_shortcode('[your shortcode here]')?>

## Extending the social links

Sometimes, you want to add more links and icons to the list. You can do this with this hook `nc_contact_social_extend_links`.

### Step 1:

Add the code to display the link and icon. Change the highlighted code to whatever you want and notice the pattern.

    function extend_contacts(){ 
    ?>
    
    <?php if( get_theme_mod('yelp_link') ):?>

    <a href="<?php echo get_theme_mod('yelp_link');?>" target="_blank" 
      style="padding:0.5em" title="Yelp" class="ncsocial_link ncsocial_yelp">
      <?php // your svg image file code here ?>
    </a>

    <?php endif;?>

    <?php
    }
    add_action('nc_contact_social_extend_links', 'extend_contacts');

#### SVG Image Icon
You’ll have to use an SVG file code to make the icon for your link appear. You can get these files from anywhere like www.FontAwesome.com

Afterward, you open the file in an editor and paste it inside your function. To keep your code clean, you can include the SVG file by uploading the SVG file to your theme, adding .php to the file extension. So imagefile.svg would become imagefile.svg.php . Last, place the following where you want the SVG code to appear:

    <?php get_template_part('path/to/file/imagefile.svg');?>

### Step 2:

Now, you have to add the Customizer input fields. Learn more about the Customizer API.

    function nc_customizer_contact_details_extended($wp_customize) {

      // Yelp
      $wp_customize->add_setting('yelp_link', array(
        'default' => 'https://yelp.com',
        'sanitize_callback' => 'nc_sanitize_text'
      ));
      $wp_customize->add_control('yelp_link', array(
        'label' => 'Yelp',
        'section' => 'nc_contact_section',
        'type' => 'url',
        'priority' => 8
      ));

    }

    add_action('customize_register', 'nc_customizer_contact_details_extended');

## Customize the social links

You can customize the social links via CSS custom properties. Just paste this code in your theme or CSS Customizer field and change the values (change `.yourclass` to your own) View the browser inspector to learn more:

    .yourclass .ncsocial {
      --icon-width: 2em;
      --icon-gap: .75rem;
      --icon-radius: 50%;
      --icon-scale: scale(1.25);
      --icon-color: currentColor;
      --icon-color-hover: currentColor;
      --icon-bg-color: none;
      --icon-bg-color-hover: none;
      --icon-border: solid .08em;
      --icon-border-hover: solid .08em;
    }

***

For more information, contact neal@nealchester.com