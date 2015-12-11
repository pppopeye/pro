<?php
session_start();
if ( !isset($_SESSION["fullname"]) ) {
    header("location: login.php");
}
?>
<?php
include_once 'c_header.php';
?>
<div class="container">
    <div class="row">
        <?php
        include_once 'c_menuA.php';
        ?>

        <form method="post" action="amAddStoreStatus.php">
            <!-- style='"background-color:#c1e2b3;' -->
            <h2 align='center'><strong>เพิ่ม</strong>สถานะการบริการ</h2>
            <hr>
            <div class="col-xs-12 col-md-12">

                <div class="col-xs-12 col-md-3">
                    สถานะการบริการ :
                </div>

                <div class="col-xs-12 col-md-6">
                    <input type="text" name="Ss_status" id="Ss_status" class="form-control">
                </div>

                <div class="col-xs-12 col-md-3">
                    <button type="submit" name="submit" id="submit" class="btn btn-default " ><strong>เพิ่มหมวดหม</strong></button>
                </div>

            </div>
    </div>
    <div class="col-xs-12 col-md-12">
        <br>
        <br>
        <hr>
    </div>
    </form>

    <?php

    if(empty($_POST))
    {

    } else {
        $servername = "localhost";
        $username = "root";
        $password = "";
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

            // prepare sql and bind parameters
            $sql = $conn->prepare("INSERT INTO store_status (Ss_status) VALUES (:Ss_status)");
            $sql->bindParam(':Ss_status', $Ss_status);

            // insert a row
            $form = $_POST;
            $Ss_status = $form['Ss_status'];
            $sql->execute();

            echo "<script>window.location='amAddStoreStatus.php';</script>";

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }
    ?>
</div>
<!-- body -->

</div> <!-- end row-->

</div>
<?php
include_once '../theme/c_footer.php';
?>
