<!-- <?php
require_once('./src/ingredient.php');
require_once('./src/ingredientDAO.php');

use PHPUnit\Framework\TestCase;

class IngredientTest extends TestCase {
    private $ingredientDAO;
    private $pdo;

    protected function setUp(): void {
        $this->configureDatabase();
        $this->ingredientDAO = new IngredientDAO($this->pdo);
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

    public function testAddIngredient() {
        $this->asserttrue($this->ingredientDAO->addIngredient('carotte', 1.5, 'grammes'));

    }

    // public function testUpdateIngredient() {
    //     $this->assertTrue($this->ingredientDAO->updateIngredient(1, 'Nouveau Nom', 2.0, 'Kilogramme'));
    // }

    // public function testDeleteIngredient() {
    //     $this->ingredientDAO->deleteIngredient(4);

    //     $stmt = $this->pdo->query('SELECT * FROM ingredients WHERE id_ingredient = 4');
    //     $ingredient = $stmt->fetch(PDO::FETCH_ASSOC);

    //     $this->assertFalse($ingredient);
    // }

    // public function testGetIngredientByID() {
    //     $ingredient = $this->ingredientDAO->getIngredientByID(2);

    //     $this->assertInstanceOf(Ingredient::class, $ingredient);
    //     $this->assertEquals(2, $ingredient->id_ingredient);
    //     $this->assertEquals('Farine', $ingredient->nom_ingredient);
    // }
}
?> -->
