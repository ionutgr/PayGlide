<?php 
	class Basicmodel extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    /**
	* 
	* Selects a row from a table
	*@param array $where An array for where
	*@return boolean|array if any rows found returns the rows if none found returns false
	*/
    function get_row($where)
    {
    	$this->db->where($where);
    	$this->db->limit(1);
    	$query=$this->db->get($this->table);
    	
    	if ($query->num_rows()==0)
    		return false;
    	else
    		return $query->row_array();
    }
    
    /**
	* 
	* Selects all rows from a table
	*@param array $where An array for where
	*/
    function get_rows($where)
    {
    	$this->db->where($where);
    	//$this->db->limit(10);
    	$query=$this->db->get($this->table);
    	
    	if ($query->num_rows()==0)
    		return false;
    	else
    		return $query->result_array();
    }
    
    /**
	* 
	* Selects  1 field from a table
	*@param string $field the column to select
	*@param array $where the array for where query
	*/
    function get_field($field, $where)
    {
    	$this->db->select($field);
    	$this->db->where($where);
    	$this->db->limit(1);
    	
    	$query=$this->db->get($this->table);
    	
    	if ($query->num_rows()==0)
    	{
    		return false;
    	}
    	else
    	{
    		$array=$query->row_array();
    		return $array[$field];
    	}
    }
    
    /**
	* 
	* Update one or more rows in the database
	*@param array $data the array of data to update in the database
	*@param array $where the array for where query
	*/
    function update_row($data,$where)
    {
    	$this->db->where($where);
    	$this->db->update($this->table, $data);
    }
    
    /**
	* 
	* Insert a row in a table
	*@param array $data the array of data to insert
	*/
    function insert_row($data)
    {
    	$this->db->insert($this->table, $data);
    }
    
   /**
    * 
    * @param $where the array for where query
    * @param $limit the limit for the query
    */
    function get_rows_with_limit($where, $limit)
    {
    	$this->db->where($where);
    	$this->db->limit($limit['how_many'], $limit['start']);
    	$result=$this->db->get($this->table);
    	if ($result->num_rows()>0)
    	{
    		return $result->result_array();
    	}
    	else
    	{
    		return false;
    	}
    	
    }

    /**
     * 
     * @param $where the array for where
     */
    function get_number_of_rows($where)
    {
    	$this->db->where($where);
    	return $this->db->count_all_results($this->table);
    }
    
    /**
     * 
     * @param $query_condition an array that has order by and limit and where conditions for the query
     */
    function get_rows_full_option(array $query_condition)
    {
    	if ($query_condition['select']!='')
    	{
    		$this->db->select($query_condition['select'], FALSE);
    	}
    	if ($query_condition['order_by']!='')
    	{
    		if ($query_condition['order']!='')
    		{
    			$this->db->order_by($query_condition['order_by'], $query_condition['order']);
    		}
    		else
    		{
    			$this->db->order_by($query_condition['order_by']);
    		}
    	}
    	if ($query_condition['limit']!='')
    	{
    		if ($query_condition['limit_start']!='')
    		{
    			$this->db->limit($query_condition['limit'],$query_condition['limit_start']);
    		}
    		else
    		{
    			$this->db->limit($query_condition['limit']);
    		}
    	}
    	$this->db->where($query_condition['where']);
    	$result=$this->db->get($this->table);
    	
    	if ($result->num_rows()>0)
    	{
    		return $result->result_array();
    	}
    	else
    	{
    		return false;
    	}
    }
}
?>