<?php
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
		<form action="php/create.php" 
		      method="post"
			  enctype="multipart/form-data">
            
		   <h4 class="display-4 text-center">Add Member</h4><hr><br>
		   <?php if (isset($_GET['error'])) { ?>
		   <div class="alert alert-danger" role="alert">
			  <?php echo $_GET['error']; ?>
		    </div>
		   <?php } ?>
		   <div class="form-group">
		     <input type="name" 
		           class="form-control" 
		           id="name" 
		           name="name" 
		           value="<?php if(isset($_GET['name']))
		                           echo($_GET['name']); ?>" 
		           placeholder="Enter name">
		   </div>

		   <div class="form-group">
		     <input type="email" 
		           class="form-control" 
		           id="email" 
		           name="email" 
		           value="<?php if(isset($_GET['email']))
		                           echo($_GET['email']); ?>"
		           placeholder="Enter email">
		   </div>

		   <div class="form-group">
		     <input type="text" 
		           class="form-control" 
		           id="program" 
		           name="program" 
		           value="<?php if(isset($_GET['program']))
		                           echo($_GET['program']); ?>"
		           placeholder="Enter program. Example: B.Sc in CSE">
		   </div>

		   <div class="form-group">
		     <input type="text" 
		           class="form-control" 
		           id="batch" 
		           name="batch" 
		           value="<?php if(isset($_GET['batch']))
		                           echo($_GET['batch']); ?>"
		           placeholder="Enter batch">
		   </div>

		   <div class="form-group">
		     <label for="image">Image</label>
		     <input type="file" 
		           class="form-control" 
		           id="image" 
		           name="image" 
		           value="<?php if(isset($_FILES['image']))
		                           echo($_FILES['image']); ?>"
		           >
		   </div>

		   <div class="form-group">
			<img width="150px" src="" alt="" id="preview">
		   </div>

		   <button type="submit" 
		          class="btn btn-primary"
		          name="create">Add</button>
		    <a href="read.php" class="link-primary">View</a>
	    </form>
		<script>
            image.onchange = evt => {
                const [file] = image.files
                if (file) {
                    preview.src = URL.createObjectURL(file)
                }
            }
        </script>
		<a class='btn btn-danger d-grid gap-2 col-1 mx-auto mt-5' href='logout.php'>Log out</a>
	</div>
</body>
</html>