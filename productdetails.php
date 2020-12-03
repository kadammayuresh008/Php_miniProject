<?php 
// // ************************************create Product table*************************************
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "Logindetails";
// $conn = new mysqli($servername, $username, $password, $dbname);
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }


// // // sql to create table
// $sql = "CREATE TABLE productdetails (
// id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// UserName VARCHAR(30) NOT NULL,
// ProductType VARCHAR(30) NOT NULL,
// ProductName VARCHAR(30) NOT NULL,
// ProductColor VARCHAR(30) NOT NULL,
// ProductDescription VARCHAR(30) NOT NULL,
// ProductImage longtext NOT NULL,
// reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// )";

// if ($conn->query($sql) === TRUE) {
//   echo "Table Productdetails created successfully";
// } else {
//   echo "Error creating table: " . $conn->error;
// }

// $conn->close();
session_start();
?>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
  integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<style>
  body {
    background: linear-gradient(to bottom, #33ccff 0%, #3333cc 100%);
  }

  input {
    border-radius: 20px;
    padding: 10px 10px 10px 10px;
  }

  textarea {
    border-radius: 20px;
    padding: 10px 10px 10px 10px;
  }

  button {
    border-radius: 20px;
    padding: 5px 10px 5px 10px;
    border-color: linear-gradient(to top right, #33ccff 1%, #ff99cc 57%);
  }

  nav {
    /* background: linear-gradient(to bottom, #33ccff 0%, #3333cc 100%); */
  }
</style>

<body>
  <nav class="navbar navbar-light bg-light justify-content-between">
    <a class="navbar-brand">Gamestore</a>
    <?php
if (isset($_POST['light']) == "black") {
  session_destroy();
  header('Location: http://localhost/phpCollege/PHPMiniProject/login.php');
}
if (isset($_POST['product']) == "data") {
  // header('Location: http://localhost/phpCollege/PHPMiniProject/productdetails.php');
}
?>
    <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <div>
        <?php
      if (isset($_SESSION["name"])) {
        $name = $_SESSION["name"];
        $GLOBALS['name'] = $name;
        echo("<b>$name</b>");
      } else {
        $name = "";
      }
      ?></div>
      <button name="product" value="data">Add</button>
      <button name="light" value="black">Logout</button>
    </form>
  </nav>
  <div align="center">
    <br>
    <h2>Upload Product</h2>
    <br>
    <form action="home2.php" method="Post" enctype="multipart/form-data">
      <label><b>Product Owner</b></label>
      <input type="text" placeholder="<?php echo($name)?>" name="name" disabled>
      <?php 
$_SESSION["name"]=$name;
?>
      <br>
      <br>
      <label><b>Product type</b></label>
      <input type="text" placeholder="Enter Type" name="type" required>
      <br>
      <br>
      <label><b>Product Name</b></label>
      <input type="text" placeholder="Enter Name" name="Name" required>
      <br>
      <br>
      <label><b>Product Cost</b></label>
      <input type="text" placeholder="Enter Cost" name="color" required>
      <br>
      <br>
      <label><b>Description</b></label>
      <br>
      <textarea rows="4" cols="40" placeholder="Write description here" name="desc" required></textarea>
      <br><br>
      <b>Select image to upload:</b>
      <br>
      <input type="file" name="fileToUpload" id="fileToUpload" required>
      <br>

      <input type="submit" value="submit" name="submit">
    </form>
    <br>
    <div>

      <body>

</html>