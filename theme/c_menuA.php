<!-- menu -->
<div class="col-md-3 " ><br>
    <div class="list-group">
        <p>Admin : คุณ
            <?php
            echo $_SESSION["username"];

            ?></p>
        <a href="amAdmin.php" class="list-group-item">HOME</a>
        <a href="amCheckorder.php" class="list-group-item">ตรวจสอบสินค้า</a>
        <a href="amPayment.php" class="list-group-item">แจ้งยอดชำระ</a>
        <a href="amDamage.php" class="list-group-item">แจ้งสินค้าเสียหาย</a>
        <a href="amAddtype.php" class="list-group-item">เพิ่มประเภทสินค้า</a>
        <a href="logout.php" class="list-group-item">Logout</a><br>
    </div>
</div>
<!-- menu -->