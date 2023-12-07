
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Password Recovery</title>
</head>

<body style="background:#CCC">

    <!--Navigation Bar-->
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container">
            <a href="index.php" class="navbar navbar-brand"><h3> L&R System </h3></a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Services</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">About</a>
                </li>
                <?php
                if (isset($_SESSION['Email']) || isset($_COOKIE['email'])) {
                ?>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">Logout</a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="nav-item">
                        <a href="login.php" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="register.php" class="nav-link">Register</a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </nav>

    <!--Main Page-->
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card bg-light mt-5 py-2">
                    <h3 class="text-center">Password Recovery</h3>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="email">Enter your email:</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Reset Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
