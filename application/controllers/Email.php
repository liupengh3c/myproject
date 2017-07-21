<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

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
		$this->load->library('table');
		$content = 'PV/UV统计，日期:' . date("Ymd", time()) . "\n\n\n";
		$template = array(
		    'table_open'        => '<table border="1" cellpadding="4" cellspacing="0">',

		    'thead_open'        => '<thead style="color:blue">',
		    'thead_close'       => '</thead>',

		    'heading_row_start' => '<tr>',
		    'heading_row_end'   => '</tr>',
		    'heading_cell_start'    => '<th>',
		    'heading_cell_end'  => '</th>',

		    'tbody_open'        => '<tbody>',
		    'tbody_close'       => '</tbody>',

		    'row_start'     => '<tr>',
		    'row_end'       => '</tr>',
		    'cell_start'        => '<td>',
		    'cell_end'      => '</td>',

		    'row_alt_start'     => '<tr>',
		    'row_alt_end'       => '</tr>',
		    'cell_alt_start'    => '<td>',
		    'cell_alt_end'      => '</td>',

		    'table_close'       => '</table>'
		);

		$this->table->set_template($template);
		$data = array(
		    array('Name', 'Color', 'Size', 'price'),
		    array('Fred', 'Blue', 'Small', 10),
		    array('Mary', 'Red', 'Large', 20),
		    array('John', 'Green', 'Medium', 20)
		);

		$content .= $this->table->generate($data);
		echo $content;
		$this->load->library('email');
		$this->email->from('liupenglily@163.com', '棉花糖');
		$this->email->to('liupenglily@163.com');

		$this->email->subject('PV/UV统计');
		$this->email->message($content);

		
		if ($this->email->send()) {
			echo 'send success';
		}else{
			echo 'send fail';
		}
	}
}
