<?php
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>signup</title>
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
padding: 10px 10px 10px 10px;
border-color:linear-gradient(to top right, #33ccff 1%, #ff99cc 57%);
}
.error{
    color:red;
    font-size:15px;
    margin-left:10%;
}
select{
border-radius:20px;
border:solid 2px;
padding: 10px 105px 10px 10px;
}
</style>
  </head>
  <body>

    <div align="center">
        <?php 
        $nameErr="";
        $emailErr="";
        $passwordErr="";
        $conpasswordErr="";
        $genderErr="";
            if (isset($_POST['name']) & $_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $gender= $_POST['gender'];
                $password = $_POST['password'];
                $conpassword = $_POST['conpassword'];
                if (empty( $name)){
                  $nameErr = "Name is required";
                }
                else{
                  $nameErr = "";
                }
                if (empty( $email)){
                  $emailErr = "email is required";
                }
                else{
                  $emailErr = "";
                }
                if (empty( $password)){
                  $passwordErr = "password is required";
                }
                else{
                  $passwordErr = "";
                }
                if (empty( $conpassword)){
                    $conpasswordErr = "confirm password is required";
                  }
                  else{
                    $conpasswordErr = "";
                  }
                if($password!=$conpassword){
                  $conpasswordErr = "password should be same";
                }
                else{
                  $conpasswordErr = " ";
                }
                if($gender!="Male" and $gender!="Female" and $gender!="Other")
                  {
                    $genderErr= "Gender not selected";
                  }
                  else{
                    $genderErr = " ";
                }
                if ($email=="kadam.ms@somaiya.edu" and $password=="12345" and $password==$conpassword and $name=="Mayuresh")
                {
                    $_SESSION["email"]=$email;
                    $_SESSION["password"]=$password;
                    $_SESSION["name"]=$name;
                    $_SESSION["gender"]=$gender;
                     header('Location: http://localhost/Praticeprogram/project/home.php?');
                }
            }
        ?>
        <div>
        <br>
        <br>
<h1>Signup</h1>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" autocomplete="on">
<label><b>Name</b></label>
<br>
<input type="Text" placeholder="Enter name" name="name">
<br>
<span class="error"><?php echo"$nameErr"?></span>
<br>
<label><b>User id/Email id:</b></label>
<br>
<input type="Email" placeholder="Enter User id/Email id" name="email">
<br>
<span class="error"><?php echo"$emailErr"?></span>
<br>
<label for="gender"><b>Choose Gender:</b></label>
<br>
<select name="gender">
  <option value="Male">Male</option>
  <option value="Female">Female</option>
  <option value="Other">Other</option>
</select>
<br>
<span class="error"><?php echo"$genderErr"?></span>
<br>
<label><b>Enter password:</b></label>
<br>
<input type="password" name="password" placeholder="Enter password" >
<br>
<span class="error"><?php echo"$passwordErr"?></span>
<br>
<label><b>Confirm password:</b></label>
<br>
<input type="password" name="conpassword" placeholder="Confirm password">
<br>
<span class="error"><?php echo"$conpasswordErr"?></span><br>
<br>
<button type="Submit" name="sub"><b>Sign up</b></button>
<br>
<br>
<br>
<p>Having an account?<a href="http://localhost/Praticeprogram/project/login.php">Login</a></p>
</form>
</div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>