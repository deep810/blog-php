<?php

 $conn = new mysqli("localhost", "root", "", "blog");
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
  session_start();
  
  $id=$_REQUEST["id"];
  
 
  $sql="DELETE FROM post WHERE postid='$id'";
  
  if(mysqli_query($conn,$sql)){
	  echo "Successfully removed the comment";	
    header("location:index1.php");  
  }else{
	  echo "Failed";
	  
  }
  
  
  
  ?>