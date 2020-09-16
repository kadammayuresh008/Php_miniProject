<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Game Store</title>
  </head>
  <body>
    
    <?php include 'header.php';?>

    <?php
        $platforms = array();
        If(!empty($_POST['platforms']) && is_array($_POST['platforms'])){
            Foreach($_POST['platforms'] as $platform){
                $platforms[]=$platform;
            }
            Var_dump($platforms);
        }
    ?>
    <p style="padding: 10px; background-color: #9fa4c4;background-image: linear-gradient(315deg, #9fa4c4 0%, #9e768f 74%);font-size:18px;"> 
    Which it is Supported?     
    </p>
    <div class="container">
    <form action="" class="center" method="post">
        <label>
        XBOX
        <input type="checkbox" name="platforms[]" value="XBOX">
        </label>
        <br>
        <label>
        Nintando
        <input type="checkbox" name="platforms[]" value="Nintando">
        </label>
        <br>
        <label>
        Sony
        <input type="checkbox" name="platforms[]" value="Sony">
        </label>
        <br>
        <label>
        Stadia
        <input type="checkbox" name="platforms[]" value="Stadia">
        </label>
        <br>
        <input type="submit" value="Submit">
    </form>
    <br>

    </div>

    <?php
        if(isset($_POST["done"])) {
            $target_dir = "/home/sourabh/Documents/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }

            if ($uploadOk == 0) {
                echo "file was not uploaded.";
              } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                  echo "file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded";
                } else {
                  echo "error uploading file";
                }
              }
        }
    ?>
    <p style="padding: 10px; background-color: #9fa4c4;background-image: linear-gradient(315deg, #9fa4c4 0%, #9e768f 74%);font-size:18px;"> 
    Upload Games Images   
    </p>

    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="done">
        </form>

    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>