<?php 
 
    include("db_config.php");
    include("session.php");

		$username = $password = "";
		$usernameErr = $passwordErr = "";

		
	if(isset($_POST['login'])){

        if(empty($_POST['username'])){
        echo "<script>alert('NOTE : Username cannot be empty');</script>";
        header("location:../admin-login.html");
		$usernameErr = '<p class = "error" style = "color: red;">NOTE : Username cannot be empty</p>';
		}else{
			$username = mysqli_real_escape_string($conn, $_POST['username']);
        }
        
        if(empty($_POST['password'])){
        echo "<script>alert('NOTE : Password cannot be empty');</script>";
        header("location: ../admin-login.html");
		$passwordErr = '<p class = "error" style = "color: red;">NOTE : Password cannot be empty</p>';
		}else{
			$password = mysqli_real_escape_string($conn, $_POST['password']);
        }

		if($username && $password)
		{
			$sql = mysqli_query($conn, "SELECT * FROM login WHERE username = '$username'");
			$num = mysqli_num_rows($sql);
			
			if($num > 0){
				while($row = mysqli_fetch_assoc($sql))
				{
					$dbpassword = $row["Password"];
					
					
						if($password == $dbpassword){
							$_SESSION["id"] = $row['id'];
							//session_register("myusername");
							$_SESSION['login_user'] = $row['Username'];
							$_SESSION['personel_id'] = $row['Personel_ID'];
							//online registry
							
						$sql = "Update user_details set online = 1 where id = $userid";
						$query = mysqli_query($conn, $sql);


							header("Location: ../admin-page.php");
						}else{
                            //echo "<script>alert('Wrong Password')</script>";
                            header("location:../admin-login.html");
							$passwordErr = '<p class = "error" style = "color: red;">NOTE : Wrong password</p>';
						}
					
				
					   
				}
			}else{
                echo "<script>alert('NOTE :  No username exist!');</script>";
                header("location: ../admin-login.html");
				$usernameErr = '<p class = "error" style = "color: red;">NOTE : No username existing</p>';
			}
		}
	}
?>