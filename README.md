# 📱 WhatsApp SMS Plugin for WordPress

A lightweight and easy-to-use WordPress plugin that allows your website to send notifications, messages, or alerts directly via **WhatsApp**.

## 🚀 Features

- Send WhatsApp messages on specific WordPress events
- Customizable message templates
- Compatible with WooCommerce (order alerts, payment confirmations, etc.)
- No coding required – easy setup
- Lightweight and optimized for performance

## 🔧 Installation

1. Download the plugin ZIP or clone this repo:
   ```bash
   git clone https://github.com/yourusername/whatsapp-sms-wordpress.git
Upload to your WordPress plugins directory:

wp-content/plugins/

Activate the plugin via the WordPress admin panel

Go to Settings → WhatsApp SMS to configure your options

⚙️ Configuration
Add your WhatsApp API credentials (e.g., Twilio, Chat API, etc.)

Customize message triggers:

New user registration

WooCommerce new order

Contact form submission

Set message templates with dynamic placeholders

📦 Compatibility
WordPress 5.5+

WooCommerce 4.0+

PHP 7.4 or higher

📸 Screenshots
Settings Panel	WooCommerce Notification

🛠️ Developers
Hooks and filters available for extending functionality.

php
Copy
Edit
do_action('whatsapp_sms_send', $phone_number, $message);
❓ FAQ
Q: Does this send messages via WhatsApp Web or API?
A: This plugin integrates with WhatsApp APIs like Chat-API or Twilio WhatsApp.

Q: Is it free to use?
A: The plugin is free. However, external API services may charge usage fees.

🤝 Contributing
Pull requests are welcome! For major changes, please open an issue first to discuss what you'd like to change.

📄 License
This plugin is licensed under the MIT License.

📬 Contact
If you have any questions or suggestions, feel free to contact me via GitHub Issues.


---

### ✅ Customize:
- Replace `yourusername` and repo URLs
- Add actual screenshots (in a `screenshots/` folder)
- Adjust API instructions depending on what service you're using

Let me know if you want help writing the **plugin header**, **changelog**, or preparing it for the WordPress plugin repository.
