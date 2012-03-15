<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Front extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
 
        $this->load->model('Facebook_model');
		$this->load->helper('url');
    }
 
    function index()
    {
            $data = array(
                    );
 
            $this->load->view('/front/homepage', $data);
    }
	
	function login()
	{
		$fb_data = array();
        $fb_data = $this->session->userdata('fb_data'); // This array contains all the user FB information
 
        if((!$fb_data['uid']) or (!$fb_data['me']))
        {
			$data = array(
						'fb_data' => $fb_data,
						);
			
			$this->load->view('/front/topsecret', $data);

        }
        else
        {
			$member=$this->session->userdata('fb_data');
			$member["me"]["facebook_id"]=$member["me"]["id"];
			
		   unset($member["me"]["id"]);
		   $this->load->model("membersmodel");
		   $this->load->database();
		   $this->membersmodel->update_or_isert_member($member["me"]);
           redirect("members/my_account/home");
		}
	}
	
}


/* End of file front.php */
/* Location: ./application/controllers/welcome.php */