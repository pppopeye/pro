<?php
session_start();
if ( !isset($_SESSION["fullname"]) ) {
    header("location: login.php");
}
?>
<?php
include_once 'c_header.php';
?>
<div class="container">
    <div class="row">
        <?php
        include_once 'c_menuM.php';
        ?>
        <?php

        //$id = $_POST['id'];
        // $id = $_GET['id'];
        //$id = 1;
        //$id = $_REQUEST['id'];
        //setting connection parameters
        
        include_once 'connect.php';

        //select statement with variables
        $sqlSelect = 'SELECT * FROM storerent WHERE M_id= '.$_SESSION["fullname"].';';

        $stmt = $conn->prepare($sqlSelect);

        $stmt->execute(array());


        //
        ?>
        <!-- body -->
        <div align="center" class="col-xs-6 col-lg-9" >
            <h3>ยอดชำระคลังสินค้า</h3><br>
            <div class="jumbotron">

                <table>
                        <?php
                        foreach($stmt->fetchAll() as $row) {
                            if(($row['rprice'])==0){
                                echo "<div>คุณได้ทำการชำระไปแล้ว</div>";

                        }elseif(($row['rprice'])==3){
                                echo "<div>ระบบกำลังดำเนินการ</div>";
                            }

                            else{
                            ?>
                                <tr>
                                    <td>
                                        รหัสคลัง :
                                    </td>
                                    <td>
                                        ราคา / เดือน :
                                    </td>
                                </tr>
                    <tr>
                        <td>
                            <input type="text" name="S_NamePro" value='<?=$row['r_id'] ?>' class="form-control">
                        </td>
                        <td>
                            <input type="text" name="price" id="price" value="<?=$row['rprice']?>" class="form-control">
                        </td>
                        <td>
                            <a href="mPayall.php?id=<?=$row['r_id']?>"><button class="form-control">แจ้ง</button></a>
                        </td>
                    </tr>

                    <?php
                    }
                        }
                    ?>
                </table>
</div>
<!-- body -->

</div> <!-- end row-->

</div>
</div>
<?php
include_once '../theme/c_footer.php';
?>