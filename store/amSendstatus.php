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

        <!-- body -->
        <div class="col-xs-6" >
            <?php

            $id= $_REQUEST['id'];
            $user = "root";
            $password = "1234";
            $database_name = "store";
            $hostname = "localhost";
            $dsn = 'mysql:dbname=' . $database_name . ';host=' . $hostname;

            //initialize the connection to the database
            $conn = new PDO($dsn, $user, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

            $sqlSelect = 'SELECT sendorder.*,store_status.* FROM sendorder INNER JOIN store_status ON sendorder.status=store_status.Ss_id WHERE id='.$id.';';

            //preparing the statement
            $sth = $conn->query($sqlSelect);

            //execute the statement with different values

            $row =$sth->fetchObject();

            ?>
            <h3>รายการสินค้า</h3><br>
            <div class="jumbotron">
                <form method="post" action="">
                วันที่
                <input type="text" name="date" value="<?=$row->datesend ?>" class="form-control" readonly>

                ชื่อสินค้า
                <input type="text" name="nameproduct" value="<?=$row->nameproduct ?>" class="form-control" readonly>

                จำนวน
                <input type="text" name="totalproduct" value="<?=$row->totalproduct ?>" class="form-control" readonly>

                ที่อยู่จัดส่ง
                <input type="text" name="address" value="<?=$row->address ?>" class="form-control" readonly>

                *สถานะ
                <input type="text" name="status" value="<?=$row->Ss_status ?>" class="form-control">

                <br>
                <button class="btn btn-default"><a href="amAdmin.php">บันทึก</a></button>
                </form>
            </div>
</div>
<!-- body -->

</div> <!-- end row-->

</div>
<?php
include_once '../theme/c_footer.php';
?>