<?php
$user = "root";
$password = "1234";
$database_name = "store";
$hostname = "localhost";
$dsn = 'mysql:dbname=' . $database_name . ';host=' . $hostname;
$conn = new PDO($dsn, $user, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$sqlSelect = 'SELECT * FROM memberId ;;';
$sth = $conn->prepare($sqlSelect);
$sth->execute(array());

foreach($sth->fetchAll() as $row) {
$idmemi = $row['idmem']+1;
}
$conn =null;

$user = "root";
$password = "1234";
$database_name = "test";
$hostname = "localhost";
$dsn = 'mysql:dbname=' . $database_name . ';host=' . $hostname;
$conn = new PDO($dsn, $user, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$sql = $conn->prepare("INSERT INTO memid (M_id,idmem) VALUE (:M_id,:idmem);");
$sql->bindParam(":idmem",$idmemi);
$sql->bindParam(":M_id",$M_id);

$sql->execute();
$conn = null;
?>