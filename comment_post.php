<?php

   $conn = new mysqli("localhost", "root", "", "blog");

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }




 $id=$_SESSION["id"];
   //
if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $comment=$_POST['comment'];


  $sql = "INSERT INTO comments (commentid, postid, comment, user,time)
      VALUES (NULL, '$id', '$comment','$name',now())";

  if(mysqli_query($conn,$sql)){
       echo "success";
      }else{
          echo "failed";

      }
}else{

}

   ?>
