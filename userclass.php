

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

 <style>
 
 .nav li{

font-weight:bold;
font-family:Bitter,Georgia,"Times New Roman",Times,serif;
font-size:1.2em;

}
.category{
 width: 30%;


}
.toggle{
display:none;

}
 </style>
 

 </head>
 <body>
 <h1 align="center"> <span style="font-family:Times;font-color:green">Home</span></h1>
<ul class="nav nav-tabs" style="margin-left:50px">
  <li class="nav-item">
    <a class="nav-link active" href="userclass.php">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="profile.php">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Your Quiz</a>
  </li>
  <li >
   <a class="nav-link" href='exam.php?logout=1'>Log out</a>
   </li>
</ul>
<br>
<div style="margin-left:50px;">
<h1>Quiz site Using PHP</h1>
</div>
<br><br>
<div align="center">
<button type="button" id="quiz" class="btn btn-lg btn-primary">Start Quiz</button>
</div>
<div class="toggle" align="center">
<p><br></p>

<p class="" >
Choose category
</p>
<div class="col-sm-6">
<div class="form-group">
<form method="POST" action="question.php">
<label for="categoryselect"><span class="fieldinfo">Category:</span></label>
<select class="form-control" id="categoryselect" class="category" name="cat">
<?php

mysql_connect("localhost","root","master1234");
$connectingDB=mysql_select_db("reg");

$Viewquery="select * from category order by id desc";
$execute=mysql_query($Viewquery);
while($datarows=mysql_fetch_array($execute)){
$id=$datarows["id"];
$categoryname=$datarows["category"];
?>

<option value="<?php echo $categoryname; ?>"> <?php echo $categoryname; ?></option>

<?php } ?>
</select>
<br>
<center><button type="submit" name="submit" id="log" class="btn btn-success " style="width:180px">submit</button></center>
</form>
</div>
</div>

</div>


<!--<a href="question.php?category="><button type="submit" name="submit" id="submit" class="btn btn-success " style="width:180px">Submit</button></a>-->

	 
<script>

var showing=false;
$("#quiz").click(function(){
if(showing){
$(".toggle").fadeOut(function(){
showing=false;
});
}else{
$(".toggle").fadeIn(function(){
showing=true;

});
}
});


</script>
<!--
<script>

    if("#log").click(function(event){
 event.preventDefault();
  var category=$("#categoryselect").val();
  $.ajax({
  method: "POST",
  url: "question.php",
  data: {Category:$("#categoryselect").val()}
 
})

})


</script>
-->


</body>
</html>



