<?php
$mail_id=$_POST["email"];
$password=$_POST["password"];
if ($mail_id=="kadam123.ms@somaiya.edu")
{
  if($password=="12345"){
    header('Location:http://localhost/Pratice%20program/project/home.php');
  }
  else{
    header('Location:http://localhost/Pratice%20program/project/login.php'); 
}
}
else{
    header('Location:http://localhost/Pratice%20program/project/login.php'); 
}
echo "$mail_id";
echo("<br/>");
?>