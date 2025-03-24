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

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $descricao = $_POST["descricao"];

    $sql = "INSERT INTO tb_produtos (nome, preco, descricao) VALUES ('$nome', '$preco', '$descricao')";

    if(mysqli_query($connection, $sql)){
        $data = ["message" => "Produto Adicionado com Sucesso"];
    }
}

echo json_encode($data);

mysqli_close($connection);






?>