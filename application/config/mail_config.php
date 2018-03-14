<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Mailer Configuration
$config['mail_mailer']          = 'PHPMailer';
$config['mail_debug']           = 0; // default: 0, debugging: 2, 'local'
$config['mail_debug_output']    = 'html';
$config['mail_smtp_auth']       = true;
$config['mail_smtp_secure']     = ''; // default: '' | tls | ssl |
$config['mail_charset']         = 'utf-8';

// Templates Path and optional config
$config['mail_template_folder'] = 'templates/email';
$config['mail_template_options'] = array(
                                       'SITE_NAME' => 'Codeigniter Mail Plugin',
                                       'SITE_LOGO' => 'http://localhost/images/logo.jpg',
                                       'BASE_URL'  => 'http://localhost',
                                    );
// Server Configuration
$config['mail_smtp']            = 'ssl://smtp.gmail.com';
$config['mail_port']            = 25; // for gmail default 587 with tls
$config['mail_user']            = 'lfradusco@ilva.com.ar';
$config['mail_pass']            = 'lucas3533';

// Mailer config Sender/Receiver Addresses
$config['mail_admin_mail']      = 'lfradusco@ilva.com.ar';
$config['mail_admin_name']      = 'WebMaster';

$config['mail_from_mail']       = 'lfradusco@ilva.com.ar';
$config['mail_from_name']       = 'Site Name';

$config['mail_replyto_mail']    = 'slfradusco@ilva.com.ar';
$config['mail_replyto_name']    = 'Reply to Name';

// BCC and CC Email Addresses
$config['mail_bcc']             = 'someone@example.com';
$config['mail_cc']              = 'someone@example.com';

// BCC and CC enable config, default disabled;
$config['mail_setBcc']          = false;
$config['mail_setCc']           = false;


/* End of file mail_config.php */
/* Location: ./application/config/mail_config.php */
