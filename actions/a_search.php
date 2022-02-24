<?php
require_once "db_connect.php";

$database = new Database;
$conn = $database->conn;

if(!$_GET){
  $rows = $database->read("locations");
  $page="";
  
   
  foreach ( $rows as $row){
    $adresse = strtoupper($row['adresse']);
    $name = strtoupper($row['name']);
    $page .= "<div class='card' style='width: 26rem;'>
    <img src='../images/{$row['picture']}' class='card-img-top' alt='...' height='270'>
    <div class='card-body'>
      <h4 class='card-title'>Location: {$row['name']}</h4>
      <p class='card-text'>Price: {$row['price']} €</p>
      <p class='card-text'>Description: {$row['shortDes']}</p>
      <p class='card-text'>Adresse: {$row['adresse']}</p>
      <div class='multi-button'>
        <button><a href='update.php?id={$row['id']}'>Update</a></button>
        <button id='del'><a href='delete.php?id={$row['id']}' >Delete</a></button>
        <button><a href='details.php?id={$row['id']}' >Details</a></button>
      </div>
      
    </div>
  </div>";
} 

  
}else{
      $locations =  $_GET["locations"];
      $sql = "SELECT * from locations WHERE name LIKE '$locations%'";
      $result = $conn->query($sql);
      if($result->num_rows == 0){
          echo "No Results";
      }else {
          $rows = $result->fetch_all(MYSQLI_ASSOC);

      foreach($rows as $row){
        $upperName = strtoupper($row['name']);
         echo "<div class='card' style='width: 26rem;'>
         <img src='images/{$row["picture"]}' class='card-img-top' alt='...' height='270'>
         <div class='card-body'>
           <h4 class='card-title'>Location: {$row["name"]}</h4>
           <p class='card-text'>Price: {$row["price"]} €</p>
           <p class='card-text'>Description: {$row["shortDes"]}</p>
           <p class='card-text'>Adresse: {$row["adresse"]}</p>
           <div class='multi-button'>
             <button><a href='update.php?id={$row["id"]}'>Update</a></button>
             <button><a href='delete.php?id={$row["id"]}' >Delete</a></button>
             <button><a href='details.php?id={$row["id"]}' >Details</a></button>
           </div>
           
         </div>
       </div>";
      }
    }}
