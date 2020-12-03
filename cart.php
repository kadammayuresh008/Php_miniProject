<?php
  session_start();
  $name = "noOfProducts";
  $val = 0;
  if(!isset($_COOKIE["noOfProducts"])){
    setcookie($GLOBALS['name'],$GLOBALS['val'],time()+(640000),"/");
  }
  else{
    $GLOBALS['val'] = $_COOKIE["noOfProducts"];
  }

  function increment(){
    $GLOBALS['val']+=1;
    setcookie($GLOBALS['name'],$GLOBALS['val'],time()+(640000),"/");
  }

  if (isset($_GET['increment'])) {
    increment();
  }

  if (isset($_GET['del'])) {
    unset($_SESSION['cart'][$_GET['del']]);
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Game Store</title>
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
    <?php if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) { ?>
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="row" style="display: flex; justify-content: space-between;">
            
                <?php for ($i=0; $i < sizeof($_SESSION['cart']); $i++){ ?>
           
                <?php
                  $mysqli = new mysqli("localhost", "root", "", "Logindetails"); 
                    
                  if($mysqli === false){ 
                      die("ERROR: Could not connect. "  
                                  . $mysqli->connect_error); 
                  } 
                  $x = $_SESSION['cart'][$i];
                  $sql = "SELECT * FROM productdetails WHERE id='$x'"; 
                  if($res = $mysqli->query($sql)){ 
                      if($res->num_rows > 0){ 

                        while($row = $res->fetch_array()){ 
                          
                          echo("<div class='card' style='width: 18rem;margin:5px'>
                          <img class='card-img-top' src='".$row['ProductImage']."' alt='Card image cap'>
                          <div class='card-body'>
                            <h5 class='card-title'>".$row['ProductName']." </h5>
                            <p class='card-text'>".substr($row['ProductDescription'],0,25).'....'."</p>
                                <p class='card-text'>"."<b>Rs.</b>".$row['ProductColor']."</p>
                          </div>
                        </div>");
                      } 


                          
                          $res->free(); 
                      } else{ 
                          echo "No matching records are found."; 
                      } 
                  } else{ 
                      echo "ERROR: Could not able to execute $sql. "  
                                                      . $mysqli->error; 
                  } 
                    
                  $mysqli->close(); 
                  ?> 

                <?php } ?>
              
            </div>
          </div>
          
          <div class="col-md-4"  style="padding-left: 30px">
            <h5>Items are:</h5>
            <?php 
            $totalAmount = 0;
            ?>
            <?php for ($i=0; $i < sizeof($_SESSION['cart']); $i++){ ?>


              <?php
$mysqli = new mysqli("localhost", "root", "", "Logindetails"); 
  
if($mysqli === false){ 
    die("ERROR: Could not connect. "  
                . $mysqli->connect_error); 
} 
$x = $_SESSION['cart'][$i];
$sql = "SELECT * FROM productdetails WHERE id='$x'"; 
if($res = $mysqli->query($sql)){ 
    if($res->num_rows > 0){ 

      while($row = $res->fetch_array()){ 
      echo('<p style="padding: 5px; background-color: #9fa4c4;background-image: linear-gradient(315deg, #9fa4c4 0%, #9e768f 74%);"> '.$row['ProductName'].' </p>');
            
      $totalAmount = $totalAmount + number_format($row['ProductColor']);

    } 


        
        $res->free(); 
    } else{ 
        echo "No matching records are found."; 
    } 
} else{ 
    echo "ERROR: Could not able to execute $sql. "  
                                    . $mysqli->error; 
} 
  
$mysqli->close(); 
?> 


            <?php } ?>

            <p>Total Amount : <?php 
            echo $totalAmount;
            ?> </p>
            <a href="http://localhost/phpCollege/PHPMiniProject/buyFromCart.php" class="btn btn-primary">Buy Now</a>
          </div>
        </div>
      </div>
    <?php } ?>

    
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>