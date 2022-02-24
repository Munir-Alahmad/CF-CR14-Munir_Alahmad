<?php
require_once 'db_connect.php';
require_once  'file_upload.php';

$database = new Database;
$conn = $database->conn;

if ($_POST) {     
    $name = $_POST["name"];
    $shortDes = $_POST["shortDes"];
    $description = $_POST["description"];
    $adresse = $_POST["adresse"];
    $price = $_POST["price"];
    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];
    
    $id = $_POST['id'];  

   
    $uploadError = '';

   $picture = file_upload($_FILES['picture']);
   if ($picture->error===0){
       ($_POST["picture"]=="trip.png")?: unlink("../images/$_POST[picture]");          
       $sql = "UPDATE locations SET name = '$name' , shortDes = '$shortDes' , description = '$description' , adresse = '$adresse', price =$price , latitude = $latitude , longitude = $longitude, picture = '$picture->fileName'  WHERE id = {$id} ";
   }else{
       $sql = "UPDATE locations SET name = '$name' , shortDes = '$shortDes' , description = '$description' , adresse = '$adresse', price =$price , latitude = $latitude , longitude = $longitude WHERE id = {$id}  ";
   }    
   if ($conn->query($sql)) {
       $class = "success";
       $message = "The record was successfully updated";
       $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
   } else {
       $class = "danger";
       $message = "Error while updating record : <br>" . $conn->error;
       $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
   }
    
} else {
   header("location: ../error.php");
}
?>


<!DOCTYPE html>
<html lang= "en">
   <head>
       <meta  charset="UTF-8">
       <title>Update</title>
       <?php require_once '../components/boot.php' ?> 
       <style><?php include "css/update.css"; ?></style>
   </head>
   <body>
       <div  class="container">
           <div class="mt-3 mb-3" >
               <h1>Update request response</h1>
           </div>
            <div class="alert alert-<?php echo $class;?>" role="alert">
               <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='../update.php?id=<?=$id;?>' ><button class="btn btn-warning" type='button'>Back</button></a>
                <a href='../index.php'><button class="btn btn-success"  type='button'>Home</button></a>
            </div>
       </div>
   </body>
</html>