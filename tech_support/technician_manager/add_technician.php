<?php
session_start();

$first_name = filter_input(INPUT_POST, 'first_name');
$last_name = filter_input(INPUT_POST, 'last_name');
$email = filter_input(INPUT_POST, 'email');
$phone = filter_input(INPUT_POST, 'phone');
$password = filter_input(INPUT_POST, 'password');

var_dump($first_name, $last_name, $email, $phone, $password);

if ($first_name == NULL || $last_name == NULL || $email == NULL || $phone == NULL || $password == NULL) {
    $_SESSION['error_message'] = "Invalid technician data. Check all fields and try again.";
    $url = '../errors/error.php';
    header("Location: " . $url);
    die();
} else {
    try {
        require_once('../model/database.php');
        $query = 'INSERT INTO technicians
         (firstName, lastName, email, phone, password) 
        VALUES (:first_name, :last_name, :email, :phone, :password)';

        $statement = $db->prepare($query);
        $statement->bindValue(':first_name', $first_name);
        $statement->bindValue(':last_name', $last_name);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $statement->closeCursor();

        // Redirect to confirmation page
        $url = 'add_technician_confirmation.php';
        header("Location: " . $url);
        die();
    
    } catch (PDOException $e) {
        // Handle other database errors
        $_SESSION['error_message'] = "Database error: " . $e->getMessage();
        $url = '../errors/error.php';
        header("Location: " . $url);
        die();
    }
}
?>