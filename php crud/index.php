<?php 
 include 'header.php';
 include 'Database.php';
 ?>


<?php 
// code for fetch data from db

$query ="SELECT * FROM tbl_crud";

$result = mysqli_query($con,$query);

// code for delete data 

if(isset($_GET['delinfo'])){

   $id = $_GET['delinfo'];
   $query="DELETE FROM tbl_crud WHERE id=$id";
   $del = mysqli_query($con,$query);

   if($del){
       header("Location:index.php");
    }
}

?>


<div class="card-body">

<a href="create.php" class="btn btn-success" style="font-weight: bold; float: left; margin-bottom: 10px;">Create</a>


	<table class="table table-bordered table-hover">

		<thead>

			<th>#</th>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Action</th>

		</thead>

		<tbody>

			<?php if($result) { ?>

				<tr>

					<?php 

					$i = 1; 

					while($row = mysqli_fetch_assoc($result)){ ?>

						<td><?php echo $i++; ?></td>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo $row['phone'];?></td>
						<td>
							<a href="update.php?eid=<?php echo $row ['id']; ?>" class="btn btn-warning">Edit</a>

							<a href="?delinfo=<?php echo $row ['id']; ?>" class="btn btn-danger">Delete</a>

						</td>

				</tr>

			<!-- end of php while loop -->

			<?php } ?>

			<!-- end of if condition -->
			<?php } else { ?>

				<p>No data available</p>

			<?php } ?>
			
			<tr>
				


			</tr>


		</tbody>
		

	</table>
	

</div>

<?php include 'footer.php'; ?>