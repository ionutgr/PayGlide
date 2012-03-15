<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


//------------------------------------------------------------------------//
// PayGlide member's area profile controller 
//------------------------------------------------------------------------//

class My_account extends CI_Controller 
{
//------------------------------------------------------------------------//
    public function __construct()
    {
          parent::__construct();
           
	      // constructor code
		  $this->load->library('parser');
		  $this->load->helper('parser');
		  $this->load->helper('auth');
		  $this->load->helper('url');
		  $this->load->model('basicmodel');
		  $this->load->model('membersmodel');
		  
		  if (!get_logged_info())
		  {
			  show_error('Session Expired. Please log back in');
		  }
    }		
//------------------------------------------------------------------------//
	public function index()
	{
		redirect("/members/my_account/home");
	}
//------------------------------------------------------------------------//
	public function home()
	{
		$this->load->model("countriesmodel");
		
		$fdata = $this->session->userdata('fb_data');
		$data=array("countries" => $this->countriesmodel->get_all_countries() );
		$data=array_merge($fdata["me"], $data);
		$content=$this->parser->parse('members/my_account/home',$data,true);
		_finalize_view($content, "PayGlide - Dashboard");

	}
//------------------------------------------------------------------------//
	public function change_pass()
	{
		$data=array();
		$data=_load_lang("members/my_account/change_pass", $data);

		$this->parser->parse('members/my_account/change_pass',$data);	

	}
//------------------------------------------------------------------------//
	public function what_is_this()
	{
		$data=array();
		$data=_load_lang("members/my_account/edit_profile", $data);

		$this->parser->parse('members/my_account/what_is_this',$data);	

	}
//------------------------------------------------------------------------//

	public function edit_profile()
	{
		$data = array ();
		$data=_load_lang("members/my_account/edit_profile", $data);
		$content=$this->parser->parse('members/my_account/edit_profile',$data,true);
		_finalize_view($content, "");

	}
//------------------------------------------------------------------------//

	public function logout()
	{
		$this->session->sess_destroy();
		redirect("/");
	}
//------------------------------------------------------------------------//
	public function ajax_do_get_state($country_code_char3)
	{
		$this->load->model("countriesmodel");
		$data_state= $this->countriesmodel->get_all_states_for_a_country($country_code_char3);
		
		if (empty($data_state))
		{
			$data_state=array("0" =>  
							array (
							   "state_subdivision_id"   => "0", 
							   "state_subdivision_name" => "No states availble"
							   ));
		}
		
	    $data=array("state" => $data_state);
		echo $this->parser->parse('members/my_account/select_state',$data,true);
	}
//------------------------------------------------------------------------//
	public function ajax_do_save_profile()
	{
		
		$send_emails=0;
		if ($this->input->post("send_emails")==1)
		{
				$send_emails=1;
		}
		$data = array (
			"paypal_email" => $this->input->post("paypal_email"),
			"business_name" => $this->input->post("business_name"),
			"address" => $this->input->post("address"),
			"city" => $this->input->post("city"),
			"country_id" => $this->input->post("country"),
			"state_subdivision_id" => $this->input->post("state"),
			"zip" => $this->input->post("zip"),
			"phone" => $this->input->post("phone"),
			"ssn" => $this->input->post("ssn"),			
			
		);
		
		$fb_data = $this->session->userdata('fb_data'); 
		 
		$this->membersmodel->update_row( $data , "facebook_id = '".$fb_data["uid"]."'");
		
		
	}
//------------------------------------------------------------------------//
}

/* End of file my_account.php */
/* Location: ./application/controllers/members/my_account.php */