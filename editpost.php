
<?php
 $conn = new mysqli("localhost", "root", "", "blog");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


	session_start();

  $id=$_REQUEST["id"];

    if(isset($_POST['submit'])){
		$title=$_POST['title'];
		$tag=$_POST['tag'];
		$content=$_POST['content'];
		$auth=$_SESSION['login_user'];

    $sql ="UPDATE post SET title='$title',tag='$tag',content='$content' WHERE postid='$id'";   
    if(mysqli_query($conn,$sql)){
			echo "Edited";
      header("Location: {$_SERVER["HTTP_REFERER"]}");

        }else{
            echo mysql_error();
            echo "Falied... Please  try again";
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

    <form method="POST" action=<?php echo "editpost.php?id=".$id;?>>
  <?php 
  $s="SELECT * from post WHERE postid='$id'";
  $r=mysqli_query($conn,$s);
  $r1 = mysqli_fetch_assoc($r);

  echo '
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" value="'.$r1["title"].'" placeholder="Title">
  </div>
  <div class="form-group">
    <label for="Tag">Tag</label>
    <input type="text" class="form-control" id="tag" name="tag" value="'.$r1["tag"].'" placeholder="Tag">
  </div>
  <div >

    <label for="Content">Content</label><br>
    <!--<input type="text" id="content"  name="content">-->
	<textarea rows="8" name="content" class ="ckeditor" id="editor1" placeholder="Content" cols="35">'.$r1["content"].'</textarea>
  
  <script type="text/javascript">
    CKEDITOR.replace("editor1");
  </script>
    </div>

  <div class="form-group">
    <label for="Content">Author:</label>';
    echo $_SESSION['login_user']; 
    echo '
    </div>
  <input type="submit" class="btn" value="post" name="submit">';
  ?>
</form>

</div>

</div>



</body>



</html>
