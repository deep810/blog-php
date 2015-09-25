<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>My Blog Website</title>
    
   
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- Custom styles for this template -->
    <link href="css/blog.css" rel="stylesheet">
	<link href="css/comments.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          
          <?php
              session_start();
              if($_SESSION["login_user"]){
                echo '<a class="blog-nav-item" href="login.php">Login</a>
                  <a class="blog-nav-item active" href="index1.php">Home</a>
                  <a class="blog-nav-item" href="post.php">Post</a>
                ';
              }else{
                echo '
                <a class="blog-nav-item active" href="index.php">Home</a>
          <a class="blog-nav-item" href="post.php">Post</a>
                <a class="blog-nav-item" href="logout.php">Logout</a>';
              }

          ?>
          <a class="blog-nav-item" href="signup.php">Signup</a>
          <a class="blog-nav-item" href="contact.php">Contact</a>
        </nav>
      </div>
    </div>

    <div class="container">

      <div class="blog-header">
        <h1 class="blog-title">My Blog Site</h1>
        <p class="lead blog-description">The official site for  reading and creating  blogs.</p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">
            <div class="blog-post">

<!--Display post-->
<?php
  $conn = new mysqli("localhost", "root", "", "blog");
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
  
  $id=$_REQUEST["id"];
  
  $sql="SELECT * from post WHERE postid = '$id'";
  
   $result = mysqli_query($conn, $sql);

               if (mysqli_num_rows($result) > 0) {
                 // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        $views=$row["views"];
                        $views+=1;
                        mysqli_query($conn,"UPDATE post SET views='$views' WHERE postid='$id'");
                        echo '<h2 class="blog-post-title">' .$row["title"]. '</h2> <br> <p class="blog-post-meta">Tagged under-<a href="viewbytag.php?tag='.$row["tag"].'">' 
                        . $row["tag"]. '</a></p><br><p>' . $row["content"]. '</p><br><p>Likes:'.$row["likes"].'</p><a href="likes.php?id='.$row["postid"].'" name="like">Like</a>&nbsp;&nbsp;&nbsp;
                        Views:'.$row["views"].'<p class="blog-post-meta">Posted by:'.$row["author"].' at:'.$row["time"].'</p><br>';
                        
                        if($_SESSION["login_user"]){
                          if($row["author"]===$_SESSION["login_user"]){
                              echo '<a href="editpost.php?id='.$id.'">Edit</a>&nbsp;&nbsp;
                                  <a href="deletepost.php?id='.$id.'">Delete</a>';
                          }
                        }else{

                        }                        

                    }
                } else {
                    
                }

               // mysqli_close($conn);
				if(isset($row["likes"])){
					$row["likes"]++;
				}
  
?>


	<h1>Comments</h1>
  <div  style="background-color:#F8E6E0;">	
  
  
  <!--Display comments-->
	<?php
			
		  $id=$_REQUEST["id"];			  
			$sql1="SELECT * from comments WHERE postid = '$id'";

      $un=$_SESSION["login_user"];  
      $sql2="SELECT * from user WHERE username='$un'";	
      $res=mysqli_query($conn,$sql2);
      $r=mysqli_fetch_assoc($res);
      $status=$r["status"];		

      $result = mysqli_query($conn, $sql1);

               if (mysqli_num_rows($result) > 0) {
                 // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        echo '<h3 >' .$row["user"]. '</h3> <p> ' .  $row["comment"]. '</p> at:'.$row["time"];
                        if(($_SESSION["login_user"]==$row["user"] )|| ($status=="admin")){
                         echo ' <a href="delete_comment.php?id='.$row["commentid"].'">Delete</a></p>';
                        }else if($_SESSION["login_user"]==$row["user"]){
                          echo ' <a href="edit_comment.php?id='.$row["commentid"].'">Edit</a></p>';
                        }
                      }
                    }
?>
	
	</div>

  <?php
    if(!$_SESSION["login_user"]){
        echo 'Please <a href="login.php">Login</a> to Comment';
      }else{
        echo '<h2>Post a comment:</h2><br>
               <div id="comment_form">
              <form method ="POST" action= "read.php?id='.$id.'">
              <div>
                <input type="text" name="name" id="name"  placeholder="Name">
              </div>
              
              <div>
                
                <textarea rows="3" name="comment" id="comment" placeholder="Comment"></textarea>
              </div>
              <div>
                <input type="submit" name="submit" value="Add Comment">
              </div>
              </form>
            </div>';
      }

  ?>
           
      
	  <?php   
	   
			
		  
	   $id=$_REQUEST["id"];
	    if(isset($_POST['submit'])){


        		$name=$_POST['name'];
        		$comment=$_POST['comment'];

        		
        		$sql = "INSERT INTO comments (postid, comment,user)
        				VALUES ('$id', '$comment','$name') ";
        		
            $result=mysqli_query($conn,$sql);

            if($result){

                 //  header("location: read.php");
                    
                }else{
                    echo mysql_error();
                    echo "Falied... Please  try again";
                }
    	}else{
    			
    	} 	   
	   
	   ?> 

             </div><!-- /.blog-post -->

         <!--
          <nav>
            <ul class="pager">
              <li><a href="#">Previous</a></li>
              <li><a href="#">Next</a></li>
            </ul>
          </nav>-->

        </div><!-- /.blog-main -->

        <div class="col-sm-3  blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>
          <div class="sidebar-module">
            <h4>Archives</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li>
              <li><a href="#">February 2014</a></li>
              <li><a href="#">January 2014</a></li>
              <li><a href="#">December 2013</a></li>
              <li><a href="#">November 2013</a></li>
              <li><a href="#">October 2013</a></li>
              <li><a href="#">September 2013</a></li>
              <li><a href="#">August 2013</a></li>
              <li><a href="#">July 2013</a></li>
              <li><a href="#">June 2013</a></li>
              <li><a href="#">May 2013</a></li>
              <li><a href="#">April 2013</a></li>
            </ol>
          </div>
          <div class="sidebar-module">
            <h4>Elsewhere</h4>
            <ol class="list-unstyled">
              <li><a href="#">GitHub</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->

    <footer class="blog-footer">
      <p>Blog template built for <a href="http://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
      <p>
        <a href="#">Back to top</a>
      </p>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
