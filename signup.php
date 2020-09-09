<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>signup</title>
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
            <li class="nav-item">
              <a class="nav-link" href="#">
                <?php
                  if(isset($_COOKIE["noOfProducts"])){
                    echo $_COOKIE["noOfProducts"];
                  }
                ?>
              </a>
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
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" >Search</button>
          </form>
        </div>
      </nav>
    <div class="container center">
        <br>
        <div class="head" style="background-color :#20bf55;
        background-image :linear-gradient(315deg, #20bf55 0%, #01baef 74%);padding: 10px;border-radius: 7px;
        ">
            <h4>Signup Here</h4>
        </div>
        <br>
        <?php
            if (isset($_POST['name']) & $_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $confPassword = $_POST['confPassword'];
                if (empty( $name)){
                  $nameErr = "Name is required";
                }
                else{
                  $nameErr = "";
                }

                if (empty( $email)){
                  $emailErr = "email is required";
                }
                else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                  $emailErr = "Invalid email";
                }
                else{
                  $emailErr="";
                }

                if (empty( $password)){
                  $passwordErr = "password is required";
                }
                else if(strlen($password)<2){
                  $passwordErr = "weak password";
                }
                else{
                  $passwordErr = "";
                }
                if($password!=$confPassword){
                  $confPasswordErr = "password should be same";
                }
                else{
                  $confPasswordErr = "";
                }

                if($nameErr=="" && $emailErr=="" && $passwordErr=="" && $confPasswordErr=="") {
                  header("Location: http://localhost/phpCollege/gameStore/index.php?name=".$name.'&password='.$password);
                }
            }
        ?>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
            <div class="form-group">
                <label for="formGroupExampleInput">Name</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="name">
                <span class="error"><?php 
                 if(isset($_POST['name'])) echo "*"."$nameErr";
                  ?>
                </span>
              </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" 
              id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
              <span class="error"><?php 
                 if(isset($_POST['email']))echo "*"."$emailErr";
                  ?>
                </span>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" name="password">
              <span class="error"><?php 
                if(isset($_POST['password'])) echo "*"."$passwordErr";
                  ?>
                </span>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Conform Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="confPassword">
                <span class="error"><?php 
                  if(isset($_POST['confPassword'])) echo "*"."$confPasswordErr";
                  ?>
                </span>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>