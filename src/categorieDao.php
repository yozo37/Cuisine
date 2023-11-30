<?php
class CategorieDAO {
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function addCategorie($nom_categorie) {
        try {
            $query = "INSERT INTO categories (nom_categorie) VALUES (:nom_categorie)";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':nom_categorie', $nom_categorie);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur d'ajout de catégorie : " . $e->getMessage();
            return false;
        }
    }
    public function getCategorieByID($id){
        $stmt = $this->pdo->prepare('SELECT * FROM categories WHERE id_categorie = :id');
        $stmt->execute([':id' => $id]);
        $categorieData = $stmt->fetch(PDO::FETCH_ASSOC);
        var_dump($categorieData);
    
        if(!$categorieData){
            return null;
        }
    
        return new Categorie($categorieData['id_categorie'], $categorieData['nom_categorie']);
    }
    
    public function listerCategorie($nom_categorie) {
        try {
            $query = "SELECT * from categories (nom_categorie) VALUES (:nom_categorie)";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':nom_categorie', $nom_categorie);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur d'ajout de catégorie : " . $e->getMessage();
            return false;
        }
    }

    public function updateCategorie($id_categorie, $nouveau_nom) {
        try {
            $query = "UPDATE categories SET nom_categorie = :nouveau_nom WHERE id_categorie = :id_categorie";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id_categorie', $id_categorie);
            $stmt->bindParam(':nouveau_nom', $nouveau_nom);
            return $stmt->execute();
        } catch (PDOException $e) {
            // Gérer l'erreur
            echo "Erreur de mise à jour de catégorie : " . $e->getMessage();
            return false;
        }
    }

    public function deleteCategorie($id_categorie) {
        try {
            $query = "DELETE FROM categories WHERE id_categorie = :id_categorie";
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':id_categorie', $id_categorie);
            return $stmt->execute();
        } catch (PDOException $e) {
            // Gérer l'erreur
            echo "Erreur de suppression de catégorie : " . $e->getMessage();
            return false;
        }
    }
    

}
?>
