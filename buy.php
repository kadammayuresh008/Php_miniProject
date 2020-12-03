<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Buy</title>
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
  </head>
  <body>
  <nav class="navbar navbar-light bg-light justify-content-between">
  <a class="navbar-brand">Gamestore</a>
  <?php
if(isset($_POST['light'])=="black")
{
    header('Location: http://localhost/phpCollege/PHPMiniProject/home.php');
}
if(isset($_POST['product'])=="data")
{
header('Location: http://localhost/phpCollege/PHPMiniProject/productdetails.php');
}
?>
  <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post">
  <button name="product" value="data">Add</button>
    <button name="light" value="black">Buy more</button>
  </form>
</nav>
  <?php 
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "Logindetails";
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  }
  $ide=$_GET['id'];
  $sql="SELECT * FROM productdetails WHERE id=$ide";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo '
      <div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-6">
<br>
<h2 style="margin-left:18%">Thanks for buying. Visit again.</h2>
<div class="card" style="width: 40rem;padding-left:10%;" >
<br>
<h2>Receipt</h2>
<img src='.$row["ProductImage"].' alt="Image not found." style="width:280px; height:200px;">
<h5>Product Name</h5>
<p>'.$row["ProductName"].'</p>
<h5>Product Type</h5>
<p>'.$row["ProductType"].'</p>
<h5>Product Cost</h5>
<p>'."Rs.".$row["ProductColor"].'</p>
<button name="reciept" value="data" style="width:20%;background:red;">Download</button>
<br>
</div>
</div>
</div>
';
    }
  }
  $conn->close();
  ?>
  <br>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>