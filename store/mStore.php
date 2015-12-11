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

        <?php
        include_once 'connect.php';

        // get data
        $sth = $conn->query("SELECT storerent.*,storeprice.* FROM storerent
INNER JOIN storeprice ON storerent.ssize=storeprice.p_id WHERE storerent.M_id='".$_SESSION["fullname"]."'
AND storerent.stop >= CURDATE()");
        
        // display it
      ?>
            <!-- body -->
                <div align="center" class="col-xs-12 col-lg-9" >
                    <h3>คลังสินค้า</h3><br>
                    <?php
                    $now = date('Y-m-d');
if ($sth !== false) {
//echo 'There is ' . $result->rowCount() . " application(s) in database.\n";

    if(($sth->rowCount())>0){

        ?>
                    <div >

                        <table>
                            <tr>
                                <td>
                                    รหัสคลังสินค้า :
                                </td>
                                <td>
                                    ขนาดคลังสินค้า :
                                </td>
                                <td>
                                    เริ่มตั้งแต่ :
                                </td>
                                <td>
                                    ถึงวันที่:
                                </td>
                            </tr>
                            <?php
                            foreach($sth->fetchAll() as $row) {
                            ?>
                            <tr>
                                <td>
                                    <input type="text" name="id" id="id" class="form-control" value="<?=$row['r_id'] ?>">
                                </td>
                                <td>
                                    <input type="text" name="ssize" id="ssize" class="form-control" value="<?=$row['ssize'] ?>">
                                </td>
                                <td>
                                    <input type="text" name="stime" id="stime" class="form-control" value="<?=$row['start'] ?>">
                                </td>
                                <td>
                                    <input type="text" name="stime2" id="stime2" class="form-control" value="<?=$row['stop'] ?>">
                                </td>
                                <td>
                                    <a href="mAddproduct.php?id=<?=$row['r_id'] ?>" ><input type="button" class="form-control" value="เพิ่มสินค้า"></a>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>


                </div>
            <!-- body -->

    </div> <!-- end row-->

    <?php
    }else{

        echo '<div class="col-xs-12 col-lg-9" align="center">คุณยังไม่มีคลังสินค้า กรุณาเพิ่มคลังสินค้า<br>';
        echo '<a href="mAddstore.php"><button class="btn btn-default">เพิ่มคลังสินค้า</button></a></div>';
    }
    }
    $conn=null;
    ?>
</div>
<!-- body -->

</div> <!-- end row-->

</div>
<?php
include_once '../theme/c_footer.php';
?>