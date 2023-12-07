<?php
$mysql_host = "localhost";
$mysql_database = "SocNet";
$mysql_user = "root";
$mysql_password = ""; // Check your actual password

// Connect to the server
$connection = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_database) or die("Could not connect to the server");

// Copy all of the data from the form into variables
$storename = $_POST['txtForename'];
$surname = $_POST['txtSurname'];
$username = $_POST['txtUsername'];
$email1 = $_POST['txtEmail1'];
$email2 = $_POST['txtEmail2'];
$password1 = $_POST['txtPassword1'];
$password2 = $_POST['txtPassword2'];

// Create a variable to indicate if an error has occurred or not, 0=false and 1=true.
$errorOccurred = 0;

// Make sure that all text boxes were not blank.
if ($storename == "") {
    echo "Forename was blank <br/>";
    $errorOccurred = 1;
}

if ($surname == "") {
    echo "Surname was blank <br/>";
    $errorOccurred = 1;
}

if ($username == "") {
    echo "Username was blank <br/>";
    $errorOccurred = 1;
}

if ($email1 == "" || $email2 == "") {
    echo "Email not provided <br/>";
    $errorOccurred = 1;
}

if ($password1 == "" || $password2 == "") {
    echo "Password empty, check it. <br/>";
    $errorOccurred = 1;
}

// Check if username already exists in the database.
$userResult = $connection->query("SELECT * FROM SystemUser");

// Loop through from the first to the last record
while ($userRow = mysqli_fetch_array($userResult)) {
    // Check to see if the current user's username matches the one from the user
    if ($userRow['Username'] == $username) {
        echo "The username has already been used!<br/>";
        $errorOccurred = true;
    }
}

// Check to see if the email address is registered
$userResult = $connection->query("SELECT * FROM SystemUser");

// Loop through from the first to the last record
while ($userRow = mysqli_fetch_array($userResult)) {
    // Check to see if the Email entered matches with any value in the database
    if ($userRow['Email'] == $email1) {
        echo "This email address has already been used!<br/>";
        $errorOccurred = true;
    }
}

// Check to make sure that email addresses contain '@'
if (strpos($email1, '@') === false || strpos($email2, '@') === false) {
    echo "The email address is not valid!<br/>";
    $errorOccurred = true;
}

// Check to make sure that emails match
if ($email1 != $email2) {
    echo "Emails do not match!<br/>";
    $errorOccurred = true;
}

// Check to see if password values match
if ($password1 != $password2) {
    echo "The passwords are different!<br/>";
    $errorOccurred = true;
}

// Check if an error has occurred, then add the details to the database
if (!$errorOccurred) {
    // Sanitize data before using in SQL queries to prevent SQL injection attacks
    $storename = mysqli_real_escape_string($connection, $storename);
    $surname = mysqli_real_escape_string($connection, $surname);
    // ... sanitize other variables similarly
    
    // Add all of the contents of the variables to the Systemuser table
    $sql = "INSERT INTO Systemuser (Username, Password, Forename, Surname, Email) 
            VALUES ('$username', '$password1', '$storename', '$surname', '$email1')";
    
    if ($connection->query($sql) === TRUE) {
        // Thank the new user for joining
        echo "Hello $storename $surname!<br/>";
        echo "Thank you for joining the Computing Security network";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}
