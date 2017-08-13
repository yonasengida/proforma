
<div class="container box">
	<div class="table-responsive">
		<div class="col-md-12">
			<?php //echo $_SESSION[reference]?>
		</div>
		<table id="sender_info111" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th id="proformaRef" colspan="2">Reference Number: <?php
				if(isset($_SESSION['refer_number'])){	echo $_SESSION['refer_number'];}

					?></th>
					<th id="requester" colspan="3"> Customer Name:<?php if(isset($_SESSION['refer_number'])){ echo $_SESSION['customer_name'];}?></th>

			</tr>
				<tr>


					<!-- <th width="">Customer</th>
					<th width="">Ref No.</th> -->
          <th width="">Item</th>
					<th width="">Category</th>
          <th width="">Unit</th>
					<th width="">Quantity</th>
          <th width="">Unit Price</th>
					<th width="">Amount</th>

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



        <td><?php echo $profile->item_name?></td>
        <td><?php echo $profile->category_name?></td>
        <td><?php echo $profile->unit?></td>
				<td><?php echo $profile->quantity?></td>
        <td><?php echo $profile->unit_price?></td>
				<td><?php echo $profile->total_amount;  $totalAmount=$totalAmount+$profile->total_amount;?></td>

			</tr>
			<?php }
			}
			?>
      <tr><td colspan="5"><center>Total Amount</center></td><td><?php if($profiles) echo $totalAmount?></td></tr>
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
             <i class="glyphicon glyphicon-user"></i>Create Item
             </h4>
         </div>

         <div class="modal-body">

             <div id="modal-loader" style="display: none; text-align: center;">
                 <img src="<?php echo base_url('assets/ajax-loader.gif');?>">
             </div>
             <div id="dynamic-content"> <!-- mysql data will load in table -->
                 <div class="row">
                     <div class="col-md-12">
                       <div class="col-md-4">
                          <div class="form-group">
                             <label for="Group">Category Name</label>
                             <select id="category" name="category" class="form-control" ></select>
                       </div>
                       </div>
                       <div class="col-md-4">
                          <div class="form-group">
                             <label for="staffid">Item Name</label>
                             <input type="text"  class="form-control" id="item_name" name="item_name" placeholder="Item Name"  required>
                       </div>
                       </div>

                    </div>
              </div>
             </div>
         </div>

       <div class="modal-footer">
         <button id="1" type="submit" class="btn btn-success" >Create Item</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>

      </div>
   </div>
</div
</form>
<script>
$(document).ready(function(){
    $(document).on('click', '#getUser', function(e){
			e.preventDefault();
		  var uid = $(this).data('id'); // get id of clicked row
		     $.ajax({
		    	url:'<?php  echo base_url()?>group/getById',
      	 type: 'POST',
      	 data: {'uid':uid},
         dataType: 'json'
     })
     .done(function(data){
			console.log(data);
	    document.getElementById('u_group_name').value=data[0].group_name;

     })
     .fail(function(){
			 $('.modal-body').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
     });
    });
});
$(function(){
 //alert("Hello world");
 	// function
 	showAllCategory();
 	function showAllCategory(){
 		$.ajax({
 			type:'POST',
 			url:'<?php  echo base_url()?>category/get',
 			asyc:false,
 			dataType:'json',
 			success:function(data){
 				console.log(data);
        for (var i=0; i<data.length; i++) {

                    var row = $('<option value="'+data[i].category_id+'">' + data[i].category_name+ '</option>');
                    $('#category').append(row);
                  //  $('#u_branch').append(row);
                }

                for (var i=0; i<data.length; i++) {

                            var row = $('<option value="'+data[i].branch_id+'">' + data[i].branch_name+ '</option>');
                        //    $('#branch').append(row);
                            $('#u_branch').append(row);
                        }
          },
 			error:function(){
 			alert("Could not get Data from Database");
 			}
 		});
 	}
});
</script>
