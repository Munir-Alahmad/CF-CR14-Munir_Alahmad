<?php
    require_once "actions/db_connect.php";

    $database = new Database;
    $conn = $database->conn;
    
    if(isset($_GET["id"])){
        $id = $_GET["id"];

        $spl = "SELECT * FROM locations WHERE id = $id";
        $result = mysqli_query($conn , $spl);
        $row = mysqli_fetch_assoc($result);
    }
?>


<!DOCTYPE html>
<html lang="en" >
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content ="width=device-width, initial-scale=1.0">
       <?php require_once 'components/boot.php'?>
       <?php require_once 'navbar.php'?>
       <style><?php include "css/update.css"; ?></style>
       <title>Add Location</title>
    
   </head>
   <body>
       <fieldset>
           <legend class='h2'> Update details</legend>
           <form action="actions/a_update.php"  method= "post" enctype= "multipart/form-data">
               <table  class='table'>
                   <tr>
                       <th>Location</th>
                        <td><input value="<?php echo $row["name"] ?>" class ='form-control' type="text"  name="name"  placeholder ="location Name" /></td>
                   </tr>
                   
                   <tr>
                       <th>shortDes</th>
                        <td><input value="<?php echo $row["shortDes"] ?>" class ='form-control' type="text"  name="shortDes"  placeholder ="Enter short Description" /></td>
                   </tr>
                   <tr>
                       <th>description</th>
                        <td><input value="<?php echo $row["description"] ?>" class ='form-control' type="text"  name="description"  placeholder ="Enter location description" /></td>
                   </tr>
        
                   <tr>
                       <th>adresse</th>
                        <td><input value="<?php echo $row["adresse"] ?>"  class ='form-control' type="text"  name="adresse"  placeholder ="Enter location adresse" /></td>
                   </tr>

                   <tr>
                       <th>Price</th >
                       <td><input value="<?php echo $row["price"] ?>" class= 'form-control' type="number"  name= "price" placeholder ="Price" step="any"></td>
                   </tr>


                   <tr>
                       <th>latitude</th>
                        <td><input value="<?php echo $row["latitude"] ?>"  class ='form-control' type="text"  name="latitude"  placeholder ="Enter latitude" /></td>
                   </tr>

                   <tr>
                       <th>longitude</th>
                        <td><input value="<?php echo $row["longitude"] ?>" class ='form-control' type="text"  name="longitude"  placeholder ="Enter longitude" /></td>
                   </tr>

                   <tr>
                       <th>picture</th >
                       <td><input class= 'form-control' type="file"  name="picture"/></td>
                   </tr>

                   <tr>
                       <input class= 'form-control' type="hidden"  name="id" value="<?php echo $row["id"] ?>"/>
                       <input class= 'form-control' type="hidden"  name="picture" value="<?php echo $row["picture"] ?>"/>
                       <td><button class ='btn btn btn-create1' type= "submit">Update a location</button></td>
                       <td><a href="index.php" class= 'btn btn-create1'  >Go to Home</a><td>
                   </tr>
               </table>
           </form>
       </fieldset>
   </body>
</html>