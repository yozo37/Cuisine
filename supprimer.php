<?php
require_once 'src/connexion.php';
require_once 'src/Recette.php';
require_once 'src/RecetteDAO.php';


    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_recette = $_POST['id_delete'];
        
            

                
        $recetteDAO = new RecetteDAO($connexion);
        $recetteDAO->deleteRecette($id_recette);
        header('Location: index.php');
        }    
?>