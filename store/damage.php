
<?php

if(empty($_POST))
{

} else {
    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $dbname = "store";

    try {
        $conn = new PDO
        (
            "mysql:host=$servername;dbname=$dbname;",
            $username,
            $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8")

        );

        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = $conn->prepare("INSERT INTO damage (S_id,dtotal,damage,ddate) VALUES (:S_id,:dtotal,:damage,:ddate)");
        $sql->bindParam(':S_id', $S_id);
        $sql->bindParam(':dtotal', $dtotal);
        $sql->bindParam(':damage', $damage);
        $sql->bindParam(':ddate', $ddate);

        // insert a row.
        $now = date('Y-m-d');
        $form = $_POST;
        $S_id = $row['S_id'];
        $dtotal = $form['dtotal'];
        $damage = $form['damage'];
        $ddate = $now;
        $sql->execute();


        $sql2 = "UPDATE store SET S_Total = ".$row['S_Total']."-:dtotal WHERE  S_id = ".$row['S_id']."";

        $ss2 = $conn->prepare($sql2);
        $ss2->bindValue(':dtotal', $_POST['dtotal']);


        $update = $ss2->execute();


        echo "<script>window.location='amDamage.php';</script>";

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}
?>