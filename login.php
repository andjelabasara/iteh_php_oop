<?php
 
    include 'dbbroker.php';
    include 'model/User.php';

	session_start();
	if(isset($_POST["login"])){ 
		$email = $_POST["emailLogin"];
		$password = $_POST["passLogin"];
		$user = new User(null,null,null,$email,$password);
		$result=User::login($user,$conn);
         
		 
		if(mysqli_num_rows($result) > 0){
			
			// $row = mysqli_fetch_assoc($result); 
			
			echo '<script>alert("USPESNO")</script>';
			header('Location: home.php');
		}else{
			echo '<script>alert("Greska")</script>';
		}
	}

?>