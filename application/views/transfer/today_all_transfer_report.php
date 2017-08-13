
<h1>
	<?php echo isset($title) ? $title : 'Transfer Money Summary Report' ; ?></h1>
<?php  //eecho sizeof($profiles);?>



<div class="container box">
	<div class="row">
 <center><img src="<?php echo base_url("assets/images/micro_header.jpg");?>" class="img-responsive"></center>
	</div>
	<div class="table-responsive">
	<table id="today_transfer" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="">No.</th>
					<th width="">Sending Branch</th>
					<th width="">Total Sent</th>
					<th width="">Commision</th>
					<th width="">Total_Sender</th>
					</tr>
			</thead>
			<?php
			if(!$today){
				echo "Data Is Empty";
			}else{
				$total=0;
				$count=1;
			 foreach($today as $profile){

				?>
			<tr>

				<td><?php echo  $count ?></td>
				<td><?php echo  $profile->sending_branch?></td>
				<td><?php echo  $profile->send_total?></td>
				<td><?php echo  $profile->commision?></td>
			 	<td>

					<a data-toggle="modal" data-target="#view-modal" data-id="<?php echo $profile->sending_branch?>" id="getUser" class="btn btn-sm btn-view"><?php echo  $profile->Total_Sender?></a>
				</td>
			</tr>

			<?php
			 $count++;
			$total=$total+$profile->send_total;
		}
			?>
				<tr><td style="align:right" colspan="2"><center>Total Amount</center></td><td><?php echo $total;?></td></tr>
			<?php 	}?>


  </table>
</div>
	</div>
</div>

<!--Modal-->
<div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">

         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
             <h4 class="modal-title">
             <i class="glyphicon glyphicon-user"></i>Todays Message Out
             </h4>
         </div>

         <div class="modal-body">

             <div id="modal-loader" style="display: none; text-align: center;">
                 <img src="<?php echo base_url('assets/ajax-loader.gif');?>">
             </div>

             <div id="dynamic-content">
							 <div class="table-responsive">
						 		<table id="todays-transfer" class="table table-bordered table-striped">
						 			<thead>
						 				<tr>
						 					<th width="">Security Code</th>
						 					<th width="">Sender Name</th>
						 					<th width="">Reciever Name</th>
						 					<th width="">Net Amount</th>
						 					<th width="">Receiving Branch</th>
						 					<th width="">Sending Branch</th>
						 					</tr>
						 			</thead>
								</table>

							</div>

             </div>

         </div>

       <div class="modal-footer">
         <button type="submit" class="btn btn-success" >Print</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>

      </div>
   </div>
</div
<!--end of Modal-->
<script>
/*To fetch Data*/
$(document).ready(function(){

    $(document).on('click', '#getUser', function(e){

						// var header=$('<thead><tr><th width="">Security Code</th>+<th width="">Sender Name</th><th width="">Reciever Name</th><th width="">Net Amount</th><th width="">Receiving Branch</th><th width="">Sending Branch</th></tr></thead>');
						//  $('#todays-transfer').append(header);
  //  $('#todays-transfer tr').remove();
		//  $('#todays-transfer tr').has('td').remove();
		 $('#todays-transfer td').parent().remove();
		// $('#tbl_users td').parent().remove();
			e.preventDefault();
		  var uid = $(this).data('id'); // get id of clicked row

     $.ajax({
		    	url:'<?php  echo base_url()?>transfer/getTodayBranch',
      	 type: 'POST',
         data: {'uid':uid},
         dataType: 'json'
     })
     .done(function(data){
			//console.log(data);

			for (var i=0; i<data.length; i++) {
            var row = $('<tr><td>'+data[i].secuirity_code+'</td><td>'+data[i].first_name+data[i].first_name+data[i].first_name+'</td><td>'+data[i].rcvr_fname+" "+data[i].rcvr_mname+" "+data[i].rcvr_lname+'</td><td>'+data[i].net_amount+'</td><td>'+data[i].receiving_branch+'</td><td>'+data[i].sending_branch+'</td></tr>');

					  $('#todays-transfer').append(row);
        }

     })
     .fail(function(){
			 $('.modal-body').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
     });
    });
});
</script>
