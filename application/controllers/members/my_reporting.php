<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_Reporting extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('auth');
		$this->load->helper('parser');
		
		if (get_logged_info())	
		{	
			$this->member_details=$this->session->userdata;
		}
		else
		{
			show_error('Session Expired. Please log back in');
		}
	}
	
	function home()
	{
		
		
		$this->load->helper('url');
		
		$content=$this->parser->parse('members/my_reporting/home', array(), true);
		_finalize_view($content);
		$this->output->enable_profiler(TRUE);
	}
	
	function vendor()
	{
		$request=$this->uri->uri_to_assoc(4);
		if ($request['report_type']=='')
			$request['report_type']='link_statistics';
		$report_type="_".$request['report_type'];
		$request['type']='vendor';
		$this->$report_type($request);
	}
	
	function affiliate()
	{
		$request=$this->uri->uri_to_assoc(4);
		if ($request['report_type']=='')
			$request['report_type']='link_statistics';
		$report_type="_".$request['report_type'];
		$request['type']='affiliate';
		$this->$report_type($request);
	}
	
	/**
	 * 
	 * @param array $request the uri array for this report
	 */
	function _link_statistics(array $request)
	{
		if (@$request['page']!='') $page=@$request['page'];
		else $page=1;
		
		if (@$request['type']=='vendor') $where_array['vendor_id']=$this->member_details['id'];
		else $where_array['member_id']=$this->member_details['id'];
		
		if (@$request['date']!='') $where_array['date >']=@$request['date'];
		elseif (@$request['start_date']!='') 
		{
			$where_array['date >']=@$request['start_date'];
			$where_array['date <']=@$request['end_date'];
		}
		else $where_array['date >']=date('Y-m-d', mktime(0,0,0,date('m'), date('d')-30, date('Y')));
		
		$query_condition['order_by']=@$request['order_by'];
		$query_condition['order']=@$request['order'];
		$query_condition['limit_start']=($page-1)*30;
		$query_condition['limit']=30;
		$query_condition['where']=@$where_array;
		$query_condition['select']="DATE_FORMAT(date, '%c/%d/%Y') as date, username, member_id";
		$this->load->model('campaign_cachemodel');
		
		$rows=$this->campaign_cachemodel->get_rows_full_option($query_condition);
		if ($rows)
		{
			foreach ($rows as $row)
			{
				$chuchu=array();
				
				foreach ($row as $key=>$value)
				{
					
					$chuchu[]=array('key'=>$key, 'value'=>$value);
				}
				//print_r($chuchu);die();
				$new_array[]['cucu']=$chuchu;
			}
		}
		//print_r($new_array);
		$string='<table>{lala}<tr>{cucu}<td class={key}>{value}</td>{/cucu}</tr>{/lala}</table>';
		$this->parser->parse_string($string, array('lala'=>$new_array));	
	}
	
	
	
	
}