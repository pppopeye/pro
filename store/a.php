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
        include_once 'c_menuA.php';
        ?>

        <?php
        $user = "root";
        $password = "1234";
        $database_name = "store";
        $hostname = "localhost";
        $dsn = 'mysql:dbname=' . $database_name . ';host=' . $hostname;

        //initialize the connection to the database
        $conn = new PDO($dsn, $user, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

        $sqlSelect = 'SELECT sendorder.*,store.* FROM sendorder INNER JOIN store ON sendorder.nameproduct=store.S_id
WHERE sendorder.status=2;';

        //preparing the statement
        $sth = $conn->prepare($sqlSelect);

        //execute the statement with different values

        $sth->execute(array());

        ?>
        <!-- body -->
        <div align="center" class="col-xs-12 col-lg-9" >
            <h3>รายการสินค้า</h3><br>
            <div class="jumbotron">

                <?php
                if ($sth !== false) {
                if(($sth->rowCount())>0){

                ?>
                <form method="post" action="">
                    <table>
                        <tr>
                            <td>
                                วันที่
                            </td>
                            <td>
                                ชื่อสินค้า
                            </td>
                            <td>
                                จำนวน
                            </td>
                            <td>
                                ที่อยู่จัดส่ง
                            </td>
                            <td>
                                ขนาดกล่อง
                            </td>
                            <td>
                                จำนวน
                            </td>
                            <td>
                                ค่าส่ง
                            </td>
                        </tr>

                        <?php
                        foreach($sth->fetchAll() as $row) {
                            ?>
                            <tr>
                                <td>
                                    <input type="text" name="date" value="<?=$row['datesend'] ?>" class="form-control" readonly>
                                </td>
                                <td>
                                    <input type="text" name="nameproduct" value="<?=$row['S_NamePro'] ?>" class="form-control" readonly>
                                </td>
                                <td>
                                    <input type="text" name="totalproduct" value="<?=$row['totalproduct'] ?>" class="form-control" readonly>
                                </td>
                                <td>
                                    <textarea name="address" rows="3" cols="25" class="form-control" readonly ><?=$row['address'] ?></textarea>
                                </td><td>
                                    <?php
                                    $user = "root";
                                    $password = "1234";
                                    $database_name = "store";
                                    $hostname = "localhost";
                                    $dsn = 'mysql:dbname=' . $database_name . ';host=' . $hostname;

                                    $connn = new PDO($dsn, $user, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

                                    $sqlp = 'SELECT * FROM pack;';
                                    $stm = $conn->prepare($sqlp);
                                    $stm->execute(array());
                                    ?>

                                    <select name="S_Size" id="S_Size" class="form-control">
                                        <?php
                                        foreach($stm->fetchAll()as $r){
                                            echo "<option value='".$r['S_num']."'>".$r['S_size'].$r['S_num']."</option>";
                                        }
                                        $connn = null;
                                        ?>
                                    </select>

                                </td>
                                <td>
                                    <input type="text" name="num" id="num" class="form-control">
                                </td>
                                <td>
                                    <input type="text" name="S_Price" id="S_Price" class="form-control">
                                </td>

                                <td>
                                    <input type="submit" class="btn btn-default">
                                </td>
                            </tr>

                            <?php
                        }
                        }
                        else{
                            echo '<div> ยังไม่มีสินค้าที่ต้องแจ้งยอด</div>';
                        }
                        }
                        $conn = null;
                        ?>

                    </table>
                </form>
            </div>

        </div>
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
                $sql = "UPDATE sendorder SET price = :S_Price, status = :S_Status WHERE o_id = ".$row['o_id']."";

                $ss = $conn->prepare($sql);
                $ss->bindParam(':S_Price', $S_sum);
                //$ss->bindValue(':S_Price', $_POST['S_Price']);


                $ss->bindValue(':S_Status', 3);
                $S_Size = $_POST['S_Size'];
                $sum = ($_POST['S_Size'])*($_POST['num']);
                $S_sum = $sum+($_POST['S_Price']);
               // $update = $ss->execute();

                echo $S_sum;

               // echo "<script>window.location='amPayment.php';</script>";

            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            $conn = null;
        }
        ?>

    </div>
<?php
include_once 'c_footer.php';
?>