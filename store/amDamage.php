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

        $sqlSelect = 'SELECT * FROM store';

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
                            รหัสสมาชิก
                        </td>
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

                    <form method="post" action="">
                    <?php
                    foreach($sth->fetchAll() as $row) {
                        ?>
                        <tr>
                            <td>
                                <input type="text" name="M_id" value="<?=$row['M_id'] ?>" class="form-control" readonly>
                            </td>
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
                                <input type="text" name="damage" id="damage" class="form-control">
                            </td>
                            <td>
                                <input type="text" name="dtotal" id="dtotal" class="form-control">
                            </td>
                            <td>

                                    <button type="submit" class="btn btn-default">แจ้งชำรุด</button>

                            </td>
                        </tr>
                            <?php
                            }
                            }
                            else{
                                echo '<div> ยังไม่มีสินค้าที่ต้องแจ้ง</div>';
                            }
                            }
                            $conn = null;
                            ?>
                        </form>
                </table>



            </div>
</div>
<!-- body -->

</div> <!-- end row-->

</div>
<?php
include_once '../theme/c_footer.php';
?>