<?php


session_start();
$error = "";  

if (array_key_exists("logout", $_GET)) {
        
        unset($_SESSION);
        setcookie("id", "", time() - 60*60);
        $_COOKIE["id"] = "";  
        
        session_destroy();
        
    }
	else if(array_key_exists("id", $_SESSION) or (array_key_exists("id", $_COOKIE))){
	
	header('Location:userclass.php');
	}



 if (array_key_exists("submit", $_POST)) {
mysql_connect("localhost","root","master1234");
$link=mysql_select_db("reg");
if(mysqli_connect_error()){
die("there was an error connecting to database");
}
if(!$_POST['email']){
$error .= "An email address is required<br>";
}
 if (!$_POST['password']) {
            
            $error .= "A password is required<br>";
            
        } 
		if (!$_POST['name'] and $_POST['signUp'] == '1') {
            
            $error .= "name field is required<br>";
            
        }
		
		if ($error != "") {
		
            
            $error = "<p>There were error(s) in your form:</p>".$error;
            
        }else{
		$email=mysql_real_escape_string($_POST['email']);
		$password=mysql_real_escape_string($_POST['password']);
		if ($_POST['signUp'] == '1') {
		$name=mysql_real_escape_string($_POST['name']);
		
		
		
		$image=$_FILES["image"]["name"];
$tmp_name=$_FILES["image"]["tmp_name"];
$path="Upload/".$image;
		move_uploaded_file($tmp_name,$path);
		$query = "SELECT id FROM `quiz` WHERE email = '$email' LIMIT 1";
		 $result = mysql_query($query);
		 if(mysql_num_rows($result)>0){
		  $error = "That email address is taken.";
		 }
		 else{
		$query = "INSERT INTO quiz (name,email,pass,img) VALUES ('$name','$email','$password','$image')";
		if (!mysql_query($query)) {

                        $error = "<p>Could not sign you up - please try again later.</p>";

                    }
					else{
					$query = "UPDATE `quiz` SET pass = '".md5(md5(mysql_insert_id()).$_POST['password'])."' WHERE id = ".mysql_insert_id()." LIMIT 1";
					$id = mysql_insert_id();
                        
				
                       mysql_query($query);
						$_SESSION['id'] = $id;
						if ($_POST['stayloggedin'] == '1') {

                            setcookie("id", $id, time() + 60*60*24*365);

                        }
						header("Location:userclass.php");
					}
		}
		 
		}else{
		
		
		
		$query = "SELECT * FROM `quiz` WHERE email = '$email'";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		if (isset($row)) {
		$hashedPassword = md5(md5($row['id']).$_POST['password']);
		if ($hashedPassword == $row['pass']) {
		$_SESSION['id'] = $row['id'];
		if (isset($_POST['stayloggedin']) AND $_POST['stayloggedin'] == '1') {

                                setcookie("id", $row['id'], time() + 60*60*24*365);

                            } 

                            header("Location: userclass.php");
		
		}
		else {
                            
                            $error = "That email/password combination could not be found.";
                            
                        }
		}
		else {
                        
                        $error = "That email/password combination could not be found.";
                        
                    }
		
		
		}
		}
 



}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<br>
<br>
<div class="container">
  <div class="row">
  <div class="col-sm-12">
<div class="panel panel-danger">
      <div class="panel-heading">online Quiz system in php</div>
      <div class="panel-body">Quiz in php</div>
    </div>
	</div>
	</div>
	</div>
	
<div id="error">
   
   <?php if($error!=""){
   
   echo '<div class="alert alert-danger"role="alert">'.$error.'</div>'; }?></div>
   
<div class="container">
  <div class="row">
     <div class="col-sm-6">
<div class="panel panel-info">
  <div class="panel-heading">Login Form</div>
  <div class="panel-body"> 
  <form role="form" method="post">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd"  name="password" placeholder="Enter password">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="stayloggedin" value=1>Remember me</label>
    </div>
	<fieldset class="form-group">
    <input type="hidden" name="signUp" value="0">
	</fieldset>
    <button type="submit" name="submit" class="btn btn-default">Submit</button>
  </form>
  </div>
</div>
</div>
 <div class="col-sm-6">
<div class="panel panel-info">
  <div class="panel-heading">Signup Form</div>
  <div class="panel-body">
  <form role="form" method="post"  enctype="multipart/form-data">
  <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
    </div>
	<div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
    </div>
    
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
    </div>
	<div class="form-group">
      <label for="">Upload your image</label>
      <input type="file" class="form-control" name="image" id="file">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="stayloggedin" value=1> Remember me</label>
    </div>
	<fieldset class="form-group">
    <input type="hidden" name="signUp" value="1">
	</fieldset>
    <button type="submit" name="submit" class="btn btn-default">Submit</button>
  </form>
  </div>
</div>
</div>
</div>
</div>


</body>
</html>