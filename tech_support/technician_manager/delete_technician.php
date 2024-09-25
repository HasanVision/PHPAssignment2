<?php
require('../model/database.php');
$tech_id = filter_input(INPUT_POST, 'technician_id');

if ($tech_id == NULL ) {
    $error = "Invalid ID . Check all fields and try again.";
    include('../errors/error.php');
} else {
    try {
        $query = 'DELETE FROM technicians WHERE techId = :tech_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':tech_id', $tech_id);
        $statement->execute();
        $statement->closeCursor();
        
        // Redirect to confirmation page
        $url = 'delete_technician_confirmation.php';
        header("Location: " . $url);
        die();
        
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
}

?>