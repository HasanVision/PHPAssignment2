<?php
require('../model/database.php');
$product_code = filter_input(INPUT_POST, 'product_code');

if ($product_code == NULL || $product_code == FALSE) {
    $error = "Invalid product code. Check all fields and try again.";
    include('../errors/error.php');
} else {
    try {
        $query = 'DELETE FROM products WHERE productCode = :product_code';
        $statement = $db->prepare($query);
        $statement->bindValue(':product_code', $product_code);
        $statement->execute();
        $statement->closeCursor();
        
        // Redirect to confirmation page
        $url = 'delete_product_confirmation.php';
        header("Location: " . $url);
        die();
        
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
}

?>