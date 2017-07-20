<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->library('email');
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'smtp.163.com';
		$config['smtp_user'] = 'liupenglily@163.com';
		$config['smtp_pass'] = 'liupeng08144';
		$config['smtp_port'] = '25';
	//	$config['smtp_crypto'] = 'tls';
		// $config['wordwrap'] = TRUE;

		$this->email->initialize($config);
		$this->email->from('liupenglily@163.com', '刘朋');
		$this->email->to('liupeng17@baidu.com');
	//	$this->email->cc('liupenglily@163.com');
	//	$this->email->bcc('them@their-example.com');

		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');

		
		if ($this->email->send()) {
			echo 'success';
		}else{
			echo 'send fail';
		}
		$this->email->print_debugger();
	//	$this->load->view('welcome_message');
	}
}
