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

        <!-- body -->
        <div align="center" class="col-xs-12 col-lg-9" >
            <h3>ส่งออเดอร</h3><br>
            <div class="jumbotron">
                <form method="post" action="">
                <table><tr>
                        <td>
                            <h4 align="center">
                                ชื่อสินค้า
                            </h4>
                        </td>
                        <td>
                            <h4 align="center" >
                                จำนวน
                            </h4>
                        </td>
                        <td>
                            <h4 align="center" >
                               ชื่อผู้รับ
                            </h4>
                        <td>
                            <h4 align="center" >
                               ที่อยู่จัดส่ง
                            </h4>
                        </td>
                    </tr>
                    <?php

                    $id = $_REQUEST['id'];
                    
                    //setting connection parameters
                    $user = "root";
                    $password = "";
                    $database_name = "store";
                    $hostname = "localhost";
                    $dsn = 'mysql:dbname=' . $database_name . ';host=' . $hostname;

                    //initialize the connection to the database
                    $conn = new PDO($dsn, $user, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

                    //select statement with variables
                    $sqlSelect = 'SELECT * FROM store WHERE M_id= '.$_SESSION["fullname"].' AND S_id='.$id.';';
$stmt = $conn->query($sqlSelect);
$row =$stmt->fetchObject();
                    

                    //
                    ?>
                    <tr>
                        <td>
                            <input type="text" name='nameproduct' id="nameproduct" class="form-control" value="<?=$row->S_NamePro; ?>" readonly>
                        </td>
                        <td>
                            <input type="text" name="totalproduct" id="totalproduct" class="form-control" value="<?=$row->S_Total; ?>">
                        </td>
                        <td>
                            <input type="text" name="nm" id="nm" class="form-control">
                        </td>
                        <td>
                            <textarea rows="3" cols="20" name="address" id="address" class="form-control"></textarea>
                        </td>
                        <td>
                            <button type="submit" name="submit" class="btn btn-default ">Send Order</button>
                        </td>
                    </tr>
                </table>
                </form>
            </div>


        </div>
        <!-- body -->

    </div> <!-- end row-->
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
            $sql = $conn->prepare("INSERT INTO sendorder (nameproduct,totalproduct,price,address,datesend,status)
VALUES (:nameproduct,:totalproduct,:price,:address,:datesend,:status)");
            $sql->bindParam(':nameproduct', $nameproduct);
            $sql->bindParam(':totalproduct', $totalproduct);
            $sql->bindParam(':price', $price);
            $sql->bindParam(':address', $address);
            $sql->bindParam(':datesend', $datesend);
            $sql->bindParam(':status', $status);

            // insert a row.
            $now = date('Y-m-d');
            $form = $_POST;
            $ad = $form['nm']." ".$form['address'];
            $nameproduct = $form['nameproduct'];
            $totalproduct = $form['totalproduct'];
            $price = 0;
            $address = $ad;
            $status = 2;
            $datesend = $now;
            $sql->execute();

            $sql2 = "UPDATE store SET S_Total = ".$row['S_Total']."-:totalproduct,S_Status=:S_Status WHERE  S_id = ".$row['S_id']."";

            $ss2 = $conn->prepare($sql2);
            $ss2->bindValue(':totalproduct', $_POST['totalproduct']);
            $ss2->bindValue(':S_Status', 2);

            $update = $ss2->execute();

            echo "<script>window.location='mProduct.php';</script>";

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