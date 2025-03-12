jQuery(document).ready(function($)
 {
    // Delay showing the popup by a few seconds (e.g., 5 seconds)
    setTimeout(function() {
        // Check if the popup should be shown based on the cookie
        if (!getCookie('popupClosed')) {
           jQuery('#myModal').modal('show');
        }
    }, 5000); // 5000 milliseconds (5 seconds)
    // Add click event for the close button
    jQuery('#closePopupButton').on('click', function() {
        jQuery('#myModal').modal('hide');
        // Set a cookie to remember that the popup has been closed
        setCookie('popupClosed', 'true', 1); // Cookie will expire in 1 day
    });

    // Function to set a cookie
    function setCookie(name, value, days) {
        var expires = '';
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            
            expires = '; expires=' + date.toUTCString();
        }
        document.cookie = name + '=' + value + expires + '; path=/';
    }

    // Function to get a cookie
    function getCookie(name) {
        var nameEQ = name + '=';
        var cookies = document.cookie.split(';');
        for (var i = 0; i < cookies.length; i++) {
            var cookie = cookies[i];
            while (cookie.charAt(0) === ' ') {
                cookie = cookie.substring(1, cookie.length);
            }
            if (cookie.indexOf(nameEQ) === 0) {
                return cookie.substring(nameEQ.length, cookie.length);
            }
        }
        return null;
    }

});