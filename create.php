<!DOCTYPE html>
<html lang="en" >
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content ="width=device-width, initial-scale=1.0">
       <?php require_once 'components/boot.php'?>
       <?php require_once 'navbar.php'?>
       <style><?php include "css/create.css"; ?></style>
       <title>Add Product</title>
      
   </head>
   <body>
       <div class="comp">
           <p>MOUNT EVEREST </p>
       </div>
       
       <fieldset>
           <legend class='h2'> Add Location</legend>
           <form action="actions/a_create.php"  method= "post" enctype= "multipart/form-data">
               <table  class='table'>
                   <tr>
                       <th>Location</th>
                        <td><input  class ='form-control' type="text"  name="name"  placeholder ="Location Name" /></td>
                   </tr>

                   <tr>
                       <th>shortDes</th>
                        <td><input  class ='form-control' type="text"  name="shortDes"  placeholder ="Enter shortDes" /></td>
                   </tr>

                   <tr>
                       <th>Description</th>
                        <td><input  class ='form-control' type="text"  name="description"  placeholder ="Enter description" /></td>
                   </tr>
                   <tr>
                       <th>adresse</th>
                        <td><input  class ='form-control' type="text"  name="adresse"  placeholder ="Enter Location dresse" /></td>
                   </tr>

                   <tr>
                       <th>Price</th >
                       <td><input class= 'form-control' type="number"  name= "price" placeholder ="Price" step="any"></td>
                   </tr>
                   
                   <tr>
                       <th>latitude</th>
                        <td><input  class ='form-control' type="text"  name="latitude"  placeholder ="latitude" /></td>
                   </tr>

                   <tr>
                       <th>longitude</th>
                        <td><input  class ='form-control' type="text"  name="longitude"  placeholder ="Enter longitude" /></td>
                   </tr>

                   <tr>
                       <th>picture</th >
                       <td><input class= 'form-control' type="file"  name="picture" /></td>
                   </tr>
                   
                   <tr>
                       <td><button class ='btn btn-success' type= "submit">Insert Location</button></td>
                       <td><a href="index.php" ><button class= 'btn btn-warning' type= "button">Home</button></a><td>
                   </tr>
               </table>
           </form>
       </fieldset>
   </body>
</html>