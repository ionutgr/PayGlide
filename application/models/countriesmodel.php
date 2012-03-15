<?php 

	class Countriesmodel extends Basicmodel
	{
		
		function __construct()
		{
			parent::__construct();
			$this->table='countries';
			
		}
		
		/**
		* 
		* Loads all countries from countries table
		*@param none
		*/
		function get_all_countries()
		{
			$query="select country_name, 
						   country_code_char3 
						   
						   from countries 
						   
						   order by country_name asc";
						   
			$result=$this->db->query($query);
			return $result->result_array();
			
		}
		
		/**
		* 
		* Loads all states for a specific country
		*@param string $country_3_letter_code - the country that you need states for
		*/
		function get_all_states_for_a_country($country_3_letter_code)
		{
			$query="select state_subdivision_id,
						   state_subdivision_name, 
						   country_code_char3 
						   
						   from states_subdivisions 
						   
						   where 
						   
						   country_code_char3='$country_3_letter_code' 
						   
						   order by state_subdivision_name asc";
						   
			$result=$this->db->query($query);

			if ($result->num_rows!=0)
				return $result->result_array();
			else return false;
			
		}

	}

?>