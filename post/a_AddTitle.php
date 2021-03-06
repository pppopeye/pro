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
                <?php
                if(empty($_POST)){ ?>
                <form method="post" action="">
                    <!-- style='"background-color:#c1e2b3;' -->
                    <h2 align='center'><strong>เพิ่ม</strong>คำนำหน้าชื่อ</h2>
                    <hr>
                    
                <div class="col-xs-12 col-lg-offset-5">
                <table>
                    <?php

//setting connection parameters
$user = "root";
$password = "";
$database_name = "test";
$hostname = "localhost";
$dsn = 'mysql:dbname=' . $database_name . ';host=' . $hostname;

//initialize the connection to the database
$conn = new PDO($dsn, $user, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

//select statement with variables
$sqlSelect = 'SELECT * FROM title;';

//preparing the statement
$sth = $conn->prepare($sqlSelect);

//execute the statement with different values

$sth->execute(array());

                    foreach ($sth->fetchAll() as $row) {
                        ?>
                <tr>
                    <td>
                    <?php
                        echo $row['id'].'. ';
                        ?>
                    <?php
                        echo ' '.$row['Title'];
                        ?>
                    </tr>
                    <?php
                        }
                        ?>
                </table>
                    <br>
                    <br>
                    <br>
            </div>
                    <div class="col-xs-12 col-md-12">
                        <div class="col-xs-12 col-md-3">
                            คำนำหน้าชื่อ:
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <input type="text" name="Title" id="Title" class="form-control">
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <button type="submit" name="submit" id="submit" class="btn btn-default " ><strong>เพิ่ม</strong></button>
                        </div>
                    </div>
                    <br>
                    </div>
                
                    <div class="col-xs-12 col-md-12">
                        <br>
                        <br>
                        <hr>
                    </div>
            </form>
            <?php
            } else {
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "test";

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
                    $sql = $conn->prepare("INSERT INTO title (Title) VALUES (:Title)");
                    $sql->bindParam(':Title', $Title);

                    // insert a row
                    $form = $_POST;
                    $Title = $form['Title'];
                    $sql->execute();

                    echo "<script>window.location='a_AddTitle.php';</script>";

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