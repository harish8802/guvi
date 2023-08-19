<?php
$collection = (new MongoDB\Client)->your_database_name->users;

$age = $_POST['age'];
$dob = $_POST['dob'];
$contact = $_POST['contact'];
$id = $_POST['id'];

$updateResult = $collection->updateOne(
  ['_id' => new MongoDB\BSON\ObjectID($id)],
  ['$set' => ['age' => $age, 'dob' => $dob, 'contact' => $contact]]
);

if ($updateResult->getModifiedCount() === 1) {
  echo "Profile updated successfully!";
} else {
  echo "Failed to update profile";
}
?>
