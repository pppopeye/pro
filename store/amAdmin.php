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
            <h3>รายการเข้าใช้</h3><br>
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
                        เวลา
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