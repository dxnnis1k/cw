<?php
// Server and db connection
$servername = "localhost";
$rootUser = "root";
$db = "SocNet";
$rootPassword = "";

// Create connection
$conn = new mysqli($servername, $rootUser, $rootPassword, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// values come from user, through webform
$username = $_POST['txtUsername'];
$password = $_POST['txtPassword'];

// query
$userQuery = "SELECT * FROM SystemUser";
$userResult = $conn->query($userQuery);

// flag variable
$userFound = false;

if ($userResult->num_rows > 0) {
    echo "<table border='1'>";
    while ($userRow = $userResult->fetch_assoc()) {
        if ($userRow['Username'] == $username) {
            $userFound = true;
            if ($userRow['Password'] == $password) {
                echo "Hello " . $username . "!";
                echo "<br/> Welcome to our website";
            } else {
                echo "Wrong Password";
            }
        }
    }
    echo "</table>";
}

if (!$userFound) {
    echo "This user was not found in our database";
}
?>
