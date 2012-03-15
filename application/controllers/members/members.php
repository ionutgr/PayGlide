<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Members extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
 
        $this->load->model('Facebook_model');
		$this->load->helper('url');
    }
 
    function index()
    {
          //dashboard
 		  $this->load->library('parser');
		  $this->load->helper('parser');
		  $this->load->helper('auth');
		  
          $data = array(
                  );
 
          $this->load->view('/front/homepage', $data);
   }
	
	
}


/* End of file members.php */
/* Location: ./application/controllers/members.php */