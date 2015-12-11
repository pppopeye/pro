<?php
require "c_head.php";
?><!-- Body -->
<div class='container'>
    <div class='row'>
        <!-- menu -->
        <?php
        include 'c_menu.php';

        ?>
        <!-- end menu -->

        <div class="col-xs-12 col-md-9" align="left">
            <h2>รายชื่อการใช้บริการคนกลาง</h2>
        </div>
<!-- /col-xs-12 col-md-9 -->

        <div class="col-xs-12 col-md-4">
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
$sqlSelect = 'SELECT middleman.*,post.*,middlestatus.* 
FROM middleman
JOIN post ON middleman.P_id=post.P_id
JOIN middlestatus ON middlestatus.id=middleman.Mm_status
WHERE middleman.M_id = 14
ORDER BY middleman.Mm_id';

$sth = $conn->prepare($sqlSelect);

//execute the statement with different values

$sth->execute(array());

?>
            <table>
                <tr>
                    <td>ชื่อสินค้า</td>
                    <td>สถานะ</td>
                </tr> 
                <?php
                    foreach ($sth->fetchAll() as $row) {
                ?>
                <tr>
                    <td><input type="text" name="P_namepro" value="<?= $row['P_name'] ?>"></td>
                    <td><input type="text" name="Mm_status" value="<?= $row['Mm_status'] ?>"></td>
                    <td><a href="middle_use.php"><input type="submit" onclick="alert('ok!')" value="view" ></a></td>
                    <td><a href="middle_pay.php"><input type="submit" onclick="alert('ok!')" value="pay" ></a></td>
                    <td><a href="middle_get.php?id='14'"><input type="submit" onclick="alert('ok!')" value="get" ></a></td>
                </tr>
                <?php
                    }
                    ?>
            </table>

                <br>
        </div><!-- /col-xs-12 col-md-4 -->
    </div><!-- /row -->
</div><!-- /container -->

<?php
require "c_footer.php";
?>

