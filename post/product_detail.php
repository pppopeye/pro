<!-- header -->
<?php
require "c_head.php";
?>
<!-- end header -->
<?php

//$id = $_POST['id'];
$id = $_GET['id'];
//$id = 1;
//$id = $_REQUEST['id'];

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
$sqlSelect = 'SELECT post.*,post_detail.*,ptype.*,post_type.* FROM post 
JOIN post_detail ON post.P_id=post_detail.P_id 
JOIN ptype ON ptype.id=post.P_type 
JOIN post_type ON post_type.id=post.Post_type 
WHERE post.P_id= '.$id.';'
;
$stmt = $conn->query($sqlSelect);
$row =$stmt->fetchObject();

?>
<!-- Body -->
<div class='container'>
    <div class='row'>

<!-- menu -->
        <?php
        //require_once 'c_menu.php';
        ?>
<!-- end menu -->

        <div class='col-xs-12 col-sm-9'>
            <div class="col-xs-12 col-sm-7">
                
                <img src="<?= $row->P_img ?>" class="img-rounded" width="400px" height="350px">
            </div>
            <div class="col-xs-12 col-sm-5">
                
                <img src="<?= $row->P_img ?>" class="img-rounded" width="200px" height="150px">
                
                <img src="<?= $row->P_img ?>" class="img-rounded" width="200px" height="150px">
                <br>
                <a href="middle_use.php?id=<?= $row->P_id ?>">ซื้อเลย</a>
            </a>

            </div>

            <div class="col-xs-7 col-sm-6">
                <input type="hidden" name="post" class="form-control" value="<?= $row->P_name ?>">
                <?= $row->P_id ?> # <?= $row->P_name ?><br>
                ประเภทประกาศ:
                <input type="hidden" name="typepost" class="form-control" value="<?= $row->Post_type ?>">
                <?= $row->Post_type ?><br>
                ชื่อสินค้า:
                <input type="hidden" name="product" class="form-control" value="<?= $row->P_namepro ?>">
                <?= $row->P_namepro ?><br>
                ปริมาณการสั่งซื้อ:
                <input type="hidden" name="total" class="form-control" value="<?= $row->Pd_total ?>">
                <?= $row->Pd_total ?> ชิ้น<br>
                ราคา:
                <input type="hidden" name="price" class="form-control" value="<?= $row->Pd_price ?>">
                <?= $row->Pd_price ?> บาท<br>
                ประเภทสินค้า:
                <input type="hidden" name="type" class="form-control" value="<?= $row->Pt_name ?>">
                <?= $row->Pt_name ?><br>
                <br>
            </div>
        
        
        </div>
<!--/row-->

    </div>
<!--/.col-xs-12.col-sm-12-->

</div>
<!--/.container-->

<?php
require "c_footer.php";
?>