<?php

include("../global.php");
if (  isset($_POST['submit']) )
{
	$id = $_POST['id'];
	echo $id;
	$obj = new userModel();
	$tableName="info";
	$obj->delete_data($tableName,"id",$id);
	
}//end of if


	header('location:../view/all.php');

	
?>
