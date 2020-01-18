<?php 
 include 'header.php';
 include 'Database.php';
 ?>

 <?php

 // code for store data in db 

 if(isset($_POST['submit'])){

 	$name = $_POST['name'];
 	$email = $_POST['email'];
 	$phone = $_POST['phone'];

 	if(empty($name)||empty($email)||empty($phone)){

 		$err = "Filed Must Not be Empty";
 	}else{

 		$query = "INSERT INTO tbl_crud (name,email,phone) VALUES('$name','$email','$phone')";
 		$result = mysqli_query($con,$query);

 		if($result){
 		$msg = "Data Inserted Successfully!!";
 	    }else{

 	    	$err = "Data Not Inserted";
 	    }
 	}

 }

 ?>

 <?php 

// code for show message

 if(isset($msg)){

 	echo "<div class='alert alert-success col-md-4 mt-2'>".$msg."</div>";
 }

 if(isset($err)){

 	echo "<div class='alert alert-danger col-md-4 mt-2'>".$err."</div>";
 }


 ?>



<div class="card-body">

<form action="create.php" method="post">

	<div class="form-group">
		<label for="name">Name:</label>
   <input type="text" class=" form-control col-md-4" name="name" placeholder="Enter Your Name" />

   	</div>

   	<div class="form-group">
		<label for="email">Email:</label>
  <input type="text" class="form-control col-md-4" name="email" placeholder="Enter Your Email" />

   	</div>

   	<div class="form-group">
		<label for="phone">Phone:</label>
  <input type="text" class=" form-control col-md-4" name="phone" placeholder="Enter Your Phone" />

   	</div>

<input type="submit" class="btn btn-success" name="submit" value="submit"/>
<input type="reset" class="btn btn-info" value="cancel"/>



</form>

</div>

<a href="index.php" class="btn btn-warning col-sm-1" style="font-weight: bold; margin-bottom: 10px;">Go Back </a>


<?php include 'footer.php'; ?>