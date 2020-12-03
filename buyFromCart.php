<?php
  session_start();
  unset($_SESSION["cart"])
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Receipt</title>
</head>
<body>
<style>
      /* .bg-light{
   background-color: #eec0c6;
  background-image: linear-gradient(315deg, #eec0c6 0%, #7ee8fa 74%);

      } */
      button
{
border-radius:20px;
padding: 5px 10px 5px 10px;
border-color:linear-gradient(to top right, #33ccff 1%, #ff99cc 57%);
}
nav
{
    background: linear-gradient(to bottom, #33ccff 0%, #3333cc 100%);
}
    </style>

<nav class="navbar navbar-light bg-light justify-content-between">
  <a class="navbar-brand" href="./home.php">Gamestore</a>
  <?php
if(isset($_POST['light'])=="black")
{
session_destroy();
header('Location: http://localhost/phpCollege/PHPMiniProject/login.php');
}
if(isset($_POST['light'])=="purple")
{
session_destroy();
header('Location: http://localhost/phpCollege/PHPMiniProject/signup.php');
}
if(isset($_POST['product'])=="data")
{
header('Location: http://localhost/phpCollege/PHPMiniProject/productdetails.php');
}
?>

  <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post">
  <div>
  <?php
if(isset($_SESSION["name"])){
$name=$_SESSION["name"];
echo ("<b>$name</b>");
echo('
</div>
  <button name="product" value="data">Add</button>
    <button name="light" value="black">Logout</button>
    ');
}
else
{
    $name="";
    echo('
</div>
    <button name="light" value="black">Login</button>
    <button name="light" value="purple">signup</button>
    ');
}
?>
  
  <button name="product" value="data">
  <a style="margin-right: 10px; color: black;" href="./cart.php">CART</a></button>
  </form>
</nav>

<br>
    <div class="container">
    
    <h2 style="margin-left:18%">Thanks for buying. Visit again.</h2>



    
    </div>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>