<!-- header -->
<?php
require "c_head.php";
?>
<!-- end header -->
<?php

//$id = $_POST['id'];
//$id = $_GET['id'];
$id = 1;

//setting connection parameters
$user = "root";
$password = "";
$database_name = "test";
$hostname = "localhost";
$dsn = 'mysql:dbname=' . $database_name . ';host=' . $hostname;

//initialize the connection to the database
$conn = new PDO($dsn, $user, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

//select statement with variables
//$sqlSelect = 'SELECT * FROM post WHERE P_id='.$id.';';
//$sqlSelect = 'SELECT post.*,post_detail.* FROM post INNER JOIN post_detail ON post.P_id=post_detail.P_id WHERE post.P_id= '.$id.';';
$sqlSelect = 'SELECT post.*,post_detail.*,ptype.* FROM post JOIN post_detail ON post.P_id=post_detail.P_id JOIN ptype ON ptype.id=post.P_type WHERE post.P_id= '.$id.';';
$stmt = $conn->query($sqlSelect);
$row =$stmt->fetchObject();


//
?>
<!-- Body -->
<div class='container'>
    <div class='row'>
        <!-- menu -->
        <?php
        require_once 'c_menu.php';
        ?>
        <!-- end menu -->
        <div class='col-xs-12 col-sm-9'>
            <div class="col-xs-12 col-lg-7">
                <br>
                <img src="..." alt="..." class="img-rounded" width="400px" height="350px">
                <h3> Product</h3>
            </div>
            <div class="col-xs-12 col-lg-5">
                <br>
                <img src="..." alt="..." class="img-rounded" width="200px" height="150px">
                <br>
                <img src="..." alt="..." class="img-rounded" width="200px" height="150px">
                <br>
                <img src="..." alt="..." class="img-rounded" width="200px" height="150px">

            </div>

            <div class="row">
                <div class="col-xs-12 col-lg-4">
                    Type Post:
                    <input type="radio" name="typepost" class="form">SEll
                    <input type="radio" name="typepost" class="form">BUY
                    <br>
                    Name Post:
                    <input type="text" name="post" class="form-control" value="<?= $row->P_name ?>">

                    Name Product:
                    <input type="text" name="product" class="form-control" value="<?= $row->P_namepro ?>">

                    จำนวน:
                    <input type="text" name="total" class="form-control" value="<?= $row->Pd_total ?>">

                    ราคา:
                    <input type="text" name="price" class="form-control" value="<?= $row->Pd_price ?>">

                    ประเภทสินค้า:
                    <input type="text" name="type" class="form-control" value="<?= $row->Pt_name ?>">
                    <br>
                </div>
            </div>
        </div><!--/row-->
    </div><!--/.col-xs-12.col-sm-12-->
</div><!--/.container-->
<?php
require "c_footer.php";
?>