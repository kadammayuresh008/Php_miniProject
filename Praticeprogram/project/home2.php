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
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }

  if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
  $url='uploads/'.$_FILES["fileToUpload"]["name"];
}
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
<div class="col-sm-2"></div>
<div class="col-sm-10">
<h2>Product details</h2>
<div class="card" style="width: 18rem;">
<?php echo "<img src='{$url}' alt='Image not found.' style='width:280px; height:200px;'>"; ?>
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
  if(!isset($_POST['vehicle'])) {
    echo "<h5>Device reqired</h5>";
    foreach($_POST['vehicle'] as $value){
      echo "$value <br>";
    }
    } else {
      echo "<h5>Device reqired</h5>";
      foreach($_POST['vehicle'] as $value){
        echo "$value <br>";
      }
    }
?>
</div>
</div>
</div>
</div>
</div>
</body>
</html>