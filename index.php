<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Management</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<div class="content">
        <div class="title">
            <h2>Ajouter une recette</h2>
        </div>

        <div class="add-recipe-form">
            <form action="ajouter_recette.php" method="post">
                <label for="nom_recette">Nom de la recette :</label>
                <input type="text" name="nom_recette" required>

                <label for="id_ingredient">Ingrédients :</label>
                <textarea name="id_ingredient" rows="4" required></textarea>

                <label for="instructions">Instructions :</label>
                <textarea name="instructions" rows="4" required></textarea>

                <label for="temps_preparation">Temps de préparation :</label>
                <input type="number" name="temps_preparation" required>

                <label for="id_categorie">Catégorie :</label>
                <select name="id_categorie" required>
                    <option value="1">Entrée</option>
                    <option value="2">Plat Principal</option>
                    <option value="3">Dessert</option>
                </select>

                <button type="submit">Ajouter la recette</button>
            </form>
        </div>
    </div>
        <div class="recipe-sct">
            <div class="recipe-table">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Instructions</th>
                        <th>Ingrédients</th>
                        <th>Categorie</th>
                    </tr>

                    <?php

                    require_once('config.php');
                    require_once('src/recetteDAO.php');

                    $recetteDAO = new RecetteDAO($pdo);
                        $recettes = $recetteDAO->listerRecettes();

                        foreach ($recettes as $recette) {
                            echo "<tr>";
                            echo "<td>" . $recette['id_recette'] . "</td>";
                            echo "<td>" . $recette['nom_recette'] . "</td>";
                            echo "<td>" . $recette['instructions'] . "</td>";
                            echo "<td>" . $recette['temps_preparation'] . "</td>";
                            echo "<td>" . $recette['id_categorie'] . "</td>"; 
                            echo "<td>" . $recette['id_ingredient'] . "</td>"; 
                            echo "</tr>";
                        }
                    ?>
                

                <div class="delete-recipe-form">
                    <h2>Supprimer Recette</h2>
                    <form action="supprimer.php" method="post">
                        <label for="id_delete">ID:</label>
                        <input type="text" name="id_delete" required>

                        <button type="submit">Supprimer Recette</button>
                    </form> 
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
