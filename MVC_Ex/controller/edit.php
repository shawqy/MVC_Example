<?php

 session_start();
$_SESSION['unque_id'];
$_SESSION['old_name'];
$_SESSION['old_email'];
$_SESSION['old_phone'];

include("../global.php");
$tableName  = "info";
$obj = new userModel();

if (  isset($_POST['edit']) )
{

	$oldId = $_POST['idOld'];

	$_SESSION['unque_id']  = $oldId; 
	
	$row =$obj->get_data_by_ID($tableName,$_SESSION['unque_id']);


 	$_SESSION['old_name']  = $row['Name'];
	$_SESSION['old_email'] = $row['Email'];
	$_SESSION['old_phone'] = $row['Phone'];

}//end of if edit


	
if (  isset($_POST['editSubmit']) )
{
	$obj = new userModel();
    
    $newName    = $_POST['nameNew'];
  	$newEmail   = $_POST['emailNew'];
  	$newPhone   = $_POST['phoneNew']; 


  	if ($newName != $_SESSION['old_name'])
  		 {
  			$obj->update_data($tableName,"id",$_SESSION['unque_id'],"Name",$newName);
  			$_SESSION['old_name'] = $newName;
        
  		 }
  		  
    if ($newEmail != $_SESSION['old_email'])
  		 {
  			$obj->update_data($tableName,"id",$_SESSION['unque_id'],"Email",$newEmail);
  		  $_SESSION['old_email'] = $newEmail;
           
  		 }

	if ($newPhone != $_SESSION['phoneNew'])
  		 {
  			$obj->update_data($tableName,"id",$_SESSION['unque_id'],"Phone",$newPhone);
  		  $_SESSION['old_phone'] = $newPhone;

  		 }
   echo '<script type="text/javascript"> alert("Edits successfully Saved")</script>';
   header('location:../view/all.php');
}

	
?>



<form action="edit.php" method="POST">
	
	
    <label>Edit Name</label>
    <p><input type="text" name="nameNew"  value="<?php echo $_SESSION['old_name']; ?>"></p>

    
    <label>Email</label>
    <p><input type="text" name="emailNew" value="<?php echo $_SESSION['old_email']; ?>"></p>

   
    <label>Phone</label>
    <p><input type="text" name="phoneNew" value="<?php echo $_SESSION['old_phone'] ; ?>"></p>

    
     <button type="submit"  id="btn" name="editSubmit">Edit Submit</button>
</form>

<form action="../view/all.php" method="POST">
	
<input type="submit" name="DataPage" value="Go to Data Page">
</form>