<?php
require_once 'src/connexion.php';
require_once 'src/Recette.php';
require_once 'src/RecetteDAO.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomRecette = $_POST['nom_recette'];
    $ingredients = $_POST['id_ingredient'];
    $instructions = $_POST['instructions'];
    $tempsPreparation = $_POST['temps_preparation'];
    $categorie = $_POST['id_categorie'];

    // Assuming $connexion is your database connection
    $recetteDAO = new RecetteDAO($connexion);

    // Check if $ingredients is an array
    if (is_array($ingredients)) {
        // If $ingredients is an array, you can implode it
        $ingredientsAsString = implode(',', $ingredients);
    } else {
        // If $ingredients is not an array, handle it accordingly (e.g., set it to an empty string)
        $ingredientsAsString = '';
    }

    // Call your addRecette method
    $recetteDAO->addRecette($nomRecette, $instructions, $tempsPreparation, $categorie, $ingredientsAsString);

    // Redirect or perform any other actions after adding the recipe
    header('Location: index.php'); // Replace 'index.php' with your desired page
    exit();
}
?>
