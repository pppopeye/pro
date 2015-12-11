<?php
    include 'c_head.php';
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
ORDER BY store.S_id';

//preparing the statement
$sth = $conn->prepare($sqlSelect);

//execute the statement with different values

$sth->execute(array());
    
                    ?>

                    <h2 align='center'><strong>รายละเอียด</strong>สินค้าในคลัง</h2>
                        <hr>
            <div class="col-xs-12 col-md-12">
                <div class="col-xs-10 col-md-5">

                                <table>
                                    <tr>
                                        <td>วันที่</td>
                                        <td>ชื่อสินค้า</td>
                                        <td>หมวดหมู่สินค้า</td>
                                        <td>จำนวน</td>
                                        <td></td>
                                    </tr>
                                    <?php
                                        foreach ($sth->fetchAll() as $row) {
                                    ?>
                    
                                    <tr>
                                        <td>
                                            <input type='text' name='S_date' id='S_date' value='<?php echo $row['S_date'] ?>'>
                                        </td>
                                        <td>
                                            <input type='text' name='S_nameproduct' id='S_nameproduct' value='<?php echo $row['S_nameproduct'] ?>'>
                                        </td>
                                        <td>
                                            <input type='text' name='S_type' id='S_type' value='<?php echo $row['Pt_name'] ?>'>
                                        </td>
                                        <td>
                                            <input type='text' name='S_total' id='S_total' value='<?php echo $row['S_total'] ?>'>
                                        </td>
                                        <td>
                                            <a href="store_detail.php?id=<?=$row['S_id'] ?>"><input type='button' value='ดูรายละเอียด'> </a>
                                        </td>
                                    </tr>
                                </table>
                    <?php
                        }
                    ?>
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