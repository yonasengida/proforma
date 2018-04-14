<script>
            function printContent(el) {
                var restorepage = document.body.innerHTML;
                var printcontent = document.getElementById(el).innerHTML;
                document.body.innerHTML = printcontent;
                window.print();
                document.body.innerHTML = restorepage;
							 location.reload();
            }
        </script>
      <style type=\"text/css\" media=\"print\">
        @page
        {
            size: auto;   /* auto is the current printer page size */
            margin:0;  /* this affects the margin in the printer settings */
        }
        body
        {
            text-align:left;
            background-color:#FFFFFF;
            border: solid 5px white;
            margin: 10px;  /* the margin on the content before printing */
       }
    </style>
<div class="container box">
	<div class="table-responsive">
		<table id="sender_info" class="table table-bordered table-striped">
			<thead>
				<tr>
          <th width="">Customer Name</th>
          <th width="">Tin</th>
         <th width="">Ref No</th>
				 <th width="">Amount</th>
				 <th width="">Date</th>
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
        <td><?php echo $profile->reference_no?></td>
				<td><?php echo $profile->amount?></td>
        <td><?php echo $profile->date?></td>
        <td>
					<!-- <a href="" class=" btn btn-info">Edit</a> -->
					<!-- <button data-toggle="modal" data-target="#view-modal" data-id="<?php echo $profile->reference_no?>" id="getUser" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-update"></i>Update</button> -->

					<button data-toggle="modal" data-target="#view-modal" data-id="<?php echo $profile->reference_no?>" id="getUser" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-eye-open"></i> View</button>
				</td>
			</tr>
			<?php }
			}
			?>

		</table>

	</div>
</div>

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

         <div class="modal-body"  >
					 <div id='div1'>
           </br>
         </br>
       </br>
     </br>
</br>
             <div id="modal-loader"  style="display: none; text-align: center;">
                 <img src="<?php echo base_url('assets/ajax-loader.gif');?>">
             </div>
             <div id="dynamic-content"> <!-- mysql data will load in table -->
							 <table id="todays-transfer" class="table table-bordered table-striped">
								 <thead>
									 <tr>
										 <!-- <th width="">Customer</th> -->
										 <!-- <th width="">Ref No.</th> -->
										 <th id="proformaRef" colspan="2"></th>
										 <th id="requester" colspan="3"></th>

									 </thead>
								 <tr>
									 <th width="">Item</th>
									 <th width="">Category</th>
									 <th width="">Unit</th>
									 <th width="">Quantity</th>
									 <th  >Amount</th>

							 </thead>

							 </table>
             </div>
					 </div>
					 <!-- Print Div End -->
         </div>

       <div class="modal-footer">

           <button id="1" onclick="printContent('div1')" type="submit" class="btn btn-success" >Print</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>

      </div>
   </div>
</div>

<script>
$(document).ready(function(){
    $(document).on('click', '#getUser1', function(e){
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
// TO search Proforma
$(document).ready(function(){

    $(document).on('click', '#getUser', function(e){


		 $('#todays-transfer td').parent().remove();
		// $('#tbl_users td').parent().remove();
			e.preventDefault();
		 		  var uid = $(this).data('id');
			//alert(uid);
     $.ajax({
		    	url:'<?php  echo base_url()?>proforma/viewProforma',
      	 type: 'POST',
         data: {'uid':uid},
         dataType: 'json'
     })
     .done(function(data){
			// console.log(data[0]);

			document.getElementById("proformaRef").innerHTML = "Reference Number:"+data[0].reference_no;
			document.getElementById("requester").innerHTML = "Company Name:"+data[0].p_customer;
			var sum=0;
			for (var i=0; i<data.length; i++) {
            var row = $('<tr><td>'+data[i].item_name+'</td><td>'+data[i].category_name+'</td><td>'+data[i].unit+'</td><td>'+data[i].quantity+'</td><td>'+data[i].total_amount+'</td></tr>');
						sum= sum+(data[i].total_amount)*1;
					  $('#todays-transfer').append(row);

        }

				var totalrow = $('<tr><td colspan="4">'+'<center>Grand Total</center>'+'</td><td>'+sum+'</td></tr>');

      $('#todays-transfer').append(totalrow);
     })
     .fail(function(){
			 $('.modal-body').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
     });
    });
});
</script>
