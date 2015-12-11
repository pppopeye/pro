<?php
    include 'c_head.php';
?>
    <div class='container'>
        <div class='row'>
            <!-- menu -->
            <?php
            include 'c_menu.php';
            ?>
            <!-- end menu -->
            <div class='col-xs-12 col-sm-9'>
                    <form method="post" action="">


                    <h2 align='center'><strong>เพิ่ม</strong>สินค้าในคลัง</h2>
                        <hr>
                        <div class="col-xs-12 col-md-12">
                            <div class="col-xs-10 col-md-5">

                    Name Post:
                    <input type="text" name="S_nameproduct" class="form-control">

                    หมวดหมู่สินค้า:
                    <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "test";

                        try {
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"));
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            //select statement with variables
                            $sqlSelect = 'SELECT id,Pt_name FROM ptype';

                            //preparing the statement
                            $sth = $conn->prepare($sqlSelect);

                            //execute the statement with different values

                            $sth->execute(array());
                    ?>
                    
                    <select name='P_type' >
                        <?php
                            foreach ($sth->fetchAll() as $row) {
                        ?>
                            <option value='<?=$row['id']?>' style='font-family: max;'><?=$row['Pt_name']?></option>
                        <?php
                            } 
                        ?>
                    </select>
                        <?php
                            }
                            catch(PDOException $e) {
                            echo "Error: " . $e->getMessage();
                            }

                            $conn = null;

                            ?><br>
                    
                    จำนวน
                    <input type="text" name="S_total" class="form-control">
                    
                    ราคา
                    <input type="text" name="S_price" class="form-control">

                    <input type="submit" onclick="alert('Sure!')" value="add" class="btn btn-default" ><br><br><br>
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
                        "mysql:host=$servername;dbname=$dbname",$username,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
                    );

                    // set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                    // prepare sql and bind parameters
                    $stmt = $conn->prepare("INSERT INTO store (S_nameproduct,S_total,S_status,S_date,S_price) VALUES (:S_nameproduct,:S_total,:S_status,:S_date,:S_price)");
                    
                    $stmt->bindParam(':S_nameproduct',$S_nameproduct);
                    $stmt->bindParam(':S_total',$S_total);
                    $stmt->bindParam(':S_status',$S_status);
                    $stmt->bindParam(':S_date', $S_date);
                    $stmt->bindParam(':S_price', $S_price);

                    // insert a row
                    $now = date('Y-m-d');
                    $form = $_POST;
                    $S_nameproduct = $form['S_nameproduct'];
                    $S_total = $form['S_total'];
                    $S_status = 1;
                    $S_date = $now;
                    $S_price = $form['S_price'];
                    $stmt->execute();

                    echo "<script>window.location='store.php';</script>";

                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                $conn = null;
            }

            ?>
        </div>
            </div>
    </div>
</div>

<?php
include_once 'c_footer.php';
?>