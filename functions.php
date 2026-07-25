<?php
// Include your custom backend logic
require_once get_template_directory() . '/inc/custom-post-types.php';
require_once get_template_directory() . '/inc/ajax-handlers.php';

function arc_network_scripts() {
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap', false );
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', false );
    wp_enqueue_style( 'arc-style', get_stylesheet_uri(), array(), filemtime( get_stylesheet_directory() . '/style.css' ) );

    // This creates a JavaScript object we can use to securely send data to WordPress
    wp_localize_script( 'jquery', 'arc_ajax', array(
        'ajax_url' => admin_url( 'admin-ajax.php' )
    ));
}
add_action( 'wp_enqueue_scripts', 'arc_network_scripts' );


function dg_custom_scrollbar() {
    echo '<style>
        *, *::before, *::after { scrollbar-width: none; }
        ::-webkit-scrollbar { display: none; }

        html {
            scrollbar-width: auto;
            scrollbar-color: #2fe43b transparent;
            overflow-y: scroll;
        }
        html::-webkit-scrollbar {
            display: block;
            width: 10px;
        }
        html::-webkit-scrollbar-track {
            background: transparent;
        }
        html::-webkit-scrollbar-thumb {
            background: #2fe43b;
            border-radius: 999px;
        }
        html::-webkit-scrollbar-thumb:hover {
            background: #4fff5a;
        }
    </style>';
}
add_action('wp_head', 'dg_custom_scrollbar');

// Enable Featured Images for Posts and Pages
function dg_theme_setup() {
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'dg_theme_setup' );



/* ==========================================================================
   SUPPORT FORM AJAX HANDLER
   ========================================================================== */
function dg_handle_support_form() {
    // 1. Security Check
    if ( ! isset( $_POST['sp_nonce'] ) || ! wp_verify_nonce( $_POST['sp_nonce'], 'sp_contact_form' ) ) {
        wp_send_json_error( 'Security check failed. Please refresh the page.' );
    }

    // 2. Sanitize and Clean Input Data
    $name    = sanitize_text_field( $_POST['sp_name'] );
    $email   = sanitize_email( $_POST['sp_email'] );
    $subject = sanitize_text_field( $_POST['sp_subject'] );
    $message = sanitize_textarea_field( $_POST['sp_message'] );

    // 3. Prepare the Email
    $to = 'info@designbyglobal.com'; // Change this to the email address you want to receive tickets at
    
    $email_subject = 'New Support Request: ' . ucfirst($subject);
    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From: ' . $name . ' <' . $email . '>'
    );
    
    $body = "
        <h3>New Support Request</h3>
        <p><strong>Name:</strong> {$name}</p>
        <p><strong>Email:</strong> {$email}</p>
        <p><strong>Topic:</strong> {$subject}</p>
        <hr>
        <p><strong>Message:</strong></p>
        <p>" . nl2br($message) . "</p>
    ";

    // 4. Send Email and Return Success to Frontend
    $sent = wp_mail( $to, $email_subject, $body, $headers );

    if ( $sent ) {
        wp_send_json_success( 'Message sent successfully.' );
    } else {
        wp_send_json_error( 'Server failed to send the message.' );
    }
}

// Hook into WordPress AJAX
add_action( 'wp_ajax_sp_contact_submit', 'dg_handle_support_form' );
add_action( 'wp_ajax_nopriv_sp_contact_submit', 'dg_handle_support_form' );