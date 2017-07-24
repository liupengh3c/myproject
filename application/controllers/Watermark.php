<?php
/***************************************************************************
 * 
 * Copyright (c) 2017 Baidu.com, Inc. All Rights Reserved
 * 
 **************************************************************************/
 
 
 
/**
 * @file Watermark.php
 * @author liupeng17(com@baidu.com)
 * @date 2017/07/23 22:36:25
 * @brief 
 *  
 **/

defined('BASEPATH') OR exit('No direct script access allowed');

class Watermark extends CI_Controller {

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
		$type = $this->input->get('type');
		$this->load->library('image_lib');
		if ($type == 'text') {
			$config['source_image'] = '/home/users/liupeng17/odp_php7/webroot/CI315/uploads/1.jpg';
			$config['wm_text'] = 'Copyright (c) 2017 Baidu.com, Inc. All Rights Reserved';
			$config['wm_type'] = 'text';
			$config['wm_font_path'] = './system/fonts/texb.ttf';
			$config['wm_font_size'] = 15;
			$config['wm_font_color'] = '993300';
			$config['wm_vrt_alignment'] = 'bottom';
			$config['wm_hor_alignment'] = 'left';
			$config['wm_padding'] = '-20';
		}else{
			$config['source_image'] = '/home/users/liupeng17/odp_php7/webroot/CI315/uploads/1.jpg';
			$config['wm_type'] = 'overlay';
			$config['wm_vrt_alignment'] = 'top';
			$config['wm_hor_alignment'] = 'left';
			$config['wm_padding'] = '20';
			$config['wm_overlay_path'] = '/home/users/liupeng17/odp_php7/webroot/CI315/uploads/1_thumb.jpg';
			$config['wm_opacity'] = 15;
		}
		

		$this->image_lib->initialize($config);

		$this->image_lib->watermark();
		$this->output
		    ->set_content_type('jpg') // You could also use ".jpeg" which will have the full stop removed before looking in config/mimes.php
		    ->set_output(file_get_contents('/home/users/liupeng17/odp_php7/webroot/CI315/uploads/1.jpg'));
	}

	/**
	 * [resize 缩略图]
	 * @Author   liupeng17
	 * @DateTime 2017-07-24
	 * @return   [type]     [description]
	 */
	public function resize(){
		$config['image_library'] = 'gd2';
		$config['source_image'] = '/home/users/liupeng17/odp_php7/webroot/CI315/uploads/1.jpg';
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width']     = 150;
		$config['height']   = 100;

		$this->load->library('image_lib', $config);

		$this->image_lib->resize();
		$this->output
		    ->set_content_type('jpg') // You could also use ".jpeg" which will have the full stop removed before looking in config/mimes.php
		    ->set_output(file_get_contents('/home/users/liupeng17/odp_php7/webroot/CI315/uploads/1_thumb.jpg'));
	}
	/**
	 * [rotate 旋转图片]
	 * @Author   liupeng17
	 * @DateTime 2017-07-24
	 * @return   [type]     [description]
	 */
	public function rotate(){
		$config['image_library'] = 'gd2';
		$config['source_image'] = '/home/users/liupeng17/odp_php7/webroot/CI315/uploads/1_thumb.jpg';
		$config['rotation_angle'] = 'vrt';
		$this->load->library('image_lib', $config);
		$this->image_lib->rotate();
		$this->output->set_content_type('jpg')->set_output(file_get_contents('/home/users/liupeng17/odp_php7/webroot/CI315/uploads/1_thumb.jpg'));
	}
}




/* vim: set expandtab ts=4 sw=4 sts=4 tw=100: */
?>
