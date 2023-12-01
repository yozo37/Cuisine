<?php
// try {
//     $hote = "localhost";
//     $port = "";
//     $utilisateur = "root";
//     $motDePasse = "yohann";
//     $nomDeLaBase = "cuisine";
//     $connexion = new PDO("mysql:host=$hote;port=$port;dbname=$nomDeLaBase", $utilisateur, $motDePasse);
//     $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     } catch (PDOException $e) {
//         echo "Erreur de connexion à la base de données: " . $e->getMessage();
//         die();
//     }

$host = "localhost";
$db_name = "cuisine";
$username = "root";
$password = "yohann";

try {
    $pdo = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
    die();
}
?>
?>