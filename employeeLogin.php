<?php
include "connection/connect.php";

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center text-dark mt-5">Admin login</h2>   
                <div class="card my-5">
                    <form class="card-body cardbody-color p-lg-5">
                        <div class="text-center">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRAExe-8gw8f6a9EiBUzjmsavX03D_spiSyaw&s" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"width="200px" alt="profile">
                        </div>
                        <div class="mb-3">
                            <p>Email *</p>
                            <input type="text" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Please enter your email">
                        </div>
                        <div class="mb-3">
                            <p>Password *</p>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Please ennter your password">
                        </div>
                        <div class="text-center"><button type="submit" class="btn btn-primary">Login</button></div>
                        <p>You are admin? <a href="index.php">Login here.</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>