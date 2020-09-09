<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<style>
body{
    background: linear-gradient(to bottom, #33ccff 0%, #3333cc 100%);
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
<div>
<br>
<br>
<div class="row">
<div class="col-sm-2"></div>
<div class="col-sm-10">
<h2>Product details</h2>
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="image.jpeg" alt="Card image cap">
  <div class="card-body">
  <?php
if(!isset($_COOKIE['Mobile'])) {
  echo "<h5>Product type</h5>";
  echo $_COOKIE['Mobile'];
  echo "<br/>";
} else {
  echo "<h5>Product type</h5>";
  echo  $_COOKIE['Mobile'];
  echo "<br/>";
}
if(!isset($_COOKIE['Mobilename'])) {
  echo "<h5>Product name</h5>";
  echo  $_COOKIE['Mobilename'];
  echo "<br/>";
} else {
  echo "<h5>Product name</h5>";
  echo  $_COOKIE['Mobilename'] ;
  echo "<br/>";
}
if(!isset($_COOKIE['color'])) {
  echo "<h5>Product color</h5>";
    echo  $_COOKIE['color'];
    echo "<br/>";
  } else {
    echo "<h5>Product color</h5>";
    echo $_COOKIE['color'];
    echo "<br/>";
  }
?>
</div>
</div>
</div>
</div>
</div>
</body>
</html>