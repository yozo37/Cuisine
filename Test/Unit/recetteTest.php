<?php
require_once('./src/recette.php');
require_once('./src/recetteDAO.php');

use PHPUnit\Framework\TestCase;

class RecetteTest extends TestCase {
    private $recetteDAO;
    private $pdo;

    protected function setUp(): void {
        $this->configureDatabase();
        $this->recetteDAO = new RecetteDAO($this->pdo);
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

    public function testAddRecette() {
        $this->recetteDAO->addRecette('Poulet rôti', 'Instructions', 20, 2, null);

        $stmt = $this->pdo->query('SELECT * FROM recettes WHERE nom_recette = "Poulet rôti"');
        $recette = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->assertEquals('Poulet rôti', $recette['nom_recette']);

        
    }

    // public function testUpdateRecette() {
    //     $this->assertTrue($this->recetteDAO->updateRecette(1, 'Nouveau Nom', 'Nouvelles instructions', 20, 2, null));
    // }

    // public function testDeleteRecette() {
    //     $this->recetteDAO->deleteRecette(4);

    //     $stmt = $this->pdo->query('SELECT * FROM recettes WHERE id_recette = 4');
    //     $recette = $stmt->fetch(PDO::FETCH_ASSOC);

    //     $this->assertFalse($recette);
    // }

    // public function testGetRecetteByID() {
    //     $recette = $this->recetteDAO->getRecetteByID(2);

    //     $this->assertInstanceOf(Recette::class, $recette);
    //     $this->assertEquals(2, $recette->id_recette);
    //     $this->assertEquals('Poulet rôti', $recette->nom_recette);
    //     // Ajoute d'autres assertions en fonction des autres attributs de Recette
    // }
    // public function listerRecettes() {
    //     $recette = $this->recetteDAO->listerRecettes();

    //     $this->assertInstanceOf(Recette::class, $recette);
    //     $this->assertEquals(2, $recette->id_recette);
    //     $this->assertEquals('Poulet rôti', $recette->nom_recette);
    //     // Ajoute d'autres assertions en fonction des autres attributs de Recette
    // }
 }
?>
