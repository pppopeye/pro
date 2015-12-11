<?php

if(empty($_POST)){

}else{
try {

$servername = "localhost";
$username = "username";
$password = "";
$dbname = "test";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id=3;
    
    $sql = "UPDATE mfile SET Mf_upload=:Mf_file WHERE Mf_id='".$id."'";

    // Prepare statement
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":Mf_file", $_POST['Mf_file']);


    // execute the query
    $count = $stmt->execute(); 

    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . " records UPDATED successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;

}

?>
<form method='post' action=''>
<input type='text' name='Mf_file'>
<button type'submit' name='submit'>UPDATE</button>
</form>