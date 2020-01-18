<?php 
 include 'header.php';
 include 'Database.php';
 ?>

<?php 

if(isset($_GET['eid'])){

$id= $_GET['eid'];
$query="SELECT * FROM tbl_crud WHERE id=$id";
$result= mysqli_query($con,$query);
$getData = mysqli_fetch_assoc($result);


/*$id=$_REQUEST['id'];
$query = "SELECT * from new_record where id='".$id."'"; 
$result = mysqli_query($con, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);*/

}

// code for update data 

if(isset($_POST['submit']))
{
	$name = $_POST['name'];
 	$email = $_POST['email'];
 	$phone = $_POST['phone'];


	if(empty($name)||empty($email)||empty($phone)){

 		$err = "Filed Must Not be Empty";
 	}else
	{
		$query="UPDATE tbl_crud
		SET
		name='$name',
		email='$email',
		phone='$phone'
		WHERE id = $id";

		$val = mysqli_query($con,$query);

		if($val){
			$msg = "Data updated successfully";
		}else{
			$err = "Data Not Updated";
		}

		
	}
}

?>


<?php 
if(isset($err)){
	echo"<div class='alert alert-danger col-md-4 align-center mt-2'>".$err."</div>";
}


if(isset($msg)){
	echo"<div class='alert alert-success col-md-4 align-center mt-2'>".$msg."</div>";
}

?>

<div class="card-body">

<form action="update.php?eid=<?php echo $id; ?>" method="post">

	<div class="form-group">
		<label for="name">Name:</label>
   <input type="text" class=" form-control col-md-4" name="name" value="<?php echo $getData['name'] ?>" />

   	</div>

   	<div class="form-group">
		<label for="email">Email:</label>
  <input type="text" class="form-control col-md-4" name="email" value="<?php echo $getData['email'] ?>" />

   	</div>

   	<div class="form-group">
		<label for="phone">Phone:</label>
  <input type="text" class=" form-control col-md-4" name="phone" value="<?php echo $getData['phone'] ?>" />

   	</div>


      <input type="submit" class="btn btn-info" name="submit" value="Update"/>

      <input type="reset" class="btn btn-warning" value="Cancel"/>



</form>

</div>

<a href="index.php" class="btn btn-success col-sm-1" style="font-weight: bold; margin-bottom: 10px">Go Back </a>

<?php include 'footer.php'; ?>