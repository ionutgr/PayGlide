<?php 

	class Membersmodel extends Basicmodel
	{
		
		function __construct()
		{
			parent::__construct();
			$this->table='members';
			
		}
		
		/**
		* 
		* Insert or update a row in a members table
		*@param array $member the array of data to insert
		*/
		function update_or_isert_member($member)
		{
			if (!$this->get_row( array ("facebook_id"=> $member["facebook_id"] ) ) )
			{
				//insert
				$member["signup_date"]=date ("Y-m-d H:i:s");
				$member["last_login_date"]=date ("Y-m-d H:i:s");
				$this->insert_row($member);
			}
			else
			{
				//update
				$member["last_login_date"]=date("Y-m-d H:i:s");
				$this->update_row($member,array("facebook_id" => $member["facebook_id"]));

			}
		}
		
		
	}

?>