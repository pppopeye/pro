<?php
    include 'c_head.php';
    $id =$_GET['id'];
?>
    <div class='container'>
        <div class='row'>
            <!-- menu -->
            <?php
            include 'c_menu.php';
            ?>
            <!-- end menu -->
            <div class='col-xs-12 col-sm-9'>
<?php

//setting connection parameters
$user = "root";
$password = "";
$database_name = "test";
$hostname = "localhost";
$dsn = 'mysql:dbname=' . $database_name . ';host=' . $hostname;

//initialize the connection to the database
$conn = new PDO($dsn, $user, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

//select statement with variables
//$sqlSelect = 'SELECT P_id,P_name FROM post';
$sqlSelect = 'SELECT store.*,ptype.id,ptype.Pt_name 
FROM store
INNER JOIN ptype 
ON store.S_type=ptype.id
WHERE store.S_id='.$id.';';

//preparing the statement
$sth = $conn->query($sqlSelect);

//execute the statement with different values
$row =$sth->fetchObject();
    
                    ?>

                    <h2 align='center'><strong>รายละเอียด</strong>สินค้าในคลัง</h2>
                        <hr>
            <div class="col-xs-12 col-md-12">
                <div class="col-xs-10 col-md-5">
                                        วันที่
                                            <input type='text' name='S_date' id='S_date' value='<?=$row->S_date ?>' class='form-control'>
                                        
                                        ชื่อสินค้า
                                            <input type='text' name='S_nameproduct' id='S_nameproduct' value='<?=$row->S_nameproduct ?>' class='form-control'>
                                        
                                        หมวดหมู่สินค้า
                                            <input type='text' name='S_type' id='S_type' value='<?=$row->Pt_name ?>' class='form-control'>
                                        
                                        จำนวน
                                            <input type='text' name='S_total' id='S_total' value='<?=$row->S_total ?>' class='form-control'>

                </div>

            </div>

            </div>

        </div>

    </div>
    <br>
    <br>
    <br>
    <br>
<!-- footer -->
<?php
require_once 'c_footer.php';
?>
<!-- end footer -->