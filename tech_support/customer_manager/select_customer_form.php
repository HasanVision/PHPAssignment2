<?php
require_once('../model/database.php');

$customer_id = filter_input(INPUT_POST, 'customer_id', FILTER_VALIDATE_INT);
$query = 'SELECT * FROM customers WHERE customerID = :customer_id';
$statement = $db->prepare($query);
$statement->bindValue(':customer_id', $customer_id);
$statement->execute();
$customer = $statement->fetch();
$statement->closeCursor();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Update Customer</title>
        <link rel="stylesheet" type="text/css" href="/phpassignment2/tech_support/main.css">
    </head>
    <body>
        <?php include('../view/header.php'); ?>
        <main>
            <h1>View/Edit Customer</h1>
            <form action="update_customer.php" method="post" id="aligned">
                <div id="data">
                    <input type="hidden" name="customer_id" value="<?php echo htmlspecialchars($customer['customerID']); ?>">
                    <label>First Name:</label>
                    <input type="text" name="first_name" value="<?php echo htmlspecialchars($customer['firstName']); ?>"><br>
                    <label>Last Name:</label>
                    <input type="text" name="last_name" value="<?php echo htmlspecialchars($customer['lastName']); ?>"><br>
                    <label>Email:</label>
                    <input type="text" name="email" value="<?php echo htmlspecialchars($customer['email']); ?>"><br>
                    <label>Address:</label>
                    <input type="text" name="address" value="<?php echo htmlspecialchars($customer['address']); ?>"><br>
                    <label>City:</label>
                    <input type="text" name="city" value="<?php echo htmlspecialchars($customer['city']); ?>"><br>
                    <label>State:</label>
                    <input type="text" name="state" value="<?php echo htmlspecialchars($customer['state']); ?>"><br>
                    <label>Postal Code:</label>
                    <input type="text" name="postal_code" value="<?php echo htmlspecialchars($customer['postalCode']); ?>"><br>
                    <label>Country Code:</label>
                    <input type="text" name="country_code" value="<?php echo htmlspecialchars($customer['countryCode']); ?>"><br>
                    <label>Phone:</label>
                    <input type="text" name="phone" value="<?php echo htmlspecialchars($customer['phone']); ?>"><br>
                    <label>Password:</label>
                    <input type="text" name="password" value="<?php echo htmlspecialchars($customer['password']); ?>"><br>
                </div>
                <div id="buttons">
                    <label>&nbsp;</label>
                    <input type="submit" value="Update">
                </div>
            </form>
            <p><a href="index.php">Search Customers</a></p>
            <?php include('../view/footer.php'); ?>
        </main>
    </body> 
</html>