<?php
    require_once "actions/db_connect.php";
    require_once "actions/a_search.php";
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $database = new Database;
    $conn = $database->conn;

    $rows = $database->read("locations");

    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "components/boot.php" ?>
    <style><?php include "css/index.css"; ?></style>
    <title>Document</title>
    
</head>
<body>
    <?php require_once "navbar.php" ?>  
    
    <div class="comp">
        <p>MOUNT  EVEREST</p>
    </div>
    

    <div class="parent row p-5 mb-2" id="searchedResult">
            <?=$page?>
    </div>
    <?php require_once "footer.php" ?>
    <script>
function loadDoc() {
let xhttp = new XMLHttpRequest(); 
xhttp.onload = function() {
    if (this.status == 200 ) {
        document.getElementById("searchedResult").innerHTML = this.responseText;
    }
};

var locations = document.getElementById("locations").value;
xhttp.open("GET", 'actions/a_search.php?locations='+locations , true); 
xhttp.send();
}
document.getElementById("locations").addEventListener("keyup", loadDoc);
</script>
    
</body>
</html>