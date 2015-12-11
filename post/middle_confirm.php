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
                Name Product:
                <input type="text" name="product" class="form-control">
                <br>
                 Name Seller:
                <input type="text" name="name" class="form-control">
                <br>
                จำนวน:
                <input type="text" name="total" class="form-control">
                <br>
                ราคา:
                <input type="text" name="price" class="form-control">
                <br>
                Status:
                <select class="form-control">
                    <option >ชำระแล้ว</option>
                </select>
                <br>
                หลักฐานการโอน:
                <input type="file" name="img_con">
                <br>
                <input type="submit" onclick="alert('ok!')" value="submit" class="btn btn-default" >
            </div>
        </div>
    </div>

<?php
require "c_footer.php";
?>