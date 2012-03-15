<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_Test extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('membersmodel');
	}
	
	
	function simulate_login()
	{
		$this->session->set_userdata($this->membersmodel->get_row(array('mdid'=>'3198d9a4c4997c68e661b5538109837a')));
	}
}