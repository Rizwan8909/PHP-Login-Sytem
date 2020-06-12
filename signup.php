<?php

    $showAlert = false;
    $showErrorAlert = false;
 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include 'partials/_db_connect.php';
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        // $exists = false;

        // Query to check whether username already exists or not
        $sqlExists = "SELECT * FROM `user124` WHERE `username` = '$username'";
        $resultExists = mysqli_query($conn, $sqlExists);
        $numExists = mysqli_num_rows($resultExists);

        if($numExists > 0){
            // $exists = true;
            $showErrorAlert = "This username is already taken by some other user";
        }

        else{


            // && $exists == false
            if(($password == $cpassword)){
                $sql = "INSERT INTO `user124` (`username`, `password`, `date`) VALUES ( '$username', '$password', current_timestamp())";
                $result = mysqli_query($conn, $sql);
                if($result){
                    $showAlert = true;
                }   
            }
            else{
                $showErrorAlert = "Password doesn't match";
            }
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
    <title>Signup</title>
</head>

<body>
    <?php require "partials/_navbar.php" ?>
    
    <?php
        if($showAlert){
            echo ' <div class="alert alert-dismissible fade show col-md-10 container my-3 alertBar" id="alert"role="alert">
                        <strong>Yahooo!</strong> Your account has been successfully created.
                        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
        }

        if($showErrorAlert){
            echo ' <div class="alert alert-dismissible fade show col-md-10 container my-3 alertErrorBar" id="alert"role="alert">
                        <strong>Hufffff! </strong>'.$showErrorAlert.'.
                        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
        }
    ?>

  


    <div class="container col-md-10 bg-white main-container shadow-lg">


        <div class="container col-md-5 left">

            <form action="/Login/signup.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control " id="username" name="username" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control " id="password" name="password">
                </div>
                <div class="form-group">
                    <label for="cpassword">Confirm Password</label>
                    <input type="password" class="form-control" id="cpassword" name="cpassword">
                    <small id="cpasswordhelp" class="form-text text-muted">Make sure your password match</small>
                </div>

                <button type="submit" class="btn btn-color btn-block my-4">Register</button>
            </form>
        </div>

        <div class="container col-md-5 right">
            <img src="./images/side2.svg" class="img-fluid" alt="Just a side image">
        </div>

    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script>
      
    </script>
</body>