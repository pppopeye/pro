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
        include_once 'connect.php';

        $sqlSelect = 'SELECT sendorder.*,store.* FROM sendorder
INNER JOIN store ON sendorder.nameproduct=store.S_id WHERE sendorder.status=2 ORDER BY sendorder.o_id;';

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
                        รหัสสินค้า
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
                </tr>

<?php
                foreach($sth->fetchAll() as $row) {

                    ?>
                <tr>
                    <td>
                        <input type="text" name="date" value="<?=$row['datesend'] ?>" class="form-control" readonly>
                    </td>
                    <td>
                        <input type="text" name="idpro" value="<?=$row['o_id'] ?>" class="form-control" readonly>
                    </td>
                    <td>
                        <input type="text" name="nameproduct" value="<?=$row['S_NamePro'] ?>" class="form-control" readonly>
                    </td>
                    <td>
                        <input type="text" name="totalproduct" value="<?=$row['totalproduct'] ?>" class="form-control" readonly>
                    </td>
                    <td>
                        <textarea name="address" rows="3" class="form-control" readonly ><?=$row['address'] ?></textarea>
                    </td>
                    <td>
                        <!--
                        <a href="amSendstatus.php?id=<?= $row['o_id']?>">
                                <button class="btn btn-default">ส่งสินค้า</button>
                        </a>
                        -->
                    </td>
                </tr>

                    <?php
                    }
                ?>

            </table>
    <?php
        }else{

             echo '<div class="col-xs-12 col-lg-9" align="center">ยังไม่มีการสั่งสินค้า';
        }
    }
$conn=null;
?>
</div>
<!-- body -->

</div> <!-- end row-->
    </div></div>
</div>
<?php
include_once '../theme/c_footer.php';
?>