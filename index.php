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
        <header>
            <h1>Recipe Management</h1>
            <nav>
                <ul>
                    <a href="index.php">Accueil</a>
                    <a href="supprimerecette.php">Supprimer</a>
                    <a href="listerecette.php">liste de recette</a>
                </ul>
            </nav>
        </header>
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
       
    
</body>
</html>
