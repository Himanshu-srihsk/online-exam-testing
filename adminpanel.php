<!DOCTYPE html>
<html lang="en">
<html>
<head>
<title>
Admin Dashboard
</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
 <link rel="stylesheet" href="css/adminstyles1.css">
 <style>
 .navbar-nav li{

font-weight:bold;
font-family:Bitter,Georgia,"Times New Roman",Times,serif;
font-size:1.2em;

}
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #563D7C;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

.topnav-right {
  float: right;
}
h4{
color: #f2f2f2;
position: absolute;
    margin:auto ;
}

 </style>
 </head>
<body>
<div class="line" style="height:10px; margin-top:-1px; background:#27aae1;"></div>
<div class="topnav">

<h4 style="text-align:center; margin-top:15px;" >Welcome admin</h4>
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="sr-only">Toggle Navigation</span>
	<span class="navbar-toggler-icon"></span>
  </button>
  <div class="topnav-right" id="navbarNav">
    <a href="adminpanel.php">Home</a>
    <a href="#about">Logout</a>
  </div>
</div>
<div class="line" style="height:10px; margin-top:-1px; background:#27aae1;"></div>


<div class="container-fluid">
<div class="row">
<div class="col-sm-2">

<br><br>
<nav class="nav nav-pills nav-stacked nav-responsive">
  <ul id="side-menu">
  <a class="nav-link active" href="adminpanel.php">
  <i class="fas fa-address-book"></i>&nbsp;overview</a>
  <a class="nav-link " href="addcategory.php"><i class="fab fa-contao"></i>&nbsp;Add new Category</a>
   <a class="nav-link" href="addquestion.php"><i class="fab fa-adn"></i>&nbsp;Add new Quiz</a>
    <a class="nav-link" href="deletecategory.php"><i class="fa fa-anchor"></i>&nbsp;Delete category</a>
</ul>
	 </nav>
</div>
<br><br>
<div class="col-sm-10">
<h1>This is Admin Panel Page</h1>

</div>
</div>
</div>
<div id="footer">
 <hr style=" background-color: red; ">
<p> Admin Panel</p>
	 </p>
	  <hr style=" background-color: red; ">
</div>
<div style="background-color:#27AAE1; height:10px;"></div>
</body>
</html>