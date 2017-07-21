<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Table extends CI_Controller {

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
		$template = array(
		    'table_open'        => '<table border="1" cellpadding="4" cellspacing="2">',

		    'thead_open'        => '<thead style="color:red">',
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

		echo $this->table->generate($data);
	}
}
