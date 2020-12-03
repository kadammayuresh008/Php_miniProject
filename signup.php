<?php
// ************************************create database*************************************
  // $servername = "localhost";
  // $username = "root";
  // $password = "";
  // $conn = mysqli_connect($servername, $username, $password);
  // if (!$conn) {
  //   die("Connection failed: " . mysqli_connect_error());
  // }
  // echo "Connected successfully";
  // // Create database
  // $sql = "CREATE DATABASE Logindetails";

  // $conn->close();
  
// ************************************create user table*************************************
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "Logindetails";
// $conn = new mysqli($servername, $username, $password, $dbname);
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

// // sql to create table
// $sql = "CREATE TABLE userdetails (
// id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// Name VARCHAR(30) NOT NULL,
// Email VARCHAR(50),
// Gender VARCHAR(30),
// Password VARCHAR(30),
// reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// )";

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }


// $conn->close();

  session_start();
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <title>signup</title>
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

    .error {
      color: red;
      font-size: 15px;
      margin-left: 10%;
    }

    select {
      border-radius: 20px;
      border: solid 2px;
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
                $passwordform = $_POST['password'];
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
                if (empty( $passwordform)){
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
                if($passwordform!=$conpassword){
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
                if ($passwordform==$conpassword)
                {
                    $_SESSION["email"]=$email;
                    $_SESSION["password"]=$passwordform;
                    $_SESSION["name"]=$name;
                    $_SESSION["gender"]=$gender;
                     //********************************************insert query********************************** 
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "Logindetails";
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                          die("Connection failed: " . $conn->connect_error);
                        }
                        $encrypt_password= password_hash($passwordform,PASSWORD_DEFAULT);
                        $sql="INSERT INTO userdetails (Name, Email , Gender,Password)
                        VALUES ('".$name."','".$email."','" .$gender."','".$encrypt_password."')";

                        if ($conn->query($sql) === TRUE) {
                          echo "New record created successfully";
                          echo '<div class="alert alert-success">User has been created.</div>';
                          $conn->close();
                          header('Location: http://localhost/phpCollege/PHPMiniProject/login.php?');
                        } else {
                          echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                        // $sql="insert into userdetails (Name, Email , Gender,Password)VALUES(?,?,?,?)";
                        // $pst=mysqli_prepare($conn,$sql);
                        // $encrypt_password= password_hash($passwordform,PASSWORD_DEFAULT);
                        // mysqli_stmt_bind_param($pst,"ssss",$name,$email,$gender,$encrypt_password);
                        // mysqli_stmt_execute($pst);
                        // $getResult=mysqli_stmt_get_result($pst);
                        // $conn->close();
                        // echo '<div class="alert alert-success">User has been created.</div>';
                        // $conn->close();
                        // header('Location: http://localhost/phpCollege/PHPMiniProject/login.php?');

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
        <input type="password" name="password" placeholder="Enter password">
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
        <p>Having an account?<a href="http://localhost/phpCollege/PHPMiniProject/login.php">Login</a></p>
      </form>
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
  </script>
</body>

</html>