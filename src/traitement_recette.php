<?php
    include "RecetteDAO.php";
    // include "Recette.php";
    include "config.php";


    
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get data from the form
    $nom_recette = $_POST['nom_recette'];
    $ingredients = $_POST['ingredients'];
    $instructions = $_POST['instructions'];
    $categorie = $_POST['categorie'];
    // Instantiate a new Produit object
    $nouveaurecette = new recette($nom_recette, $ingredients, $instructions, $categorie);

    // Assuming $connexion is your database connection object
    $recetteDAO = new RecetteDAO($pdo);

    // Add the new product
    $recetteDAO->addRecette($nouveaurecette);

    // Redirect to the index page after adding the product
    header('Location: indexproduit.php');
    exit; // Ensure that no further code is executed after the redirection
}
  
header('Location: index.php');
?>
