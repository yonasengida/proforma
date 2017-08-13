<!-- <div class="container box">
<button data-toggle="modal" data-target="#view-modal" data-id="" id="createUser" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-user"></i>Create User</button>
</div> -->
<div class="container box col-md-6">
	<div class="table-responsive">
		<table id="sender_info" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="">Rate Value</th>
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

			<td><?php echo $profile->rate_value?></td>
			<td>
		
				<button data-toggle="modal" data-target="#view-modal" data-id="<?php echo $profile->rate_value?>" id="getUser" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-update"></i>Update</button>
	  	</td>

			</tr>
			<?php }
			}
			?>

		</table>

	</div>
</div>
<form action="<?php echo base_url()?>Rate_setting/updateRate" method="POST">
<!--Modal-->
<div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">

         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
             <h4 class="modal-title">
             <i class="glyphicon glyphicon-user"></i>Update Rate Value
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
                             <label for="username">Rate Value</label>
                             <input type="text" pattern="[0-9]+([\.,][0-9]+)?" class="form-control" id="txt_rate_value" name="txt_rate_value" placeholder="" required>
                       </div>
                       </div>

                   </div>

              </div>

             </div>

         </div>

       <div class="modal-footer">
         <button type="submit" class="btn btn-success" >Save</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div>

      </div>
   </div>
</div
<!--end of Modal-->


</form>
<script>
/*To fetch Data*/
$(document).ready(function(){

    $(document).on('click', '#getUser', function(e){
		  e.preventDefault();
		  var uid = $(this).data('id'); // get id of clicked row
      document.getElementById('txt_rate_value').value=uid;

    });
});

</script>
