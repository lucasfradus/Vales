<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * CodeIgniter Email Queue
 *
 * Una Libreria de para encolar y enviar mails.
 *
 * @package     CodeIgniter
 * @category    Libraries
 * @author      Lucas Fradusco
 * @link    http://www.meau.com.br/
 * @license http://www.opensource.org/licenses/mit-license.html
 */
class Mailer extends CI_Email
{
  // DB table
    private $table_email_queue = 'email_queue';
    // Main controller
    private $main_controller = 'sys/queue_email/send_pending_emails';
    // PHP Nohup command line
    private $phpcli = 'nohup php';
    private $expiration = NULL;
    // Status (pending, sending, sent, failed)
    private $status;
    /**
     * Constructor
     */
     public function __construct()
     {
         parent::__construct();
         log_message('debug', 'Email Queue Class Initialized');
         $this->expiration = 60*5;
         $this->CI = & get_instance();
         $this->CI->load->database('default');
         $this->CI->load->library('email');
     }

     public function new_mail_queue($data){
         $date = date("Y-m-d H:i:s");
         $to = is_array($data['_recipients']) ? implode(", ", $data['_recipients']) : $data['_recipients'];
         $dbdata = array(
             'to' => $to,
             'message' => $data['_body'],
             'headers' => $data['_headers'],
             'status' => 'pending',
             'date' => $date
         );
         return $this->CI->db->insert($this->table_email_queue, $dbdata);
     }

}
