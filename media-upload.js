jQuery(document).ready(function($){
            jQuery('#upload_image_button').click(function() {
                var customUploader = wp.media({
                    title: 'Choose Image',
                    button: {
                        text: 'Use this image'
                    },
                    multiple: false
                });

                customUploader.on('select', function() {
                    var attachment = customUploader.state().get('selection').first().toJSON();
                    jQuery('#custom_image_url').val(attachment.url);
                });

                customUploader.open();
            });
        });