<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    try {
        $conn = new PDO
        (
            "mysql:host=$servername;dbname=$dbname",
            $username,
            $password,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
        );
        // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
/*
        // prepare sql and bind parameters
        $stmt = $conn->prepare("INSERT INTO ptype_all (Pt_name,Pt_names)
        VALUES (:Pt_name,:Pt_names)");
        $stmt->bindParam(':Pt_name', $Pt_name);
        $stmt->bindParam(':Pt_names', $Pt_names);

        $form = $_POST;
        $Pt_name= $form['Pt_name'];
        $Pt_names= $form['Pt_names'];
        $stmt->execute();

        echo "New records created successfully";


*/
        
        }
            catch(PDOException $e)
            {
                echo "Error: " . $e->getMessage();
            }
                $conn = null;
?>
