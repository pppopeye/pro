<?php
include_once 'c_header.php';
?>
<div class="container">
    <div class="row">
        <div class='col-xs-12 col-lg-12'>
            <hr>
            <form method="post" action="">
                <div class="col-xs-12 col-lg-2">
                </div>
                <div class="col-xs-9 col-lg-6">
                <div class="jumbotron">
                    <div class=bs-example data-example-id=horizontal-dl> 
            <dl class=dl-horizontal>
                
                    <table>
                        <tr>
                            <td>
                                <dt>&#10144; สมัครสมาชิก </dt>
                            </td>
                            <td>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <dt>ชื่อ: </dt>
                            </td>
                            <td>
                                <input type="text" name="M_fname" id="M_fname" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <dt>นามสกุล: </dt>
                            </td>
                            <td>
                                <input type="text" name="M_lname" id="M_lname" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <dt>วันเกิด:</dt>
                            </td>
                            <td>
                                <input type="date" name="M_birthday" id="M_birthday" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <dt>ที่อยู่:</dt>
                            </td>
                            <td>
                                <textarea name="M_address" id="M_address" class="form-control" rows="5"></textarea>
                                    
                            </td>
                        </tr>
                        <tr>
                            <td>    
                                <dt>เบอร์โทร:</dt>
                            </td>
                            <td>
                                <input type="text" name="M_tel" id="M_tel" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <dt>อีเมลล์: </dt>
                            </td>
                            <td>
                                <input type="text" name="M_email" id="M_email" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <dt>รหัสผ่าน: </dt>
                            </td>
                            <td>
                                <input type="text" name="M_password" id="M_password" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <dt>รหัสประจำตัวประชาชน: </dt>
                            </td>
                            <td>
                                <input type="text" name="M_idcard" id="M_idcard" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                
                            </td>
                            <td>
                                <br>
                                <input type="checkbox" name="ok">
                                ยินยอมรับเงื่อนไขต่างๆ
                            </td>
                        </tr>
                        <tr>
                            <td>
                                
                            </td>
                            <td>
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button type="submit" name="submit" id="submit" class="btn btn-default " ><strong>สมัครสมาชิก</strong></button>
                            </td>
                        </tr>
                    </table>
                    
            </form>
                </div></div>
            
                <div class="col-xs-3 col-lg-3" align="right">
                    <p align="right">
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        Already have an account? <strong><a href='login.php'>Login</a></strong>
                        <br>
                    </p>
                </div>
        </div>
        <div class="col-xs-12 col-lg-12">
            <br>
        </div>
    <!-- end col-xs-12 col-sm-9 -->
    <?php
    if(empty($_POST)){
    }
    else {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "store";
        
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
            $sql = $conn->prepare("INSERT INTO member(M_fname,M_lname,M_birthday,M_address,M_tel,M_email,M_password,M_idcard,M_image,M_date_cre,M_date_up)
                                                              VALUES (:M_fname,:M_lname,:M_birthday,:M_address,:M_tel,:M_email,:M_password,:M_idcard,:M_image,:M_date_cre,:M_date_up)");
            $sql->bindParam(':M_fname', $M_fname);
            $sql->bindParam(':M_lname', $M_lname);
            $sql->bindParam(':M_birthday', $M_birthday);
            $sql->bindParam(':M_address', $M_address);
            $sql->bindParam(':M_tel', $M_tel);
            $sql->bindParam(':M_email', $M_email);
            $sql->bindParam(':M_password', $M_password);
            $sql->bindParam(':M_idcard', $M_idcard);
            $sql->bindParam(':M_image', $M_image);
            $sql->bindParam(':M_date_cre', $M_date_cre);
            $sql->bindParam(':M_date_up', $M_date_up);

            // insert a row
            $now = date('Y-m-d');

            $form = $_POST;
            $M_fname = $form['M_fname'];
            $M_lname = $form['M_lname'];
            $M_birthday = $form['M_birthday'];
            $M_address = $form['M_address'];
            $M_tel = $form['M_tel'];
            $M_email = $form['M_email'];
            $M_password = $form['M_password'];
            $M_idcard = $form['M_idcard'];
            $M_image = '';
            $M_date_cre = $now;
            $M_date_up = $now;
            $sql->execute();

            // include 'memid.php';
            echo "<script>window.location='login.php';</script>";
        } catch (PDOException $e) 
        {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;
    }
    ?>
</div> <!-- end row -->
</div> <!-- end container -->
<!-- body -->
</div> <!-- end row-->
<?php
    include_once 'c_footer.php';
    ?>