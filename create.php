<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$nome = "Chico";
$idade = 53;
$email = "chico@chicoMail.com";

try {
    $pdo = new PDO('mysql:host=localhost; dbname=db_aula', 'root', 'ifsp@123');

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare('INSERT INTO Pessoas (nome_pessoa, idade_pessoa, email_pessoa) VALUES(:nome, :idade, :email)');

    $stmt->execute(array(
        "nome" => $nome,
        "idade" => $idade,
        "email" => $email
    ));

    echo "Usuário criado com sucesso";

} catch (PDOException $e) {
    echo $e->getMessage();
} finally{
    echo "<br><br>";
    echo "Transição Completa";
}