<?php

// Backend Script enqueue
function camp_color_picker() {
    wp_enqueue_media();
    wp_enqueue_style( 'wp-color-picker');
    wp_enqueue_script( 'color-picker', SPN_PLUGINURL.'/includes/admin/js/color-picker.js', array( 'wp-color-picker' ), false, true );
    wp_enqueue_style( 'popup-admin-style', SPN_PLUGINURL.'/includes/admin/css/simple-popup-notification-admin.css', array(), '1.0' );
}
add_action( 'admin_enqueue_scripts', 'camp_color_picker' );

function camp_section_plugin_menu() {
    add_menu_page(
        'Simple Popup Notification',
        'Simple Popup Notification',
        'manage_options',
        'popup-section',
        'camp_section_page'
    );
}
add_action('admin_menu', 'camp_section_plugin_menu');

function camp_section_page() {
    ?>
    <div class="wrap">

        <div class="notice simple-popup-notification--notice">
            <div>
                <h3><?php esc_attr_e('Simple Popup Notification', 'simple-popup-notification'); ?></h3>
                <p>Here's a link to the demo and documentation for the plugin. This will help you learn more about its features and how to use it.</p>
                <div class="e-notice__actions">
                    <a href="https://wp-plugins.galaxyweblinks.com/wp-plugins/simple-popup-notification/doc" class="e-button--cta cta-secondary" target="_blank"><span>Documentation</span></a>
                </div>
                <p class="e-note">For any feedback or queries regarding this plugin, please contact our <a href="https://wp-plugins.galaxyweblinks.com/contact/" target="_blank">Support team</a>.</p>
            </div>
        </div>

        <div class="postbox" style="padding:0 20px;">
            <form method="post" action="options.php">
                <?php settings_fields('popup-section-settings'); ?>
                <?php do_settings_sections('popup-section'); ?>
                <?php submit_button(); ?>
            </form>
        </div>
    </div>
    <?php
}

function camp_section_settings() {
    add_settings_section(
        'popup-section-settings',
        'Popup Section Settings',
        'popup_section_settings_description',
        'popup-section'
    );

    // Add popup Enable field
    add_settings_field(
        'popup_enabled',
        'Enable Popup',
        'camp_enabled_callback',
        'popup-section',
        'popup-section-settings'
    );
    
    // Add Background Color field
    add_settings_field(
        'popup_background_color',
        'Background Color',
        'camp_background_field_callback',
        'popup-section',
        'popup-section-settings'
    );

    // Add Background Color field
    add_settings_field(
        'popup_text_color',
        'Text Color',
        'camp_text_field_callback',
        'popup-section',
        'popup-section-settings'
    );

    // Add Heading field
    add_settings_field(
        'popup-heading',
        'Heading',
        'camp_heading_field_callback',
        'popup-section',
        'popup-section-settings'
    );

    // Add Description field
    add_settings_field(
        'popup_description',
        'Description',
        'camp_description_field_callback',
        'popup-section',
        'popup-section-settings'
    );

    // Add CTA Button field
    add_settings_field(
        'popup_cta_button',
        'CTA Button Text',
        'camp_cta_button_callback',
        'popup-section',
        'popup-section-settings'
    );

    // Add CTA Button Link field
    add_settings_field(
        'popup_cta_button_link',
        'CTA Button Link',
        'camp_cta_button_link_callback',
        'popup-section',
        'popup-section-settings'
    );

    // Add CTA Button Background Color field
    add_settings_field(
        'popup_cta_button_bg_color',
        'CTA Button Background Color',
        'camp_cta_button_bg_color_callback',
        'popup-section',
        'popup-section-settings'
    );

    // Add CTA Button Text Color field
    add_settings_field(
        'popup_cta_button_text_color',
        'CTA Button Text Color',
        'camp_cta_button_text_color_callback',
        'popup-section',
        'popup-section-settings'
    );

    // Add Image Upload field
    add_settings_field(
        'popup_image_upload',
        'Upload Image',
        'camp_image_upload_callback',
        'popup-section',
        'popup-section-settings'
    );

    // Add Select Option (Dropdown) field
    add_settings_field(
        'popup_select_option',
        'Select Image Position Option',
        'camp_select_option_callback',
        'popup-section',
        'popup-section-settings'
    );
    // Add other settings fields similarly
}
add_action('admin_init', 'camp_section_settings');

