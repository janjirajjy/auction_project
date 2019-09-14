<?php include('hder.php'); //css 
?>

<body>
  <?php include('nav.php'); //menu?>

  <div class="col-md-2">
    <?php include('menu_l.php'); ?>
  </div>
  <div class="col-md-10">
    <h3 align="center"> Admin Page ยินดีต้อนรับคุณ
      <font color="blue"> <?php echo $user_name; ?>
      </font>
    </h3>
    <hr>
       <!-- Row -->
    <!-- <div class="row"> -->
      <div class="col-md-12">
        <div class="panel panel-default card-view">
          <div class="panel-heading">
            <div class="pull-left">
              <h6 class="panel-title txt-dark">รายการสินค้าที่เปิดประมูล </h6>
            </div>
            <div class="clearfix"></div>
          </div>
          <div class="panel-wrapper collapse in">
            <div class="panel-body">
              <?php include('product_open_list.php'); ?>
            </div>
          </div>
        </div>
      <!-- </div> -->
    </div>
     <!-- /Row -->
  </div>
 
  </div>
  
<!-- /Footer -->
</body>

<!-- Footer -->




<?php include('js.php'); //js
?>