<?php

    $conn = new mysqli("localhost", "root", "", "blog");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
	session_start();

    $uname=$_SESSION["login_user"];
    $sql="SELECT  *  from user WHERE username='$uname'";
    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){
      $row = mysqli_fetch_assoc($result);
      $id=$row["userid"];
      
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

          <a class="blog-nav-item" style="float:right;" href="#">Welcome <?php  echo $uname;  ?></a>
        </nav>

      </div>
    </div>
	<div class="container">
<div class="container">
      <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0  toppad" >


          <div class="panel panel-info" style="width:200%;">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $_SESSION["login_user"]?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-lg-9">
                
                  <form method="POST" action="profileform.php" enctype="multipart/form-data" >
                  <div class="form-group">
                    <label for="title">First Name</label>
                    <input type="text" class="form-control" id="fname" name="fname" placeholder="first name">
                  </div>
                  <div class="form-group">
                    <label for="Tag">Last Name</label>
                    <input type="text" class="form-control" id="lname" name="lname" placeholder="last name">
                  </div>
                  <div  style="display:inline;">

                    <label for="Content">Date of Birth</label><br>
                    <input type="date" id="dob"  name="dob" placeholder="dob"><br><br>
                    <b>Profile pic:</b>
                    <input type="file" name="image" >
                    </div>
                    <br>
                  <div class="form-group">
                    <label for="Content">Gender</label>
                      <input type="text" class="form-control" id="gender" name="gender" placeholder="gender">  
                    </div>

                    <div class="form-group">
                    <label for="Content">Motto</label>
                      <input type="text" class="form-control" id="motto" name="motto" placeholder="motto">  
                    </div>
                    <div class="form-group">
                    <label for="Content">Email</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="email">  
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


<?php

  if(isset($_POST['submit'])){

/*     $imageName=mysqli_real_escape_string($conn,$_FILES["image"]["name"]);
     $imageData=mysqli_real_escape_string($conn,$_FILES["image"]["name"]);
     $imageType=mysqli_real_escape_string($conn,$_FILES["image"]["type"]);
*/
     $fname=$_POST["fname"];
     $lname=$_POST["lname"];
     $dob=$_POST["dob"];
     $gender=$_POST["gender"];
     $motto=$_POST["motto"];
     $email=$_POST["email"];
     $img=addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
    echo $_FILES["image"]["name"];

    // if($img!=NULL){
     $sql="INSERT into userprofile(userid,firstname,lastname,dob,gender,
      profilepic,motto,email) VALUES ('$id','$fname','$lname','$dob','$gender','$img','$motto','$email')";
      /*}else{
          $sql="INSERT into userprofile(userid,firstname,lastname,dob,gender,
      motto,email) VALUES ('$id','$fname','$lname','$dob','$gender','$motto','$email')";
      
      }*/
     // echo $sql;
      $result=mysqli_query($conn,$sql);

      
     if($result> 0){
        echo "Success";
        header("Location: profile.php);
     //   header("Location: {$_SERVER["HTTP_REFERER"]}");
     } else{
       echo "fail";
     }
  }

?>