<?php
 $conn = new mysqli("localhost", "root", "", "blog");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


	session_start();

  $id=$_REQUEST["id"];
   
 $sql="SELECT * from post WHERE postid='$id'";
 $result=mysqli_query($conn,$sql);
 if($result){
    while($row = mysqli_fetch_assoc($result)) {
         if($row["visible"]=="notvisible"){
         	$sql1="UPDATE post set visible='visible' WHERE postid='$id'";	
         }else{
         	$sql1="UPDATE post set visible='notvisible' WHERE postid='$id'";
         }

         $re=mysqli_query($conn,$sql1);
         header("Location: {$_SERVER["HTTP_REFERER"]}");
   }
  }              


?>