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
            include_once 'c_menuM.php';
            include_once 'connect.php';

            // get data

            $sth = $conn->query("SELECT store.*,storerent.*,storeprice.* FROM store
JOIN storerent ON storerent.r_id=store.storerent
JOIN storeprice ON storerent.ssize=storeprice.p_id
WHERE store.M_id='".$_SESSION["fullname"]."'");

            // display it
            if ($sth !== false) {
            //echo 'There is ' . $result->rowCount() . " application(s) in database.\n";

            if(($sth->rowCount())>0){

            ?>
            <!-- body -->
            <div align="center" class="col-xs-12 col-lg-9" >
                <h3>ส่งสินค้า</h3><br>
                <div class="jumbotron">

                    <table class="table">
                        <tr><b>
                            <td>
                                รหัสคลังสินค้า 
                            </td>
                            <td>
                               สินค้า 
                            </td>
                            <td>
                                จำนวน 
                            </td>
                            <td></td>
                        </tr></b>
                        <?php
                        foreach($sth->fetchAll() as $row) {
                            ?>
                            <tr>
                                <td>
                                    <input type="hidden" name="id" id="id" class="form-control" value="<?=$row['r_id'] ?>"><?=$row['r_id'] ?>
                                </td>
                                <td>
                                    <input type="hidden" name="S_NamePro" id="S_NamePro" class="form-control" value="<?=$row['S_NamePro'] ?>"><?=$row['S_NamePro'] ?>
                                </td>
                                <td>
                                    <input type="hidden" name="S_Total" id="S_Total" class="form-control" value="<?=$row['S_Total'] ?>"><?=$row['S_Total'] ?>
                                </td>
                                <td>
                                    <a href="mSendorder.php?id=<?=$row['S_id'] ?>" ><input type="button" class="form-control" value="ส่งสินค้า"></a>
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

            echo '<br><br><br><br><br><div class="col-xs-12 col-lg-9" align="center">คุณยังไม่มีคลังสินค้า กรุณาเพิ่มคลังสินค้า<br><br>';
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