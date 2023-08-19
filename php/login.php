<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logindatabase";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 1) {
  $stmt->bind_result($id, $hash);
  $stmt->fetch();
  if (password_verify($password, $hash)) {
    echo "Login successful!";
    session_start();
    $_SESSION['id'] = $id;
  } else {
    echo "Invalid email or password";
  }
} else {
  echo "Invalid email or password";
}

$stmt->close();
$conn->close();
?>
