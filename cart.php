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
      .bg-light{
   background-color: #eec0c6;
  background-image: linear-gradient(315deg, #eec0c6 0%, #7ee8fa 74%);

      }
    </style>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="./">Game Store</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="./signup.php">Sign Up <span class="sr-only">(current)</span></a>
            </li>            
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
          <a class="nav-link" href="#">
                <?php
                  if(isset($_COOKIE["noOfProducts"])){
                    echo $_COOKIE["noOfProducts"];
                  }
                ?>
            </a>
          <a style="margin-right: 10px; color: black;" href="#">CART</a>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" >Search</button>
          </form>
        </div>
      </nav>

    <br>
    <div class="container">
        <div class="row" style="display: flex; justify-content: space-between;">
            <?php for ($i=0; $i < sizeof($_SESSION['cart']); $i++){ ?>
            <div class="card" style="width: 18rem;">
               <img class="card-img-top" src="./fortnite.jpg" alt="Card image cap">
               <div class="card-body">
                 <h5 class="card-title">Fortnite</h5>
                 <p> <?php echo $_SESSION['cart'][$i] ?></p>
                 <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                 <a href="#" class="btn btn-primary">Buy</a>
               </div>
            </div>
             <?php } ?>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>