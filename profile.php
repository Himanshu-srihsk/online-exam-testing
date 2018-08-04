


<?php

    session_start();
   

    if (array_key_exists("id", $_COOKIE) && $_COOKIE ['id']) {
        
        $_SESSION['id'] = $_COOKIE['id'];
        
    }

    if (array_key_exists("id", $_SESSION)) {
              
      mysql_connect("localhost","root","master1234");
$link=mysql_select_db("reg");
if(mysqli_connect_error()){
die("there was an error connecting to database");
}
      
      
      
    } else {
        
        header("Location:exam.php");
        
    }


?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>
<title>
User Class
</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

 <style>
 
 .nav li{

font-weight:bold;
font-family:Bitter,Georgia,"Times New Roman",Times,serif;
font-size:1.2em;

}

 </style>
 </head>
 <body>
 <h1 align="center"> <span style="font-family:Times;font-color:green ">Home</span></h1>
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="sr-only">Toggle Navigation</span>
	<span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
<ul class="nav nav-tabs" style="margin-left:100px">
  <li class="nav-item">
    <a class="nav-link " href="userclass.php">Home</a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link active" href="profile.php">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Your Quiz</a>
  </li>
  <li >
   <a class="nav-link" href='exam.php?logout=1'>Log out</a>
   </li>
</ul>
</div>
</nav>
<h1> <span style="font-family:Times;font-color:green; margin-left:100px">Profile</span></h1>
<div class="table-responsive">
<table class="table table-striped table-hover">
<tr>
<th>id</th>
<th>Name</th>
<th>Email</th>
<th>Image</th>
</tr>
<?php
mysql_connect("localhost","root","master1234");
$link=mysql_select_db("reg");
$id=$_SESSION['id'];
$Viewquery="select * from quiz where id=$id";
$execute=mysql_query($Viewquery);
while($datarows=mysql_fetch_array($execute)){
$name=$datarows["name"];
$email=$datarows["email"];
$image=$datarows["img"];
?>
<tr>
<td><?php echo $id ?></td>
<td><?php echo $name; ?></td>
<td><?php echo $email; ?></td>
<td> <img src="Upload/<?php echo $image; ?>" width="200px"; height="100px";</td>
</tr>
<?php } ?>
</table>
</div>
</body>
</html>



