<?php

//echo "Confrimation Page";
$test=$_SESSION['confrim_data'];


?>

  <div class="row bg-danger">
    <h1>Sender Information</h1>
    <div class="col-sm-3">Name:<?php echo $test['first_name']." ".$test['middle_name']." ".$test['last_name'];?> </div>
    <div class="col-sm-3">Tel:<?php echo $test['sender_tel'];?> </div>
  </div>
  <div class="row  bg-info">
      <h1>Transfer Information</h1>
      <div class="col-md-12 ">
      <div class="col-sm-2">Name: <?php echo $test['rcvr_fname']." ".$test['rcvr_fname']." ".
      $test['rcvr_fname'];?> </div>
      <div class="col-sm-2">Ho.No:<?php echo $test['rcvr_house_number'];?> </div>
      <div class="col-sm-2">Kebele:<?php echo $test['rcvr_kebele'];?> </div>
      <div class="col-sm-2">Tel:<?php echo $test['rcvr_tel'];?> </div>
      <div class="col-sm-2">Id No.:<?php echo $test['rcvr_id_no'];?> </div>
    </div>
  <!-- </div>
  <div class="row"> -->
      <div class="col-md-12">
      <div class="col-sm-2">Secuirity Code:<?php echo $test['secuirity_code'];?> </div>
      <div class="col-sm-2">Amount:<?php echo $test['amount'];?> </div>
      <div class="col-sm-2">Rate:<?php echo $test['rate'];?> </div>
      <div class="col-sm-2">Commision Amount<?php echo $test['commision_amount'];?> </div>
      <div class="col-sm-2">Purpose:<?php echo $test['purpose'];?> </div>
      <div class="col-sm-2">Receiving Branch:<?php echo $test['receiving_branch'];?> </div>
    </div>
  </div>
		<div class="row">

		        <a href="<?php echo base_url().'transfer/create'?>" type="submit" name="submit" class="btn btn-info">Confrim</a>
		        <a href="<?php echo base_url().'transfer'?>" type="submit" name="submit" class="btn btn-danger">Close</a>
		 </div>
