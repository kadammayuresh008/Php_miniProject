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
      body {
         background: linear-gradient(to bottom, #33ccff 0%, #3333cc 100%);
         height: 100%;
         width: 100%;
      }

      input {
         border-radius: 20px;
         padding: 10px 10px 10px 10px;
      }

      button {
         border-radius: 20px;
         padding: 10px 10px 10px 10px;
         border-color: linear-gradient(to top right, #33ccff 1%, #ff99cc 57%);
      }

      div {
         padding-left: 40%;
         padding-top: 10%;
      }

      .error {
         color: red;
         font-size: 15px;
      }
   </style>
</head>

<body>
   <?php
$emailErr="";
$passwordErr="";
$valid = true;
if(isset($_POST["email"]) and isset($_POST["password"]))
{
   if(empty($_POST['email']))
   {
      $emailErr="Email is required";
      $valid= false;
   }
   else{
      $email=$_POST['email'];
   }
   if(empty($_POST['password']))
   {
      $valid= false;
      $passwordErr="Password is required";
   }
   else{
      $password=$_POST['password'];
   }
   if(valid){
      $email=$_POST["email"];
   $passwordform=$_POST["password"];
   //********************************************Search query********************************** 
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "Logindetails";
   $conn = new mysqli($servername, $username, $password, $dbname);
   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
   }
   $sql="SELECT * FROM userdetails where Email='".$_POST['email']."'";
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
         $encrypt_password= password_hash($passwordform,PASSWORD_DEFAULT);
         if (password_verify($passwordform,$row["Password"])){
            $_SESSION["email"]=$row["Email"];
            $_SESSION["password"]=$row["Password"];
            $_SESSION["name"]=$row["Name"];
            $_SESSION["gender"]=$row["Gender"];
            header('Location: http://localhost/phpCollege/PHPMiniProject/home.php');
         }
         else{
            echo '<script>alert("Password incorrect")</script>'; 
         }
      }   
  }
} 
else {
  echo '<script>alert("Invalid credentials")</script>';
}
$conn->close();
}
?>
   <div>
      <h1>LOGIN</h1>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" autocomplete="off">
         <label><b>User id/Email id:</b></label>
         <input type="Email" placeholder="Enter Email id" name="email">
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
         <p>Don't have an account?<a href="http://localhost/phpCollege/PHPMiniProject/signup.php">Sign Up</a></p>
      </form>
   </div>
</body>

</html>