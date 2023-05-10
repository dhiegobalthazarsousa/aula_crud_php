<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$conn = new PDO('mysql:host=localhost;dbname=db_aula', 'root', 'ifsp@123');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//$email = $_POST['email'];
$email = 'dhiego@gmail.com';
// $stmt = $conn->prepare("SELECT * FROM Pessoas WHERE email_pessoa = $email");

//Prepared Statement
$stmt = $conn->prepare("SELECT * FROM Pessoas WHERE email_pessoa = :email");
$stmt->execute(array('email'=> $email));
while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo json_encode($linha);
}