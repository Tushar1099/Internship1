<?php
$server = 'localhost';
$username = 'root';
$password = '';
$dbname= 'demo';

$con = mysqli_connect($server,$username,$password,$dbname);

if(isset($con))
{
    ?>
    <script>
        alert("Database Connect");
    </script>
    <?php
}
else
{
    ?>
    <script>
        alert("Server Error!");
    </script>
    <?php
}

?>