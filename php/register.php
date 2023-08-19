<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logindatabase";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $password);

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

if ($stmt->execute()) {
  echo "Registration successful!";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$stmt->close();
$conn->close();
?>
