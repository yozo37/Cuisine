<?php
class IngredientDAO {
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function addIngredient($nom_ingredient, $quantite_disponible, $unite_mesure) {
        try {
            $query = "INSERT INTO ingredients (nom_ingredient, quantite_disponible, unite_mesure) 
                      VALUES (:nom_ingredient, :quantite_disponible, :unite_mesure)";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':nom_ingredient', $nom_ingredient);
            $stmt->bindParam(':quantite_disponible', $quantite_disponible);
            $stmt->bindParam(':unite_mesure', $unite_mesure);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur d'ajout d'ingrédient : " . $e->getMessage();
            return false;
        }
    }

    public function getIngredientByID($id_ingredient){
        $stmt = $this->pdo->prepare('SELECT * FROM ingredients WHERE id_ingredient = :id_ingredient');
        $stmt->execute([':id_ingredient' => $id_ingredient]);
        $ingredientData = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$ingredientData){
            return null;
        }

        return new Ingredient(
            $ingredientData['id_ingredient'],
            $ingredientData['nom_ingredient'],
            $ingredientData['quantite_disponible'],
            $ingredientData['unite_mesure']
        );
    }

    public function listerIngredients($nom_ingredient) {
        try {
            $query = "SELECT * FROM ingredients WHERE nom_ingredient = :nom_ingredient";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':nom_ingredient', $nom_ingredient);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur de listing des ingrédients : " . $e->getMessage();
            return false;
        }
    }

    public function updateIngredient($id_ingredient, $nouveau_nom, $nouvelle_quantite, $nouvelle_unite) {
        try {
            $query = "UPDATE ingredients 
                      SET nom_ingredient = :nouveau_nom, quantite_disponible = :nouvelle_quantite, 
                          unite_mesure = :nouvelle_unite
                      WHERE id_ingredient = :id_ingredient";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id_ingredient', $id_ingredient);
            $stmt->bindParam(':nouveau_nom', $nouveau_nom);
            $stmt->bindParam(':nouvelle_quantite', $nouvelle_quantite);
            $stmt->bindParam(':nouvelle_unite', $nouvelle_unite);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur de mise à jour d'ingrédient : " . $e->getMessage();
            return false;
        }
    }

    public function deleteIngredient($id_ingredient) {
        try {
            $query = "DELETE FROM ingredients WHERE id_ingredient = :id_ingredient";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id_ingredient', $id_ingredient);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur de suppression d'ingrédient : " . $e->getMessage();
            return false;
        }
    }
}
?>
