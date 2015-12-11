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

        <form method="post" action="amAddtype.php">
            <!-- style='"background-color:#c1e2b3;' -->
            <h2 align='center'><strong>เพิ่ม</strong>หมวดหมู่สินค้า</h2>
            <hr>
            <div class="col-xs-12 col-md-9">
<div>
    <?php
        include_once 'connect.php';

    $sqlSelect = 'SELECT * FROM ptype;';

    //preparing the statement
    $sth = $conn->prepare($sqlSelect);

    //execute the statement with different values

    $sth->execute(array());

    ?>

    <table>
        <tr>
            <td>
                ลำดับ
            </td>
            <td>
                ประเภท
            </td>
        </tr>

        <?php
        foreach($sth->fetchAll() as $row) {

            ?>
            <tr>
                <td>
                    <input type="text" name="tid" value="<?=$row['Pt_id'] ?>" class="form-control" readonly>
                </td>
                <td>
                    <input type="text" name="Pt_name" value="<?=$row['Pt_name'] ?>" class="form-control" readonly>
                </td>
            </tr>

            <?php
        }
        ?>

    </table>
</div><br><br><br>
                <div class="col-xs-12 col-md-3">
                    ชื่อหมวดหมู่หลัก :
                </div>

                <div class="col-xs-12 col-md-6">
                    <input type="text" name="Pt_name" id="Pt_name" class="form-control">
                </div>

                <div class="col-xs-12 col-md-3">
                    <button type="submit" name="submit" id="submit" class="btn btn-default " ><strong>เพิ่มหมวดหม</strong></button>
                </div>

            </div>
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
        $sql = $conn->prepare("INSERT INTO ptype (Pt_name) VALUES (:Pt_name)");
        $sql->bindParam(':Pt_name', $Pt_name);

        // insert a row
        $form = $_POST;
        $Pt_name = $form['Pt_name'];
        $sql->execute();

        echo "<script>window.location='amAddtype.php';</script>";

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
