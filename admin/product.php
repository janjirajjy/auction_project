<?php include('hder.php'); //css ?>
<script src="../ckeditor/ckeditor.js"></script>
  <script src="../ckeditor/samples/js/sample.js"></script>
  <link rel="stylesheet" href="../ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
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
              <h6 class="panel-title txt-dark">จัดการสินค้า</h6>
            </div>
            <div class="clearfix"></div>
          </div>
          <br>
          <h4>
          <a href="product.php?act=add" class="btn btn-info"> เพิ่มสินค้า </a> 
          <a href="product.php?act=openlist" class="btn btn-success"> รายเปิดประมูล </a>
        </h4>
        <div class="panel-wrapper collapse in">
            <div class="panel-body">
            <?php 
       $act = (isset($_GET['act']) ? $_GET['act'] : '');

        if($act=='add'){
          include('product_form_add.php');
        }elseif($act=='edit'){
          include('product_form_edit.php');
        }elseif($act=='open'){
          include('product_form_open.php');
        }elseif($act=='openedit'){
          include('product_form_open_edit.php');
        }elseif($act=='openlist'){
          include('product_open_list.php');
        }else{
          include('product_list.php');
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