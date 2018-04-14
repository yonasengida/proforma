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

	<div class="col-md-12" id="div1">
	 <div class="col-md-12">
			<img width="1000" src="<?php echo base_url("assets/images/Olivet Web Banner.jpg");?>"/>
		</div>
		<div class="col-md-12">
	 <p align="right">Print Date</p>
	 <p align="right">Reference Number: <?php
 if(isset($_SESSION['refer_number'])){	echo $_SESSION['refer_number'];}

	 ?></p>
	</div>
		<div class="col-md-12">
		 <h3><center>Proforma</center></h3>
	 </div>

		<div class="col-md-12">

			<p>To:<?php if(isset($_SESSION['refer_number'])){ echo $_SESSION['customer_name'];}?></p>
		</div>

		<div class="col-md-12">
		<table id="sender_info111" class="table table-bordered table-striped">
			<thead>

				<tr class="bg-info">

          <th width="">Item</th>
					<th width="">Category</th>
          <th width="">Unit</th>
          <th width="">Quantity</th>
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
				<td><?php echo $profile->total_amount;  $totalAmount=$totalAmount+$profile->total_amount;?></td>

			</tr>
			<?php }
			}
			?>
      <tr><td colspan="4"><center>Total Amount</center></td><td><?php if($profiles) echo $totalAmount?></td></tr>
		</table>

	</div>
</div>
<div class="modal-footer">

	 <input type="submit" name="search" onclick="printContent('div1')" value="Print" class="btn btn-info " >

</div>

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
