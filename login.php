<?php
session_start();

if( isset($_SESSION["login"]) ) {
    header("location:index.php?view=dashboard");
    exit;
}

require 'database/functions.php';

if ( isset($_POST["login"]) ) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    //cek username
    if ( mysqli_num_rows($result) === 1 ) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if( password_verify($password, $row["password"]) ) {
            // set session
            $_SESSION["login"] = true;

            header("location:index.php?view=dashboard");
            exit;
        }
    }

    $error = true;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Admin Panel</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">


    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-7">
                <div class="card o-hidden border-0 shadow-lg my-5">

                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Admin Area</h1>
                                    <?php if( isset($error) ) : ?> 
                                        <div class="alert alert-danger">
                                            <strong>Peringatan :</strong> Password/Username Salah!
                                        </div>
                                    <?php endif; ?>
                                    </div>
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="username">Username :</label>
                                            <input type="text" class="form-control form-control-user" name="username" id="username" placeholder="Masukan Username Anda" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password :</label>
                                            <input type="password" class="form-control form-control-user" name="password" id="password" placeholder=" Masukan Password" required>
                                        </div>
                                        <button type="submit" name="login" class="btn btn-primary btn-user btn-block">Login</button>
                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="forgot-password.php">Forgot Password?</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>