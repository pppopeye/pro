<!-- menu -->
<div class="col-xs-12 col-lg-3" >
    <br>
    <div class="list-group">
        <p>
            Member : คุณ
                <?php
                    echo $_SESSION["username"];
                ?>
        </p>
        <a href="mStore.php" class="list-group-item">คลังสินค้า</a>
        <a href="mAddstore.php" class="list-group-item">เพิ่มคลังสินค้า</a>
        <a href="mProduct.php" class="list-group-item">ส่งสินค้า</a>
        <a href="mPrice.php" class="list-group-item">ยอดชำระออเดอร</a>
        <a href="mPriceall.php" class="list-group-item"> ยอดชำระคลังสินค้า</a>
        <a href="logout.php" class="list-group-item">Logout</a><br>
    </div>
</div>
<!-- menu -->