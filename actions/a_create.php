<?php
    require_once "db_connect.php";
    require_once "file_upload.php";

    $database = new Database;
    $conn = $database->conn;

    if($_POST){
        $name = $_POST["name"];
        $shortDes = $_POST["shortDes"];
        $description = $_POST["description"];
        $adresse = $_POST["adresse"];
        $price = $_POST["price"];
        $latitude = $_POST["latitude"];
        $longitude = $_POST["longitude"];
        $picture =file_upload($_FILES["picture"]);
        $uploadError = "";

        $sql = "INSERT INTO locations (name, shortDes, description, adresse, price, latitude, longitude, picture) VALUES ('$name','$shortDes','$description', '$adresse', $price, $latitude, $longitude,'$picture->fileName')";
        if(mysqli_query($conn, $sql)){
            $class ="success";
            $message = "The entry below was successfully created <br>
                <p> $name <br>$shortDes <br>$description <br> <hr> $adresse  <br> $price <br> <hr> $latitude <br> $longitude </p>";
            $uploadError = ($picture->error !=0)? $picture->ErrorMessage : '';
        }else{
            $class = "danger";
            $message = "error while creating record. Try again: <br>" . $conn->error;
            $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
        } 
       
    }
?>



<!DOCTYPE html>
<html lang= "en">
   <head>
       <meta  charset="UTF-8">
       <title>Update</title>
       <?php require_once '../components/boot.php' ?>
   </head>
   <body>
       <div  class="container">
           <div class="mt-3 mb-3" >
               <h1>Create request response</h1>
           </div>
            <div class="alert alert-<?=$class;?>" role="alert">
               <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='../index.php'><button class="btn btn-primary"  type='button'>Home</button ></a>
           </div >
       </div>
   </body>
</html>