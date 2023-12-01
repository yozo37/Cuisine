<?php
 require_once('./src/categorie.php');
 require_once('./src/categorieDAO.php');

use PHPUnit\Framework\TestCase;

class CategorieTest extends TestCase {
    // Instance de la classe Categorie pour les tests
    private $categorie;
    private $pdo;

    protected function SetUp(): void {
        $this->configureDatabase();
        $this->categorie = new CategorieDAO($this->pdo);
    }

    private function configureDatabase(): void {
        $this->pdo = new PDO(
            sprintf(
                'mysql:host=%s;port=%s;dbname=%s',
                getenv('DB_HOST'),
                getenv('DB_PORT'),
                getenv('DB_DATABASE')
            ),
            getenv('DB_USERNAME'),
            getenv('DB_PASSWORD')
        );

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
  

    // Teste l'ajout d'une catégorie
    public function testAddCategorie() {
        $this->assertTrue($this->categorie->addCategorie('khaola'));
    }

    // Teste la mise à jour d'une catégorie
    public function testUpdateCategorie() {
        $this->assertTrue($this->categorie->updateCategorie(1, 'Entrée'));
    }
    // public function testDeleteCategorie() {
    //     // Supprime la catégorie avec l'ID 5 en appelant la méthode deleteCategorie
    //     $this->categorie->deleteCategorie(9);
    
    //     // Vérifie si la catégorie avec l'ID 5 n'existe plus dans la base de données
    //     $stmt = $this->pdo->query('SELECT * FROM categories WHERE id_categorie = 9');
    //     $categorie = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //     $this->assertFalse($categorie);
    // }
    
    // public function testlisterCategorieByID() {
    //     // Appelle la méthode que tu souhaites tester directement sur l'instance de CategorieDAO
    //     $categorie = $this->categorie->getCategorieByID(1);
    
    //     // Vérifie si la catégorie a été récupérée correctement
    //     $this->assertInstanceOf(Categorie::class, $categorie);
    //     $this->assertEquals(1, $categorie->id);
    //     $this->assertEquals('Entrée', $categorie->nom); 
    // }
    
}
