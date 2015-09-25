<?php
  $conn = new mysqli("localhost", "root", "", "blog");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
  session_start();

  $id=$_REQUEST["id"];

  $sql="SELECT * from post WHERE postid = '$id'";

   $result = mysqli_query($conn, $sql);

               if (mysqli_num_rows($result) > 0) {
                 // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        echo '<h2 class="blog-post-title">' .$row["title"]. '</h2> <br> <p class="blog-post-meta">Tagged under-' . $row["tag"]. '</p><br><p>' . $row["content"]. '</p><br><p>Likes:'./*$row["likes"].*/'</p><a href="" name="like">Like</a>&nbsp;<a href="" name="dislike">Dislike</a><p class="blog-post-meta">Posted by:'.$row["author"].' at:'.$row["time"].'</p><br>';
                    }
                } else {
                    echo "";
                }

               // mysqli_close($conn);


?>
