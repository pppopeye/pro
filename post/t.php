<!-- header -->
<?php
require_once 'c_head.php';
?>
<!-- end header -->

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
$sqlSelect = 'SELECT post.*,post_detail.Pd_price FROM post INNER JOIN post_detail ON post.P_id=post_detail.P_id ORDER BY post.P_id;';

//preparing the statement
$sth = $conn->prepare($sqlSelect);

//execute the statement with different values

$sth->execute(array());

//
?>
<!-- Body -->
<div class='container'>
    <div class='row'>
        <!-- menu -->
        <div class="col-md-1"></div>
        <!-- end menu -->
        <div class='col-xs-12 col-md-10'>

            <div class='row'>

                <div class="col-xs-12 col-md-12" >
                    <h3>Name product type</h3>
                </div>

                <div class="col-xs-6 col-md-12">
                    <?php
                    foreach ($sth->fetchAll() as $row) {
                        ?>
                        <div class="col-xs-12 col-md-3">
                            <a href="product_detail.php?id=<?= $row['P_id']?>">
                                <!--<a href="product_detail.php">
                                    <input type="hidden" name="id" value="<?//$row['p_id']?>"/>-->
                                <img src="..." alt="..." class="img-rounded" width="250px" height="200px"></a>
                            <p><?php echo $row['P_name'].'<p align="right">????'.$row['Pd_price'].'???</p>'; ?></p>
                        </div><!--/.col-xs-12.col-md-3-->
                        <?php
                    }
                    ?>
                </div><!--/.col-xs-6.col-md-4-->
            </div><!--/row-->


        </div>

    </div>
</div>
<!-- footer -->
<?php
require_once 'c_footer.php';
?>
<!-- end footer -->