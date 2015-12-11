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


					<h2 align='center'><strong>เพิ่ม</strong>ประกาศ</h2>
						<hr>
						<div class="col-xs-12 col-md-12">
							<div class="col-xs-10 col-md-5">
					Type Post:
					<input type="radio" name="Post_type" class="form" value="1">SEll
					<input type="radio" name="Post_type" class="form" value="2">BUY
					<br>
					สินค้าแบบ: 
					<?php
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "test";

                                try {
                                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"));
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                    //select statement with variables
                                    $sqlSelect = 'SELECT id,Post_name FROM post_name';

                                    //preparing the statement
                                    $sth = $conn->prepare($sqlSelect);

                                    //execute the statement with different values

                                    $sth->execute(array());
                                    ?>
                                    <select name='Post_name' >
                                        <?php
                                    foreach ($sth->fetchAll() as $row) {
                                        ?>
                                        <option value='<?=$row['id']?>' style='font-family: max;'><?=$row['Post_name']?></option>
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
					Name Post:
					<input type="text" name="P_name" class="form-control">
					Name Product:
					<input type="text" name="P_namepro" class="form-control">
<!--
					จำนวน:
					<input type="text" name="total" class="form-control">

					ราคา:
					<input type="text" name="price" class="form-control">
-->
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
<!-- script เพิ่มรูป ติดเออเรอร์
<script>
							function myFunction() {
								var x = document.createElement("INPUT");
								x.setAttribute("type", "file");
								document.body.appendChild(x);
							}
						</script>

						<button onclick="myFunction()" class="btn btn-default" >เพิ่มรูป</button>
					-->
					รูปภาพ:
					<input type="text" name="P_img" class="form-control">
					สถานะสินค้า
					<input type="text" name="P_status" class="form-control">
					รายละเอียด:
					P_id ใส่ตัวเลข
					<input type="text" name="P_id" class="form-control">
					ประกัน
					<input type="text" name="Pd_warranty" class="form-control">
					สภาพสินค้า :
					<input type="text" name="Pd_description" class="form-control" >
					ปัญหา :
					<input type="text" name="Pd_issue" class="form-control">
					จำนวน
					<input type="text" name="Pd_total" class="form-control">
					ราคา
					<input type="text" name="Pd_price" class="form-control">

					<input type="submit" onclick="alert('Sure!')" value="Post!" class="btn btn-default" ><br><br><br>
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
					$stmt = $conn->prepare("INSERT INTO post (M_id,Post_type,Post_name,P_name,P_namepro,P_img,P_date,P_time,P_type,P_status) VALUES (:M_id,:Post_type,:Post_name,:P_name,:P_namepro,:P_img,:P_date,:P_time,:P_type,:P_status)");
					$stmt->bindParam(':M_id', $M_id);
					$stmt->bindParam(':Post_type',$Post_type);
					$stmt->bindParam(':Post_name',$Post_name);
					$stmt->bindParam(':P_name',$P_name);
					$stmt->bindParam(':P_namepro', $P_namepro);
					$stmt->bindParam(':P_img', $P_img);
					$stmt->bindParam(':P_date', $P_date);
					$stmt->bindParam(':P_time', $P_time);
					$stmt->bindParam(':P_type', $P_type);
					$stmt->bindParam(':P_status', $P_status);

					// insert a row
					$form = $_POST;
					$M_id = $form['M_id'];
					$Post_type = $form['Post_type'];
					$Post_name = $form['Post_name'];
					$P_name = $form['P_name'];
					$P_namepro = $form['P_namepro'];
					$P_img = $form['P_img'];
					$P_date = 'NOW()';
					$P_time = 'NOW()';
					$P_type = $form['P_type'];
					$P_status = $form['P_status'];
					$stmt->execute();

					// prepare sql and bind parameters
					$stmt2 = $conn->prepare("INSERT INTO post_detail (P_id,Pd_warranty,Pd_description,Pd_issue,Pd_total,Pd_price) VALUES (:P_id,:Pd_warranty,:Pd_description,:Pd_issue,:Pd_total,:Pd_price)");
					$stmt2->bindParam(':P_id', $P_id);
					$stmt2->bindParam(':Pd_warranty',$Pd_warranty);
					$stmt2->bindParam(':Pd_description',$Pd_description);
					$stmt2->bindParam(':Pd_issue', $Pd_issue);
					$stmt2->bindParam(':Pd_total', $Pd_total);
					$stmt2->bindParam(':Pd_price', $Pd_price);

					// insert a row
					$form = $_POST;
					$P_id = $form['P_id'];
					$Pd_warranty = $form['Pd_warranty'];
					$Pd_description = $form['Pd_description'];
					$Pd_issue = $form['Pd_issue'];
					$Pd_total = $form['Pd_total'];
					$Pd_price = $form['Pd_price'];
					$stmt2->execute();

					echo "<script>window.location='post.php';</script>";

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