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
            <!-- style='"background-color:#c1e2b3;' -->
            <h2 align='center'><strong>เพิ่ม</strong>คลังสินค้า</h2>
            <hr>

            <form method="post" action="">

                <div class="col-xs-12 col-md-8">
                    <div class="col-xs-10 col-md-6">
                        ขนาดคลังสินค้า :
                        <?php
        include_once 'connect.php';
                        $sqlSelect = 'SELECT * FROM storeprice;';
                        $sth = $conn->prepare($sqlSelect);
                        $sth->execute(array());

                        $sqlSelect2 = 'SELECT * FROM storetime;';
                        $sth2 = $conn->prepare($sqlSelect2);
                        $sth2->execute(array());
                        ?>

                        <select name="ssize" id="ssize" class="form-control">
                            <?php
                            foreach($sth->fetchAll() as $row) {

                                ?>
                                <option value="<?=$row['p_id'] ?>"><?=$row['ssize'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    <br>
                        ระยะเวลาที่เก็บ(ปี) :
                        <select name="stime" id="stime" class="form-control">
                            <?php
                            foreach($sth2->fetchAll() as $row2) {

                                ?>
                                <option value="<?=$row2['t_id'] ?>"><?=$row2['stime'] ?></option>
                                <?php
                            }
                            $conn=null;
                            ?>
                        </select>
                    <br>
                        <button type="submit" name="submit" id="submit" class="btn btn-default " >
                            <strong>เพิ่ม</strong>
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
            $sql = $conn->prepare("INSERT INTO storerent (M_id,ssize,stime,rprice,start,stop) VALUES (:M_id,:ssize,:stime,:rprice,:start,:stop)");
            $sql->bindParam(':M_id', $M_id);
            $sql->bindParam(':ssize', $ssize);
            $sql->bindParam(':stime', $stime);
            $sql->bindParam(':rprice', $rprice);
            $sql->bindParam(':start', $start);
            $sql->bindParam(':stop', $stop);

            // insert a row
            $now = date('Y-m-d');
            $end = date("Y-m-d",strtotime("+365 days",strtotime($now)));
            $form = $_POST;
            $M_id = $_SESSION['fullname'];
            $ssize = $form['ssize'];
            $stime = $form['stime'];
            $start = $now;
            $stop = $end;
            $rprice = $row['price']*$form['stime'];
            $sql->execute();

            echo "<script>window.location='mStore.php';</script>";

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }
    ?>
    </div>
</div>
</div>
<?php
include_once '../theme/c_footer.php';
?>
