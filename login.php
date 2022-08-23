<?php
 
    include 'dbbroker.php';
    include 'model/User.php';

	session_start();
	if(isset($_POST["login"])){ 
		$email = $_POST["emailLogin"];
		$password = $_POST["passLogin"];
		$user = new User(null,null,null,$email,$password);
		$result=User::login($user,$conn);

		$id = User::getIdByEmail($user,$conn);
		$_SESSION["currentUser"] = $id;
		 
		if(mysqli_num_rows($result) > 0){ 
			
			echo '<script>alert("USPESNO")</script>';
			header('Location: home.php');
		}else{
			echo '<script>alert("Greska")</script>';
		}
	}

?>