<?php
	 $conn = new mysqli("localhost", "root", "", "blog");
    
	    // Check connection
	    if ($conn->connect_error) {
	        die("Connection failed: " . $conn->connect_error);
	    } 
	  session_start();

?>


<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>AdminPanel</title>
	<link media="all" rel="stylesheet" type="text/css" href="css/all.css" />
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript">window.jQuery || document.write('<script type="text/javascript" src="js/jquery-1.7.2.min.js"><\/script>');</script>
	<script type="text/javascript" src="js/jquery.main.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]><link rel="stylesheet" type="text/css" href="css/ie.css" /><![endif]-->
</head>
<body>
	<div id="wrapper">
		<div id="content">
			<div class="c1">
				<div class="controls">
					<nav class="links">
						<ul>
							<li ><a href="index1.php">Home</a></li>
						</ul>
					</nav>
					<div class="profile-box">
						<span class="profile">
							<a href="#" class="section">
								<img class="image" src="images/img1.png" alt="image description" width="26" height="26" />
								<span class="text-box">
									Welcome
									<strong class="name">Admin</strong>
								</span>
							</a>
							
						</span>
						<a href="logout.php" class="btn-on">On</a>
					</div>
				</div>
				<div class="tabs">
					<div id="tab-1" class="tab">
						<article>
							<?php 
								$sql2="SELECT * from user ";
 								$result2 = mysqli_query($conn, $sql2);

				               if (mysqli_num_rows($result2) > 0) {
				                 // output data of each row
				                    echo '
				                        	<div class="container">
				                        	<div class="table-responsive">
				                        	<h3>User</h3>
											  <table class="table">
												<tr>
													<th>Userid</th><th>Username</th>
													<th>Email</th><th>Password</th>
													<th>Status</th><th><a href="signup.php">Add</a></th>
														
												</tr>';
									while($row = mysqli_fetch_assoc($result2)) {
										echo '<tr>
											<td>'.$row["userid"].'</td>
											<td><a href="profile1.php?name='.$row["username"].'">'.$row["username"].'</a></td>
											<td>'.$row["email"].'</td>
											<td>'.$row["password"].'</td>										
											<td>'.$row["status"].'<a href="changestatus.php?id='.$row["userid"].'">Ch</a></td>
											<td><a href="deleteuser.php?id='.$row["userid"].'">Delete</a></td>	
										</tr>';
				                    }			
												
									echo '		  </table>
											</div>
										</div>	

				                        ';

				                    
				                } else {
				                    
				                }     
        

							?>
						</article>
					</div>
					
					<div id="tab-2" class="tab">
						<article>
						   <?php
							$sql5="SELECT * from message";
 								$result5 = mysqli_query($conn, $sql5);

				               if (mysqli_num_rows($result5) > 0) {
				                 // output data of each row
				                    echo '
				                        	<div class="container">
				                        	<div class="table-responsive">
				                        	<h3>User</h3>
											  <table class="table">
												<tr>
													<th>Name</th><th>Email</th>
													<th>Message</th><th></th>
													
														
												</tr>';
									while($row5 = mysqli_fetch_assoc($result5)) {
										echo '<tr>
											<td>'.$row5["name"].'</td>
											<td>'.$row5["email"].'</td>
											<td>'.$row5["message"].'</td>										
											<td><a href="reply.php">Reply</a></td>';
				                    }			
												
									echo '		  </table>
											</div>
										</div>	

				                        ';

				                    
				                } else {
				                    
				                }     
        

							?>
						</article>
					</div>
					

					<div id="tab-3" class="tab">
						<article>
							<?php 
								$sql1="SELECT * from post ";
 								$result1 = mysqli_query($conn, $sql1);

				               if (mysqli_num_rows($result1) > 0) {
				                 // output data of each row
				                    echo '
				                        	<div class="container">
				                        	<div class="table-responsive">
				                        	<h3>Posts</h3>
											  <table class="table">
												<tr>
													<th>Postid</th><th>Title</th>
													<th>Tag</th><th>Content</th>
													<th>Author</th><th>Likes</th>
													<th>Views</th><th><a href="post.php">Add</a></th>
													<th>Visible</th>
														
												</tr>';
									while($row = mysqli_fetch_assoc($result1)) {
										echo '<tr>
											<td>'.$row["postid"].'</td>
											<td>'.$row["title"].'</td>
											<td>'.$row["tag"].'</td>
											<td><a href="read.php?id='.$row["postid"].'">View</a></td>										
											<td>'.$row["author"].'</td>
											<td>'.$row["likes"].'</td>
											<td>'.$row["views"].'</td>
											<td><a href="deletepost.php?id='.$row["postid"].'">Delete</a></td>
											<td>'.$row["visible"].'<a href="visible.php?id='.$row["postid"].'">Ch</a></td>	
										</tr>';
				                    }			
												
									echo '		  </table>
											</div>
										</div>	

				                        ';

				                    
				                } else {
				                    
				                }     
        

							?>
						</article>
					</div>
					
					
					
				</div>
			</div>
		</div>
		<aside id="sidebar">
			<strong class="logo"><a href="#">lg</a></strong>
			<ul class="tabset buttons">
				<li class="active">
					<a href="#tab-1" class="ico1"><span>User</span><em></em></a>
					<span class="tooltip"><span>User</span></span>
				</li>
				
				<li>
					<a href="#tab-2" class="ico2"><span>Messages</span><em></em></a>
					<span class="tooltip"><span>Userprofile</span></span>
				</li>
				
				<li>
					<a href="#tab-3" class="ico3"><span>Posts</span><em></em></a>
					<span class="tooltip"><span>Posts</span></span>
				</li>
				
				
			</ul>
			<span class="shadow"></span>
		</aside>
	</div>
</body>
</html>