
<h1>
	<?php echo isset($title) ? $title : 'Payment Detail Report' ; ?></h1>
<?php  //eecho sizeof($profiles);?>

<form action="<?php echo base_url()?>payment/search_by_date" method="POST">
<div class="col-md-12">
 <div class="col-md-6">
     <div class="form-group">
            <label for="message-text" class="control-label">Start Date:</label>
                    <div class='input-group input-append date'  id='datetimepicker1'>
                        <input type='text' id="fromdate" name="fromdate" class="form-control" required/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
     </div>

 </div>
 <div class="col-md-6">
		 <div class="form-group">
						<label for="message-text" class="control-label">End Date:</label>
										<div class='input-group input-append date'  id='datetimepicker2'>
												<input type='text'id="todate" name="todate" class="form-control" required/>
												<span class="input-group-addon">
														<span class="glyphicon glyphicon-calendar"></span>
												</span>
										</div>
		 </div>
 </div>
 <!-- </form> -->
 <script>

 $(document).ready(function() {
       $('#datetimepicker1')
    .datetimepicker({
      format:  'YYYY-MM-DD'
      })
      .on('dp.change', function(e) {
            // Revalidate the date field
            $('#contact_form').formValidation('revalidateField', 'start');
        });
     $('#datetimepicker2')
    .datetimepicker({
      format: 'YYYY-MM-DD'
    });


 });
 </script>

		</div>
		<div class="col-md-12">

			<input type="submit" name="search" value="Search" id="search" class="btn btn-info center-block">

		</div>
	</div>
</form>

<!-- <div class="container-fluid">
	 <div class="row">
	<img src="<?php echo base_url("assets/images/micro_header.jpg");?>" class="img-responsive">
	 </div>
</div> -->
<div class="container box" >
	<div class="row">
 <center><img src="<?php echo base_url("assets/images/micro_header.jpg");?>" class="img-responsive"></center>
	</div>
	<div class="table-responsive">

		<!-- <h3>Payment Summary Report from [	<?php if($_POST['search']) echo $_POST['fromdate'] ?>] To [	<?php if($_POST['search']) echo $_POST['todate'] ?>]</h3> -->
		<table id="summaryReport" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="">Date</th>
					<th width="">Reciver Name</th>
					<th width="">Sende Name</th>
					<th width="">Secuirity Code</th>
					<th width="">Amount</th>
					<th width="">Sending Branch</th>
					<th width="">Status</th>

				</tr>
			</thead>

			<?php
			if(!$profiles){
				echo "Data Is Empty";
			}else{
				$total=0;
			 foreach($profiles as $profile){
//echo sizeof($profiles);
				?>
			<tr>

			<td><?php echo $profile->p_created_at?></td>
			<td><?php echo $profile->rcvr_fname." ".$profile->rcvr_mname." ".$profile->rcvr_lname?></td>
			<td><?php echo $profile->first_name." ".$profile->middle_name." ".$profile->last_name?></td>
			<td><?php echo $profile->secuirity_code?></td>
			<td><?php echo $profile->amount; 	$total=$total+$profile->amount?></td>

			<td><?php echo $profile->sending_branch?></td>
			<td><?php echo $profile->tm_status?></td>
		</tr>
			<?php }


			?>


        <tr><td style="align:right" colspan="4"><center>Total Amount</center></td><td><?php echo $total;?></td></tr>
<?php 	}?>
  </table>
	<!-- <table id="todaySummaryReport" class="table table-bordered table-striped">
		 <thead>
			 <tr>
				 <th width="">Date</th>
				 <th width="">Reciver Name</th>
				 <th width="">Sende Name</th>
				 <th width="">Secuirity Code</th>
				 <th width="">Amount</th>
				 <th width="">Sending Branch</th>
				 <th width="">Status</th>

			 </tr>
		 </thead>
 </table> -->
</div>
	</div>
</div>

 <!-- update modal start -->
 <!-- update modal end -->


<script>
// $(document).ready(function(){
//
//     $(document).on('click', '#search', function(e){
//
// 			e.preventDefault();
// 		 // $('#todaySummaryReport').hide();
// 			//  $('#summaryReport').show();
//     });
// });
// $(function(){
//  //alert("Hello world");
//  	// function
// 	 // $('#summaryReport').hide();
//  	showTodayTransfer();
//  	function showTodayTransfer(){
//  		$.ajax({
//  			type:'ajax',
//  			url:'<?php  echo base_url()?>payment/getTodayPayment',
//  			asyc:false,
//  			dataType:'json',
//  			success:function(data){
//  			// 	console.log(data);
// 			for (var i=0; i<data.length; i++) {
//             var row = $('<tr><td>' + data[i].amount+ '</td><td>' + data[i].amount + '</td><td>' + data[i].amount + '</td></tr>');
//             $('#todaySummaryReport').append(row);
//         }
//  			},
//  			error:function(){
//  			alert("Could not get Data from Database");
//  			}
//  		});
//  	}
// });
// alert("Hello world");
</script>
