<?php
require "c_head.php";
?><!-- Body -->
<div class='container'>
    <div class='row'>
        <!-- menu -->
        <?php
        include 'c_menu.php';

        ?>
        <!-- end menu -->

        <div class="col-xs-12 col-md-9" align="left">
<h1>ยืนยันการรับสินค้า บริการคนกลาง</h1>
        </div>

        <div class="col-xs-6 col-md-5">
            รหัสกระทู้
                <input type="text" name="P_id" id="P_id" class="form-control">
            ชื่อสินค้า
                <input type="text" name="P_namepro" id="P_namepro" class="form-control">
            ชื่อผู้ขาย
                <input type="text" name="M_name" id="M_name" class="form-control">
            จำนวนเงิน
                <input type="text" name="price" id="price" class="form-control">
            สถานะ
                <select class="form-control">
                    <option >ได้รับ</option>
                    <option >ของมีปัญหา ส่งกลับ</option>
                </select>
            <br>
            <input type="submit" onclick="alert('ok!')" value="submit" class="btn btn-default" >
            <br>
        </div><!-- /col-xs-12 col-md-4 -->
    </div><!-- /row -->
</div><!-- /container -->

<?php
require "c_footer.php";
?>

