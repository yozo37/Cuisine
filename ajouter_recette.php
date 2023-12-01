<?php
require_once 'src/connexion.php';
require_once 'src/Recette.php';
require_once 'src/RecetteDAO.php';


    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nomRecette = $_POST['nom_recette'];
            $ingredients = $_POST['5'];
            $instructions = $_POST['instructions'];
            $tempsPreparation = $_POST['temps_preparation'];
            $categorie = $_POST['id_categorie'];

                
        $recetteDAO = new RecetteDAO($connexion);
        $recetteDAO->addRecette($nomRecette, $instructions, $tempsPreparation, $categorie, $ingredients);
        }

?>
