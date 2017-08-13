
<h1>
	<?php echo isset($title) ? $title : 'Default Title' ; ?></h1>
<?php  //eecho sizeof($profiles);?>

<div class="container box">
	<div class="table-responsive">
		<table id="sender_info" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="">Date</th>
					<th width="">Reciver Name</th>
					<th width="">Sende Name</th>
					<th width="">Secuirity Code</th>
					<th width="">Amount</th>
					<th width="">Sending Branch</th>
					<th width="">Receiving_branch Branch</th>
					<th width="">Status</th>
					<th width="">Aproved By</th>
					<th width="">Action</th>
				</tr>
			</thead>

			<?php
			if(!$profiles){
				echo "Data Is Empty";
			}else{

			 foreach($profiles as $profile){

				?>
			<tr>

			<td><?php echo $profile->tm_created_at?></td>
			<td><?php echo $profile->rcvr_fname." ".$profile->rcvr_mname." ".$profile->rcvr_lname?></td>
			<td><?php echo $profile->first_name." ".$profile->middle_name." ".$profile->last_name?></td>
			<td><?php echo $profile->secuirity_code?></td>
			<td><?php echo $profile->amount?></td>
			<td><?php echo $profile->sending_branch?></td>
			<td><?php echo $profile->receiving_branch?></td>
			<td><?php echo $profile->tm_status?></td>
			<td><?php echo $profile->t_aproved_by?></td>
			<td>
			<button data-toggle="modal" data-target="#view-modal1" data-id="<?php echo $profile->transfer_money_id?>" id="getPay" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-update"></i>Cancel Aprove</button>
			</td>

			</tr>
			<?php }
    	}

			?>

		</table>

	</div>
</div>
 <!--Modal-->
 <form action="<?php echo base_url()?>payment/create" method="POST">
 <div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
       <div class="modal-content">

          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">
              <i class="glyphicon glyphicon-user"></i>Recieve[Message ] Detail
              </h4>
          </div>

          <div class="modal-body">

              <div id="modal-loader" style="display: none; text-align: center;">
                  <img src="<?php echo base_url('assets/ajax-loader.gif');?>">
              </div>

              <div id="dynamic-content"> <!-- mysql data will load in table -->

                  <div class="row">
                      <div class="col-md-6">
                      <div class="table-responsive">
                      <table class="table table-striped table-bordered">
                      <tr>
                      <th>Sender Name</th>
                      <td id="txt_name"></td>
                      </tr>

                      <tr>
                      <th>Amount</th>
                      <td id="txt_amount"></td>
											<input type="hidden" id="txt_amount" name="txt_amount"/>

                      </tr>

                      <tr>
                      <th>Commision Amount</th>
                      <td id="txt_commision"></td>
                      </tr>

                      <tr>
                      <th>Commision Rate</th>
                      <td id="txt_rate"></td>
                      </tr>

                      <tr>
                      <th>Purpose</th>
                      <td id="txt_purpose"></td>
                      </tr>

                      </table>

                      </div>

                    </div>

										<!-- Reciever Information -->
										<div class="col-md-6">

										<div class="table-responsive">

										<table class="table table-striped table-bordered">
										<tr>
										<th>Reciever Name</th>
										<td id="txt_rcvr_name"></td>
										</tr>
										<tr>
										<th>Reciever Tel</th>
										<td id="txt_tel"></td>
										</tr>
										<tr>
										<th>Security Code</th>
										<td id="txt_code"></td>
										</tr>

                    <input type="hidden" id="txt_transfer_id" name="txt_transfer_id"/>

										</table>

										</div>

									</div>
               </div>

              </div>

          </div>

        <div class="modal-footer">
					<button type="submit" class="btn btn-success" >Finish Payment</button>
             <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

       </div>
    </div>
 </div>
 </form>
 <!--end of Modal-->

 <!-- update modal start -->
 <!-- update modal end -->
<script>
// $(function(){
//  //alert("Hello world");
//  	// function
//  	showAllEmployee();
//  	function showAllEmployee(){
//  		$.ajax({
//  			type:'POST',
//  			url:'<?php  echo base_url()?>payment/get',
//  			asyc:false,
//  			dataType:'json',
//  			success:function(data){
//  				console.log(data);
//         document.getElementById('rate').value=data[0].rate_value;
//       },
//  			error:function(){
//  			alert("Could not get Data from Database");
//  			}
//  		});
//  	}
// });
/* Auto Calculate*/
$('#qty').on('keyup',function(){
     $('#total').val( $('#qty').vhal() * $('#price').val());
});
/*To fetch Data*/
$(document).ready(function(){

    $(document).on('click', '#getPay', function(e){

			e.preventDefault();
		  var uid = $(this).data('id'); // get id of clicked row

     $.ajax({
		    	url:'<?php  echo base_url()?>transfer/getTransferDetailById',
         // url: 'getuser.php',
				 type: 'POST',
         // data: 'id='+uid,
				 data: {'uid':uid},
         dataType: 'json'
     })
     .done(function(data){
			//  console.log(data);

	      $('#dynamic-content').hide(); // hide dynamic div
	      $('#dynamic-content').show(); // show dynamic div
		    $('#txt_name').html(data[0].first_name+" "+data[0].middle_name+" "+data[0].last_name);
				$('#txt_amount').html(data[0].amount);
				$('#txt_code').html(data[0].secuirity_code);
				$('#txt_purpose').html(data[0].purpose);
				$('#txt_rate').html(data[0].rate);
		    $('#txt_commision').html(data[0].commision_amount);
	      $('#txt_rcvr_name').html(data[0].rcvr_fname+" "+data[0].rcvr_mname+" "+data[0].rcvr_lname);
				$('#txt_tel').html(data[0].rcvr_tel);
				$('#txt_tel').html(data[0].rcvr_kebele);
      //  $('#txt_transfer_id').html(data[0].transfer_money_id);
			document.getElementById('txt_transfer_id').value=data[0].transfer_money_id;
			document.getElementById('txt_amount').value=data[0].amount;
				//transfer_id
	      $('#modal-loader').hide();    // hide ajax loader
     })
     .fail(function(){
			 $('.modal-body').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
     });
    });
});
/*end----------------------------------------------------------*/
// $(function(){
//  //alert("Hello world");
//  	// function
//  	showAllEmployee();
//  	function showAllEmployee(){
//  		$.ajax({
//  			type:'ajax',
//  			url:'<?php  echo base_url()?>transfer/getAll',
//  			asyc:false,
//  			dataType:'json',
//  			success:function(data){
//  				console.log(data);
//  			},
//  			error:function(){
//  			alert("Could not get Data from Database");
//  			}
//  		});
//  	}
// });
// alert("Hello world");
</script>
