<?php
session_start();
include '../view/header.php';
?>
<main>
    <h1>Error</h1>
    <p>
        <?php 
        if (isset($_SESSION['error_message'])) {
            echo htmlspecialchars($_SESSION['error_message']);
            unset($_SESSION['error_message']); 
        } else {
            echo "An unknown error occurred.";
        }
        ?>
    </p>
</main>
<?php include '../view/footer.php'; ?>