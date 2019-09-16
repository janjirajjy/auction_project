<!-- start menu -->
<div class="wrapper  theme-5-active pimary-color-blue">
  <!-- Top Menu Items -->
  <nav class="navbar navbar-inverse navbar-fixed-top">

    <div class="mobile-only-nav pull-left">

      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">หน้าหลัก</a>

    </div>
    <div class="mobile-only-nav pull-right">
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav" id="navlink" style="float:right">
        <li><a href="index.php">หน้าแรก</a></li>
              <li><a href="pay.php">รายการชำระเงิน</a>  </li>
              <!-- <li class="dropdown  app-drp">
          <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">รายงาน <span class="caret"></span></a>
          <div class="dropdown-menu">
            <li><a href="report.php">รายงานยอดชายภาพรวม</a></li>
            <li><a href="report.php?act=m">รายงานยอดชายรายเดือน</a></li>
            <li><a href="report.php?act=y">รายงานยอดขายรายปี</a></li>
          </div>
        </li> -->
      
          <?php if ($m_id != '') {
            echo '<li><a href="../views/profile/mb_profile.php">
                <span class="glyphicon glyphicon-user"> </span>'
              . ' ' . $cus_name . ' - Profile</a>
            </li>';
            echo '<li><a href="../login_google.php">
              <span class="glyphicon glyphicon-off"> </span>
            Logout</a>
          </li>';
          } else {
            echo '<li><a href="../login_google.php">
            <span class="glyphicon glyphicon-user"> </span>
            Logout</a>
        </li>';
          } ?>
        </ul>
      </div>

  </nav>

  <div class="page-wrapper">
    <div class="container-fluid">
      <div class="row heading-bg">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          <h5 class="txt-dark"></h5>
        </div>
       
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        </div>
      </div>
     
