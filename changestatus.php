<?php
 $conn = new mysqli("localhost", "root", "", "blog");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


	session_start();

  $id=$_REQUEST["id"];
   
 $sql="SELECT * from user WHERE userid='$id'";
 $result=mysqli_query($conn,$sql);
 if($result){
    while($row = mysqli_fetch_assoc($result)) {
         if($row["status"]=="norights"){
         	$sql1="UPDATE user set status='staff' WHERE userid='$id'";	
         }else if($row["status"]=="staff"){
         	$sql1="UPDATE user set status='admin' WHERE userid='$id'";
         }else{
         	$sql1="UPDATE user set status='norights' WHERE userid='$id'";
         }

         $re=mysqli_query($conn,$sql1);
         header("Location: {$_SERVER["HTTP_REFERER"]}");
   }
  }              


?>