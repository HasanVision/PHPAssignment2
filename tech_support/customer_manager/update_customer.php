<?php
session_start();

$customer_id = filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT);
$first_name = filter_input(INPUT_POST, 'first_name');
$last_name = filter_input(INPUT_POST, 'last_name');
$email = filter_input(INPUT_POST, 'email');
$address = filter_input(INPUT_POST, 'address');
$city = filter_input(INPUT_POST, 'city');
$state = filter_input(INPUT_POST, 'state');
$postal_code = filter_input(INPUT_POST, 'postal_code');
$country_code = filter_input(INPUT_POST, 'country_code');
$phone = filter_input(INPUT_POST, 'phone');
$password = filter_input(INPUT_POST, 'password');

if ($first_name == null || $last_name == null || $email == null || $address == null || $city == null || $state == null || $postal_code == null || $country_code == null || $phone == null || $password == null) {
    $_SESSION['error_message'] = "Invalid customer data. Check all fields and try again.";
    header("Location: ../errors/error.php");
    die();
} else {
    try {
        require_once('../model/database.php');
        $query = 'UPDATE customers
                  SET firstName = :first_name,
                      lastName = :last_name,
                      email = :email,
                      address = :address,
                      city = :city,
                      state = :state,
                      postalCode = :postal_code,
                      countryCode = :country_code,
                      phone = :phone,
                      password = :password
                  WHERE customerID = :customer_id';

        $statement = $db->prepare($query);
        $statement->bindValue(':customer_id', $customer_id);
        $statement->bindValue(':first_name', $first_name);
        $statement->bindValue(':last_name', $last_name);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':address', $address);
        $statement->bindValue(':city', $city);
        $statement->bindValue(':state', $state);
        $statement->bindValue(':postal_code', $postal_code);
        $statement->bindValue(':country_code', $country_code);
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $statement->closeCursor();

        // Store customer name in session for confirmation
        $_SESSION['first_name'] = $first_name;

        // Redirect to confirmation page
        header("Location: update_customer_confirmation.php");
        die();
    
    } catch (PDOException $e) {
        // Handle other database errors
        $_SESSION['error_message'] = "Database error: " . $e->getMessage();
        header("Location: ../errors/error.php");
        die();
    }
}
?>