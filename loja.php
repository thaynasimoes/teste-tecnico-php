<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET, POST");

include("database.php");

if($_SERVER["REQUEST_METHOD"] === "GET"){
    $sql = "SELECT * FROM tb_produtos";
    $result = mysqli_query($connection, $sql);
    $data = [];
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
    }
}


echo json_encode($data);

mysqli_close($connection);






?>