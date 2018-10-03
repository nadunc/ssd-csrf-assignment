<?php

require "helpers/CSRF.php";

session_start();

if (!isset($_SESSION['valid']) || $_SESSION['valid'] == false){
    header("location:login.php");
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Home</title>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand d-lg-none" href="#">CSRF</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ml-3">
                    <a class="nav-link" href="#">Portofolio</a>
                </li>
                <li class="nav-item ml-3">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item ml-3">
                    <a class="nav-link" href="#">Contact</a>
                </li>

            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link btn text-white btn-dark btn-sm" href="logout.php">Logout</a>
                </li>
            </ul>

        </div>

    </div>
</nav>


<div class="container">
    <div class="col-md-6 offset-md-3 mt-5">
        <form method="post" action="validatecsrf.php">
            <input type="hidden" id="csrf" name="csrf" />
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" class="form-control" name="age" id="age" placeholder="Enter age">
            </div>
            <button type="submit" class="btn btn-primary float-right">Submit</button>

        </form>
    </div>
</div>


<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        csrf_cookie = $.cookie("csrf_cookie");
        $('#csrf').val(csrf_cookie);
    });
</script>

<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>
</html>

