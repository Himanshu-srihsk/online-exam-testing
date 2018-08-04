<?php

if (array_key_exists("submit", $_POST)) {
mysql_connect("localhost","root","master1234");
$link=mysql_select_db("reg");
if(mysqli_connect_error()){
die("there was an error connecting to database");
}
if(!$_POST['question'] || !$_POST['option1']|| !$_POST['option2'] || !$_POST['option3'] || !$_POST['option4'] || !$_POST['answer'] || !$_POST['category']){
$error .= "All field is needed <br>";
}
if ($error == "") {
		
     $question=mysql_real_escape_string($_POST['question']); 
$option1=mysql_real_escape_string($_POST['option1']); 
$option2=mysql_real_escape_string($_POST['option2']); 
$option3=mysql_real_escape_string($_POST['option3']); 
$option4=mysql_real_escape_string($_POST['option4']); 
$answer=mysql_real_escape_string($_POST['answer']); 
$category=mysql_real_escape_string($_POST['category']); 	 
       $query = "INSERT INTO addquiz(question,option1,option2,option3,option4,answer,category) VALUES ('$question','$option1','$option2','$option3','$option4','$answer','$category')";
		if (!mysql_query($query)) {

                        $error = "<p>Could not sign you up - please try again later.</p>";

                    }
                 else{$success="QUESTION added successfully ";}					
            
        }




}





?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>
<title>
Add new question
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
  <a class="nav-link " href="adminpanel.php">
  <i class="fas fa-address-book"></i>&nbsp;overview</a>
  <a class="nav-link " href="addcategory.php"><i class="fab fa-contao"></i>&nbsp;Add new Category</a>
   <a class="nav-link active" href="#"><i class="fab fa-adn"></i>&nbsp;Add new Quiz</a>
    <a class="nav-link" href="deletecategory.php"><i class="fa fa-anchor"></i>&nbsp;Delete category</a>
</ul>
	 </nav>
</div>
<div class="col-sm-10">
<h1 align="center" style="margin-top:35px;">Add Quiz Form</h1>
<div class="error">
<?php
   if($error!=""){
   echo '<div class="alert alert-warning alert-dismissible fade show " role="alert">'.$error.'<button type="button" class="close" data-dismiss="alert">&times;</button></div>'; }
   
   if($success!=""){
   echo '<div class="alert alert-success alert-dismissible fade show " role="alert">'.$success.'<button type="button" class="close" data-dismiss="alert">&times;</button></div>'; }
   ?>
   </div>
<br>
<form method="post">
<fieldset>
  <div class="form-group">
    <label for="title"><span class="fieldinfo">Question:</span></label>
    <input type="text" class="form-control" name="question" id="question" placeholder="Add Question">
	<label for="title"><span class="fieldinfo">Option1:</span></label>
    <input type="text" class="form-control" name="option1" id="option1" >
	<label for="title"><span class="fieldinfo">Option2:</span></label>
    <input type="text" class="form-control" name="option2" id="option2" >
	<label for="title"><span class="fieldinfo">Option3:</span></label>
    <input type="text" class="form-control" name="option3" id="option3" >
	<label for="title"><span class="fieldinfo">Option4:</span></label>
    <input type="text" class="form-control" name="option4" id="option4" >
	<label for="title"><span class="fieldinfo">Answer:</span></label>
    <input type="text" class="form-control" name="answer" id="answer" placeholder="Answer to the Question">
	</div>
	
	 <div class="form-group">
<label for="categoryselect"><span class="fieldinfo">Category:</span></label>
<select class="form-control" id="categoryselect" name="category">
<?php

mysql_connect("localhost","root","master1234");
$connectingDB=mysql_select_db("reg");

$Viewquery="select * from category order by id desc";
$execute=mysql_query($Viewquery);
while($datarows=mysql_fetch_array($execute)){
$id=$datarows["id"];
$categoryname=$datarows["category"];
?>
<option><?php echo $categoryname; ?></option>


<?php } ?>
</select>
</div>

	<br>
	<p style=" text-align: center;"><button type="submit" name="submit" class="btn btn-success " style="width:180px">Submit</button></p>
  </div>
</fieldset>

</form>
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