<?php
include('connection.php');
?>
<html>
<header>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta3/css/bootstrap.min.css" integrity="sha512-N415hCJJdJx+1UBfULt+i+ihvOn42V/kOjOpp1UTh4CZ70Hx5bDlKryWaqEKfY/8EYOu/C2MuyaluJryK1Lb5Q==" crossorigin="anonymous" />
    
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
        </li>
        
    </ul>
</header>

<body>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "insert into Register (Name,Email,Password) values('$name','$email','$password');";
    }


    if ($_POST['name'] != NULL && $_POST['email'] != NULL && $_POST['password'] != NULL) {
        mysqli_query($conn, $sql);
        echo "registeration succesful";
        header("Location: login.php");
    }
    ?>

    <section class="h-100 h-custom" style="background-color: #8fc4b7;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-8 col-xl-6">
                    <div class="card rounded-3">
                        <img src="img3.webp" class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;" alt="Sample photo" />
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Registration Form</h3>

                            <form class="px-md-2" method="POST" action="register.php">

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1q">Name</label>
                                    <input type="text" id="form3Example1q" class="form-control" name="name" id="name" />
                                </div>

                                <div class="form-group">
                                    <label for="email">Email address:</label>
                                    <input type="email" name="email" class="form-control" id="email">
                                </div>

                                <div class="form-group">
                                    <label for="pwd">Password:</label>
                                    <input type="password" name="password" class="form-control" id="pwd">
                                </div>

                                <div class="checkbox">
                                    <label><input type="checkbox"> Remember me</label>
                                </div>

                                <button type="submit" class="btn btn-success btn-lg mb-1">Submit</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>