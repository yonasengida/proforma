<div class="container box">
<button data-toggle="modal" data-target="#view-modal" data-id="" id="createUser" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-user"></i>Create Category</button>
</div>
<!--Modal-->
<form id= "update_user" action="<?php echo base_url()?>category/updateCatgegory" method="POST">
<!-- <form action="nsjdjad" method="POST"> -->
<div id="update-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">

         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
             <h4 class="modal-title">
             <i class="glyphicon glyphicon-user"></i>Update Item
             </h4>
         </div>

         <div class="modal-body">
             <div id="dynamic-content">
                 <div class="row">
                     <div class="col-md-12">
                       <div class="col-md-4">
                          <div class="form-group">
                             <label for="staffid">Category Name</label>
                             <input type="text"  class="form-control" id="u_category_name" name="u_category_name"/>
														 <input type="hidden"  class="form-control" id="category_id" name="category_id"/>
                         </div>
                       </div>


                   </div>

              </div>

             </div>

         </div>

       <div class="modal-footer">
				 <button type="submit" id="updateUserbutton" class="btn btn-success" >Update Category</button>

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
          <th width="">Category Name</th>
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

				<td><?php echo $profile->category_name?></td>

			<td>
				<!-- <a href="" class=" btn btn-info">Edit</a> -->
				<button data-toggle="modal" data-target="#update-modal" data-id="<?php echo $profile->category_id?>" id="updateCatgegory" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-update"></i>Update</button>
	  	</td>

			</tr>
			<?php }
			}
			?>

		</table>

	</div>
</div>
<form id= "crate_user" action="<?php echo base_url()?>branch/create" method="POST">
<!-- Create Modal-->
<div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">

         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
             <h4 class="modal-title">
             <i class="glyphicon glyphicon-user"></i>Create Catgory
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
                             <label for="staffid">Category Name</label>
                             <input type="text"  class="form-control" id="category_name" name="category_name" placeholder="Group Name"  required>
                       </div>
                       </div>
                       <div class="col-md-4">
                          <div class="form-group">
                             <label for="Group">Group Name</label>
                             <select id="group" name="group" class="form-control" ></select>
                       </div>
                       </div>
                    </div>
              </div>
             </div>
         </div>

       <div class="modal-footer">
         <button id="1" type="submit" class="btn btn-success" >Create Category</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>

      </div>
   </div>
</div
</form>
<script>
$(document).ready(function(){
    $(document).on('click', '#updateCatgegory', function(e){
			e.preventDefault();
		  var uid = $(this).data('id'); // get id of clicked row
		     $.ajax({
		    	url:'<?php  echo base_url()?>category/getById',
      	 type: 'POST',
      	 data: {'uid':uid},
         dataType: 'json'
     })
     .done(function(data){
			console.log(data);
      document.getElementById('u_category_name').value=data[0].category_name;
	    document.getElementById('category_id').value=data[0].category_id;

     })
     .fail(function(){
			 $('.modal-body').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
     });
    });
});
$(function(){
 //alert("Hello world");
 	// function
 	showAllGroup();
 	function showAllGroup(){
 		$.ajax({
 			type:'POST',
 			url:'<?php  echo base_url()?>group/get',
 			asyc:false,
 			dataType:'json',
 			success:function(data){
 				console.log(data);
        for (var i=0; i<data.length; i++) {

                    var row = $('<option value="'+data[i].group_id+'">' + data[i].group_name+ '</option>');
                    $('#group').append(row);
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
