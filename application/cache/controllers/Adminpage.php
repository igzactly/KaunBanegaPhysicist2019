<?php
class Adminpage extends CI_Controller{
	public function index()
	{
		$this->load->view('templates/admin/admin_header');
		$this->load->view('templates/admin/adminheader');
		$this->load->view('pages/admin/mainpage');
		$this->load->view('templates/admin/admin_footer');
	}
}
?>