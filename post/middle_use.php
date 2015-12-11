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
            <h1>รายละเอียด middleman</h1><br>
        </div>
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
$sqlSelect = 'SELECT post.*,post_detail.*,member.*,post_type.* 
FROM post 
JOIN post_detail ON post.P_id=post_detail.P_id 
JOIN member ON member.M_id=post.M_id 
JOIN post_type ON post_type.id=post.Post_type 
WHERE post.P_id= '.$id.';'
;
$stmt = $conn->query($sqlSelect);
$row =$stmt->fetchObject();

?>
        <div class="col-xs-6 col-md-5">
            รหัสกระทู้
                <input type="text" name="P_id" id="P_id" class="form-control" value="<?= $id ?>">
            ชื่อสินค้า
                <input type="text" name="P_namepro" id="P_namepro" class="form-control" value="<?= $row->P_name ?>">
            ชื่อผู้ขาย
                <input type="text" name="M_name" id="M_name" class="form-control" value="<?= $row->M_fname ?>">
            จำนวนเงิน
                <input type="text" name="price" id="price" class="form-control" value="<?= $row->Pd_price ?>">
            
                <a href="middle_pay.php?id=<?= $row->P_id ?>">
                <button type="submit" class="btn btn-default">Get it </button>
            </a>          
            <br>
        </div><!-- /col-xs-12 col-md-4 -->
    </div><!-- /row -->
</div><!-- /container -->

<?php
require "c_footer.php";
?>

