<?php

session_start();




include "db.php";

$email = $_SESSION['email'];
$notes = $_POST['notes'];

$sql = "UPDATE `demo1` SET `note`='$notes' WHERE `email` = '$email'";
$run = mysqli_query($con,$sql);

if(isset($run))
{
    ?>
    <script>
        alert("Saved Successfully!");
    </script>
    <?php
}

unset($_SESSION['email']);

header('location:Login.php');
?>