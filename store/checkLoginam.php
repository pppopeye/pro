<?php
session_start();
include "connect.php";
$username = $_POST["username"];
$password = $_POST["password"];

$result = $conn->query("SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
$row = $result->fetch();
if ($row) {
    $_SESSION["fullname"] = $row["a_id"];
    $_SESSION["username"] = $row["username"];

    echo "<script>window.location='amAdmin.php';</script>";
} else {
    header("location: login.php?error=1");
}
?>