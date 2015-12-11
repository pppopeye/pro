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
        <h3 align='center'><strong>แจ้งชำระ</strong>ค่าส่งสินค้า</h2>
        <?php
        include_once 'c_menuM.php';
        ?>
        <?php
        $o_id =$_REQUEST['id'];
        
        $user = "root";
        $password = "";
        $database_name = "store";
        $hostname = "localhost";
        $dsn = 'mysql:dbname=' . $database_name . ';host=' . $hostname;

        //initialize the connection to the database
        $conn = new PDO($dsn, $user, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

        // get data

        $sqlSelect = "SELECT store.*,ptype.*,sendorder.* FROM store
JOIN ptype ON store.S_Type=ptype.Pt_id
JOIN sendorder ON store.S_id=sendorder.nameproduct
WHERE sendorder.o_id='".$o_id."'";
$stmt = $conn->query($sqlSelect);
$row =$stmt->fetchObject();
        // display it
        if ($stmt !== false) {
        //echo 'There is ' . $result->rowCount() . " application(s) in database.\n";

        if(($stmt->rowCount())>0){
        ?>
        <!-- style='"background-color:#c1e2b3;' -->
        <hr>

        <form method="post" action="">

            <div class="col-xs-12 col-lg-8">
        <div class="col-xs-1 col-lg-4">
        </div>
                <div class="col-xs-10 col-lg-6">
                    
                    <table class="table">
                        <tr>
                            <td>
                                เลขที่ส่งสินค้า :
                            </td>
                            <td>
                                <?=$row->o_id; ?>
                                <input type="text" name="name" id="name" class="hidden" value="<?=$row->o_id; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                ชื่อสินค้า :
                            </td>
                            <td>
                                <?=$row->S_NamePro; ?>
                                <input type="text" name="name" id="name" class="hidden" value="<?=$row->S_NamePro; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                ประเภทสินค้า :
                            </td>
                            <td>
                                <?=$row->Pt_name; ?>
                                <input type="text" name="type" id="type" class="hidden" value="<?=$row->Pt_name; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                ที่อยู่ผู้รับ :
                            </td>
                            <td>
                                <?=$row->address; ?>
                                <input type="text" name="aname" id="aname" class="hidden" value="<?=$row->address; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                ราคา / สินค้า :
                            </td>
                            <td>
                                <?=$row->price; ?>
                                <input type="text" name="S_Price" id="S_Price" class="hidden" value="<?=$row->price; ?>">
                            </td>
                        </tr>

                        <?php
                        }}
                        ?>
                        <tr>
                            <td>
                                ธนาคาร :
                            </td>
                            <td>
                                <input type="text" name="P_bank" id="P_bank" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                วันที่
                            </td>
                            <td>
                                <input type="date" name="P_date" id="P_date" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                และเวลาที่ชำระ :
                            </td>
                            <td>
                                <input type="time" name="P_time" id="P_time" class="form-control">
                            </td>
                        </tr>
                        <tr>   
                            <td>
                            </td>
                            <td>
                                <button type="submit" name="submit" id="submit" class="btn btn-default ">
                                    ส่ง
                                </button>
                            </td>
                        </tr>
                        
                    </table>
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
        $password = "";
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
            $sql = $conn->prepare("INSERT INTO pay (o_id,P_date,P_time,P_bank,P_price) VALUES (:o_id,:P_date,:P_time,:P_bank,:P_price)");
            $sql->bindParam(':o_id', $o_id);
            $sql->bindParam(':P_date', $P_date);
            $sql->bindParam(':P_time', $P_time);
            $sql->bindParam(':P_bank', $P_bank);
            $sql->bindParam(':P_price', $P_price);

            // insert a row
            $form = $_POST;
            $o_id = $row['o_id'];
            $P_date = $form['P_date'];
            $P_time = $form['P_time'];
            $P_bank = $form['P_bank'];
            $P_price = $row['price'];
            $sql->execute();

            $sql2 = "UPDATE sendorder SET price=".$row['price']."-:S_Price,status=:status WHERE  o_id = ".$o_id."";

            $ss2 = $conn->prepare($sql2);
            $ss2->bindValue(':S_Price', $_POST['S_Price']);
            $ss2->bindValue(':status', 5);

            $update2 = $ss2->execute();

            $sql3 = "UPDATE store SET S_Status=:S_Status WHERE  S_id = ".$row['nameproduct']."";

            $ss3 = $conn->prepare($sql3);
            $ss3->bindValue(':S_Status', 5);

            $update3 = $ss3->execute();

            echo "<script>window.location='mPrice.php';</script>";

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
