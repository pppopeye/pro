
            <form method="post" action="">

                <div class="col-xs-12 col-md-8">
                    <div class="col-xs-10 col-md-6">
                        ขนาดคลังสินค้า :
                        <input type="text" name="M_id" id="M_id" class="form-control">
                        <br>
                        ระยะเวลาที่เก็บ(ปี) :
                        <input type="text" name="stime" id="stime" class="form-control">
                        <br>
                        <input type="submit" name="submit" id="submit" class="btn btn-default " >
                            <strong>เพิ่ม</strong>
                        </input>
                    </div>

            </form>
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
                $password = "1234";
                $dbname = "store";

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
                    $sql = $conn->prepare("INSERT INTO storerent (M_id) VALUES (:M_id)");
                    $sql->bindParam(':M_id', $M_id);

                    // insert a row
                    $form = $_POST;
                    $M_id = $form['M_id'];
                    $sql->execute();

                    echo "<script>window.location='mStore.php';</script>";

                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                $conn = null;
            }
            ?>
