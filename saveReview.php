<?php
include "db.php";

session_start();

$name       = $_POST['name'];
$email      = $_POST['email'];
$comment    = $_POST['comment'];
$product_id = $_POST['product_id'];

$sql = "INSERT INTO review (product_id, name, email, comment) VALUES ('$product_id', '$name', '$email', '$comment')";

if (mysqli_query($conn, $sql)) {
  echo "<center><div class='alert alert-success'>Review has been added successfully</div></center>";
}