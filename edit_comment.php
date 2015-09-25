<?php

 $conn = new mysqli("localhost", "root", "", "blog");
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
  session_start();
  
  $id=$_REQUEST["id"];
  
   echo '<h2>Post a comment:</h2><br>
               <div id="comment_form">
              <form method ="POST" action=<?php echo "read.php?id=".$id;?>
              <div>
                <input type="text" name="name" id="name" value="" placeholder="Name">
              </div>
              
              <div>
                
                <textarea rows="3" name="comment" id="comment" placeholder="Comment"></textarea>
              </div>
              <div>
                <input type="submit" name="submit" value="Add Comment">
              </div>
              </form>
            </div>';

    	$name=$_POST['name'];
        $comment=$_POST['comment'];

        		
        		$sql = "UPDATE comments set postid='$id', comment='$comment',user='$name'";
        				
        		
            $result=mysqli_query($conn,$sql);

            if($result){

                 //  header("location: read.php");
                    
                }else{
                    echo mysql_error();
                    echo "Falied... Please  try again";
                }	        



 ?>