<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Add Technician </title>
        <link rel="stylesheet" type="text/css" href="/phpassignment2/tech_support/main.css">
    </head>
<body>
    <?php
    include('../view/header.php');
    ?>
    <main>
    <h1>Add Technician</h1>
    <form action="add_technician.php" method="post" id="aligned">
        <label>First name:</label>
        <input type="text" name="first_name" required><br>
        
        <label>Last name:</label>
        <input type="text" name="last_name" required><br>
        
        <label>Email:</label>
        <input type="text" name="email" required><br>
        
        <label>Phone:</label>
        <input type="text" name="phone" required> <br>

        <label>Password:</label>
        <input type="text" name="password" required> <br>
        
        <label>&nbsp;</label>
        <input type="submit" value="Add Technician"><br>
    </form>
    <p><a href="/phpassignment2/tech_support/technician_manager">View Technicians List</a></p>
    <?php
    include('../view/footer.php'); 
    ?>   
</main>
    
</body>