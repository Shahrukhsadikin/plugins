<?php
/*
Plugin Name: WhatsApp Chat Button
Plugin URI: 
Description: A simple WhatsApp chat button plugin with customizable number from admin panel
Version: 1.0
Author: Your Name
Author URI: 
License: GPL v2 or later
*/

// Make sure we don't expose any info if called directly
if (!defined('ABSPATH')) {
    exit;
}

// Add menu to WordPress admin panel
function whatsapp_chat_menu() {
    add_menu_page(
        'WhatsApp Chat Settings',
        'WhatsApp Chat',
        'manage_options',
        'whatsapp-chat-settings',
        'whatsapp_chat_settings_page',
        'dashicons-whatsapp'
    );
}
add_action('admin_menu', 'whatsapp_chat_menu');

// Create the settings page
function whatsapp_chat_settings_page() {
    // Save settings
    if (isset($_POST['whatsapp_number'])) {
        update_option('whatsapp_chat_number', sanitize_text_field($_POST['whatsapp_number']));
        echo '<div class="updated"><p>Settings saved!</p></div>';
    }

    $whatsapp_number = get_option('whatsapp_chat_number', '');
    ?>
    <div class="wrap">
        <h2>WhatsApp Chat Settings</h2>
        <form method="post" action="">
            <table class="form-table">
                <tr>
                    <th scope="row">WhatsApp Number</th>
                    <td>
                        <input type="text" name="whatsapp_number" value="<?php echo esc_attr($whatsapp_number); ?>" class="regular-text">
                        <p class="description">Enter your WhatsApp number with country code (e.g., 1234567890)</p>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

// Add WhatsApp button to the frontend
function add_whatsapp_button() {
    $whatsapp_number = get_option('whatsapp_chat_number', '');
    if (!empty($whatsapp_number)) {
        $whatsapp_link = "https://wa.me/" . $whatsapp_number;
        ?>
        <style>
            .whatsapp-chat-button {
                position: fixed;
                bottom: 20px;
                right: 20px;
                background-color: #25d366;
                color: white;
                border-radius: 50%;
                width: 60px;
                height: 60px;
                text-align: center;
                line-height: 60px;
                font-size: 30px;
                box-shadow: 2px 2px 6px rgba(0,0,0,0.4);
                z-index: 9999;
                transition: all 0.3s ease;
            }
            .whatsapp-chat-button:hover {
                transform: scale(1.1);
                background-color: #128C7E;
            }
        </style>
        <a href="<?php echo esc_url($whatsapp_link); ?>" class="whatsapp-chat-button" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="#ffffff">
                <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.419-.1.824zm-3.423-14.416c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm.029 18.88c-1.161 0-2.305-.292-3.318-.844l-3.677.964.984-3.595c-.607-1.052-.927-2.246-.926-3.468.001-3.825 3.113-6.937 6.937-6.937 1.856.001 3.598.723 4.907 2.034 1.31 1.311 2.031 3.054 2.03 4.908-.001 3.825-3.113 6.938-6.937 6.938z"/>
            </svg>
        </a>
        <?php
    }
}
add_action('wp_footer', 'add_whatsapp_button');

// Add settings link on plugin page
function whatsapp_chat_settings_link($links) {
    $settings_link = '<a href="admin.php?page=whatsapp-chat-settings">Settings</a>';
    array_unshift($links, $settings_link);
    return $links;
}
$plugin = plugin_basename(__FILE__);
add_filter("plugin_action_links_$plugin", 'whatsapp_chat_settings_link'); 