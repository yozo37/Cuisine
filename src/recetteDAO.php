<?php
include_once "Recette.php";
include_once "connexion.php";
include_once "ingredient.php";
include_once "categorie.php";
class RecetteDAO {
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function addRecette($nom_recette, $instructions, $temps_preparation, $id_categorie, $id_ingredients) {
        try {
            $this->pdo->beginTransaction();
    
            
            $stmtAddRecette = $this->pdo->prepare('INSERT INTO recettes (nom_recette, instructions, temps_preparation, id_categorie) VALUES (:nom_recette, :instructions, :temps_preparation, :id_categorie)');
            $stmtAddRecette->bindParam(':nom_recette', $nom_recette);
            $stmtAddRecette->bindParam(':instructions', $instructions);
            $stmtAddRecette->bindParam(':temps_preparation', $temps_preparation);
            $stmtAddRecette->bindParam(':id_categorie', $id_categorie);
            $stmtAddRecette->execute();
    
            
            $id_recette = $this->pdo->lastInsertId();
    
            
            $stmtAddRecetteIngredient = $this->pdo->prepare('INSERT INTO recette_ingredient (id_recette, id_ingredient) VALUES (:id_recette, :id_ingredient)');
            foreach ($id_ingredients as $id_ingredient) {
                $stmtAddRecetteIngredient->bindParam(':id_recette', $id_recette, PDO::PARAM_INT);
                $stmtAddRecetteIngredient->bindParam(':id_ingredient', $id_ingredient, PDO::PARAM_INT);
                $stmtAddRecetteIngredient->execute();
                
                echo "Inserted id_recette: $id_recette, id_ingredient: $id_ingredient<br>";
            }
    
            $this->pdo->commit();
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            echo "Error: " . $e->getMessage();
        }
    }
    

    public function getRecetteByID($id_recette)
{
    $stmt = $this->pdo->prepare('SELECT * FROM recettes WHERE id_recette = :id_recette');
    $stmt->execute([':id_recette' => $id_recette]);
    $recetteData = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$recetteData) {
        return null;
    }

    return new Recette(
        $recetteData['id_recette'],
        $recetteData['nom_recette'],
        $recetteData['instructions'],
        $recetteData['temps_preparation'],
        $recetteData['id_categorie'],
        $recetteData['id_ingredient']
    );
}


    public function listerRecettes() {
        try {
            $query = "SELECT * FROM recettes";
            $stmt = $this->pdo->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur de listing des recettes : " . $e->getMessage();
            return false;
        }
    }
    

    public function updateRecette($id_recette, $nouveau_nom, $nouvelles_instructions, $nouveau_temps, $nouvelle_categorie, $nouvel_ingredient) {
        try {
            $query = "UPDATE recettes 
                      SET nom_recette = :nouveau_nom, instructions = :nouvelles_instructions, 
                          temps_preparation = :nouveau_temps, id_categorie = :nouvelle_categorie, 
                          id_ingredient = :nouvel_ingredient 
                      WHERE id_recette = :id_recette";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id_recette', $id_recette);
            $stmt->bindParam(':nouveau_nom', $nouveau_nom);
            $stmt->bindParam(':nouvelles_instructions', $nouvelles_instructions);
            $stmt->bindParam(':nouveau_temps', $nouveau_temps);
            $stmt->bindParam(':nouvelle_categorie', $nouvelle_categorie);
            $stmt->bindParam(':nouvel_ingredient', $nouvel_ingredient);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur de mise à jour de recette : " . $e->getMessage();
            return false;
        }
    }

    public function deleteRecette($id_recette) {
        try {
            $query = "DELETE FROM recettes WHERE id_recette = :id_recette";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id_recette', $id_recette);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur de suppression de recette : " . $e->getMessage();
            return false;
        }
    }
   
}
?>
