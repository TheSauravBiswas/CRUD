<?php 
if (isset($_GET['id'])) {
	include "config.php";

	$id = $_GET['id'];

	$sql = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    	$row = mysqli_fetch_assoc($result);
    }else {
    	header("Location: read.php");
    }


}else if(isset($_POST['update'])){
    include "../config.php";

	$name = $_POST['name'];
	$email = $_POST['email'];
    $program = $_POST['program'];
	$batch = $_POST['batch'];
	$image = $_FILES['image'];
	$id = $_POST['id'];
	$path = $_POST['path'];

	if (empty($name)) {
		header("Location: ../update.php?id=$id&error=Name is required");
	}else if (empty($email)) {
		header("Location: ../update.php?id=$id&error=Email is required");
	}
        
    else if (empty($program)) {
		header("Location: ../update.php?id=$id&error=Program is required");
	}

	else if (empty($batch)) {
		header("Location: ../update.php?id=$id&error=Batch is required");
	}
        
    else {

		if($_FILES['image']['size']==0){
			$image_des = $path;
		}else{

			$imageLocation= $_FILES['image']['tmp_name'];
			$imageName= $_FILES['image']['name'];
			$image_des="image/".$imageName;
			move_uploaded_file($imageLocation, $image_des);
		}

       $sql = "UPDATE users
               SET name='$name', email='$email', program='$program', batch='$batch', image='$image_des'
               WHERE id='$id' ";
       $result = mysqli_query($conn, $sql);
       if ($result) {
       	  header("Location: ../read.php?success=successfully updated");
       }else {
          header("Location: ../update.php?id=$id&error=unknown error occurred&$user_data");
       }
	}
}
else {
	header("Location: read.php");
}