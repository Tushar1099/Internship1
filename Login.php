<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Secret Diary</title>
</head>



<body>

    <div id="wrapper">
        <div class="main-content">
            <div class="header">
                <h1>Secret Diary</h1>
                <h4>Store your thoughts permanently and securely.</h4>
                
                    <?php
                    include 'db.php';
                    if (isset($_POST['login'])) {
                        echo '<div class="warning" style="color: black; background-color: white; padding: 10px; border: 2px solid black; border-radius: 5px;">';
                        $email = $_POST['email'];
                        $pass = $_POST['password'];
                        if (strlen($email) == 0 || strlen($pass) == 0) {
                            echo "Email Or Password is Empty!";
                        } else {
                            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                $sql = "SELECT * FROM `demo1` WHERE email = '$email'";
                                $run = mysqli_query($con, $sql);
                                if (mysqli_num_rows($run) <= 0) {
                    ?>
                                    <script>
                                        alert("Not Registered!");
                                    </script>
                                    <?php
                                } else {
                                    $data = mysqli_fetch_assoc($run);
                                    $pass1 = $data['password'];
                                    if (password_verify($pass, $pass1)) {
                                        $_SESSION['email'] = $email;
                                        header('location:Diary.php');
                                    } else {
                                    ?>
                                        <script>
                                            alert("Wrong Password!");
                                        </script>
                    <?php
                                    }
                                }
                            } else {
                                echo "Email Is Invalid";
                            }
                        }
                        echo '</div>';
                    }

                    ?>
                <p>Log in using your username and password.</p>

            </div>
            <form action="" method="post">
                <div class="sub-part">
                    <div class="overlap-text">
                        <input type="text" name="email" placeholder="Your Email" class="input-1">
                        <a href="#"><i class="fa fa-envelope"></i></a>
                    </div>
                    <div class="overlap-text">
                        <input type="password" name="password" placeholder="Password" class="input-2" />
                        <a href="#"><i class="fa fa-key"></i></a>
                    </div>
                    <div class="checkbox1">
                        <input type="checkbox"><span id="checkbox-span"> Stay logged in</span>
                    </div>
                    <button type="submit" name="login" class="btn">Log In!</button>
                    <div class="log-in-link">
                        <a href="./Signup.php">Sign Up</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>