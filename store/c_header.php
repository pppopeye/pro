<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mm WEB</title>
  <!-- bootstrap -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <script src="../bootstrap/js/jquery-1.11.3.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <!-- end bootstrap -->

  <!-- font
  -->
  
  <link rel="stylesheet" href="../font/max.css">

  <style>
    body {
      background-color: #faf9f9;
    }
  </style>

</head>
<body>
<!-- logo -->
<div><!-- style="background-color:#c0c0c0;" -->
  
<div class='container'>
    <div class='row'>
        <div class='col-xs-4 col-md-3'><!-- style='background-color:lavender;'
<img src='../img/logo.jpg' width='250' height='50em' class='img-responsive' style="
        padding: 15px;">
-->
            <a href="../post/index.php"><h1>webไม่มีชื่อ</h1></a>
        </div>
      <!-- /col-sm-3 -->
      <!-- end logo -->

      <!-- search button -->
      <br>
      <div class='col-xs-1 col-md-5'  ><!--style='background-color:#7ab5d3;' -->
        <div align='right'>
        </div>
      </div>
      <!-- /col-sm-6 -->
<!-- end search button -->

<!-- menu bar -->
      <div class='col-xs-5 col-md-3' ><!-- style='background-color:lavenderblush;' -->
          <div  align='center'>
          <a href='../code/search.php'>ค้นหา </a> &#10992;
              <a href="../code/show.php"> มือสอง</a> &#10991;
              <a href="../code/show2.php">ร้านค้า</a> &#10992;
              <a href="../code/showotop.php">otop </a>
              <hr>
          </div>
      </div>
      <!-- /col-sm-6 -->
      <!-- end search button -->

      <!-- login -->
    <?php
        if(!isset($_SESSION["fullname"])){
    ?>
        <div class='col-xs-1 col-md-1'><!-- style='background-color:lavender;'-->
            <a href="login.php">login</a>
        </div>
        <?php
            }
           ?>
      <!-- /col-sm-1 -->
      <!-- end login -->
    </div> 
    <!-- end row -->
</div> <!-- end container -->
</div>

