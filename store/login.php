<?php
session_start();
include_once '../theme/c_head.php';
?>
<div class="container">
    <div class="row">
        <div class="col-xs-6 col-lg-12">
            <h1>บริการคลังสินค้าออนไลน์</h1>
        </div>

    <div class="col-xs-6 col-lg-4">
        <div class="jumbotron">
            <b>&#10144; For Member</b>
            <form action="checkLogin.php" method="POST">
                Username: <input type="text" name="username" class="form-control">
                Password: <input type="password" name="password" class="form-control">
                <br>
                <input type="submit" class="btn btn-default" value="Login">
            </form>
        </div>
    </div>

    <div class="col-xs-6 col-lg-4">
         <div class="jumbotron">
             <b>&#10144; For Admin</b>
             <form action="checkLoginam.php" method="POST">
                  Username: <input type="text" name="username" class="form-control">
                  Password: <input type="password" name="password" class="form-control">
                 <br>
                  <input type="submit" class="btn btn-default" value="Login">
             </form>
         </div>
    </div>

    <div class="col-xs-6 col-lg-4">
         <div class="jumbotron">
             <p>สมัครใช้งาน
             <a href="Addmember.php">
                 <input type="button" class="btn btn-default" value="สมัคร">
             </a>
             </p>
         </div>
    </div>



<?php
if (isset($_GET["error"])) {
    echo "<div style='color: red;'>รหัสผ่านไม่ถูกต ้อง</div>";
}
?>

</div> <!-- end row-->

<!-- footer -->
    <br>
<div class="col-xs-12" style="  bottom: 0px; width: 85%; height: 80px;">
    <hr>
    <p align="center">Thank for <a href="http://getbootstrap.com">bootstrap</a> </p>
</div>
<!-- footer -->

</div>
</body>
</html>
