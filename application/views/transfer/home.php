
<div class="row">
  <div class="col-sm-4">
<div class="card" style="width: 20rem;">
  <img class="card-img-top" src="<?php echo base_url("assets/images/images.png");?>" alt="Card image cap" style="width:100px;height:100px">
  <div class="card-block">
    <!-- <h4 class="card-title">Paid Money</h4> -->
    <!-- <p class="card-text">Today's Paid Money:</p> -->
    </br>
    <table class="table table-striped table-bordered">
    <tr>
    <th>Today Paid</th>
    </tr>
    <?php
    //echo sizeof($paid[0]->total);
  if($todaypaid){
      foreach($todaypaid as $p){

       ?>
     <tr>
     <td style="color:#06A011"><?php echo  number_format($p->total_payment) ;?></td>

     </tr>
     <?php }
   }

   ?>
  </table>
    <table class="table table-striped table-bordered" >
    <tr>
    <th>Total Paid</th>
    </tr>
    <?php
    //echo sizeof($paid[0]->total);
  if($paid){
      foreach($paid as $p){

       ?>
     <tr>

     <td style="color:#06A011"><?php  echo number_format($p->total,2);?></td>

     </tr>
     <?php }
   }

   ?>
  </table>
    <!-- <a href="#" class="btn btn-primary">View Detail</a> -->
  </div>
</div>
</div>
<div class="col-sm-4">
<div class="card" style="width: 20rem;">
<img class="card-img-top" src="<?php echo base_url("assets/images/unpaid-new.png");?>" alt="Card image cap" style="width:100px;height:100px">
<div class="card-block">
  <!-- <h4 class="card-title">UnPaid Money</h4> -->
  <!-- <p  class="card-text">Today's UnPaid:</p> -->
  </br>
  <table class="table table-striped table-bordered">
    <tr>
    <th>Today UnPaid</th>
    </tr>
  <tr>
  <?php
  //echo sizeof($paid[0]->total);
  if($todayunpaid){
  foreach($todayunpaid as $unp){

   ?>
  <tr>

  <td style="color:#D68910"><?php  echo number_format($unp->total,2);?></td>

  </tr>
  <?php }
  }

  ?>
  </table>
  <table class="table table-striped table-bordered">
  <tr>
  <th>Total UnPaid</th>
  </tr>
  <?php
  //echo sizeof($paid[0]->total);
if($unpaid){
  foreach($unpaid as $unp){

   ?>
 <tr>

 <td  style="color:#D68910"><?php   echo number_format($unp->total,2);?></td>

 </tr>
 <?php }
 }

 ?>
</tr>
</table>

  <!-- <a href="#" class="btn btn-primary">View Detail</a> -->
</div>
</div>
</div>
<div class="col-sm-4">
<div class="card" style="width: 20rem;">
<img class="card-img-top" src="<?php echo base_url("assets/images/commision.jpg");?>" alt="Card image cap" style="width:100px;height:100px">
<div class="card-block">
  <!-- <h4 class="card-title">Commision</h4> -->
  <!-- <p class="card-text">Tody's commision:</p> -->
</br>
<table class="table table-striped table-bordered">
<tr>
<th>Today Commision</th>
</tr>
<?php
//echo sizeof($paid[0]->total);
if($todaycommision){
foreach($todaycommision as $com){

 ?>
<tr>

<td style="color:#1F618D"><?php  echo number_format($com->total,2);?></td>

</tr>
<?php }
}

?>
</table>
  <table class="table table-striped table-bordered">
  <tr>
  <th>Total Commision</th>
  </tr>
  <?php
  //echo sizeof($paid[0]->total);
if($commision){
  foreach($commision as $com){

   ?>
 <tr>

 <td style="color:#1F618D"><?php  echo number_format($com->tota_commision,2);?></td>

 </tr>
 <?php }
 }

 ?>
</table>

  <!-- <a href="#" class="btn btn-primary">View Detail</a> -->
</div>
</div>
</div>
</div>
