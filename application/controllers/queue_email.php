<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Queue_email extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (! $this->input->is_cli_request())
			show_404();

			$this->load->library('enviador');
	}
	public function index()
	{
		// Huh?
		show_404();
	}
	public function send_queue()
	{
		$this->enviador->send_queue();
	}
	public function retry_queue()
	{
		$this->email->retry_queue();
	}
}
