
<div class="container box">
	<div class="row">
 <center><img src="<?php echo base_url("assets/images/micro_header.jpg");?>" class="img-responsive"></center>
	</div>

	<div class="table-responsive">
		<center><p>Daily Summary of Local Money Trasfer</p></center>
		<center><p>For Day of <?php echo date('F d, Y');?></p></center>
		<!-- <h3>Payment Summary Report from [	<?php if($_POST['search']) echo $_POST['fromdate'] ?>] To [	<?php if($_POST['search']) echo $_POST['todate'] ?>]</h3> -->
		<table id="sender_info1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="">Date</th>
					<th width="">Reciver Name</th>
					<th width="">Sende Name</th>
					<th width="">Secuirity Code</th>
					<th width="">Net Amount</th>
					<th width="">Sending Branch</th>
					<!-- <th width="">Status</th> -->

				</tr>
			</thead>

			<?php
			if(!$profiles){
				echo "Data Is Empty";
			}else{
				$total=0;
			 foreach($profiles as $profile){

				?>
			<tr>

			<td><?php echo  date('Y-m-d', strtotime($profile->tm_created_at))?></td>
			<td><?php echo $profile->rcvr_fname." ".$profile->rcvr_mname." ".$profile->rcvr_lname?></td>
			<td><?php echo $profile->first_name." ".$profile->middle_name." ".$profile->last_name?></td>
			<td><?php echo $profile->secuirity_code?></td>
			<td><?php echo $profile->net_amount; 	$total=$total+$profile->net_amount?></td>

			<td><?php echo $profile->sending_branch?></td>

		</tr>
			<?php }


			?>


        <tr><td style="align:right" colspan="4"><center>Total Amount</center></td><td><?php echo $total;?></td></tr>
<?php 	}?>
  </table>
</div>
	</div>
