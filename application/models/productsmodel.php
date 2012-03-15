<?php 

	class Productsmodel extends Basicmodel
	{
		
		function __construct()
		{
			parent::__construct();
			$this->table='products';
			
		}
//-----------------------------------------------------------------------------------------//
		
		function get_products_for_sales()
		{
			$products=$this->get_rows(array('member_id'=>$this->member_details['id']));
			$new_array=array();
			if ($products)
			{
				
				foreach ($products as $product)
				{
					if (strlen($product['title'])>50)
					{
						$product['title_tooltip']=$product['title']." ".$product['price'];
						$product['title']=substr($product['title'],0,50)."...";
					}
					else
					{
						$product['title_tooltip']='';
					}
					$new_array[]=$product;
					
				}
				return $new_array;
			}
			else
			{
				return false;
			}
		}
		
//-----------------------------------------------------------------------------------------//
		function search_products($member_id, $page=1, $per_page=PRODUCTS_PER_PAGE, $active="1", $order_by="title",$order="desc" )
		{
			$db_where= array('member_id' => $member_id);
			switch ($active)
			{
				case "1": $db_where['active']=1; break;
				case "0": $db_where['active']=0; break;
				case "2": break;
			}
			$this->db->where($db_where);
			$this->db->order_by($order_by, $order);
			$this->db->limit( $per_page, ($page-1)*$per_page);
			$query=$this->db->get($this->table);
			return $query->result_array();
			
		}
		
//-----------------------------------------------------------------------------------------//
		function search_products_count($member_id, $active="1", $order_by="title",$order="desc" )
		{
			$db_where= array('member_id' => $member_id);
			switch ($active)
			{
				case "1": $db_where['active']=1; break;
				case "0": $db_where['active']=0; break;
				case "2": break;
			}
			$this->db->where($db_where);
			$this->db->order_by($order_by, $order);
			$query=$this->db->get($this->table);
			return $query->num_rows();
		}
//-----------------------------------------------------------------------------------------//

}

?>