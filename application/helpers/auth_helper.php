<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * PayDotCom
 *
 * 
 *
 * @package		PayGlide Base
 * @author		MikeFilsaime.com Romania team
 * @copyright	Copyright (c) 2011, Mikefilsaime.com, Inc.
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Get logged info - IO
 *
 * Checks if user is logged in and grabs it's details if he is
 *
 * @access	public

 * @return	
 */

if ( ! function_exists('get_logged_info'))
{
	function get_logged_info()
	{
		$CI =& get_instance();
		
		$fb_data = array();
        $fb_data = $CI->session->userdata('fb_data'); // This array contains all the user FB information

        if((!$fb_data['uid']) or (!$fb_data['me']))
		{
			//no session set
			return false;
		}
		else
		{
			//$CI->load->model("membersmodel");
			//$member_details=$CI->membersmodel->get_row(array('email'=>$CI->session->userdata('email')));
			
			return $fb_data;	
		}
	}
}

//----------------------------------------------------------------------------------------//
