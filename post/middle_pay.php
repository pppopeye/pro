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
<h1>ยืนยันการชำระค่าบริการคนกลาง</h1>
        </div>
<?php

//$id = $_POST['id'];
$id = $_GET['id'];
//$id = 1;
//$id = $_REQUEST['id'];

//setting connection parameters

$servername = "localhost";
$username = "username";
$password = "";
$dbname = "test";

//initialize the connection to the database
try {
        $conn = new PDO
        (
            "mysql:host=$servername;dbname=$dbname;charset=utf8",
            $username,
            $password
            );

//select statement with variables

$sqlSelect = 'SELECT post.*,post_detail.*,member.*,post_type.* FROM post 
JOIN post_detail ON post.P_id=post_detail.P_id 
JOIN member ON member.M_id=post.M_id 
JOIN post_type ON post_type.id=post.Post_type 
WHERE post.P_id= '.$id.';'
;
$stmt = $conn->query($sqlSelect);
$row =$stmt->fetchObject();

?>
        <div class="col-xs-6 col-md-5">
<form method="post" action="middleman.php">
    ชื่อสินค้า
        <input type="text" name="P_namepro" id="P_namepro" class="form-control" value="<?= $row->P_name ?>">
    ชื่อผู้ขาย
        <input type="text" name="M_name" id="M_name" class="form-control" value="<?= $row->M_fname?>">
    จำนวนเงิน
        <input type="text" name="price" id="price" class="form-control" value="<?= $row->Pd_price ?>">
    วันที่:
        <input type="date" name="Mm_date_pay" class="form-control">
    เวลา:
            <input type="time" name="Mm_time_pay" class="form-control">
            <br>
            <input type="submit" onclick="alert('ok!')" value="submit" class="btn btn-default" >
</form>
        </div><!-- /col-xs-12 col-md-4 -->
    </div><!-- /row -->
</div><!-- /container -->

<?php
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;

?>
<?php

            if(empty($_POST))
            { 
                
            } else {
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "test";

                try {
                    $conn = new PDO
                    (
                        "mysql:host=$servername;dbname=$dbname",$username,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
                    );

                    // set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                    // prepare sql and bind parameters
                    $stmt = $conn->prepare("INSERT INTO middleman (M_id,P_id) VALUES (:M_id,:P_id)");
                    $stmt->bindParam(':M_id', $_POST['M_id']);
                    $stmt->bindParam(':P_id', $id);

                    $stmt->execute();
                    echo "<script>window.location='middleman.php';</script>";

                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                $conn = null;
            }

            ?>
<?php
require "c_footer.php";
?>

