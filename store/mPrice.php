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
$sth = $conn->query("SELECT store.*,ptype.*,sendorder.* FROM store
JOIN ptype ON store.S_Type=ptype.Pt_id
JOIN sendorder ON store.S_id=sendorder.nameproduct
WHERE store.M_id='".$_SESSION["fullname"]."'");

// display it
if ($sth !== false) {
        //echo 'There is ' . $result->rowCount() . " application(s) in database.\n";

        if (($sth->rowCount()) > 0) {
        ?>
        <!-- body -->
        <div align="center" class="col-xs-12 col-lg-9">
            <h3>ยอดชำระออเดอร์</h3><br>
            
                <table class="table table-condensed" >
                    <tr>
                        <td style="width: 10%;" >เลขที่ส่ง</td>
                        <td style="width: 20%;"> ชื่อสินค้า</td>
                        <td style="width: 20%;"> ประเภทสินค้า</td>
                        <td style="width: 35%;">ที่อยู่ผู้รับ</td>
                        <td style="width: 10%;">ราคา</td>
                        <td style="width: 5%;"></td>
                    </tr>
                    
                    <?php
                    foreach ($sth->fetchAll() as $row) {
                    if (($row['status']) == 3) {
                    ?>
                    <tr  class="active">
                        <td>
                        
                            <input type="text" name="name" id="name" class="hidden"
                                   value="<?= $row['o_id'] ?>" ><?= $row['o_id'] ?>
                        </td>
                        <td>
                        
                            <input type="text" name="name" id="name" class="hidden"
                                   value="<?= $row['S_NamePro'] ?>"><?= $row['S_NamePro'] ?>
                        </td>
                        <td>
                            <input type="text" name="type" id="type" class="hidden"
                                   value="<?= $row['Pt_name'] ?>"><?= $row['Pt_name'] ?>
                        </td>
                        <td>
                            <input type="text" name="name" id="name" class="hidden"
                                   value="<?= $row['address'] ?>"><?= $row['address'] ?>
                        
                        </td>
                        <td>
                            <input type="text" name="price" id="price" class="hidden"
                                   value="<?= $row['price'] ?>"><?= $row['price'] ?>
                        </td>
                        <td>
                            <a href="mPay.php?id=<?= $row['o_id'] ?>"><button class="form-control">แจ้ง</button></a>

                        </td>
                    
                    </tr>
                        <?php

                        ?>
                        <?php
                    } else {

                    }
                    }
                    }
                    }
                    $conn=null;
                    ?>
                </table>
</div>
<!-- body -->

</div> <!-- end row-->
</div>
<?php
include_once '../theme/c_footer.php';
?>