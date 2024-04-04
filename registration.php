<?php
// Database connection
$servername = "localhost";
$username = "root"; // Change this if your MySQL username is different
$password = ""; // Change this if your MySQL password is different
$dbname = "sample";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];

    // Insert data into database
    $sql = "INSERT INTO registration (username, password, firstname, surname, email)
            VALUES ('$username', '$password', '$firstname', '$surname', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./style.css">
  <style>
    .registration-form input {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
      font-family: 'Roboto', sans-serif;
      font-size: 16px;
    }
    .registration-form button {
      width: 100%;
      padding: 5px 15px;
      border: 2px solid #e6b7eca1;
      border-radius: 100px;
      background-color: transparent;
      color: #eee;
      cursor: pointer;
      transition: all 0.2s ease;
      font-size: large;
      font-family: 'Roboto', sans-serif;
    }
    .registration-form button:hover {
      background-color: #e6b7eca1;
    }
    .login-link {
      display: block;
      margin-top: 10px;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="container">
    <form class="registration-form" action="#" method="post">
      <h1>Registration</h1>
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="text" name="firstname" placeholder="First Name" required>
      <input type="text" name="surname" placeholder="Surname" required>
      <input type="email" name="email" placeholder="Email" required>
      <button type="submit">Register</button>
    </form>
    <a href="login.php" class="login-link" style="color: #eee;">Already have an account? Login here</a>
  </div>
</body>
</html>
