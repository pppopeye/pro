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
               
        <form method="post" action="regis_member.php">
<!-- style='"background-color:#c1e2b3;' -->

         <h2 align='center'><strong>สมัคร</strong>สมาชิก</h2>
         <hr>
            <div class="col-xs-12 col-md-12">
                <div class="col-xs-12 col-md-5">
                    คำนำหน้าชื่อ :
                     <?php

                     $servername = "localhost";
                     $username = "root";
                     $password = "";
                     $dbname = "test";

                        try {
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"));
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            //select statement with variables
                            $sqlSelect = 'SELECT id,Title FROM title';

                            //preparing the statement
                            $sth = $conn->prepare($sqlSelect);

                            //execute the statement with different values

                            $sth->execute(array());
                            echo "<select name='title' class='form-control'>";
                                
                                foreach ($sth->fetchAll() as $row) 
                                {
                                    echo "<option value='" . $row['id'] ."'>" . $row['Title'] ."</option>";
                                }
                                    echo '</select>';
                            }
                        catch(PDOException $e) 
                            {
                                echo "Error: " . $e->getMessage();
                            }

                        $conn = null;

                    ?>                            
                        First name:
                            <input type="text" name="M_fname" id="M_fname" class="form-control">
                        Last name:
                            <input type="text" name="M_lname" id="M_lname" class="form-control">
                        idcard :
                            <input type="text" name="M_idcard" id="M_idcard" class="form-control">
                        Birthday:
                            <input type="date" name="M_birthday" id="M_birthday" class="form-control">
                        tel:
                            <input type="text" name="M_tel" id="M_tel" class="form-control">
                        email:
                            <input type="text" name="M_email" id="M_email" class="form-control">
                        ที่อยู่:
                        mid
                            <input type="text" name="M_id" id="M_id" class="form-control">
                        บ้านเลขที่
                            <input type="text" name="M_no" id="M_no" class="form-control">
                        หมู่บ้าน    
                            <input type="text" name="M_village" id="M_village" class="form-control">
                        
<!--
                        ตำบล    
                            <input type="text" name="M_subdistrict" id="M_subdistrict" class="form-control">
                        อำเภอ    
                            <input type="text" name="M_district" id="M_district" class="form-control">
                        จังหวัด    
                            <input type="text" name="M_province" id="M_province" class="form-control">
                        
