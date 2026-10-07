<?php

header("Content-Type: application/json");

require "conexao.php";

$metodo = $_SERVER["REQUEST_METHOD"];


if($metodo == "POST"){
    $json = file_get_contents("php://input");

    $dados = json_decode($json,true);

   $sql = "INSERT INTO produtos (nome,preco) VALUES (?,?)";
   
   $comando = $pdo->prepare($sql);

   $comando -> execute([
        $dados["nome"],
        $dados["preco"]
    
   ]);

   echo json_encode(["Mensagem"=>"Produto cadastrado com sucesso!"]);

}
