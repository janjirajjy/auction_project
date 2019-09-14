<?php include('hder.php'); //css ?>
<body>
  <?php include('nav.php'); //menu?>
  <!-- content -->
   <!-- <div class="container"> -->
   <div class="row">
      <div class="col-md-2">
        <?php include('menu_l.php');?>
      </div>
      
      <div class="col-md-10">
      <div class="col-md-12">
        <div class="panel panel-default card-view">
          <div class="panel-heading">
            <div class="pull-left">
              <h6 class="panel-title txt-dark">จัดการข้อมูลประเภทการส่ง </h6>
            </div>
            <div class="clearfix"></div>
          </div>
          <br>
          <h4>
          <a href="send_type.php?act=add" class="btn btn-primary"> เพิ่มประเภทการจัดส่ง </a>
        </h4>
        <div class="panel-wrapper collapse in">
            <div class="panel-body">
            <?php 

$act = (isset($_GET['act']) ? $_GET['act'] : '');

if($act=='add'){
 include('send_type_form_add.php');
}elseif($act=='edit'){
 include('send_type_form_edit.php');
}else{
 include('send_type_list.php');
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