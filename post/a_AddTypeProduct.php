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
                    <form method="post" action="a_AddTypeProduct.php">
                    <!-- style='"background-color:#c1e2b3;' -->

                        <h2 align='center'><strong>เพิ่ม</strong>หมวดหมู่สินค้า</h2>
                        <hr>
                        <div class="col-xs-12 col-md-12">
                            <div class="col-xs-12 col-md-5">
                               ชื่อหมวดหมู่หลัก :

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
                                    <select name='Pt_name' >
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

                                ?>
                            </div>
                            </div>
                        <div class="col-xs-12 col-md-12">
                            <div class="col-xs-8 col-md-6">
                                ชื่อหมวดหมู่ย่อย :
                                <input type="text" name="Pt_names" id="Pt_names" class="form-control"><br>
                            </div>
                         </div>

                        <div class="col-xs-12 col-md-12">
                            <div class="col-xs-5 col-md-6">
                                <button type="submit" name="submit" id="submit" class="btn btn-default " ><strong>เพิ่มหมวดหมู่ย่อย</strong></button>
                            </div>
                        </div>


                <div class="col-xs-12 col-md-12">
                    <br>
                    <br>
                    <hr>
                </div>

            </div> <!-- end col-sm-10 -->
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
                            "mysql:host=$servername;dbname=$dbname",
                            $username,
                            $password, 
                            array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8")

                        );

                        // set the PDO error mode to exception
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                        // prepare sql and bind parameters
                            $sql = $conn->prepare("INSERT INTO ptype_all (Pt_name,Pt_names) VALUES (:Pt_name,:Pt_names)");
                            $sql->bindParam(':Pt_name', $Pt_name);
                            $sql->bindParam(':Pt_names', $Pt_names);


                        // insert a row
                            $form = $_POST;
                            $Pt_name = $form['Pt_name'];
                            $Pt_names = $form['Pt_names'];
                            $sql->execute();

                        echo "<script>window.location='a_AddTypeProduct.php';</script>";

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