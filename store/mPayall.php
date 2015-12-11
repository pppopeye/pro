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
        include_once 'c_menuM.php';
        ?>
        <?php
        $id = $_REQUEST['id'];
        $user = "root";
        $password = "1234";
        $database_name = "store";
        $hostname = "localhost";
        $dsn = 'mysql:dbname=' . $database_name . ';host=' . $hostname;

        //initialize the connection to the database
        $conn = new PDO($dsn, $user, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

        // get data
        $sth = $conn->query("SELECT * FROM storerent WHERE r_id = ".$id." ");
        // display it
        if ($sth !== false) {
        //echo 'There is ' . $result->rowCount() . " application(s) in database.\n";

        if(($sth->rowCount())>0){
        ?>
        <!-- style='"background-color:#c1e2b3;' -->
        <h2 align='center'><strong>แจ้งชำระ</strong>ค่าคลังเก็บสินค้า</h2>
        <hr>

        <form method="post" action="">

            <div class="col-xs-12 col-md-8">
                <div class="col-xs-10 col-md-6">
                    <?php
                    foreach($sth->fetchAll() as $row) {
                        ?>

                        คลังสินค้า :

                        <input type="text" name="name" id="name" class="form-control" value="<?=$row['r_id'] ?>"><br>

                        ระยะเวลาเก็บ :
                        <input type="text" name="stime" id="stime" class="form-control" value="<?=$row['stime'] ?>"><br>

                        ราคา / สินค้า :
                        <input type="text" name="S_Price" id="S_Price" class="form-control" value="<?=$row['rprice'] ?>"><br>

                        <?php
                    }}}
                    ?>
                    ธนาคาร :
                    <input type="text" name="P_bank" id="P_bank" class="form-control">

                    วันที่ และเวลาที่ชำระ :
                    <input type="date" name="P_date" id="P_date" class="form-control">
                    <input type="time" name="P_time" id="P_time" class="form-control">
                    <br>
                    <button type="submit" name="submit" id="submit" class="btn btn-default " >
                        <strong>ส่ง</strong>
                    </button>
                </div>

        </form>
    </div>
    <div class="col-xs-12 col-md-12">
        <br>
        <br>
        <hr>
    </div>
    </form>

    <?php

    if(empty($_POST))
    {

    } else {
        $servername = "localhost";
        $username = "root";
        $password = "1234";
        $dbname = "store";

        try {
            $conn = new PDO
            (
                "mysql:host=$servername;dbname=$dbname;",
                $username,
                $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8")

            );

            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // prepare sql and bind parameters

            // prepare sql and bind parameters
            $sql = $conn->prepare("INSERT INTO payall (r_id,Pa_date,Pa_time,Pa_bank,Pa_price) VALUES (:r_id,:Pa_date,:Pa_time,:Pa_bank,:Pa_price)");
            $sql->bindParam(':r_id', $r_id);
            $sql->bindParam(':Pa_date', $P_date);
            $sql->bindParam(':Pa_time', $P_time);
            $sql->bindParam(':Pa_bank', $P_bank);
            $sql->bindParam(':Pa_price', $P_price);
            // insert a row
            $form = $_POST;
            $r_id = $id;
            $P_date = $form['P_date'];
            $P_time = $form['P_time'];
            $P_bank = $form['P_bank'];
            $P_price = $form['S_Price'];
            $sql->execute();

            $sql3 = "UPDATE storerent SET rprice = ".$row['rprice']."-:S_Price WHERE  r_id = $id";

            $ss3 = $conn->prepare($sql3);
            $ss3->bindValue(':S_Price', $_POST['S_Price']);

            $update3 = $ss3->execute();

            echo "<script>window.location='mPriceall.php';</script>";

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }
    ?>
</div>
<!-- body -->

</div> <!-- end row-->

</div>
<?php
include_once '../theme/c_footer.php';
?>
