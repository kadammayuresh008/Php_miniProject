<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
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
  <form class="form-inline" action="home2.php"  method="post" enctype="multipart/form-data">
  <button name="product" value="data">Add</button>
    <button name="light" value="black">Logout</button>
  </form>
</nav>
<div align="center">
<br>
<h2>Upload Product</h2>
<br>
<form action="home2.php" method="Post" enctype="multipart/form-data">
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
<label><b>The type of device required to play</b></label>
<br>
<br>
<input type="checkbox" id="vehicle1" name="vehicle[]" value="Phone"><b>Phone</b></input>
  <input type="checkbox" id="vehicle2" name="vehicle[]" value="Pc"><b>Pc</b></input>
  <input type="checkbox" id="vehicle3" name="vehicle[]" value="Laptop"><b>Laptop</b></input>
  <br><br>
  <b>Select image to upload:</b>
  <br>
  <input type="file" name="fileToUpload" id="fileToUpload">
  <br>
  <input type="submit" value="Upload Image" name="submit">
</form>
<br>
<div>
<body>
</html>