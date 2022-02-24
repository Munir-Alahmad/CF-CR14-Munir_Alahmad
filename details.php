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
       <style><?php include "css/details.css"; ?></style>
       <title>Details</title>
    
   </head>
   <body>
       <div class="prodet">
            <fieldset>
                <legend class='h2'> Location details  <a class= 'btn btn-create1' href="index.php" >Go to Home</a></legend>
                
                    <table  class='table'>
                        <tr>
                            <th>Location</th>
                            <td> <?= $row["name"] ?> </td>
                        </tr>
                        <tr>
                            <th>Short Description</th >
                            <td><?= $row["shortDes"] ?></td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>"<?= $row["description"] ?></td>
                        </tr>
                        <tr>
                            <th>adresse</th>
                            <td>"<?= $row["adresse"] ?></td>
                        </tr>
                        

                        <tr>
                            <th>Price</th>
                            <td><?= $row["price"] ?> </td>
                        </tr>

                        <tr>
                            <th>latitude</th>
                            <td><?= $row["latitude"] ?></td>
                        </tr>

                        <tr>
                            <th>longitude</th>
                            <td><?= $row["longitude"] ?></td>
                        </tr>

                       
                        

                    </table>
            </fieldset>
            <div class="foto">
             <img src='images/<?= $row["picture"] ?>' width='550'  height='450'>
            </div>
       </div>
   </body>
</html>

