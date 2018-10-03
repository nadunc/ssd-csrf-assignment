<?php

?>

<?php

require "helpers/CSRF.php";

session_start();
$error = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $password = "";

    if(isset($_POST["username"])){
        if(isset($_POST["password"])){
            $username = trim($_POST["username"]);
            $password = trim($_POST["password"]);
        }
    }


    if($username == "admin" && $password == "admin"){
        $salt = $username;

        $_SESSION['valid'] = true;
        $_SESSION['username'] = $username;

        $csrf = new CSRF();
        $csrf->generateToken(session_id(), $salt);

        header("location:index.php");

    }else{
        $error = "Invalid credentials";

    }

}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Login</title>
</head>
<body>


<div class="container">
    <div class="col-md-4 offset-md-4">
        <h1 class="text-center mt-5">Login</h1>
        <?php if($error != ""){?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php }?>
        <div class="card mt-5">
            <div class="card-body">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="form-group">
                        <label for="username">Email address</label>
                        <input type="text" class="form-control" id="username" name="username" value="admin" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="admin" placeholder="Password">
                    </div>

                    <button type="submit" class="btn btn-block btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
