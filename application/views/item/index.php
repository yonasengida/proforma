<div class="container box">
<button data-toggle="modal" data-target="#view-modal" data-id="" id="createUser" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-user"></i>Create Item</button>
</div>
<!--Modal-->
<form id= "update_user" action="<?php echo base_url()?>item/updateItem" method="POST">
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
                           <label for="Group">Category Name</label>
                           <select id="u_category" name="u_category" class="form-control" ></select>
                     </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="staffid">Item Name</label>
                           <input type="text"  class="form-control" id="u_item" name="u_item" placeholder="Item Name"  required>
                           <input type="hidden"  class="form-control" id="u_item_id" name="u_item_id" required>
                     </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="Group">Brand Name</label>
                           <select id="u_brand" name="u_brand" class="form-control" ></select>
                     </div>
                     </div>
                  </div>

              </div>

             </div>

         </div>

       <div class="modal-footer">
				 <button type="submit" id="updateUserbutton" class="btn btn-success" >Update Item</button>

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
          <th width="">Item Name</th>
          <th width="">Item Brand</th>
          <th width="">Category Name</th>
					<th width="">Group</th>
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

        <td><?php echo $profile->item_name?></td>
        <td><?php echo $profile->brand_name?></td>
        <td><?php echo $profile->category_name?></td>
				<td><?php echo $profile->group_name?></td>

			<td>
				<!-- <a href="" class=" btn btn-info">Edit</a> -->
				<button data-toggle="modal" data-target="#update-modal" data-id="<?php echo $profile->item_id?>" id="getUser" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-update"></i>Update</button>
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
                       <div class="col-md-4">
                          <div class="form-group">
                             <label for="Group">Brand Name</label>
                             <select id="brand" name="brand" class="form-control" ></select>
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
		    	url:'<?php  echo base_url()?>item/getById',
      	 type: 'POST',
      	 data: {'uid':uid},
         dataType: 'json'
     })
     .done(function(data){
			// console.log(data);
      document.getElementById('u_category').value=data[0].item_category;
      document.getElementById('u_item').value=data[0].item_name;
	    document.getElementById('u_item_id').value=data[0].item_id;

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

                            var row = $('<option value="'+data[i].category_id+'">' + data[i].category_name+ '</option>');
                        //    $('#branch').append(row);
                            $('#u_category').append(row);
                        }
          },
 			error:function(){
 			alert("Could not get Data from Database");
 			}
 		});
 	}
  showAllBrand();
  function showAllBrand(){
    $.ajax({
      type:'POST',
      url:'<?php  echo base_url()?>brand/get',
      asyc:false,
      dataType:'json',
      success:function(data){
      console.log(data);
        for (var i=0; i<data.length; i++) {

                    var row = $('<option value="'+data[i].brand_id+'">' + data[i].brand_name+ '</option>');
                    $('#brand').append(row);
                  //  $('#u_branch').append(row);
                }

                for (var i=0; i<data.length; i++) {

                            var row = $('<option value="'+data[i].brand_id+'">' + data[i].brand_name+ '</option>');
                        //    $('#branch').append(row);
                            $('#u_brand').append(row);
                        }
          },
      error:function(){
      alert("Could not get Data from Database");
      }
    });
  }
});
</script>
