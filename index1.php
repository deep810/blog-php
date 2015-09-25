
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
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

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

   
  </head>

  <body>

    <div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="#">Home</a>
          <a class="blog-nav-item" href="post.php">Post</a>
          <a class="blog-nav-item" href="logout.php">Logout</a>
          <a class="blog-nav-item" href="signup.php">Signup</a>
          <a class="blog-nav-item" href="contact.php">Contact</a>
          <a class="blog-nav-item" style="float:right;" href="profile.php">Welcome <?php  session_start();echo $_SESSION["login_user"];  ?></a>

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
          <?php
           
              $conn = new mysqli("localhost", "root", "", "blog");

              // Check connection
              if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
              } 
             //  session_start();
               $uname=$_SESSION["login_user"];
             //  echo $uname; 
               $v='visible';
               $sql = "SELECT * FROM post WHERE visible='$v' ORDER by time desc";
               $result = mysqli_query($conn, $sql);

               if (mysqli_num_rows($result) > 0) {
                 // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        echo '<h2 class="blog-post-title">' . '<a href="read.php?id='.$row['postid'].'">'.$row["title"].'</a>'. '</h2> <br> <p class="blog-post-meta">Tagged under-<a href="viewbytag.php?tag='.$row["tag"].'">' 
                        . $row["tag"]. '</a></p><br><p>' . truncate($row["content"],$row["postid"]). '</p><br><p class="blog-post-meta">Posted by:'.$row["author"].' at:'.$row["time"].'</p><br>
                        <p class="blog-post-meta">Views:'.$row["views"].'</p>';
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
         
            

             </div><!-- /.blog-post -->

         
          

        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Read the latest blogs here.Share blogs and comment on blogs and socialize yourself.</p>
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
      <p>Please Contact Us <a href="#">Contact@myblog.com</a> </p><p>by <a href="https://twitter.com/mdo">@sai</a>.</p>
      <p>
       
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
