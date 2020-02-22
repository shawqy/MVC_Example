<?php


class userModel
{
	/*  Domain & Server INFO */
	protected $host1 = '127.0.0.1';
	protected $db   = 'testing';
	protected $user = 'root';
	protected $pass = '';

	/*To establish connection*/
	protected $pdo;

	/**
		*@author Shawqy

		*Constructor Funtion
		*return void 

		this function used as constructor 
		parameters : None
					
		return : None 
	*/


	/*constractor To check connection*/
	public function __construct()
	{
		
		try
		{
			/*Create Connection*/
			$this->pdo = new PDO("mysql:host=$this->host1;dbname=$this->db;",$this->user,$this->pass);		
		}

		catch(PDOException $e)
		{
			/*Show error Message if exists*/
	        echo 'Database connection error ' . $e->getMessage();
	         
	    }
			   
	}

	
	/**
		*@author Shawqy

		*insert_data Funtion
		*return void 

		this function used to insert information into a table in database
		parameters : table name ==>$tb_name
					 associative array with data values to be inserted ==>$data_in
					
		return : None 
	*/


	public function insert_data($tb_name,$data_in)
	{
		$data = $data_in;

		/*
			this temp. variables used just to make it readable and easy to error free inside the SQL query
		*/
		$val1=$data['Name'];
		$val2=$data['Email'];
		$val3=$data['Phone'];
		
		/*sytm is shortcut for statement */
		$symt2 = $this->pdo->prepare("INSERT INTO $tb_name(Name,Email,Phone) VALUES('$val1','$val2','$val3')");
		$symt2 -> execute();
	} //end of insert fun


	/**
		*@author Shawqy

		*getData Funtion
		*return array 

		this function used to get all information from a table in database
		parameters : table name ==>$tb_name
					
		return : array of string arrays 
	*/



	public function getData($tb_name)
	{
		/*array to store the results*/
		$data=[];

		$stmt1 = $this->pdo->prepare("SELECT * FROM $tb_name");
		$stmt1-> execute();

		/*
			fetch do fetching row by row so we make it in a loop

		*/

		while($results=$stmt1->fetch(PDO::FETCH_ASSOC))
 			{
 				$data[]=$results;

 			}
		
		return $data;						 
	}//end of getdata fun



	/**
		*@author Shawqy

		*update_data Funtion
		*return void 

		this function used to update a specific information in a table in database
		parameters : table name ==>$tb_name
					 reference to the column to be updated ==>$col
					 reference to the rows to be updated ==>$val
					 colum to be updated ==> $updated_col
					 values to be updated ==> $new_val

					
		return : None
	*/

	public function update_data($tb_name,$col,$val,$updated_col,$new_val)
	{
		$symt3 = $this->pdo->prepare("UPDATE $tb_name SET $updated_col='$new_val' WHERE $col='$val'");
	    $symt3 -> execute();
	}//end of update data fun



	/**
		*@author Shawqy

		*delete_data Funtion
		*return void 

		this function used to delete a specific information from a table in database
		parameters : table name ==>$tb_name
					 reference to the column to be deleted ==>$col
					 reference to the rows to be deleted ==>$val
					
		return : None
	*/		


	public function delete_data($tb_name,$col,$val)
	{
		$symt4 = $this->pdo->prepare("DELETE FROM $tb_name WHERE $col='$val'");
		$symt4 -> execute();
	}//end of delete_data fun



	/**
		*@author Shawqy

		*get_data_by_ID Funtion
		*return array 

		this function used to get all information from a table in database
		parameters : table name ==>$tb_name
					 id of row ==>$id
					
		return : None
	*/


	public function get_data_by_ID($tb_name,$id)
	{
		$data=[];
		$stmt1 = $this->pdo->prepare("SELECT * FROM $tb_name WHERE id=$id");
		$stmt1-> execute();
		$data = $stmt1->fetch();
		return $data;	
			
	}


}//end of Model class


//Examples:


/*
$obj = new userModel();
$tableName="info";

$data['Name']    = "Loay01";
$data['Email']   = "Loay@loay.com";
$data['Phone']   = "010000000000"; 

$obj->insert_data($tableName,$data);

echo "insertation Done successfully";

*/


?>
