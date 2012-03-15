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
 * Finalize view - IO
 *
 * Loads main template & replaces {content} with $content and {title} with title 
 * Outputs final html to browser
 *
 * @access	public
 * @param	string
 * @param	string
 * @param	string - optional - defaults to member area main template if not mentioned
 * @return	
 */



if ( ! function_exists('_finalize_view'))
{
	function _finalize_view($content,$title="", $template="members/mainframe")
	{
		
		//init vars
		$members_menu="";
		$menu_data=array(
								"selected_my_account" => "",
									"display_sub_my_account" => "none",
										"selected_home" => "",
										"selected_edit_profile" => "",
										"selected_spotlight_profile" => "",
									"selected_widget_contextual_ads" => "",
								
								"selected_reporting" => "",
									"display_sub_reporting" => "none",
								
								"selected_my_products" => "",
									"display_sub_my_products" => "none",
										"selected_view_edit" => "",
										"selected_cart_bundle" => "",
										
								"selected_contacts" => "",
								"display_sub_contacts" => "none",
								
								"selected_manage_affiliates" => "",
								"display_sub_manage_affiliates" => "none"
								
							);

		// get code igniter instance
		$CI =& get_instance();
		
		//determine if we need to load members menu 
		if ($CI->uri->segment(1)=="members")
		{
			//see what menu and submenu in members area are we talking about
			$selected_main_menu=$CI->uri->segment(2);
			$selected_sub_menu=$CI->uri->segment(3);
			
			$menu_data["selected_".$selected_main_menu]="active";
			$menu_data["display_sub_".$selected_main_menu]="";
			$menu_data["selected_".$selected_sub_menu]="selected";
			
			//load member info
			$CI->load->helper('auth');
			$member=get_logged_info();
			
			$menu_data=array_merge($menu_data, $member["me"]);

			//load members menu
			$members_menu=$CI->parser->parse("members/menu/main_menu", $menu_data, true);
		}
		
		$data = array(
			'main_menu' => $members_menu,
			'content'   => $content, 
			'title' => $title,
			'server_time'=> date('H:i:s'),
			'server_date'=> date('m/d/Y')
		);
		
		//load the JS corresponding to the view
		if (file_exists($CI->input->server('DOCUMENT_ROOT').'/js/'.$CI->uri->segment(1).'/'.$CI->uri->segment(2).'/'.($CI->uri->segment(3) == '' ? 'index' : $CI->uri->segment(3)).'.js'))
		{
			$data['our_js']=$CI->parser->parse('js_template', array('js_path'=>'/js/'.$CI->uri->segment(1).'/'.$CI->uri->segment(2).'/'.($CI->uri->segment(3) == '' ? 'index' : $CI->uri->segment(3)).'.js'), true);
		}
		else
		{
			$data['our_js']='';
		}
		
		//load the CSS corresponding to the view

		if (file_exists($CI->input->server('DOCUMENT_ROOT').'/css/'.$CI->uri->segment(1).'/'.$CI->uri->segment(2).'/'.($CI->uri->segment(3) == '' ? 'index' : $CI->uri->segment(3)).'.css'))
		{
			$data['our_css']=$CI->parser->parse('css_template', array('css_path'=>'/css/'.$CI->uri->segment(1).'/'.$CI->uri->segment(2).'/'.($CI->uri->segment(3) == '' ? 'index' : $CI->uri->segment(3)).'.css'), true);
		}
		else
		{
			$data['our_css']='';
		}
		
		if (isset($CI->member_details))
		{
			$data['name']=$CI->member_details['name'];
			$data['last_login']=date('m/d/Y H:i:s', strtotime($CI->member_details['last_login']));
		}
		else
		{
			$data['name']='';
			$data['last_login']='';
			
		}
	  	//$data=_load_lang($template, $data); 
		
		$CI->parser->parse($template, $data);
 	}
}


// ------------------------------------------------------------------------
/**
 * Language helper - IO
 *
 * Loads the language file and retuns data in it
 *
 * @access	public
 * @param	string
 * @param	array
 * @return	array
 */
if ( ! function_exists('_load_lang'))
{
	function _load_lang($file, $data)
	{
		$CI =& get_instance();
		$CI->lang->load($file, $CI->config->item("default_lang"));
		$data = array_merge((array)$CI->lang->language, (array)$data);
		return $data;

	}
}
/* End of file parser_helper.php */
/* Location: ./system/helpers/parser_helper.php */