<!-- header -->
<?php
require_once 'c_head.php';
?>
<!-- end header -->

<!-- Body -->
<div class='container'>
    <div class='row'>
        <!-- menu -->
        <div class="col-md-1"></div>
        <!-- end menu -->
        <div class='col-xs-12 col-md-10'>

            <div class='row'>
                
<!--  div ค้นหา    -->
                <div class="col-md-offset-9">
                    <form method='post' action="">
                        <p>
                        <input type='text' name="search">
                        <input type="submit" name="submit" value='ค้นหา' class="btn btn-default">
                        </p>
                    </form>
                </div>
<!-- /div ค้นหา    -->
                <div class="col-xs-12 col-md-12" >
                    <h3></h3>
                </div>

                <div class="col-xs-6 col-md-12">
                    <?php
                if(isset($search)){
                    
                    $form = $_POST;
                    $search = $form['search'];
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
$sqlSelect = 'SELECT post.*,post_detail.Pd_price 
FROM post INNER JOIN post_detail ON post.P_id=post_detail.P_id  
WHERE P_name LIKE %'.$search.'%
ORDER BY P_id;';

//preparing the statement
$sth = $conn->prepare($sqlSelect);

//execute the statement with different values

$sth->execute(array());

//
}else{

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
}
//
?>
                    <?php
                    foreach ($sth->fetchAll() as $row) {
                        ?>
                        <div class="col-xs-12 col-md-3">
                                <a href="product_detail.php?id=<?= $row['P_id']?>">
                            <!--<a href="product_detail.php">
                                    <input type="hidden" name="id" value="<?//$row['p_id']?>"/>-->
                                <img src="<?php echo $row['P_img']; ?>" class="img-rounded" width="250px" height="200px"></a>
                                <p><?php echo $row['P_name'].'<p align="right">ราคา'.$row['Pd_price'].'บาท</p>'; ?></p>
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