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

        $sqlSelect = 'SELECT * FROM store ORDER BY S_id;';

        //preparing the statement
        $sth = $conn->prepare($sqlSelect);

        //execute the statement with different values

        $sth->execute(array());

        ?>
        <!-- body -->
        <div align="center" class="col-xs-9" >
            <h3>รายการสินค้า</h3><br>
            <div class="jumbotron">

                <?php
                if ($sth !== false) {
                    if(($sth->rowCount())>0){

                        ?>
                        <table>
                        <tr>
                            <td>
                                วันที่
                            </td>
                            <td>
                                ชื่อสินค้า
                            </td>
                            <td>
                                จำนวนทั้งหมด
                            </td>
                            <td>
                                หมายเหตุ
                            </td>
                            <td>
                                จำนวนชำรุด
                            </td>
                        </tr>

                        <?php
                        foreach($sth->fetchAll() as $row) {
                            ?>
                            <form method="post" action="">
                                <tr>
                                    <td>
                                        <input type="text" name="S_Date" value="<?=$row['S_Date'] ?>" class="form-control" readonly>
                                    </td>
                                    <td>
                                        <input type="text" name="S_NamePro" value="<?=$row['S_NamePro'] ?>" class="form-control" readonly>
                                    </td>
                                    <td>
                                        <input type="text" name="S_Total" value="<?=$row['S_Total'] ?>" class="form-control" readonly>
                                    </td>
                                    <td>
                                        <input type="text" name="damage" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" name="dtotal" class="form-control">
                                    </td>
                                    <td>

                                        <button type="submit" class="btn btn-default">แจ้งชำรุด</button>

                                    </td>
                                </tr>
                            </form>
                            </table>

                            <?php
                        }
                    }
                    else{
                        echo '<div> ยังไม่มีสินค้าที่ต้องแจ้งยอด</div>';
                    }
                }
                $conn = null;
                ?>

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
                $sql = $conn->prepare("INSERT INTO damage (S_id,dtotal,damage,ddate) VALUES (:S_id,:dtotal,:damage,:ddate)");
                $sql->bindParam(':S_id', $S_id);
                $sql->bindParam(':dtotal', $dtotal);
                $sql->bindParam(':damage', $damage);
                $sql->bindParam(':ddate', $ddate);

                // insert a row.
                $now = date('Y-m-d');
                $form = $_POST;
                $S_id = $row['S_id'];
                $dtotal = $form['dtotal'];
                $damage = $form['damage'];
                $ddate = $now;
                $sql->execute();


                $sql2 = "UPDATE store SET S_Total = ".$row['S_Total']."-:dtotal WHERE  S_id = ".$row['S_id']."";

                $ss2 = $conn->prepare($sql2);
                $ss2->bindValue(':dtotal', $_POST['dtotal']);


                $update = $ss2->execute();


                echo "<script>window.location='up.php';</script>";

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