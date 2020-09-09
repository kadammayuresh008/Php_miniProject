<?php
$name="color";
$value="black";
setcookie($name,$value,time()+(86400),"/");
$type_name="Mobile";
$type_value="Android";
setcookie($type_name,$type_value,time()+(86400),"/");
$name_name="Mobilename";
$name_value="Redmi8A";
setcookie($name_name,$name_value,time()+(86400),"/");
?>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<style>
body{
    background: linear-gradient(to bottom, #33ccff 0%, #3333cc 100%);
 height:100%;
 width:100%;
}
input{
border-radius:20px;
padding: 10px 10px 10px 10px;
}
button
{
border-radius:20px;
padding: 5px 10px 5px 10px;
border-color:linear-gradient(to top right, #33ccff 1%, #ff99cc 57%);
}
nav{
    /* background: linear-gradient(to bottom, #33ccff 0%, #3333cc 100%); */
}
</style>
<body>
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
<?php
if(isset($_POST['Name']))
{
    $name_name="Mobilename";
    $name_value=$_POST['Name'];
    setcookie($name_name,$name_value,time()+(86400),"/");
}
if(isset($_POST['type']))
{
    $type_name="Mobile";
    $type_value=$_POST['type'];
    setcookie($type_name,$type_value,time()+(86400),"/");
}
if(isset($_POST['color']))
{
    $type_name="color";
    $type_value=$_POST['color'];
    setcookie($type_name,$type_value,time()+(86400),"/");
}
if(isset($_POST['Name']) and isset($_POST['type']) and isset($_POST['color']))
{
    header('Location: http://localhost/Praticeprogram/project/home2.php?');
}
?>
<div align="center">
<br>
<h2>Upload Product</h2>
<br>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="Post">
<label><b>Product type</b></label>
<input type="text" placeholder="Enter Type" name="type">
<br>
<br>
<label><b>Product Name</b></label>
<input type="text" placeholder="Enter Name" name="Name">
<br>
<br>
<label><b>Product Color</b></label>
<input type="text" placeholder="Enter Color" name="color">
<br>
<br>
<button type="Submit" name="light" value="black"><b>Upload</b></button>
</form>
<br>
<div>
<body>
</html>