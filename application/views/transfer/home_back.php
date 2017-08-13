<!--<p>{This Feature will be implemeted for Recieve Search}</p>-->

<div class="row">
  <div class="col-md-6" style="margin-top:10px">
    <div class="input-group">
       <span class="input-group-addon" id="sizing-addon1">Security Code</span>
      <input type="text" class="form-control" name='code' id="code" placeholder="Enter Secuirity Code">
       <span class="input-group-btn">
        <button class="btn btn-default" id="search_by_code" type="button">Search</button>
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
    <div class="col-md-6" style="margin-top:10px">
    <div class="input-group">
     <span class="input-group-addon" id="sizing-addon1">Tel</span>
      <input type="text" class="form-control" placeholder="Enter Tel">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Search</button>
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->

  <div id="dynamic-content" style="margin-top:10px">

    <div class="row">
        <div class="col-md-12">
        <div class="col-md-12">
        <div class="table-responsive">
        <table class="table table-striped table-bordered">
        <tr>
        <th>Sender Name</th>
        <td id="txt_name"></td>
        </tr>

        <tr>
        <th>Amount</th>
        <td id="txt_amount"></td>
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
      <div class="col-md-12">

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

      </table>

      </div>

    </div>
  </div>
 </div>
 <div class="row">
        <!-- <button type="button" class="btn btn-danger">Reset</button> -->
        <button type="submit" name="confrim" class="btn btn-primary">Withdraw</button>
 </div>
  </div>
  <div class="card" style="width: 20rem;">
  <img class="card-img-top" src="..." alt="Card image cap">
  <div class="card-block">
    <h4 class="card-title">Card title</h4>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
<script>
$(document).ready(function(){
 $('#dynamic-content').hide();
    $(document).on('click', '#search_by_code', function(e){

			e.preventDefault();
		  var uid = document.getElementById("code").value; // get id of clicked row
      //alert("hellllllllllllllllllllll"+uid)
      $('#dynamic-content').hide(); // hide dynamic div
      $('#dynamic-content').show(); // show dynamic div
     $.ajax({
		    	url:'<?php  echo base_url()?>transfer/get_by_security_code',
          type: 'POST',
				  data: {'uid':uid},
          dataType: 'json'
     })
     .done(function(data){
			console.log(data);
        if(data===false){ alert('Requested Data is not found')
         $('#dynamic-content').hide();
      }else{
	      // $('#dynamic-content').hide(); // hide dynamic div
	      // $('#dynamic-content').show(); // show dynamic div
		 $('#txt_name').html(data[0].first_name+" "+data[0].middle_name[0]+" "+data[0].last_name);
				$('#txt_amount').html(data[0].amount);
				$('#txt_code').html(data[0].code);
				$('#txt_purpose').html(data[0].purpose);
				$('#txt_rate').html(data[0].rate);
		   $('#txt_commision').html(data[0].commision_amount);
	     $('#txt_rcvr_name').html(data[0].rcvr_fname+" "+data[0].rcvr_mname+" "+data[0].rcvr_lname);
       $('#txt_tel').html(data[0].rcvr_tel);
	      $('#modal-loader').hide();    // hide ajax loader
        }
     })
     .fail(function(){
			 $('.modal-body').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
     });
    });
});
</script>
