<?php
header('Content-Type: application/json; charset=utf-8');
require_once "actions/a-search.php";
function response($data){
    $result = json_encode($data);
    echo $result;
}

response($rows);?>