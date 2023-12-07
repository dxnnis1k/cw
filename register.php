<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Login & Registration System With Email Activation</title>
</head>
 
<body>
    <!-- Navigation Bar -->
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
                
                    if(isset($_SESSION['Email']) || isset($_COOKIE['email']))
                    {
                ?>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">Logout</a>
                    </li>
                <?php
                    }
                    else
                    {
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

    <!-- Registration Form -->
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card bg-light mt-5 py-2">
                    <div class="card-title">
                        <h2 class="text-center mt-2"> Registration Form</h2>
                        <hr>
                    </div> 
                    <div class="card-body">
                        <form action="registercheck.php" method="POST">
                            <input type="text" name="txtForename" placeholder="Enter your Forename" class="form-control py-2 mb-2">
                            <input type="text" name="txtSurname" placeholder="Enter your Surname" class="form-control py-2 mb-2">
                            <input type="text" name="txtUsername" placeholder="Enter your Username" class="form-control py-2 mb-2">
                            <input type="email" name="txtEmail1" placeholder="Email" class="form-control py-2 mb-2">
                            <input type="email" name="txtEmail2" placeholder="Confirm Email" class="form-control py-2 mb-2">
                            <input type="password" name="txtPassword1" placeholder="Enter your Password" class="form-control py-2 mb-2">
                            <input type="password" name="txtPassword2" placeholder="Confirm Password" class="form-control py-2 mb-2">
                            <button type="submit" class="btn btn-success float-right">Register Now!</button>
                        </form>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
