
<?php

    $conn = new mysqli("localhost", "root", "", "blog");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
	session_start();

    
    if(isset($_POST['submit'])){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $message=$_POST["message"];

    $sql="INSERT into message(name,email,message)  VALUES ('$name','$email','$message')";
    $result=mysqli_query($conn,$sql);

    if($result>0){
    	echo "success";
    }else{
    	echo "fail";
    }
}



?>
<!DOCTYPE HTML>
<html>

<head>
	<title>Blog </title>
	<link rel="stylesheet" href="css/custom.css">

	<link href="css/blog.css" rel="stylesheet">
  <link href="css/profile.css" rel="stylesheet">
  <link href="css/profiletab.css" rel="stylesheet">


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="js/profile.js"></script>
<script src="js/profiletab.js"></script>
</head>


<body>
	<div class="blog-masthead" >
      <div class="container" >
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="index1.php">Home</a>
          <a class="blog-nav-item" href="post.php">Post</a>
          <a class="blog-nav-item" href="logout.php">Logout</a>
          <a class="blog-nav-item" href="signup.php">Signup</a>
          <a class="blog-nav-item" href="contact.php">Contact</a>

          
        </nav>

      </div>
    </div>
	<div class="container">
<div class="container">
      <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0  toppad" >


          <div class="panel panel-info" style="width:200%;">
            <div class="panel-heading">
              <h3 class="panel-title"></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-9">
                  <form method="POST" action="contact.php" >
                  <div class="form-group">
                    <label for="title"> Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="name">
                  </div>
                  <div class="form-group">
                    <label for="Tag">Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="email">
                  </div>
                  

                    
                    <div class="form-group">
                    <label for="Content">Message:</label><br>
                      <textarea rows="5" cols="110" name="message"></textarea>  
                    </div>
                    


                  <input type="submit" class="btn" value="Done" name="submit">
                </form>
                  </div>
              </div>
            </div>
                 <div class="panel-footer">
                       
                        
                    </div>

          </div>
        </div>
      </div>
    </div>


</div>

</body>
</html>


