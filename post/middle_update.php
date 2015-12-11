<?php
    include_once 'c_head.php';
?>
    <div class='container'>
        <div class='row'>
            <!-- menu -->
            <?php
            include_once 'c_menu.php';
            ?>
            <!-- end menu -->
            
            <div class='col-xs-7 col-sm-4'>
                ชื่อสินค้า
                    <input type="text" name="namepro" class="form-control">
                ชื่อผู้ขาย
                    <input type="text" name="name" class="form-control">
                ชำระผ่านธนาคาร
                    <select class="form-control">
                        <option>ชื่อธนาคาร</option>
                    </select>
                วันที่ชำระ
                    <input type="date" name="date" class="form-control">
                เวลาที่ชำระ
                    <input type="time" name="time" class="form-control">
                จำนวนเงิน
                    <input type="number" name="price" class="form-control">
            </div>
        </div>
    </div>

<?php
require "c_footer.php";
?>

