
<?php
 $conn = new mysqli("localhost", "root", "", "blog");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


	session_start();

    

    if(isset($_POST['submit'])){
		$title=$_POST['title'];
		$tag=$_POST['tag'];
		$content=$_POST['content'];
		$auth=$_SESSION['login_user'];
    echo $auth;

		$sql1="SELECT * from user WHERE username='$auth'";
    $res1=mysqli_query($conn,$sql1);
    $row = mysqli_fetch_assoc($res1);
    $status=$row["status"];
    
    if($status=="norights"){
      echo 'You have no rights to post<br> Please <a href="contact.php">Contact</a> the admin.';
      
	}else{
      $sql = "INSERT INTO post (postid, title, tag,content,author,time,likes)
        VALUES (NULL, '$title', '$tag','$content','$auth',now(),0)";

    if(mysqli_query($conn,$sql)){
      echo "Posted";
           // header("location: index.php");

        }else{
            echo mysql_error();
            echo "Falied... Please  try again";
        }
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

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

</head>


<body>

<div class="container">

  <div class="blog-masthead">
    
    <form method="POST" action="post.php">
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" placeholder="Title">
  </div>
  <div class="form-group">
    <label for="Tag">Tag</label>
    <input type="text" class="form-control" id="tag" name="tag" placeholder="Tag">
  </div>
  <div >

    <label for="Content">Content</label><br>
    <!--<input type="text" id="content"  name="content">-->
	<textarea rows="8" name="content" class ="ckeditor" id="editor1" placeholder="Content" cols="35">hello</textarea>
  <script type="text/javascript">
    CKEDITOR.replace('editor1');
  </script>
    </div>
    <?php
  echo '<div class="form-group">
    <label for="Content">Author:</label>';
     echo $_SESSION['login_user']; 
    echo '</div>';
    if($_SESSION['login_user'])
      echo '<input type="submit" class="btn" value="post" name="submit">';


  ?>
</form>

</div>

</div>



</body>



</html>
