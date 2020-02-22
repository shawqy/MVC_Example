<?php
include("../global.php");
$data =[];
$tableName  = "info";
$obj = new userModel();


if (  isset($_POST['insert']) )
{    
    $data['Name']    = $_POST['addname'];
  	$data['Email']   = $_POST['addemail'];
  	$data['Phone']   = $_POST['addphone']; 

  	/*Add any Kind of restrictions if exists */

  	$obj->insert_data($tableName,$data);

  	header('location:../view/all.php');

}

?>