<!-- header -->
<?php
include_once 'c_head.php';
?>
<!-- /header -->

<!-- body -->
    <div class='container'><!-- container -->
        <div class='row'><!-- row -->

<!-- menu -->
    <?php
        include_once 'c_menu.php';
    ?>
<!-- end menu -->

            <div class='col-xs-12 col-sm-8'>
                
                <form method="post" action=""> <!-- style='"background-color:#c1e2b3;' -->
                    <!-- ชื่อการทำงาน -->
                    <h2 align='center'>
                        <strong>
                            เพิ่ม
                        </strong>
                        ประเภท สินค้าหลัก
                    </h2>
                    <!-- /ชื่อการทำงาน -->

                    <hr>

                    <div class="col-xs-12 col-md-12">
                        <div class="col-xs-3 col-md-3">
                            ประเภท :
                        </div>
                        <!-- /col-xs-12 col-sm-3 -->

                        <div class="col-xs-7 col-md-6">
                            <input type="text" name="Post_name" id="Post_name" class="form-control">
                        </div>
                        <!-- /col-xs-12 col-sm-3 -->

                        <div class="col-xs-2 col-md-3">
                            <button type="submit" name="submit" id="submit" class="btn btn-default " ><strong>เพิ่ม</strong></button>
                        </div>
                        <!-- /col-xs-12 col-sm-3 -->

                    </div>
                    <!-- /col-xs-12 col-sm-12 -->
            </div>
            <!-- /col-xs-12 col-sm-8 -->
                    
            <div class="col-xs-12 col-md-12">
                        <br>
                        <br>
                        <hr>
            </div>
            <!-- /col-xs-12 col-sm-12 -->

                </form>

<!-- sql insert status of BlacklistStatus-->
    <?php

    if(empty($_POST)) { 

    } else {

        require 'db.php';

        try {
            $conn = new PDO
            (
                "mysql:host=$servername;dbname=$dbname;charset=utf8",
                $username,
                $password
                );

                // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // prepare sql and bind parameters
            $sql = $conn->prepare("INSERT INTO post_name (Post_name) VALUES (:Post_name)");             
            $sql->bindParam(':Post_name', $_POST['Post_name']);
            $sql->execute();

            echo "<script>window.location='a_AddPostName.php';</script>";

        } catch (PDOException $e) {

            echo "Error: " . $e->getMessage();
        }

        $conn = null;
    }

    ?>
<!-- / sql insert status of BlacklistStatus -->

        </div> 
        <!-- end row -->

    </div> 
    <!-- end container -->

        <br>
        <br>

<!-- footer -->
<?php
include_once 'c_footer.php';
?>
<!-- /footer -->