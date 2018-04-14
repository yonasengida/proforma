<div class="container box">
<button data-toggle="modal" data-target="#view-modal" data-id="" id="createUser" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-user"></i>Create Customer</button>
</div>
<!--Modal-->
<form id= "update_user" action="<?php echo base_url()?>customer/updateCustomer" method="POST">
<!-- <form action="nsjdjad" method="POST"> -->
<div id="update-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">

         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
             <h4 class="modal-title">
             <i class="glyphicon glyphicon-user"></i>Update Customer
             </h4>
         </div>

         <div class="modal-body">



             <div id="dynamic-content"> <!-- mysql data will load in table -->

                 <div class="row">
                     <div class="col-md-12">
                       <div class="col-md-4">
                          <div class="form-group">
                             <label for="staffid">Customer ID</label>
														 <input type="hidden"  class="form-control" id="user_id" name="user_id"/>
                             <input type="text"  class="form-control" id="u_customer_id" name="u_customer_id"  readonly required>
                       </div>
                       </div>
                      <div class="col-md-4">
                        <div class="form-group">
                             <label for="username">Customer Name</label>
                             <input type="text" class="form-control" id="u_name" name="u_name" required>
                       </div>
                       </div>
                       <div class="col-md-4">
                        <div class="form-group">
                             <label for="fname">Customer Tin</label>
                             <input type="text" class="form-control" id="u_tin" name="u_tin" required>
                       </div>
                       </div>
											 <div class="col-md-4">
												<div class="form-group">
														 <label for="fname">Customer Mobile</label>
														 <input type="text" class="form-control" id="u_mobile" name="u_mobile" placeholder="" required>
											 </div>
											 </div>


                   </div>



              </div>

             </div>

         </div>

       <div class="modal-footer">
				 <button type="submit" id="updateUserbutton" class="btn btn-success" >Update Customer</button>

            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
       </div>

      </div>
   </div>
</div
<!--end of Modal-->
</form>

<div class="container box">
	<div class="table-responsive">
		<table id="sender_info" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="">Customer Name</th>
					<th width="">Customer Tin</th>
					<th width="">Customer Mobile</th>
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

				<td><?php echo $profile->customer_name?></td>
				<td><?php echo $profile->customer_tin?></td>
			<td><?php echo $profile->customer_mobile?></td>
			<td>
				<!-- <a href="" class=" btn btn-info">Edit</a> -->
				<button data-toggle="modal" data-target="#update-modal" data-id="<?php echo $profile->customer_id?>" id="getCustomer" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-update"></i>Update</button>
	  	</td>

			</tr>
			<?php }
			}
			?>

		</table>

	</div>
</div>
<form id= "crate_user" action="<?php echo base_url()?>customer/create" method="POST">
<!--Modal-->
<div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">

         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
             <h4 class="modal-title">
             <i class="glyphicon glyphicon-user"></i>Create Customer
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
                             <label for="staffid">Customer Tin</label>
                             <input type="text"  class="form-control" id="tin" name="tin" placeholder=""  required>
                       </div>
                       </div>
                       <div class="col-md-4">
                        <div class="form-group">
                             <label for="username">Customer Name</label>
                             <input type="text" class="form-control" id="name" name="name" placeholder="" required>
                       </div>
                       </div>
                       <div class="col-md-4">
                        <div class="form-group">
                             <label for="username">Mobile</label>
                             <input type="text" class="form-control" id="mobile" name="mobile" placeholder="" required>
                       </div>
                       </div>


                   </div>

              </div>

             </div>

         </div>

       <div class="modal-footer">
         <button id="1" type="submit" class="btn btn-success" >Create Customer</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>

      </div>
   </div>
</div
</form>

<!--end of Modal-->

<!-- update User -->

<script>

$(document).ready(function(){

    $(document).on('click', '#getCustomer', function(e){
			e.preventDefault();
		  var uid = $(this).data('id'); // get id of clicked row
		     $.ajax({
		    	url:'<?php  echo base_url()?>customer/getById',
      	 type: 'POST',
      	 data: {'uid':uid},
         dataType: 'json'
     })
     .done(function(data){
			console.log(data);


      document.getElementById('u_customer_id').value=data[0].customer_id;
			document.getElementById('u_tin').value=data[0].customer_tin;
			document.getElementById('u_name').value=data[0].customer_name;
			document.getElementById('u_mobile').value=data[0].customer_mobile;


	    //  $('#modal-loader').hide();    // hide ajax loader
     })
     .fail(function(){
			 $('.modal-body').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
     });
    });
});
// $(document).ready(function(){
//
//     $(document).on('click', '#updateUSer', function(e){
// 			e.preventDefault();
//
// 			var u_fname=$('#u_fname').val();
// 			//var  _fname=$('#u_fname').val();
//
// 		//  var uid = $(this).data('id'); // get id of clicked row
// 		// 	alert('Update Click')
// 		     $.ajax({
// 		    	url:'<?php  echo base_url()?>user/updateUser',
//       	 type: 'POST',
//       	 data: {'fname':u_fname},
//          dataType: 'json'
//      })
//      .done(function(data){
// 			// console.log(data);
// 			console.log("hello")
//
// 	    //   $('#dynamic-content').hide(); // hide dynamic div
// 	    //   $('#dynamic-content').show(); // show dynamic div
// 		  // //  $('#user').html(data[0].user_name);
// 			// document.getElementById('u_staff_id').value=data[0].staff_id;
// 			// document.getElementById('u_user_name').value=data[0].user_name;
// 			// // document.getElementById('u_fname').value=data[0].first_name;
// 			// // document.getElementById('u_lname').value=data[0].last_name;
// 			// document.getElementById('u_tel').value=data[0].tel;
// 			// document.getElementById('u_email').value=data[0].email;
// 			// document.getElementById('u_branch').value=data[0].branch_id;
// 			// document.getElementById('u_status').value=data[0].status;
// 			//
// 			//
// 	    //   $('#modal-loader').hide();    // hide ajax loader
//      })
//      .fail(function(){
// 			 $('.modal-body').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
//      });
//     });
// });
$(function(){
 //alert("Hello world");
 	// function
 	showAllBranch();
 	function showAllBranch(){
 		$.ajax({
 			type:'POST',
 			url:'<?php  echo base_url()?>branch/get',
 			asyc:false,
 			dataType:'json',
 			success:function(data){
 				console.log(data);
        for (var i=0; i<data.length; i++) {

                    var row = $('<option value="'+data[i].branch_id+'">' + data[i].branch_name+ '</option>');
                    $('#branch').append(row);
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
