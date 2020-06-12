<?php

    $login = false;
    $showErrorAlert = false;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include 'partials/_db_connect.php';
        $username = $_POST['username'];
        $password = $_POST['password'];
 

        $sql = "SELECT * FROM `user124` WHERE `username` = '$username' AND `password` = '$password'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num == 1){
            $login = true;
            // Creating session for the user
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("location: welcome.php");
        }   
        
        else{
            $showErrorAlert = "Wrong credentials";
        }
    }

?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>
    <?php require "partials/_navbar.php" ?>

    <?php
        if($login){
            echo ' <div class="alert alert-dismissible fade show col-md-10 container my-3 alertBar" id="alert"role="alert" style="max-width: 840px;">
                        <strong>Yahooo!</strong> Your account has been successfully created.
                        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
        }

        if($showErrorAlert){
            echo ' <div class="alert alert-dismissible fade show col-md-10 container my-3 alertErrorBar" id="alert"role="alert" style="max-width: 840px;">
                        <strong>Hufffff! </strong>'.$showErrorAlert.'.
                        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
        }
    ?>
   
   <!-- Contaier for login -->
    <div class="container my-5">

        <div class="card shadow-lg" style="max-width: 840px; margin: 0 auto; margin-top: 100px; border-radius: 1.5rem; border: none">

            <div class="card-header" style="border-radius: 1.5rem 1.5rem 0 0;">
                <h5 class="my-1 mx-2 text-dark">Login to your account</h5>
            </div>

            <div class="row no-gutters">
                <div class="col-md-5 my-5 p-4">
                    <img src="./images/login.svg" class="card-img w-100" alt="...">
                </div>
                <div class="col-md-7">
                    <div class="card-body p-5">

                        <form action="/Login/login.php" method="post">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control " id="username" name="username" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control " id="password" name="password">
                                <small class="form-text text-muted">Forgot your password?</small>
                            </div>

                            <button type="submit" class="btn btn-color btn-block my-4">Login</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>