<?php

session_start();

include('db.php');
$email = $_SESSION['email'];
$sql = "SELECT * FROM `demo1` WHERE email = '$email'";
$run = mysqli_query($con,$sql);
$data = mysqli_fetch_assoc($run);
$note = $data['note'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diary</title>
    <style>
        * {
            margin: 0px;
            padding: 0px;
            font-family: 'Roboto', sans-serif;
        }
        
        body {
            background: url("https://images.pexels.com/photos/2757549/pexels-photo-2757549.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500");
            background-size: cover;
            background-position: center;
            height: 100vh;
        }
        
        .navbar {
            background-color: #fff;
            padding: 15px;
            width: auto;
        }
        
        .navbar-brand {
            font-size: large;
        }
        
        .btn {
            float: right;
            padding: 5px 10px;
            background-color: #fff;
            border-radius: 5px;
            border-color: rgb(194, 194, 194);
            color: rgb(0, 170, 0);
            cursor: pointer;
        }
        
        .btn:hover {
            background-color: rgb(0, 170, 0);
            color: #fff;
        }
        
        .text {
            padding: 20px 10px;
        }
        
        @media screen and (max-width: 770px) {
            .textarea {
                width: 100px;
            }
        }
    </style>
</head>

<body>
    <form action="./logout.php" method="post" class="diary-text">
        <nav class="navbar">
            <a class="navbar-brand">Secret Diary</a>
            <button name="logout" class="btn" type="submit">Logout</button>
        </nav>
        <div class="text">
            <textarea id="text-area" name="notes" rows="30" cols="160"><?php echo $note;?></textarea>
        </div>
    </form>
</body>

</html>