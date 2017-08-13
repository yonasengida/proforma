
<div class="container box">
	<div class="table-responsive">
		<div class="col-md-12">
			<?php //echo $_SESSION[reference]?>
		</div>
		<table id="sender_info" class="table table-bordered table-striped">
			<thead>
					<tr>


					<!-- <th width="">Customer</th>
					<th width="">Ref No.</th> -->
          <th width="">Customer Name</th>
					<th width="">Customer Tin</th>
          <th width="">Customer Mobile</th>
          <th width="">Refer Number</th>
          <th width="">Amount</th>
					<th width="">Action</th>

				</tr>
			</thead>

			<?php
			if(!$profiles){
				echo "Data Is Empty";
			}else{

        $totalAmount=0;
				 foreach($profiles as $profile){

				?>
			<tr>



        <td><?php echo $profile->customer_name?></td>
        <td><?php echo $profile->customer_tin?></td>
        <td><?php echo $profile->customer_mobile?></td>
        <td><?php echo $profile->reference_no?></td>
        <td><?php echo $profile->amount?></td>
        <td>
          <button data-toggle="modal" data-target="#view-modal" data-id="<?php echo $profile->reference_no?>" id="getProforma" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-eye-open"></i> View</button>

        </td>


			</tr>
			<?php }
			}
			?>

		</table>

	</div>
</div>
<form id= "crate_user" action="<?php echo base_url()?>item/create" method="POST">
<!-- Create Modal-->
<div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">

         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
             <h4 class="modal-title">
             <i class="glyphicon glyphicon-user"></i>Proforma Detail
             </h4>
         </div>

         <div class="modal-body">

             <div id="modal-loader" style="display: none; text-align: center;">
                 <img src="<?php echo base_url('assets/ajax-loader.gif');?>">
             </div>
             <div id="dynamic-content"> <!-- mysql data will load in table -->
               <table id="proformadetail" class="table table-bordered table-striped">
                 <thead>

                   <tr>
                     <tr>
                      <!-- <th width="">Customer</th> -->
                      <!-- <th width="">Ref No.</th> -->
                      <th id="proformaRef" colspan="2"></th>
                      <th id="requester" colspan="3"></th>

                   </tr>
                   <tr>

                     <th width="">Item</th>
                     <th width="">Category</th>
                     <th width="">Unit</th>
                     <th width="">Quantity</th>
                     <th width="">Amount</th>
                   </tr>
                 </thead>

               </table>

             </div>
         </div>

       <div class="modal-footer">
         <button id="1" type="submit" class="btn btn-success" >Print</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>

      </div>
   </div>
</div
</form>
<script>
$(document).ready(function(){
    $(document).on('click', '#getProforma', function(e){
			e.preventDefault();
		  var uid = $(this).data('id'); // get id of clicked row
		     $.ajax({
		    	url:'<?php  echo base_url()?>proforma/viewProforma',
      	 type: 'POST',
      	 data: {'uid':uid},
         dataType: 'json'
     })
     .done(function(data){
        $('#proformadetail td').parent().remove();
			// console.log(data);
	    // document.getElementById('item_name').value=data[0].reference_no;
      document.getElementById("proformaRef").innerHTML = "Reference Number:"+data[0].reference_no;
			document.getElementById("requester").innerHTML = "Company Name:"+data[0].p_customer;
			var sum=0;
			for (var i=0; i<data.length; i++) {
            var row = $('<tr><td>'+data[i].item_name+'</td><td>'+data[i].category_name+'</td><td>'+data[i].unit+'</td><td>'+data[i].quantity+'</td><td>'+data[i].total_amount+'</td></tr>');
						sum= sum+(data[i].total_amount)*1;
					  $('#proformadetail').append(row);

        }

				var totalrow = $('<tr><td colspan="4">'+'<center>Grand Total</center>'+'</td><td>'+sum+'</td></tr>');

      $('#proformadetail').append(totalrow);

     })
     .fail(function(){
			 $('.modal-body').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
     });
    });
});

</script>
