<?php
require('../model/database.php');



try {
    $query = 'SELECT * FROM customers ORDER BY lastName';
    $statement = $db->prepare($query);
    $statement->execute();
    $customers = $statement->fetchAll();
    $statement->closeCursor();
} catch (PDOException $e) {
    echo 'Database Error: ' . $e->getMessage();
    exit();
}

// $action = filter_input(INPUT_POST, 'action');
// if ($action === NULL) {
//     $action = filter_input(INPUT_GET, 'action');
//     if ($action === NULL) {
//         $action = 'under_construction';
//     }
// }

// if ($action == 'under_construction') {
//     include('../under_construction.php');
// }

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Customer Manager</title>
        <link rel="stylesheet" type="text/css" href="/phpassignment2/tech_support/main.css">
    </head>
<body>
    <?php
    include('../view/header.php');
    ?>
    <main>
    <h1>Customer Search</h1>
    <form action="search_costomer.php" method="post">
        <input type="hidden" name="action" value="search_customers">
        <label>Last Name:</label>
        <input type="text" name="last_name">
        <input type="submit" value="Search">
    </form>
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email Address</th>
                <th>city</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer) : ?>
            <tr>
                <td><?php echo htmlspecialchars($customer['firstName']); ?></td>
                <td><?php echo htmlspecialchars($customer['lastName']); ?></td>
                <td><?php echo htmlspecialchars($customer['city']); ?></td>
                <td><form action="select_customer.php" method="post">
                    <input type="hidden" name="customer_id" value="<?php echo htmlspecialchars($customer['customerID']); ?>">
                    <input type="submit" value="Select">
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="/phpassignment2/tech_support/customer_manager/select_customer_form.php">Add product</a>
    <?php
    include('../view/footer.php');
    ?>
     </main>
</body>
</html>
