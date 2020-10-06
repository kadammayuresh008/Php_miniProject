<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    echo '<div class="alert alert-danger">File is not an image.</div>';
    $uploadOk = 0;
  }
}

if (file_exists($target_file)) {
  echo '<div class="alert alert-danger">Sorry, file already exists.</div>';
    $uploadOk = 0;
  }

  if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo '<div class="alert alert-danger">Sorry, your file is too large.</div>';
    $uploadOk = 0;
  }

  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {

  echo '<div class="alert alert-danger">Sorry, only JPG, JPEG, PNG & GIF files are allowed.</div>';
  $uploadOk = 0;
}

if ($uploadOk == 0) {
  echo '<div class="alert alert-danger">Sorry, your file was not uploaded.</div>';
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    echo '<div class="alert alert-success">Sucess, your file uploaded.</div>';
  } else {
    echo '<div class="alert alert-danger">Sorry, your file was not uploaded.</div>';
  }
  $url='uploads/'.$_FILES["fileToUpload"]["name"];
  $GLOBALS['url']=$url;
}
session_start();
?>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<style>
body{
    background: linear-gradient(to bottom, #33ccff 0%, #3333cc 100%);
}
input{
border-radius:20px;
padding: 10px 10px 10px 10px;
}
button
{
border-radius:20px;
padding: 5px 10px 5px 10px;
border-color:linear-gradient(to top right, #33ccff 1%, #ff99cc 57%);
}
</style>
<body>
<nav class="navbar navbar-light bg-light justify-content-between">
  <a class="navbar-brand">Gamestore</a>
  <?php
if(isset($_POST['light'])=="black")
{
session_destroy();
header('Location: http://localhost/Praticeprogram/project/login.php');
}
if(isset($_POST['product'])=="data")
{
header('Location: http://localhost/Praticeprogram/project/productdetails.php');
}
?>
  <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post">
  <button name="product" value="data">Add</button>
    <button name="light" value="black">Logout</button>
  </form>
</nav>
<div>
<br>
<br>
<div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-6">
<div class="card" style="width: 40rem;padding-left:10%;" >
<h2>Current Uploaded Product details</h2>
<?php echo "<img src='".$url."' alt='Image not found.' style='width:280px; height:200px;'>"; ?>
  <div class="card-body">
  <?php
if(!isset($_POST['type'])) {
  echo "<h5>Product type</h5>";
  echo $_POST['type'];
  echo "<br/>";
} else {
  echo "<h5>Product type</h5>";
  echo  $_POST['type'];
  echo "<br/>";
}
if(!isset($_POST['Name'])) {
  echo "<h5>Product name</h5>";
  echo  $_POST['Name'];
  echo "<br/>";
} else {
  echo "<h5>Product name</h5>";
  echo  $_POST['Name'] ;
  echo "<br/>";
}
if(!isset($_POST['color'])) {
  echo "<h5>Product color</h5>";
    echo  $_POST['color'];
    echo "<br/>";
  } else {
    echo "<h5>Product color</h5>";
    echo $_POST['color'];
    echo "<br/>";
  }
  if(!isset($_POST['desc'])) {
    echo "<h5>Product Description</h5>";
    echo substr($_POST['desc'],0,30);
    echo "<br/>";
    } else {
    echo "<h5>Product Description</h5>";
    echo substr($_POST['desc'],0,30);
    echo "<br/>";
      }
    //********************************************insert query********************************** 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Logindetails";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $type=$_POST['type'];
    $product_name=$_POST['Name'];
    $color=$_POST['color'];
    $desc=$_POST['desc'];
    $name=$_SESSION['name'];

    // if(isset($_SESSION["name"])){
    //   $name=$_SESSION["name"];
    //   echo ("<b>$name</b>");
    //   }
    //   else
    //   {
    //       $name="";
    //   }
    $sql="insert into productdetails(UserName,ProductType, ProductName , ProductColor,ProductDescription,ProductImage)
    VALUES('".$name."','".$type."','".$product_name."','".$color."','".$desc."','".$GLOBALS['url']."')";
     if ($conn->query($sql) === TRUE) {
      echo "<br/>";
      echo '<div class="alert alert-success">Product is set to sell.</div>';
        } else 
        {
          echo "<br/>";
          echo '<div class="alert alert-danger">Product not uploaded.</div>';
        }
    $conn->close();
    
?>
</div>
</div>
</div>
</div>
</div>
</body>
</html>