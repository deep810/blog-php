<?php
    //include_once 'dbconnect.php';
    error_reporting(0);
    include('php/dbconnect.php') or die("Cannot find connect file");
    
   

    $conn = new mysqli("localhost", "root", "", "blog");
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 


	session_start();
    if(isset($_POST['submit'])){
        //Perform varification
        $un=mysqli_real_escape_string($conn,$_POST['username']); 
        $pass=mysqli_real_escape_string($conn,$_POST['password']);
       // $pass=md5($pass);
        
        
		
        $sql="SELECT * from user WHERE username='$un' ";
        $result=mysqli_query($conn,$sql);
        if($result){
            while($row = mysqli_fetch_assoc($result)) {
                
            
                if($row["password"]==$pass){
                    $_SESSION["login_user"]=$un;
                    if($row["status"]=="admin")
                        header("Location:adminpanel.php");
                    else
                        header('Location:profile.php');
                }else{
                    echo "passwords do not match";
                } 
                  
           }    
        }else{
            echo "user does not exists";
        } 
        }   

?>