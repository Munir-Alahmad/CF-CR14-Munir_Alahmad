<?php
    require_once "actions/db_connect.php";

    $database = new Database;
    $conn = $database->conn;


    if(isset($_GET["id"])){
        $id = $_GET["id"];

        $sql = "SELECT * FROM locations WHERE id = $id";
        $result = mysqli_query($conn , $sql);
        if(mysqli_num_rows($result) == 1){
            $data = mysqli_fetch_assoc($result);
        }else{
            header("location: error.php");
        }
        


    }else{
        header("location: error.php");
    }
?>



<!DOCTYPE html>
<html lang= "en">
   <head>
       <meta  charset="UTF-8">
       <meta name="viewport"  content="width=device-width, initial-scale=1.0">
       <title>Delete Product</title>
       <?php require_once 'components/boot.php' ?>
       <?php require_once 'navbar.php'?>
       <style><?php include "css/delete.css"; ?></style>
      
   </head>
   <body>
       <fieldset>
           <legend class='h2 mb-3'> Delete request <img class='img-thumbnail rounded-circle'  src='images/<?php echo $data["picture"] ?>' alt="<?php echo $data ["name"] ?>"></legend >
           <h5>You have selected the data below: </h5>
           <table class="table w-75 mt-3" >
               <tr>
                    <td><?php echo $data["name"]?></td>
                </tr>
           </table>

           <h3  class="mb-4">Do you really want to delete this product?</h3>
           <form action ="actions/a_delete.php"  method="post">
               <input type="hidden"  name="id" value ="<?php echo $id ?>" />
               <input type="hidden"  name="picture"  value="<?php echo $data["picture"] ?>" />
               <button class="btn-create2 btn-outline"  type="submit"> Yes, delete it! </button>
               <a href="index.php"><button class="btn-create1"  type="button"> No, go back! </button></a>
           </form>
       </fieldset>
   </body>
</html>