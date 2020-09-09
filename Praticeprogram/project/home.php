<?php
session_start();
?>
<!doctype html>
<html>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<head>
<title>
USER LOGIN
</title>
<style>
/* body{
    background-color: #33ccff;
} */
button
{
border-radius:20px;
padding: 5px 10px 5px 10px;
border-color:linear-gradient(to top right, #33ccff 1%, #ff99cc 57%);
}
nav{
    background: linear-gradient(to bottom, #33ccff 0%, #3333cc 100%);
}
</style>
</head>
<body align="center" style="background-color:#33ccff">
<nav class="navbar navbar-light bg-light justify-content-between">
  <a class="navbar-brand">Gamestore</a>
  <?php
if(isset($_POST['light'])=="black")
{
session_destroy();
header('Location: http://localhost/Praticeprogram/project/login.php');
}
if(isset($_POST['product'])=="data")
{
header('Location: http://localhost/Praticeprogram/project/productdetails.php');
}
?>
  <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post">
  <button name="product" value="data">Add</button>
    <button name="light" value="black">Logout</button>
  </form>
</nav>
<h1 align="center">Welcome to home page.</h1>
<div class="col-sm-1"></div>
<div class="col-sm-10" align="center">
<?php
if(isset($_SESSION["name"])){
echo("<h4>Name:</h4>");
$name=$_SESSION["name"];
echo $name;
echo("<br/>");
}
else
{
    $name="";
}
?>
<?php
if(isset($_SESSION["gender"])){
echo("<h4>Gender:</h4>");
$gender=$_SESSION["gender"];
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
$email=$_SESSION["email"];
echo $email;
echo("<br/>");
?>
<h4>Password:</h4>
<?php
$password=$_SESSION["password"];
echo $password;
echo("<br/>");
?>
<br>
<div>
</body>
</html>
