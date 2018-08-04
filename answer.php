<?php require_once("session.php"); ?>
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
<?php
//print_r ($_POST);
$answer=answer($_POST);
?>

<?php 

function answer($data)
{
mysql_connect("localhost","root","master1234");
$link=mysql_select_db("reg");
$ans=implode("",$data);
$right=0;
$wrong=0;
$no_answer=0;
$totalquestions=0;
$category=$_SESSION['cat'];

$Viewquery="select * from addquiz where category='$category' ";

$execute=mysql_query($Viewquery);
while($datarows=mysql_fetch_array($execute)){

if($datarows["answer"]== $_POST[$datarows["id"]])
{
$right++;
}
else if($_POST[$datarows["id"]]=="no_attempt"){
$no_answer++;

}
else{

$wrong++;
}
}
$totalquestions=$right+$no_answer+$wrong;
 $array=array();
 $array['right']=$right;
 $array['wrong']=$wrong;
 $array['no_answer']=$no_answer;
$array['totalquestions']=$totalquestions;
$array['attemptedquestions']=$totalquestions-$no_answer;
if($totalquestions!=0)
$array['percent']=round(($right*100)/$totalquestions,2);
return $array;
}
?>    

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<div class="col-sm-2"></div>
<div class="col-sm-8">
<br><br>

<ul class="nav nav-tabs" style="margin-left:50px">
  <li class="nav-item">
    <a class="nav-link active" href="userclass.php">Home</a>
  </li>
 
  <li class="nav-item">
    <a class="nav-link" href="#">Your Quiz</a>
  </li>
  <li >
   <a class="nav-link" href='exam.php?logout=1'>Log out</a>
   </li>
</ul>

<br><br>
  <center><h2>Your Quiz Result</h2></center>
  <br>
       
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Total No of Questions</th>
        <th><?php echo $answer['totalquestions']; ?></th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Attempted Questions</td>
        <td><?php echo $answer['attemptedquestions']; ?></td>
        
      </tr>
      <tr>
        <td>Right Answer</td>
        <td><?php echo $answer['right']; ?></td>
        
      </tr>
      <tr>
        <td>Wrong Answer</td>
        <td><?php echo $answer['wrong']; ?></td>
        
      </tr>
	   <tr>
        <td>No Answer</td>
        <td><?php echo $answer['no_answer']; ?></td>
        
      </tr>
	   <tr>
        <td>Your Result</td>
        <td><?php echo $answer['percent'].'%'; ?></td>
        
      </tr>
    </tbody>
  </table>
</div>
</div>
<div class="col-sm-2"></div>
</body>
</html>

