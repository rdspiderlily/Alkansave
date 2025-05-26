<?php
// Simple test file to check if category controller is working
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "TEST: Starting category test...<br>";

try {
    // Test database connection
    require_once __DIR__ . '/../../3_Data/Database.php';
    $db = Database::getInstance()->getConnection();
    echo "TEST: Database connection OK<br>";
    
    // Test repository
    require_once __DIR__ . '/../../3_Data/repositories/ADMINCategoryRepository.php';
    $repo = new CategoryRepository();
    echo "TEST: Repository created OK<br>";
    
    // Test service
    require_once __DIR__ . '/../services/ADMINCategoryService.php';
    $service = new CategoryService();
    echo "TEST: Service created OK<br>";
    
    // Test getting categories
    $categories = $service->getAllSystemCategories();
    echo "TEST: Found " . count($categories) . " categories<br>";
    
    // Test most used
    $mostUsed = $service->getMostUsedCategory();
    echo "TEST: Most used category: " . $mostUsed . "<br>";
    
    // Test least used
    $leastUsed = $service->getLeastUsedCategory();
    echo "TEST: Least used category: " . $leastUsed . "<br>";
    
    echo "TEST: All tests passed!";
    
} catch (Exception $e) {
    echo "TEST ERROR: " . $e->getMessage() . "<br>";
    echo "TEST TRACE: " . $e->getTraceAsString();
}
?>