<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles2.css">
</head> 
<body>
</div>
        <div class="recipe-sct">
            <div class="recipe-table">
                <table>
                    <tr>
                    
                        <th>Name</th>
                        <th>Instructions</th>
                        <th>Temps de préparation</th>
                        <th>Ingrédients</th>
                        <th>Categorie</th>
                    </tr>

                    <?php

                    require_once('src/connexion.php');
                    require_once('src/recetteDAO.php');

                    $recetteDAO = new RecetteDAO($connexion);
                        $recettes = $recetteDAO->listerRecettes();

                        foreach ($recettes as $recette) {
                            echo "<tr>";
                        
                            echo "<td>" . $recette['nom_recette'] . "</td>";
                            echo "<td>" . $recette['instructions'] . "</td>";
                            echo "<td>" . $recette['temps_preparation'] . "</td>";
                            echo "<td>" . $recette['id_categorie'] . "</td>"; 
                            echo "<td>" . $recette['id_ingredient'] . "</td>"; 
                            echo "</tr>";
                        }
                    ?>
                

            </div>
        </div>
    </div>
</body>
</html>