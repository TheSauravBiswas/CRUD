<?php
include 'php/update.php';
session_start();
if(!isset($_SESSION['admin_name'])){
	echo "<script>alert('You have to login first.')</script>";
	header('location:index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style2.css">
</head>
<body>
	<div class="container">
		<form action="php/update.php" 
		      method="post">
            
		   <h4 class="display-4 text-center">Update</h4><hr><br>
		   <?php if (isset($_GET['error'])) { ?>
		   <div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
		    </div>
		   <?php } ?>
		   <div class="form-group">
		     <label for="name">Name</label>
		     <input type="name" 
		           class="form-control" 
		           id="name" 
		           name="name" 
		           value="<?=$row['name'] ?>" >
		   </div>

		   <div class="form-group">
		     <label for="email">Email</label>
		     <input type="email" 
		           class="form-control" 
		           id="email" 
		           name="email" 
		           value="<?=$row['email'] ?>" >
		   </div>

		   <div class="form-group">
		     <label for="program">Program</label>
		     <input type="text" 
		           class="form-control" 
		           id="program" 
		           name="program" 
		           value="<?=$row['program'] ?>">
		   </div>

		   <div class="form-group">
		     <label for="batch">Batch</label>
		     <input type="text" 
		           class="form-control" 
		           id="batch" 
		           name="batch" 
		           value="<?=$row['batch'] ?>">
		   </div>

		   <div class="form-group">
		     <label for="image">Image</label>
		     <input type="file" 
		           class="form-control" 
		           id="image" 
		           name="image" 
		           value="<?=$row['image'] ?>"
		           >
		   </div>

		   <div class="form-group">
		   	<img width="150px" src="<?php echo $rows['image']; ?>" alt='' id="preview">
		   </div>

		   <input type="text" 
		          name="id"
		          value="<?=$row['id']?>"
		          hidden >

			<input type="text" 
		          name="path"
		          value="<?=$row['image']?>"
		          hidden >

		   <button type="submit" 
		           class="btn btn-primary"
		           name="update">Update</button>
		    <a href="read.php" class="link-primary btn btn-primary">Members</a>
	    </form>
		<script>
            image.onchange = evt => {
                const [file] = image.files
                if (file) {
                    preview.src = URL.createObjectURL(file)
                }
            }
        </script>
		<a class='btn btn-danger d-grid gap-2 col-1 mx-auto' href='logout.php'>Log out</a>
	</div>
</body>
</html>