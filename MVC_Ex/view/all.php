<h1 style="text-align: center;"> All Data</h1>


<tabele>

	<tr>
	    <th>ID</th>
	    <th>Name</th> 
	    <th>Email</th>
	    <th>Phone</th>
	    <th></th>
	    <th></th>
    </tr>

<?php
	include("../global.php");
	$obj = new userModel();
	$tableName="info";

	$data=$obj->getData($tableName);
?>


<?php
	foreach ($data as $row)
	{
    	
    	$id = $row['id'];
    	$name= $row['Name'];
    	$email = $row['Email'];
    	$phone = $row['Phone'];

    	
?>



    
<tr>
		<td> <?php  echo  $id; ?> </td>
		<td> <?php  echo  $name; ?> </td>
		<td> <?php  echo  $email; ?> </td>
		<td> <?php  echo  $phone; ?> </td>
		<td>

		 <form action="../controller/delete.php" method="POST"> 
		 	<input type="hidden"  name="id" value="<?= $id ?>">
		   
		    <button type="submit"  id="btn" name="submit" onclick="myFunction()">Delete</button>
		    <script type="text/javascript">
		    	function myFunction() 
		    	{
		    		return confirm("confirm Deleteing Data");
		    	}
		    </script>
		 </form> 

		</td>
		<td>
		 <form action="../controller/edit.php" method="POST"> 
		 	
		 	<input type="hidden"  name="name"  value="<?= $name ?>">
		 	<input type="hidden"  name="email" value="<?= $email ?>">
		 	<input type="hidden"  name="phone" value="<?= $phone ?>"> 
		 	<input type="hidden"  name="idOld" value="<?= $id ?>"> 
		 	<input type="submit"  name="edit"  value="Edit"> 

		 </form>
		</td>
</tr> 
		

		<hr>

<?php 
    }//end of foreach outer
?> 

</tabele>
