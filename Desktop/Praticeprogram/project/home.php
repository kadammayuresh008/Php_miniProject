<!-- <?php
$email=$_GET["email"];
$password=$_GET["password"];
echo $email;
echo("<br/>");
echo $password;
echo("<br/>");
?> -->


<!doctype html>
<html>

<head>
<title>
USER LOGIN
</title>
<style>
body{
    background-color: #33ccff;
}
</style>
</head>
<body align="center">
<h1 align="center">Welcome to home page.</h1>
<?php
if(isset($_GET["name"])){
echo("<h4>Name:</h4>");
$name=$_GET["name"];
echo $name;
echo("<br/>");
}
else
{
    $name="";
}
?>
<?php
if(isset($_GET["gender"])){
echo("<h4>Gender:</h4>");
$gender=$_GET["gender"];
echo $gender;
echo("<br/>");
}
else
{
    $gender="";
}
?>
<h4>Email:</h4>
<?php
$email=$_GET["email"];
echo $email;
echo("<br/>");
?>
<h4>Password:</h4>
<?php
$password=$_GET["password"];
echo $password;
echo("<br/>");
?>
</body>
</html>
