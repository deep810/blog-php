<?php
			
			$conn = new mysqli("localhost", "root", "", "blog");
    
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
		      $id=$_REQUEST["id"];
			  echo $id;
			$sql1="SELECT * from comments WHERE postid = '$id'";
  
			$result = mysqli_query($conn, $sql1);

               if (mysqli_num_rows($result) > 0) {
                 // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        echo '<h3 >' .$row["user"]. '</h3> <p> ' .  $row["comment"]. '</p> at:'.$row["time"].'</p>';
                    }
                } else {
                    echo "This article has no comments.Be the first one to comment.......";
                }

  
  
  
	?>