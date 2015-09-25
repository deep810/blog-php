
<?php
	//include_once 'dbconnect.php';
	error_reporting(0);
	include('php/dbconnect.php') or die("Cannot find connect file");
	
	$conn = new mysqli("localhost", "root", "", "blog");
	
	
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 



	if(isset($_POST['submit'])){
		//Perform varification
		$uname=$_POST['username'];
		$email=$_POST['email'];
		$pass1=$_POST['password1'];
		$pass2=$_POST['password2'];

		
		$uchk="SELECT * from user WHERE username='$uname'";
		$result=mysqli_query($conn,$uchk);
		if(mysqli_num_rows($result)>0){
			echo "user exists";
			exit();
		}
		

		if($pass1 != $pass2){
			echo "Sorry your passwords do not match<br/>";
			
			exit();
		}else{
		   // $pass1=md5($pass);
			$sql = "INSERT INTO user (userid, username, email,password)
				VALUES (NULL, '$uname', '$email','$pass1')";


			if (mysqli_query($conn, $sql)) {
				header("location:login.php");
			    echo "New record created successfully";
			} else {

			    echo  mysqli_error($conn);
			}

			mysqli_close($conn);
		}

	}else{

	}

?>



<!DOCTYPE HTML>
<html>

<head>
	<title>Blog </title>
	<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="css/login.css">
	<link rel="stylesheet" href="css/">
	
	
</head>


<body>

	<div class="container">

    <form id="signup" action="signup.php" method="POST">

        <div class="header">
        
            <h3>Sign Up</h3>
            
            
            
        </div>
        
        <div class="sep"></div>

        <div class="inputs">
        
            <input type="text" name="username" placeholder="username" /> 	 
	   		<input type="email" name="email" placeholder="e-mail" autofocus />        
            <input type="password" name="password1" placeholder="Password" />
	    	<input type="password" name="password2" placeholder="Confirm Password" />	         
	    	
		            
            
            <input type="submit" id="submit" value="sign up" name="submit">
            	    			
        </div>

    </form>

</div>
?
	


</body>



</html>