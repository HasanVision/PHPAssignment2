<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <link rel="stylesheet" type="text/css" href="/phpassignment2/tech_support/main.css">
        <title>Update customer - Confirmation</title>
    </head>
<body>
    <?php include ("header.php"); ?>
    <main>
        <div>
            <h2>Thank you for updating customer information.</h2>
            <p><?php echo htmlspecialchars($_SESSION['first_name']); ?> has been updated in your contact list.</p>
        </div>
        <p><a href="index.php">Search Customers</a></p>
    </main>
    <?php include ("footer.php"); ?>
</body>
</html>