function camp_enabled_callback() {
    $popup_enabled = get_option('popup_enabled', 'off');
    echo '<input type="checkbox" name="popup_enabled" value="on" ' . checked('on', $popup_enabled, false) . '>';
}

function camp_background_field_callback() {
    $background_color = get_option('popup_background_color', '');
    echo "<input type='text' class='color-picker' name='popup_background_color' value='$background_color' />";
}

function camp_text_field_callback() {
    $text_color = get_option('popup_text_color', '');
    echo "<input type='text' class='color-picker' name='popup_text_color' value='$text_color' />";
}

function camp_heading_field_callback() {
    $heading = get_option('popup-heading');
    echo '<input type="text" name="popup-heading" size="46" value="' . esc_attr($heading) . '" />';
}

function camp_description_field_callback() {
    $description = get_option('popup_description', '');
    echo "<textarea name='popup_description' rows='4' cols='50'>$description</textarea>";
}

function camp_cta_button_callback() {
    $cta_button_text = get_option('popup_cta_button', '');
    echo "<input type='text' name='popup_cta_button' size='46' value='$cta_button_text' />";
}

function camp_cta_button_link_callback() {
    $cta_button_link = get_option('popup_cta_button_link', '');
    echo "<input type='text' name='popup_cta_button_link' size='46' value='$cta_button_link' />";
}

function camp_cta_button_bg_color_callback() {
    $cta_bg_color = get_option('popup_cta_button_bg_color', '');
    echo '<input type="text" name="popup_cta_button_bg_color" value="' . esc_attr($cta_bg_color) . '" class="color-picker"/>';
}

function camp_cta_button_text_color_callback() {
    $cta_text_color = get_option('popup_cta_button_text_color', '');
    echo '<input type="text" name="popup_cta_button_text_color" value="' . esc_attr($cta_text_color) . '" class="color-picker" />';
}

function camp_image_upload_callback() {
    $image_url = get_option('popup_image_upload', '');
    ?>
     <input type="text" id="popup_image_url" name="popup_image_upload" value="<?php echo esc_attr($image_url); ?>" /> 
     <input type="file" id="upload_image_button" value="Upload Image" />

    <script>
        jQuery(document).ready(function($){
            jQuery('#upload_image_button').click(function() {
                var popupUploader = wp.media({
                    title: 'Choose Image',
                    button: {
                        text: 'Use this image'
                    },
                    multiple: false
                });

                popupUploader.on('select', function() {
                    var attachment = popupUploader.state().get('selection').first().toJSON();
                    jQuery('#popup_image_url').val(attachment.url);
                });

                popupUploader.open();
            });
        });
    </script>
    <?php
}

function camp_select_option_callback() {
    $selected_option = get_option('popup_select_option', ''); // Get the saved option
    // Define your options for the dropdown
    $options = array(
        'left_image' => 'Left Image',
        'right_image' => 'Right Image',
       
    );
    echo '<select name="popup_select_option" style="width: 100%;">';
    foreach ($options as $value => $label) {
        echo '<option value="' . esc_attr($value) . '" ' . selected($selected_option, $value, false) . '>' . esc_html($label) . '</option>';
    }
    echo '</select>';
}


function camp_section_save_settings() {
    register_setting('popup-section-settings', 'popup_enabled', 'sanitize_text_field');
	register_setting('popup-section-settings', 'popup_background_color');
    register_setting('popup-section-settings', 'popup_text_color');
    register_setting('popup-section-settings', 'popup-heading');
    register_setting('popup-section-settings', 'popup_description');
    register_setting('popup-section-settings', 'popup_cta_button');
    register_setting('popup-section-settings', 'popup_cta_button_link');
    register_setting('popup-section-settings', 'popup_cta_button_bg_color');
    register_setting('popup-section-settings', 'popup_cta_button_text_color');
    register_setting('popup-section-settings', 'popup_image_upload');
  	register_setting('popup-section-settings', 'popup_select_option');
    // Register other settings fields similarly
}
add_action('admin_init', 'camp_section_save_settings');