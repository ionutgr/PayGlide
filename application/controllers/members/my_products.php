<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


//------------------------------------------------------------------------//
// Paydotcom.com 2.0 member's area products controller 
//------------------------------------------------------------------------//

class My_products extends CI_Controller 
{
//------------------------------------------------------------------------//
    public function __construct()
    {
          parent::__construct();
           
	      // constructor code
		  $this->load->library('parser');
		  $this->load->helper('parser');
		  $this->load->helper('auth');
		  $this->load->model('productsmodel');
		  
		  if (!get_logged_info())
		  {
			  show_error('Session Expired. Please log back in');
		  }
		  //$this->output->enable_profiler(TRUE);
		  

    }		
//------------------------------------------------------------------------//
	public function new_product()
	{
		$data=array();
		$data=_load_lang("members/my_products/new_product", $data);

		$this->parser->parse('members/my_products/new_product',$data);	

	}
//------------------------------------------------------------------------//
	public function view_edit($page=1, $active=1, $order_by="title", $order="desc")
	{
		
		// init vars
		$currency_sign='$';
		$k=0; // array counter
					 
					 
		$ret=$this->productsmodel->search_products( $this->session->userdata("id"), $page, PRODUCTS_PER_PAGE, $active, $order_by,$order);	

		
		while (!empty($ret[$k]))
		{
			$ret[$k]["price"]=$currency_sign.$ret[$k]["price"];
			
			if ($ret[$k]["paypal"]==1)
				$ret[$k]["accepting"] = "PayPal";
			
			if ($ret[$k]["active"]==1)
				$ret[$k]["status"] = "Active";
			else
				$ret[$k]["status"] = "Inactive";

			if ($ret[$k]["active"]==1)
			{
				$ret[$k]["status_class"] = "product_status_active";
				$ret[$k]["activate"] = "De-Activate";
				$ret[$k]["activate_class"] = "deactivate";
			}
			else
			{
				$ret[$k]["status_class"] = "product_status_inactive";
				$ret[$k]["activate"] = "Activate";
				$ret[$k]["activate_class"] = "activate";
			}
				
			if ($k % 2 == 0)
				$ret[$k]["row_class"] = "first";
			else
				$ret[$k]["row_class"] = "second";
			
			$k++;
		}		
		
		$current_page_0=$page;
		$current_page_1=$page;
		$current_page_2=$page;
		
		switch ($active)
		{
			case 1: 
				$current_page_0=1;
				$current_page_2=1;
				$selected_active="active";
				$selected_inactive="";
				$selected_all="";
				break;
			
			case 0: 
				$current_page_1=1;
				$current_page_2=1;
				$selected_active="";
				$selected_inactive="active";
				$selected_all="";
				break;
			
			case 2: 
				$current_page_1=1;
				$current_page_0=1;
				$selected_active="";
				$selected_inactive="";
				$selected_all="active";
				break;
		}
		
		$total_products=$this->productsmodel->search_products_count( $this->session->userdata("id"), $active, $order_by,$order);
		if ($total_products % PRODUCTS_PER_PAGE == 0 ) $total_pages= $total_products / PRODUCTS_PER_PAGE;
			else $total_pages= ((int)($total_products / PRODUCTS_PER_PAGE))+1;
			
		
		for ($i=1; $i<=$total_pages; $i++)
		{
			if ($i==$page)
				$pages[$i]["class"]=" a_active active";
			else
				$pages[$i]["class"]="";
		

			$pages[$i]["npage"]=$i;
		}
		
		if ($page-1 > 0 ) $npage_prev=$page-1;
			else $npage_prev=$page;
		if ($page+1 <= $total_pages ) $npage_next=$page+1;
			else $npage_next=$page;
		
		$order_name="desc";
		$name_class="";
		
		$order_price="desc";
		$price_class="";
		
		if ($order_by=="title")
		{
			if ($order="desc") 
				{
					$order_name="asc";
					$name_class="asc";
				}
				else
				{
					$order_name="desc";
					$name_class="desc";

				}
		}
		
		if ($order_by=="price")
		{
			if ($order="desc") 
				{
					$order_price="asc";
					$price_class="asc";
				}
				else
				{
					$order_price="desc";
					$price_class="desc";

				}
		}
		
		$data = array ( "products" => $ret,
						"total_pages" => $total_pages,
						"current_page" => $page,
						"current_page_0" => $current_page_0,
						"current_page_1" => $current_page_1,
						"current_page_2" => $current_page_2,
						"npage_next" => $npage_next,
						"npage_prev" => $npage_prev,
						"active" => $active,
						"order_by" => $order_by,
						"order" => $order,
						"selected_active" => $selected_active,
						"selected_inactive" => $selected_inactive,
						"selected_all" => $selected_all,
						"pages" => $pages,
						"order_price" => $order_price,
						"price_class" => $price_class,
						"order_name" => $order_name,
						"name_class" => $name_class
		);
		$data=_load_lang("members/my_account/edit_profile", $data);
		$content=$this->parser->parse('members/my_products/view_edit',$data,true);	

		_finalize_view($content,"");
	}
//------------------------------------------------------------------------//
}

/* End of file my_products.php */
/* Location: ./application/controllers/members/my_products.php */