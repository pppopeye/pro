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
                    <br>
                    Status:
                    <input type="text" name="status" class = "form-control">
                    <br>
                    Name Post:
                    <input type="text" name="post" class = "form-control">
                    <br>
                    Name Product:
                    <input type="text" name="product" class = "form-control">
                    <br>
                    จำนวน:
                    <input type="text" name="total" class = "form-control">
                    <br>
                    ราคา:
                    <input type="text" name="price" class = "form-control">
                    <br>
                    ประเภทสินค้า:
                    <input type="text" name="type" class = "form-control">
                    <br>
                    <div><script>
                            function myFunction() {
                                var x = document.createElement("INPUT");
                                x.setAttribute("type", "file");
                                document.body.appendChild(x);
                            }
                        </script>
                        รูปภาพ:<br>
                        <button onclick="myFunction()" class="btn btn-default" >เพิ่มรูป</button>
                    </div>
                    <br>
                    รายละเอียด:
                    <textarea name="detail" rows="5" class = "form-control"></textarea>
                    <br>
                    <input type="submit" onclick="alert('Sure!')" value="Post!" class="btn btn-default" ><br>
                </form>
            </div>
        </div>
    </div>
<?php
require "c_footer.php";
?>
</body>
</html>
