<?php
session_start();
include "connect.php";
$username = $_POST["username"];
$password = $_POST["password"];

$result = $conn->query("SELECT * FROM member WHERE M_email = '$username' AND M_password = '$password'");
$row = $result->fetch();
if ($row) {
    $_SESSION["fullname"] = $row["M_id"];
    $_SESSION["username"] = $row["M_fname"];

    echo "<script>window.location='mStore.php';</script>";
} else {
    header("location: login.php?error=1");
}
?>