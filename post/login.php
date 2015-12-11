<?php
require "c_head.php";
?>
<div class="container">
	<div class="row">
		<div class="col-md-6">	</div>
		<div class="col-md-10 col-md-5">
        <div class="col-xs-12 col-lg-12">
            <h1>เข้าสู่ระบบ</h1>
        </div>
			<div class="jumbotron">
				<form method="post" action="#">
					Username:
					<input type="text" name="Username" class="form-control">
					Password:
					<input type="password" name="Password" class="form-control">
					<br>
					<button type="submit" onclick="alert('ยินต้อนรับเข้าสู่เว็บไซต์ ขอให้สนุกก้บการเลือกชมสินค้านะคะ ')"  class="btn btn-default" >login</button>
					<br>
				</form>
			</div>
		</div>
	</div>
</div>
<br>
<?php
require "c_footer.php";
?>
