<?php
/***************************************************************************
 * 
 * Copyright (c) 2017 Baidu.com, Inc. All Rights Reserved
 * 
 **************************************************************************/
 
 
 
/**
 * @file Encyt.php
 * @author liupeng17(com@baidu.com)
 * @date 2017/07/21 14:42:09
 * @brief 
 *  
 **/

defined('BASEPATH') OR exit('No direct script access allowed');

class Encyt extends CI_Controller {

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
		$this->load->library('encryption');
		$this->encryption->initialize(array('driver' => 'openssl'));
		$encryption = $this->encryption->encrypt('abc123');
		$decypt = $this->encryption->decrypt($encryption);
		$data = array(
			'original_data' => 'abc123',
			'encypt_data' => $encryption,
			'dectyt_data' => $decypt,
		);

		$this->output->set_output(json_encode($data));
	}
}




/* vim: set expandtab ts=4 sw=4 sts=4 tw=100: */
?>