-->
                        <?php 

                        include_once '../thailand/address.php';
                        ?>

                        ประเทศ    
                            <input type="text" name="M_country" id="M_country" class="form-control">
                        password
                            <input type="text" name="M_password" id="M_password" class="form-control">
                        IMG
                            <input type="text" name="M_img" id="M_img" class="form-control">
                        FILE
                            <input type="text" name="Mf_upload" id="Mf_upload" class="form-control">
                
                            <button type="submit" name="submit" id="submit" class="btn btn-default " ><strong>สมัครสมาชิก</strong></button>
                </div>
            
        </form>

            <div class="col-xs-10 col-md-6" align="right">
                <p>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                </p>
            </div>

            <div class="col-xs-10 col-md-6" align="right">
                <p align="right">
                    <br>
                    Already have an account? <strong><a href='login.php'>Login</a></strong>
                    <br>
                </p>
            </div>



            </div>
            <div class="col-xs-12 col-md-12">
                    <br>
                    <hr>
            </div>

        </div>

 <!-- end col-xs-12 col-sm-9 -->        

            <?php
                if(empty($_POST))
                { 

                } 
                else 
                {
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
                            $sql = $conn->prepare("INSERT INTO member(title,M_fname,M_lname,M_idcard,M_birthday,M_email,M_tel) VALUES (:title,:M_fname,:M_lname,:M_idcard,:M_birthday,:M_email,:M_tel)");
        
                            $sql->bindParam(':title', $title);
                            $sql->bindParam(':M_fname', $M_fname);
                            $sql->bindParam(':M_lname', $M_lname);
                            $sql->bindParam(':M_idcard', $M_idcard);
                            $sql->bindParam(':M_birthday', $M_birthday);
                            $sql->bindParam(':M_tel', $M_tel);
                            $sql->bindParam(':M_email', $M_email);


                            // insert a row
                            $form = $_POST;
                            $title = $form['title'];
                            $M_fname = $form['M_fname'];
                            $M_lname = $form['M_lname'];
                            $M_idcard = $form['M_idcard'];
                            $M_birthday = $form['M_birthday'];
                            $M_tel = $form['M_tel'];
                            $M_email = $form['M_email'];
                            $sql->execute();


                            $sql_2 = $conn->prepare("INSERT INTO maddress(M_id,M_no,M_village,M_subdistrict,M_district,M_province,M_country) VALUES (:M_id,:M_no,:M_village,:M_subdistrict,:M_district,:M_province,:M_country)");

                            $sql_2->bindParam(':M_id', $M_id);
                            $sql_2->bindParam(':M_no', $M_no);
                            $sql_2->bindParam(':M_village', $M_village);
                            $sql_2->bindParam(':M_subdistrict', $M_subdistrict);
                            $sql_2->bindParam(':M_district', $M_district);
                            $sql_2->bindParam(':M_province', $M_province);
                            $sql_2->bindParam(':M_country', $M_country);
                            // insert a row

                            $M_id = $form['M_id'];
                            $M_no = $form['M_no'];
                            $M_village = $form['M_village'];
                            $M_subdistrict = $form['M_subdistrict'];
                            $M_district = $form['M_district'];
                            $M_province = $form['M_province'];
                            $M_country = $form['M_country'];

                            $sql_2->execute();

                            $sql_3 = $conn->prepare("INSERT INTO mdate(M_id,M_date_reg,M_date_up) VALUES (:M_id,:M_date_reg,:M_date_up)");

                            $sql_3->bindParam(':M_id', $M_id);
                            $sql_3->bindParam(':M_date_reg', $M_date_reg);
                            $sql_3->bindParam(':M_date_up', $M_date_up);
                            // insert a row

                            $M_id = $form['M_id'];
                            $time = 'NOW(d-m-y)';
                            $M_date_reg = $time;
                            $M_date_up = $time;

                            $sql_3->execute();

                            $sql_4 = $conn->prepare("INSERT INTO maccount(M_id,M_password) VALUES (:M_id,:M_password)");

                            $sql_4->bindParam(':M_id', $M_id);
                            $sql_4->bindParam(':M_password', $M_password);
                            // insert a row

                            $M_id = $form['M_id'];
                            $M_password = md5($form['M_password']);
                            $sql_4->execute();

                            $sql_5 = $conn->prepare("INSERT INTO mimg(M_id,M_img) VALUES (:M_id,:M_img)");

                            $sql_5->bindParam(':M_id', $M_id);
                            $sql_5->bindParam(':M_img', $M_img);
                            // insert a row

                            $M_id = $form['M_id'];
                            $M_img = $form['M_img'];
                            $sql_5->execute();

                            $sql_6 = $conn->prepare("INSERT INTO mfile(M_id,Mf_upload,Mf_status) VALUES (:M_id,:Mf_upload,:Mf_status)");

                            $sql_6->bindParam(':M_id', $M_id);
                            $sql_6->bindParam(':Mf_upload', $Mf_upload);
                            $sql_6->bindParam(':Mf_status', $Mf_status);
                            // insert a row

                            $M_id = $form['M_id'];
                            $Mf_upload = $form['Mf_upload'];
                            $Mf_status = '1';
                            $sql_6->execute();

                            //echo "<script>window.location='add.php';</script>";

                        } catch (PDOException $e) 
                            {
                                echo "Error: " . $e->getMessage();
                            }
                    $conn = null;
                }

                ?>
        </div> <!-- end row -->
    </div> <!-- end container -->
    <br>
    <br>
</div>
<?php
    include_once 'c_footer.php';
?>