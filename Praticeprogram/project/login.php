<?php
session_start();
?>
<!doctype html>
<html>

<head>
<title>
USER LOGIN
</title>
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
div{
padding-left:40%;
padding-top:10%;
}
.error{
    color:red;
    font-size:15px;
}
</style>
</head>

<body>
<?php
$emailErr="";
$passwordErr="";
 if(empty($_POST['email']))
 {
    $emailErr="Email is required";
 }
 else{
    $email=$_POST['email'];
 }
 if(empty($_POST['password']))
 {
    $passwordErr="Password is required";
 }
 else{
    $password=$_POST['password'];
 }
if(isset($_POST["email"]) and isset($_POST["password"]))
{
   $email=$_POST["email"];
   $password=$_POST["password"];
   if($email!="kadam.ms@somaiya.edu" and $password=="12345")
   {
      $emailErr="Email is incorrect.";
   }
   if($email=="kadam.ms@somaiya.edu" and $password!="12345")
   {
      $passwordErr="Password is incorrect.";
   }
 if ($email=="kadam.ms@somaiya.edu" and $password=="12345")
{
   $_SESSION["email"]=$email;
   $_SESSION["password"]=$password;
     header('Location: http://localhost/Praticeprogram/project/home.php');
}
}
?>
<div>
<h1>LOGIN</h1>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" autocomplete="off">
<label><b>User id/Email id:</b></label>
<input type="Email" placeholder="Enter User id/Email id" name="email">
<br>
<span class="error"><?php echo"$emailErr"?></span><br>
<br>
<label><b>Enter password:</b></label>
<input type="password" name="password" placeholder="Enter password" name="password">
<br>
<span class="error"><?php echo"$passwordErr"?></span><br>
<br>
<button type="Submit" name="sub"><b>Login</b></button>
<br>
<br>
<a href="#">Forgot Password?</a>
<p><b>Login with:</b></p>
<button><b>Facebook</b></button>
<button><b>Google</b></button>
<br>
<br>
<p>Don't have an account?<a href="http://localhost/Praticeprogram/project/signup.php">Sign Up.</a></p>
</form>
</div>
</body>
</html>