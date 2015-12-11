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
                <form action="#">
                    <LABEL>Username:</LABEL>
                        <input type="text" name="Username">
                    <LABEL>ร้องเรียน:</LABEL>
                        <select>
                            <option >ไม่ส่งสินค้า</option>
                            <option >ไม่มีตัวตน</option>
                            <option >ติดต่อไม่ได้</option>
                        </select>
                        <input type="submit" onclick="alert('ok!')" value="save" >
                </form>
            </div>
        </div>
    </div>
<?php
require "c_footer.php";
?>

