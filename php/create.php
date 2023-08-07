<?php 

if (isset($_POST['create'])) {
	include "../config.php";

	$name = $_POST['name'];
	$email = $_POST['email'];
	$program = $_POST['program'];
	$batch = $_POST['batch'];
	$image = $_FILES['image'];

	$user_data = 'name='.$name. 'email='.$email. 'program='.$program. 'batch='.$batch. 'image='.$image;

	if (empty($name)) {
		header("Location: ../insert.php?error=Name is required&$user_data");
	}else if (empty($email)) {
		header("Location: ../insert.php?error=Email is required&$user_data");
	}
	
	else if (empty($program)) {
		header("Location: ../insert.php?error=Program is required&$user_data");
	}

	else if (empty($batch)) {
		header("Location: ../insert.php?error=Batch is required&$user_data");
	}

	else if (empty($image)) {
		header("Location: ../insert.php?error=Image is required&$user_data");
	}

	else {

		$imageLocation= $_FILES['image']['tmp_name'];
		$imageName= $_FILES['image']['name'];
		$image_des="image/".$imageName;
		move_uploaded_file($imageLocation, $image_des);

	 
	 	$sql = "INSERT INTO users(name, email, program, batch, image) 
               VALUES('$name', '$email', '$progarm', '$batch', '$image_des')";
        $result = mysqli_query($conn, $sql);
		if ($result) {
			header("Location: ../read.php?success=successfully created");
		}
		else {
			header("Location: ../insert.php?error=unknown error occurred&$user_data");
		}
	}

}