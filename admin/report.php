<?php include('hder.php'); //css ?>
<body>
  <?php include('nav.php'); //menu?>
  <!-- content -->
  <div class="row">
      <div class="col-md-2">
        <?php include('menu_l.php');?>
      </div>
      
      <div class="col-md-10">
      <div class="col-md-12">
        <div class="panel panel-default card-view">
          <div class="panel-heading">
            <div class="pull-left">
              <h6 class="panel-title txt-dark"> รายงานยอดขายภาพรวม </h6>
            </div>
            <div class="clearfix"></div>
          </div>
          <br>
         
        <div class="panel-wrapper collapse in">
            <div class="panel-body">
            <?php
        $act = $_GET['act'];
        if($act=='showslip'){
             echo '<div class="col-md-12">';
              include('pay_detail.php');
               echo '<p align="center"> <button onclick="window.print();">พิมพ์</button></p>';
             echo '</div>';
        }elseif($act=='m'){
            echo '<div class="col-md-12">';
            include('report_list_m.php');
             echo '<p align="center"> <button onclick="window.print();">พิมพ์</button></p>';
            echo '</div>';
        }elseif($act=='y'){
           echo '<div class="col-md-12">';
            include('report_list_y.php');
             echo '<p align="center"> <button onclick="window.print();">พิมพ์</button></p>';
            echo '</div>';
        }else{
            echo '<div class="col-md-12">';
            include('report_list.php');
            echo '<p align="center"> <button onclick="window.print();">พิมพ์</button></p>';
            echo '</div>';
        }
        ?>
       </div>
       </div>
      </div>
      </div>
    </div>
  </div>

  <?php include('footer.php'); //footer?>
</body>
<?php include('js.php'); //js?>