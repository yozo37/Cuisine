<?php
require_once('./src/recetteDAO.php');

// Assurez-vous que le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $nom_recette = $_POST['nom_recette'];
    $description = $_POST['description'];
    $ingredients = $_POST['ingredients'];
    $instructions = $_POST['instructions'];
    $categorie = $_POST['categorie'];

    // Créer une instance de PDO pour la connexion à la base de données
    $host = "127.0.0.1";
    $dbname = "cuisine";
    $user = "root";
    $password = "khaola2502";
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

    // Créer une instance de votre DAO
    $recetteDAO = new RecetteDAO($pdo);

    // Appeler la méthode pour ajouter une recette
    $resultat = $recetteDAO->addRecette($nom_recette, $instructions, 20, $categorie, null);
    $resultat2 = $recetteDAO->listerRecettes($nom_recette)->fetch();

    // Vérifier si l'ajout a réussi
    if ($resultat) {
        echo "Recette ajoutée avec succès !";
    } else {
        echo "Erreur lors de l'ajout de la recette.";
    }
} else {
    // Si le formulaire n'a pas été soumis, redirigez l'utilisateur ou affichez un message approprié.
    echo "Le formulaire n'a pas été soumis.";
}
?>
