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
            <h3>เพิ่มสินค้า</h3><br>
            <div class="jumbotron">

                <form method="post" action="">
                <table>
                    <tr>
                        <td>
                            ขนาด :
                        </td>
                        <td>
                            <?php
                            $id = $_GET['id'];
                            $user = "root";
                            $password = "";
                            $database_name = "store";
                            $hostname = "localhost";
                            $dsn = 'mysql:dbname=' . $database_name . ';host=' . $hostname;
                            //initialize the connection to the database
                            $conn = new PDO($dsn, $user, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                            //select statement with variables
                            $sqlSelect = 'SELECT storerent.*,storeprice.* FROM storerent INNER JOIN storeprice ON storerent.ssize=storeprice.p_id WHERE storerent.r_id='.$id.';';
                            $stmt = $conn->prepare($sqlSelect);
                            $stmt->execute();
                            $row = $stmt-> fetch();
                            ?>
                                    <input type="hidden" name="storerent" value="<?=$row['r_id'] ?>">
                                    <input type="text" name="r_id" value="<?=$row['ssize'] ?>" class="form-control">
                                    </input>
                                    <?php

                                $conn=null;
                                ?>
                            </select>
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            ชื่อสินค้า :
                        </td>
                        <td>
                            <input type="text" name="S_NamePro" id="S_NamePro" class="form-control"><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            ประเภทสินค้า :
                        </td>
                        <td>
                            <?php
                            $user = "root";
                            $password = "";
                            $database_name = "store";
                            $hostname = "localhost";
                            $dsn = 'mysql:dbname=' . $database_name . ';host=' . $hostname;
                            //initialize the connection to the database
                            $conn = new PDO($dsn, $user, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                            //select statement with variables
                            $sqlSelect = 'SELECT * FROM ptype;';
                            $stmt = $conn->prepare($sqlSelect);

                            $stmt->execute(array());
                            ?>

                            <select name="S_Type" id="S_Type" class="form-control">
                                <?php
                                foreach($stmt->fetchAll() as $row) {
                                    ?>
                                    <option value="<?=$row['Pt_id'] ?>">
                                        <?=$row['Pt_name'] ?>
                                    </option>
                                    <?php
                                }
                                $conn=null;
                                ?>
                            </select>
                    <br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            จำนวนสินค้า :
                        </td>
                        <td>
                            <input type="text" name="S_Total" id="S_Total" class="form-control"><br>
                        </td>
                    </tr>

                </table>
                <input type="submit" name="submit" class="btn btn-default btn-lg"></input>
    </form>
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
                    $sql = $conn->prepare("
INSERT INTO store (M_id,storerent,S_NamePro,S_Total,S_Status,S_Date,S_Type)
VALUES (:M_id,:storerent,:S_NamePro,:S_Total,:S_Status,:S_Date,:S_Type)");

                    $sql->bindParam(':M_id', $M_id);
                    $sql->bindParam(':storerent', $storerent);
                    $sql->bindParam(':S_NamePro', $S_NamePro);
                    $sql->bindParam(':S_Total', $S_Total);
                    $sql->bindParam(':S_Status', $S_Status);
                    $sql->bindParam(':S_Date', $S_Date);
                    $sql->bindParam(':S_Type', $S_Type);

                    // insert a row.
                    $now = date('Y-m-d');
                    $form = $_POST;
                    $M_id = $_SESSION["fullname"];
                    $storerent = $form['storerent'];
                    $S_NamePro = $form['S_NamePro'];
                    $S_Total = $form['S_Total'];
                    $S_Status =1;
                    $S_Date = $now;
                    $S_Type = $form['S_Type'];
                    $sql->execute();

                    echo "<script>window.location='mProduct.php';</script>";

                } catch (PDOException $e) {
                    //echo "Error: " . $e->getMessage();
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