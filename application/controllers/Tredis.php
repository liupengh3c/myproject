<?php
/***************************************************************************
 * 
 * Copyright (c) 2017 Baidu.com, Inc. All Rights Reserved
 * 
 **************************************************************************/
 
 
 
/**
 * @file Redis.php
 * @author liupeng17(com@baidu.com)
 * @date 2017/07/21 11:15:11
 * @brief 
 *  
 **/

defined('BASEPATH') OR exit('No direct script access allowed');

class Tredis extends CI_Controller {

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
		$this->load->driver('cache');
		$this->cache->redis->save('foo', 'bar', 10);
		$this->output->set_output($this->cache->redis->get('foo'));
	}
}




/* vim: set expandtab ts=4 sw=4 sts=4 tw=100: */
?>
