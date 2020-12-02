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
nav
{
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
if(isset($_POST['light'])=="purple")
{
session_destroy();
header('Location: http://localhost/Praticeprogram/project/signup.php');
}
if(isset($_POST['product'])=="data")
{
header('Location: http://localhost/Praticeprogram/project/productdetails.php');
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
  </form>
</nav>
<br>
<div class="container">
 <!-- carousel starts here -->
 <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="./fortnite.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="./remant.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="./fortnite.jpg" alt="third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <!-- carousel ends here -->

        <br>
    <?php 
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "Logindetails";
      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
      }
      $sql="SELECT * FROM productdetails";
      $result1 = $conn->query($sql);
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
      $row=$result->fetch_all();
      $count=count($row);
      $x1=$count/3;
      $counter=0;
      $result = $conn->query($sql);
      echo("
      <h2 align='center'>Recent games</h2>
      <br>");
      echo('<div class="container col-sm-10">
      <div class="row" style="display: flex;">');
      for($i=0;$i<$count;$i++)
      {
        $counter+=1;
        $row = $result->fetch_assoc();
        echo('
          <div class="card" style="width: 18rem;height:22rem;margin-left:10px;margin-right:10px;">
            <img class="card-img-top" src="'.substr($row["ProductImage"],0,strlen($row["ProductImage"])-5).substr($row["ProductImage"],strlen($row["ProductImage"])-4).'" alt="Card image cap" style="width: 18rem;height:10rem">
            <div class="card-body">
              <h5 class="card-title">'.$row["ProductName"].'</h5>
              <p class="card-text">'.substr($row['ProductDescription'],0,25).'....'.'</p>
              <p class="card-text">'."<b>Rs.</b>".$row["ProductColor"].'</p>
              <a href="http://localhost/Praticeprogram/project/buy.php?id='.$row["id"].'" class="btn btn-primary">Buy</a>
              <a href="#">
                <button type="button" class="btn btn-secondary">Add to Cart</button>
              </a>
            </div>
          </div>
        ');
        if($counter==3)
        {
          echo('</div>
          <div class="py-3"></div>
          <div class="row" style="display: flex;">
          ');
          $counter=0;
        }
      }
      echo('</div>
      </div>
      ');
   } ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


</div></body>
</html>
