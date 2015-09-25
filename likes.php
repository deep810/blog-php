<?php
  $conn = new mysqli("localhost", "root", "", "blog");
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
  session_start();
  
  $id=$_REQUEST["id"];
 
  $g="SELECT * from post WHERE postid='$id'";
  
  
  $row = mysqli_fetch_array(mysqli_query($conn,$g));
  //print_r($row);
  
  $like=$row["likes"];
  $like=$like+1;
  echo $like;
 
  $sql="UPDATE post SET likes='$like' WHERE postid='$id'";	
  mysqli_query($conn,$sql);
   header("Location: {$_SERVER["HTTP_REFERER"]}");
  
?>