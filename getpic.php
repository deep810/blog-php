<?php



    $conn = new mysqli("localhost", "root", "", "blog");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
	session_start();
   $id=$_REQUEST["id"];    

    $sql="SELECT  *  from userprofile WHERE userid='$id'";
                       $result=mysqli_query($conn,$sql);

                        if(mysqli_num_rows($result)>0){
                          $row = mysqli_fetch_assoc($result);
                          $image=$row["profilepic"];

                          
                          echo $image;


                         } 


?>
