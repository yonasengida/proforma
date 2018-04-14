
<div class="container box">

	<div class="col-md-4">
			<input id="reference" type="text" class="form-control" >
	</div>
		<div class="col-md-4">
			  <button id="getProforma" type="submit" class="btn btn-success" >Search</button>
		</div>

               <table id="proformadetail" class="table table-bordered table-striped" >
                 <thead>

                   <tr>
                     <tr>

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

<script>
$(document).ready(function(){
    $(document).on('click', '#getProforma', function(e){
			e.preventDefault();
		  var uid = $('#reference').val();
		// alert( $('#reference').val());
		     $.ajax({
		    	url:'<?php  echo base_url()?>proforma/viewProforma',
      	 type: 'POST',
      	 data: {'uid':uid},
         dataType: 'json'
     })
     .done(function(data){
       $('#proformadetail td').parent().remove();
			console.log(data);
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
