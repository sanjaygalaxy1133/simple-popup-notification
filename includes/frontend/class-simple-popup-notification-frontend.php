<?php

// Frontend Script enqueue
function camp_enqueue_popup_scripts() {

    wp_enqueue_script( 'popup-script', SPN_PLUGINURL. '/includes/frontend/js/bootstrap.min.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_style( 'popup-frontend-style', SPN_PLUGINURL.'/includes/frontend/css/popup-frontend.css', array(), '1.0' );

    wp_enqueue_script( 'popup-bootstrap-modal-script', SPN_PLUGINURL . '/includes/frontend/js/modal-script.js?time='.time(), array('jquery', 'jquery-cookie'), true );
    wp_enqueue_script('jquery-cookie', SPN_PLUGINURL.'/includes/frontend/js/jquery.cookie.js', array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'camp_enqueue_popup_scripts' );


function camp_popup_model() {
    $background_color = get_option('popup_background_color', '');
    $text_color = get_option('popup_text_color', '');
    $heading = get_option('popup-heading');
    $description = get_option('popup_description', '');
    $cta_button_text = get_option('popup_cta_button', '');
    $cta_button_link = get_option('popup_cta_button_link', '');
    $cta_bg_color = get_option('popup_cta_button_bg_color', '');
    $cta_text_color = get_option('popup_cta_button_text_color', '');
    $image_url = get_option('popup_image_upload', '');
    $selected_option = get_option('popup_select_option', '');
    $popup_enabled = get_option('popup_enabled', 'off');

    if ($popup_enabled === 'on') :
    
    if(!empty($background_color) || !empty($text_color) || !empty($heading) || !empty($description) || !empty($cta_button_text) || !empty($cta_button_link) || !empty($image_url)):
    // Things that you want to do.
   
    $imgclass= '';
    if(empty($image_url)){
        $imgclass= "no-image";
    }

    echo '<div class="modal fade camp-popup-model" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background-color: '.esc_attr( $background_color ).'">
                <div class="modal-header">
                    <button id="closePopupButton" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body '.$selected_option.' '.$imgclass.'">';
                if(!empty($heading)):
                   echo '<div class="model-body-left"><h5 class="modal-title" id="exampleModalLabel" style="color: '.esc_attr( $text_color ).'">' . $heading . '</h5>';
                endif;
                if(!empty($description)):
                     echo '<p style="color: '.esc_attr( $text_color ).'"> '.$description.'</p>';
                 endif;
                 if(!empty($cta_button_text) && !empty($cta_button_link)):
                    echo '<a href="'.$cta_button_link.'" class="btn btn-secondary" style="background-color: ' . esc_attr($cta_bg_color) . '; color: ' . esc_attr($cta_text_color) . ';">'.$cta_button_text.'</a>';
                endif;
                echo '</div>';
                if(!empty($image_url)):
                echo '<div class="model-body-right">
                    <img src="'.$image_url.'" class="popup-img">
                </div>';
                endif;
                echo '</div>
        </div>
    </div>
</div>'; 
endif;
endif;
}
add_action( 'wp_footer', 'camp_popup_model' );