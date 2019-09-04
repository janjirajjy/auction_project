<?php 
$id=$_GET['ID'];
$sql = "SELECT * FROM account WHERE account_id=$id ";
$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
extract($row);
?>
<br>
<div class="form-group"> 
<h4> แก้ไขธนาคาร </h4>
</div>
<form action="mb_bank_form_edit_db.php" method="post" class="form-horizontal">
  <div class="form-group">
    <div class="col-sm-2 control-label">
      ชื่อเจ้าของบัญชี :
    </div>
    <div class="col-sm-4">
      <input type="text" name="account_name" required class="form-control" autocomplete="off" value="<?php echo $row['account_name'];?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      เลขที่บัญชี :
    </div>
    <div class="col-sm-4">
      <input type="text" name="account_number" required class="form-control" value="<?php echo $row['account_number'];?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      ประเภทบัญชี :
    </div>
    <div class="col-sm-4">
      <input type="text" name="account_type" required class="form-control" value="<?php echo $row['account_type'];?>">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      ชื่อธนาคาร :
    </div>
    <div class="col-sm-4">
   
      <select class="form-control" name="bank_name" data-placeholder="Choose a Category"
         tabindex="0">
         <option value="">กรุณาเลือก</option>
         <option value="ธนาคารกรุงเทพ">ธนาคารกรุงเทพ</option>
         <option value="ธนาคารกสิกรไทย">ธนาคารกสิกรไทย</option>
         <option value="ธนาคารกสิกรไทย">ธนาคารกสิกรไทย</option>
         <option value="ธนาคารกรุงไทย">ธนาคารกรุงไทย</option>
         <option value="ธนาคารทหารไทย">ธนาคารทหารไทย</option>
         <option value="ธนาคารไทยพาณิชย์">ธนาคารไทยพาณิชย์</option>
         <option value="ธนาคารกรุงศรีอยุธยา">ธนาคารกรุงศรีอยุธยา</option>
         <option value="ธนาคารเกียรตินาคิน">ธนาคารเกียรตินาคิน</option>
         <option value="ธนาคารซีไอเอ็มบีไทย">ธนาคารซีไอเอ็มบีไทย</option>
         <option value="ธนาคารทิสโก้">ธนาคารทิสโก้</option>
         <option value="ธนาคารธนชาต">ธนาคารธนชาต</option>
         <option value="ธนาคารยูโอบี">ธนาคารยูโอบี</option>
         <option value="ธนาคารสแตนดาร์ดชาร์เตอร์ด (ไทย)">ธนาคารสแตนดาร์ดชาร์เตอร์ด (ไทย)</option>
         <option value="ธนาคารไทยเครดิตเพื่อรายย่อย">ธนาคารไทยเครดิตเพื่อรายย่อย</option>
         <option value="ธนาคารแลนด์ แอนด์ เฮาส์">ธนาคารแลนด์ แอนด์ เฮาส์</option>
         <option value="ธนาคารไอซีบีซี(ไทย)">ธนาคารไอซีบีซี (ไทย)</option>
         <option value="ธนาคารออมสิน">ธนาคารออมสิน</option>
         <option value="ธนาคารอาคารสงเคราะห์">ธนาคารอาคารสงเคราะห์</option>
         <option value="ธนาคารอิสลามแห่งประเทศไทย">ธนาคารอิสลามแห่งประเทศไทย</option>

      </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-4">
      <input type="hidden" name="account_id"  value="<?php echo $row['account_id'];?>">
      <button type="submit" class="btn btn-success">บันทึก</button>
    </div>
  </div>
</form>