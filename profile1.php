<?php



    $conn = new mysqli("localhost", "root", "", "blog");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
	session_start();

    $uname=$_REQUEST["name"];
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
              <h3 class="panel-title">Welcome <?php echo $_SESSION["login_user"]?></h3>
              

            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> 
                    
                    <?php 
                       $sql="SELECT  *  from userprofile WHERE userid='$id'";
                       $result=mysqli_query($conn,$sql);

                        if(mysqli_num_rows($result)>0){
                          $row = mysqli_fetch_assoc($result);
                          //echo $row["profilepic"];

                          echo '
                              <img alt="User Pic" src="getpic.php?id='.$id.'" class="img-circle img-responsive"> </div>

                              <div class=" col-md-9 col-lg-9 ">
                  
                              <ul class="tabs">
                              <li class="tab-link current" data-tab="tab-1"><b>Profile</b></li>
                          
                          
                              </ul>

                        <div id="tab-1" class="tab-content current">
                              <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>First Name</td>
                        <td>'.$row["firstname"].'</td>
                      </tr>
                      <tr>
                        <td>Last Name</td>
                        <td>'.$row["lastname"].'</td>
                      </tr>
                      <tr>
                        <td>Date of Birth</td>
                        <td>'.$row["dob"].'</td>
                      </tr>

                         <tr>
                             <tr>
                        <td>Gender</td>
                        <td>'.$row["gender"].'</td>
                      </tr>
                        <tr>
                        <td>Motto</td>
                        <td>'.$row["motto"].'</td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td>'.$row["email"].'</td>
                      </tr>
                        
                        

                    </tbody>
                  </table>
                          ';
                          
                          
                        }
                    ?>      
                             
                        </div>
                        
                        
<!---->



                 


                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i>
												</a>
												<a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i>
												</a>
												
                        <a class="panel-title"  href="viewuserpost.php">All posts</a>
												<a data-original-title="Broadcast Message" href= "profileform.php" data-toggle="tooltip" type="button" class="btn btn-sm " style="float:right;"><i class="glyphicon glyphicon-edit">Edit Profile</i>
												</a>
                        <span class="pull-right">
                          </span>
                    </div>

          </div>
        </div>
      </div>
    </div>


</div>




</body>



</html>
