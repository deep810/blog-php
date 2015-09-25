<?php



    $conn = new mysqli("localhost", "root", "", "blog");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
	session_start();

    $uname=$_SESSION["login_user"];
   



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
            <h1>Welcome <?php echo $uname; ?></h1>

             <?php
               $tag=$_REQUEST["tag"]; 
               $sql = "SELECT * FROM post WHERE tag='$tag'";
                $res=mysqli_query($conn, $sql);
                 

               
               
               if (mysqli_num_rows($res) > 0) {
                 // output data of each row
                    while($row = mysqli_fetch_assoc($res)) {
                        echo '<h2 class="blog-post-title">' . '<a href="read.php?id='.$row['postid'].'">'.$row["title"].'</a>'. '</h2> <br> <p class="blog-post-meta">Tagged under-' . $row["tag"]. '</p><br><p>' . truncate($row["content"],$row["postid"]). '</p><br><p class="blog-post-meta">Posted by:'.$row["author"].' at:'.$row["time"].'</p><br>';
                    }
                } else {
                    echo "Oye";
                }
                  
                function truncate($mytext,$id) {  
                    //Number of characters to show  
                    $chars = 300;  
                    $mytext = substr($mytext,0,$chars);  
                    $mytext = substr($mytext,0,strrpos($mytext,' '));  
                    $mytext = $mytext." <a href='read.php?id=$id'>read more...</a>";  
                    return $mytext;  
                    }  


                mysqli_close($conn);


          ?>



          </div>
        </div>
      </div>
    </div>


</div>




</body>



</html>
