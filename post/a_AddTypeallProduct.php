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
            <div class='col-xs-12 col-sm-9'>
                <form method="post" action="a_AddTypeallProduct.php">
                    <!-- style='"background-color:#c1e2b3;' -->
                    <h2 align='center'><strong>เพิ่ม</strong>หมวดหมู่สินค้า</h2>
                    <hr>
                    <div class="col-xs-12 col-md-12">

                        <div class="col-xs-12 col-md-3">
                            ชื่อหมวดหมู่หลัก :
                        </div>

                        <div class="col-xs-12 col-md-6">
                            <input type="text" name="Pt_name" id="Pt_name" class="form-control">
                        </div>

                        <div class="col-xs-12 col-md-3">
                            <button type="submit" name="submit" id="submit" class="btn btn-default " ><strong>เพิ่มหมวดหม</strong></button>
                        </div>

                    </div>
            </div>
            <div class="col-xs-12 col-md-12">
                <br>
                <br>
                <hr>
            </div>
                </form>
                
                <?php

                if(empty($_POST))
                {

                } else {
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "test";

                try {
                    $conn = new PDO
                    (
                        "mysql:host=$servername;dbname=$dbname;",
                        $username,
                        $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8")

                    );

                    // set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    // prepare sql and bind parameters
                    $sql = $conn->prepare("INSERT INTO ptype (Pt_name) VALUES (:Pt_name)");
                    $sql->bindParam(':Pt_name', $Pt_name);

                    // insert a row
                    $form = $_POST;
                    $Pt_name = $form['Pt_name'];
                    $sql->execute();

                    echo "<script>window.location='a_AddTypeallProduct.php';</script>";

                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                $conn = null;
            }
            ?>
        </div> <!-- end row -->
    </div> <!-- end container -->
    <br>
    <br>
<?php
include_once 'c_footer.php';
?>