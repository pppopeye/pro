<?php
session_start();
session_destroy();
header("location: login.php"); // ไปยังหน้า login.php
?>