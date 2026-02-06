<?php

$arquivo = "dados.json";

$id    = $_POST['id'];
$nome  = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$novoUsuario = [
    "id"    => $id,
    "nome"  => $nome,
    "email" => $email,
    "senha" => $senha
];


if (file_exists($arquivo)) {
 
    $conteudo = file_get_contents($arquivo);
    $usuarios = json_decode($conteudo, true);

    if (!is_array($usuarios)) {
        $usuarios = [];
    }
} else {
    $usuarios = [];
}

$usuarios[] = $novoUsuario;

$json = json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

file_put_contents($arquivo, $json);

echo "Usuário cadastrado com sucesso!<br>";
echo "Id: $id <br>";
echo "Nome: $nome <br>";
echo "Email: $email <br>";

?>
