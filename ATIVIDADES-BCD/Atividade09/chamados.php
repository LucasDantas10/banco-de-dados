<?php

header("Content-Type: application/json");

require "conexao.php";

$metodo = $_SERVER["REQUEST_METHOD"];

// Verifica se o método é POST
if ($metodo == "POST") {

    $json = file_get_contents("php://input");

    $dados = json_decode($json, true);

    // Verifica se a prioridade é válida
    if (
        $dados["prioridade"] != "alta" &&
        $dados["prioridade"] != "media" &&
        $dados["prioridade"] != "baixa"
    ) {
        echo json_encode([
            "Mensagem" => "Prioridade está incorreta"
        ]);
        exit;
    }

    // Verifica se o status é válido
    if (
        $dados["status"] != "aberto" &&
        $dados["status"] != "em andamento" &&
        $dados["status"] != "concluido"
    ) {
        echo json_encode([
            "Mensagem" => "Status está incorreto"
        ]);
        exit;
    }

    // Insere o chamado no banco
    $sql = "INSERT INTO chamados
            (equipamento, setor, descricao, prioridade, status)
            VALUES (?, ?, ?, ?, ?)";

    $comando = $pdo->prepare($sql);

    $comando->execute([
        $dados["equipamento"],
        $dados["setor"],
        $dados["descricao"],
        $dados["prioridade"],
        $dados["status"]
    ]);

    echo json_encode([
        "Mensagem" => "Chamado cadastrado com sucesso! 😊"
    ]);

    exit;
}


// Verifica se o método é GET
if ($metodo == "GET") {

    $sql = "SELECT * FROM chamados ORDER BY id";

    $comando = $pdo->query($sql);

    $chamados = $comando->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($chamados);

    exit;
}


// Verifica se o método é PUT
if ($metodo == "PUT") {

    $json = file_get_contents("php://input");

    $dados = json_decode($json, true);

    // Verifica se a prioridade é válida
    if (
        $dados["prioridade"] != "alta" &&
        $dados["prioridade"] != "media" &&
        $dados["prioridade"] != "baixa"
    ) {
        echo json_encode([
            "Mensagem" => "Prioridade está incorreta"
        ]);
        exit;
    }

    // Verifica se o status é válido
    if (
        $dados["status"] != "aberto" &&
        $dados["status"] != "em andamento" &&
        $dados["status"] != "concluido"
    ) {
        echo json_encode([
            "Mensagem" => "Status está incorreto"
        ]);
        exit;
    }

    // Atualiza o chamado
    $sql = "UPDATE chamados
            SET equipamento = ?,
                setor = ?,
                descricao = ?,
                prioridade = ?,
                status = ?
            WHERE id = ?";

    $comando = $pdo->prepare($sql);

    $comando->execute([
        $dados["equipamento"],
        $dados["setor"],
        $dados["descricao"],
        $dados["prioridade"],
        $dados["status"],
        $dados["id"]
    ]);

    echo json_encode([
        "Mensagem" => "Chamado atualizado com sucesso! 😊"
    ]);

    exit;
}


// Verifica se o método é DELETE
if ($metodo == "DELETE") {

    $json = file_get_contents("php://input");

    $dados = json_decode($json, true);

    // Exclui o chamado
    $sql = "DELETE FROM chamados WHERE id = ?";

    $comando = $pdo->prepare($sql);

    $comando->execute([
        $dados["id"]
    ]);

    echo json_encode([
        "Mensagem" => "Chamado excluído com sucesso! 😊"
    ]);

    exit;
}


// Caso o método HTTP não seja permitido
echo json_encode([
    "Mensagem" => "Método HTTP não permitido"
]);
