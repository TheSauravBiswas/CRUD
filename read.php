<?php
include "php/read.php";
session_start();
if(!isset($_SESSION['admin_name'])){
	echo "<script>alert('You have to login first.')</script>";
	header('location:index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Create</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style2.css">
</head>
<body>
	<div class="container">
		<div class="box">
			<h2 class=" text-center">Welcome, <?php echo $_SESSION['admin_name']; ?>!<br>
			Here's the member's list...</h2><br>
			
			<?php if (isset($_GET['success'])) { ?>
		    <div class="alert alert-success" role="alert">
			  <?php echo $_GET['success']; ?>
		    </div>
		    <?php } ?>
			<?php if (mysqli_num_rows($result)) { ?>
			<table class="table table-striped">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Name</th>
			      <th scope="col">Email</th>
				  <th scope="col">Program</th>
				  <th scope="col">Batch</th>
				  <th scope="col">Image</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
			  	   $i = 0;
			  	   while($rows = mysqli_fetch_assoc($result)){
			  	   $i++;
			  	 ?>
			    <tr>
			      <th scope="row"><?=$i?></th>
			      <td><?=$rows['name']?></td>
			      <td><?php echo $rows['email']; ?></td>
				  <td><?php echo $rows['program']; ?></td>
				  <td><?php echo $rows['batch']; ?></td>
				  <td>
						<img width="100px" src="<?php echo $rows['image']; ?>" alt=''>
				  </td>
			      <td><a href="update.php?id=<?=$rows['id']?>" 
			      	     class="btn btn-success mb-1">Update</a>

			      	  <a href="php/delete.php?id=<?=$rows['id']?>" 
			      	     class="btn btn-danger mb-1">Delete</a>
			      </td>
			    </tr>
			    <?php } ?>
			  </tbody>
			</table>
			<?php } ?>
			<?php  if (!mysqli_num_rows($result)) { ?>
				<h3 class="text-danger text-center">No members added yet!</h3>
			<?php } ?>
			<div class="link-right">
				<a href="insert.php" class="link-primary btn btn-primary mx-auto mb-5">Add Member</a>
			</div>
		</div>
		<a class='btn btn-danger d-grid gap-2 col-1 mx-auto' href='logout.php'>Log out</a>
	</div>
</body>
</html>