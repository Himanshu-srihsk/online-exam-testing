<?php
session_start();
function session($category){

$_SESSION['cat']=$category;

}
//echo $_SESSION['cat'];

function totalquestions($totalquestions){
echo $totalquestions;
return $totalquestions;
}


?>