
<script type="text/javascript">
</script>

 <?php

		if($this->session->flashdata('item')) {
		$message = $this->session->flashdata('item');
		?>
		<div class="col-md-12 centered">
		    <div class="alert alert-success fade in">
		        <a href="#" class="close" data-dismiss="alert">&times;</a>
		        <strong>Success!</strong> <?php echo $message; ?>
		    </div>
		</div>
		<?php
		}
		?>
    <?php
    if($this->session->flashdata('fail')) {
		$message = $this->session->flashdata('fail');
		?>

		<div class="col-md-12 centered">
		    <div class="alert alert-danger fade in">
		        <a href="#" class="close" data-dismiss="alert">&times;</a>
		        <strong>Error!</strong> <?php echo $message; ?>
		    </div>
		</div>
		<?php
		}
		?>

<script>
// AJAX call for autocomplete
function append(data){
  console.log(data);
  document.getElementById('sender_fname').value=data[0].first_name;
  document.getElementById('sender_mname').value=data[0].middle_name;
  document.getElementById('sender_lname').value=data[0].last_name;
  document.getElementById('sender_gender').value=data[0].sender_gender;
  document.getElementById('sender_kebele').value=data[0].sender_kebele;
  document.getElementById('sender_house_number').value=data[0].sender_house_number;
  document.getElementById('sender_id_no').value=data[0].sender_id_no;
}
$(document).ready(function(){
  $("#search-box").on('input', function () {
    var val = this.value;
    if($('#categoryname option').filter(function(){
        return this.value === val;
    }).length) {
        //send ajax request
        var s=this.value;
        var ss = s.split("[");
             for (var i in ss) {
               var x= ss[0]
               //  document.write("<br/>");
             }
        //      // alert(this.value);
        //        alert(x);
        // //// alert(this.value);


        $.ajax({
    		type: "POST",
    		url: "search_tel",
    		data:'uid='+x,
        dataType:'json',
    		beforeSend: function(){
    		},
    		success: function(data){
                if(!data){


          }else{

              append(data);
            }}
    		});
  }
  })


});
// THis IS FOR RECEIVERS
// AJAX call for autocomplete
function appendRECVR(data){
  console.log(data);
  document.getElementById('rcvr_fname').value=data[0].rcvr_fname;
  document.getElementById('rcvr_mname').value=data[0].rcvr_mname;
  document.getElementById('rcvr_lname').value=data[0].rcvr_lname;
  document.getElementById('rcvr_gender').value=data[0].rcvr_gender;
  document.getElementById('rcvr_kebele').value=data[0].rcvr_kebele;
  document.getElementById('rcvr_house_number').value=data[0].rcvr_house_number;
  document.getElementById('rcvr_id_no').value=data[0].rcvr_id_no;
}
$(document).ready(function(){
  $("#rcvr_tel").on('input', function () {
    var val = this.value;
    if($('#categorynamercvr option').filter(function(){
        return this.value === val;
    }).length) {
        //send ajax request
        var s=this.value;
        var ss = s.split("[");
             for (var i in ss) {
               var x= ss[0]
               //  document.write("<br/>");
             }
        //      // alert(this.value);
      //       alert(x);
        // //// alert(this.value);


        $.ajax({
    		type: "POST",
    		url: "search_rcvr_tel",
    		data:'uid='+x,
        dataType:'json',
    		beforeSend: function(){
    		},
    		success: function(data){
                if(!data){


          }else{

              appendRECVR(data);
            }}
    		});
  }
  })


});

</script>

<div class="col-md-12 container-fluid" >
      <form method="post" action="<?php echo base_url().'transfer/create'?>" id="transferMoney">
       <div class="row">
		  <!--Top Forms-->
		  <div class="col-md-12 ">
		 	 <div clas="row">
			  <div class="col-md-4">
			  	 <div class="form-group">
					    <label for="code">Secuirity Code </label>
					    <input type="text" class="form-control" id="secuirity_code" name="secuirity_code" value="" placeholder="Secuirity Code" readonly required>
				</div>
				</div>
				<div class="col-md-4">

				 <div class="form-group">
					<label for="branch">Recieving Branch </label>
          <?php
      //  echo sizeof($data);
          ?>
					<select class="form-control" id="receiving_branch" name="receiving_branch" required>
						<option value="">Select Branch</option>
						</select>

				</div>
				</div>
				<div class="col-md-4">
				 <div class="form-group">
					    <label for="purpose">Purpose</label>
              <select class="form-control" id="purpose" name="purpose" required>
                <option value="Family Support">Family Support</option>
              </select>
			</div>
				</div>
		    </div>
		     <div clas="row">

   				<div class="col-md-3">
   				 <div class="form-group">
   					    <label for="commision">Commision Amount</label>
   					    <input type="text" readonly class="form-control" id="commision_amount" name="commision_amount" placeholder="Commision Amount"  required>
   				</div>
   				</div>
          <div class="col-md-1">
              <label for="commision">Select</label>
            <input class="w3-button w3-circle w3-black" type="button" name="com" id="plus" value="+" >
            <input type="button" name="com"  id="minus" value=" -"><br>
          </div>
			  <div class="col-md-4">
			  	 <div class="form-group">
					    <label for="amount">Amount </label>
					    <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount"  pattern="\d*" required>
				</div>
				</div>
				<div class="col-md-4">
				 <div class="form-group" id="">
					    <label for="rate">Commision Rate</label>

					    <input type="text"  name="rate" id="rate" class="form-control"  placeholder="Commision Rate"  readonly required>
				</div>
				</div>

		    </div>
		    <div clas="row">
			  <div class="col-md-4">
			  	 <div class="form-group">
					    <label for="netamount">Net Amount </label>
					    <input type="text" readonly class="form-control" id="netamount" name="netamount" placeholder="Net Amount"  required>
				</div>
				</div>
				<div class="col-md-4">
				 <div class="form-group">
					    <label for="sendingstaff">Sendeing Staff</label>
              <input type="text" class="form-control" value="<?php echo $this->session->userdata('user_name')?>" id="" name=""  readonly>
					    <input type="hidden" class="form-control" value="<?php echo $this->session->userdata('user_id')?>" id="sending_staff" name="sending_staff"  readonly>
				</div>
				</div>
				<div class="col-md-4">
				 <div class="form-group">
					    <label for="Sending Branch">Sending Branch</label>
					    <input type="text" class="form-control" id="sending_branch" value="<?php echo $this->session->userdata('branch')?>" name="sending_branch"  readonly>
				</div>
				</div>
		    </div>
		  </div>
		  <!--Ends-->
		</div>
		<div class="row">
		<!--Sender Information DIV-->
		  <div class="col-md-6 "  >
		  <h5>Sender Information</h5>
		 <div clas="row">
		  <div class="col-md-6">
		  	 <div class="form-group">
				    <label for="sender_fname">First Name </label>
				    <input type="text" class="form-control" id="sender_fname" name="sender_fname" placeholder="First Name" >
			</div>
			</div>
			<div class="col-md-6">
			 <div class="form-group">
				    <label for="sender_mname">Middle Name </label>
				    <input type="text" class="form-control" id="sender_mname" name="sender_mname" placeholder="Middle Name" >
			</div>
			</div>
		  </div>
		  <div clas="row">
		  <div class="col-md-6">
		  	 <div class="form-group">
				    <label for="sender_lname">Last Name </label>
				    <input type="text" class="form-control" id="sender_lname" name="sender_lname" placeholder="Last Name" >
			</div>
			</div>
			<div class="col-md-6">
			 <div class="form-group">
				    <label for="sender_gender">Gender </label>
					<select class="form-control" id="sender_gender" name="sender_gender" required>
						<option value="">Select Gender</option>
						<option value="Female">Female</option>
						<option value="Male">Male</option>
					</select>

			</div>
			</div>
		  </div>
		  <div clas="row">
		  <div class="col-md-6">
		  	 <div class="form-group">
				    <label for="sender_kebele">Kebele </label>
				    <input type="text" class="form-control" id="sender_kebele" name="sender_kebele" placeholder="Kebele" >
			</div>
			</div>
			<div class="col-md-6">
			 <div class="form-group">
				    <label for="houseno">House No. </label>
				    <input type="text" class="form-control" id="sender_house_number" name="sender_house_number" placeholder="House Number" >
			</div>
			</div>
		  </div>
		   <div clas="row">
		  <div class="col-md-6">
		  	 <div class="form-group">
				    <label for="sender_tel">Tel * </label>
		        <script type="text/javascript">
            function lookup(inputString) {
            if(inputString.length == 0) {
                $('#suggestions').hide();
            } else {
                $.post("<?php echo base_url() ?>autocomplete/autocomplete1/"+inputString, function(data){
                    if(data.length > 0) {
                        $('#suggestions').show();
                        $('#autoSuggestionsList').html(data);
                    }
                });
            }
            }

            function fill(thisValue) {
            $('#search-box').val(thisValue);
              setTimeout("$('#suggestions').hide();", 200);
            }
            </script>


            <?php echo form_input('sender_tel', '', "id='search-box' list='categoryname' autocomplete='off' onKeyUp='lookup(this.value)'") ?>

            <div id="suggestions">
              <div class="autoSuggestionsList_l" id="autoSuggestionsList"></div>
            </div>
      </div>
			</div>
			<div class="col-md-6">
			 <div class="form-group">
				    <label for="idno">ID No. </label>
				    <input type="text" class="form-control" id="sender_id_no" name="sender_id_no" placeholder="ID No" >
			</div>
			</div>
		  </div>
		  </div>
		  <!--End of sender information DIV-->
		  <div class="col-md-6 " >
		  	 <h5>Reciever Information</h5>
		 <div clas="row">
		  <div class="col-md-6">
		  	 <div class="form-group">
				    <label for="fname">First Name </label>
				    <input type="text" class="form-control" id="rcvr_fname" name="rcvr_fname" placeholder="First Name">
			</div>
			</div>
			<div class="col-md-6">
			 <div class="form-group">
				    <label for="mname">Middle Name </label>
				    <input type="text" class="form-control" id="rcvr_mname" name="rcvr_mname" placeholder="Middle Name" >
			</div>
			</div>
		  </div>
		  <div clas="row">
		  <div class="col-md-6">
		  	 <div class="form-group">
				    <label for="lname">Last Name </label>
				    <input type="text" class="form-control" id="rcvr_lname" name="rcvr_lname" placeholder="Last Name" >
			</div>
			</div>
			<div class="col-md-6">
			 <div class="form-group">
         <label for="rcvr_gender">Gender </label>
       <select class="form-control" id="rcvr_gender" name="rcvr_gender" required>
         <option value="">Select Gender</option>
         <option value="Female">Female</option>
         <option value="Male">Male</option>
       </select>	</div>
			</div>
		  </div>
		  <div clas="row">
		  <div class="col-md-6">
		  	 <div class="form-group">
				    <label for="kebele">Kebele </label>
				    <input type="text" class="form-control" id="rcvr_kebele" name="rcvr_kebele" placeholder="Kebele">
			</div>
			</div>
			<div class="col-md-6">
			 <div class="form-group">
				    <label for="gender">House No. </label>
				    <input type="text" class="form-control" id="rcvr_house_number" name="rcvr_house_number" placeholder="House Number">
			</div>
			</div>
		  </div>
		   <div clas="row">
		  <div class="col-md-6">
		  	 <div class="form-group">
				    <label for="tel">Tel </label>
				    <!-- <input type="text" class="form-control" id="rcvr_tel" name="rcvr_tel" placeholder="Tel" required> -->
            <script type="text/javascript">
            function lookupRCVR(inputString) {
            if(inputString.length == 0) {
                $('#suggestions1').hide();
            } else {
                $.post("<?php echo base_url() ?>autocomplete/autocompletercvr/"+inputString, function(data){
                    if(data.length > 0) {
                        $('#suggestions1').show();
                        $('#autoSuggestionsList1').html(data);
                    }
                });
            }
            }

            function fill(thisValue) {
            $('#rcvr_tel').val(thisValue);
              setTimeout("$('#suggestions1').hide();", 200);
            }
            </script>


            <?php echo form_input('rcvr_tel', '', "id='rcvr_tel' list='categorynamercvr' autocomplete='off' onKeyUp='lookupRCVR(this.value)'") ?>

            <div id="suggestions1">
              <div class="autoSuggestionsList_l" id="autoSuggestionsList1"></div>
            </div>
			</div>
			</div>
			<div class="col-md-6">
			 <div class="form-group">
				    <label for="idno">ID No. </label>
				    <input type="text" class="form-control" id="rcvr_id_no" name="rcvr_id_no" placeholder="ID No">
			</div>
			</div>
		  </div>
		  </div>
		</div>

		 <div class="row" style="margin-top:2px">
		         <button type="submit" name="confrim" class="btn btn-success center-block">Send</button>
		 </div>

		</form>
  </div>
		<script>
    $('#minus').on('click',function(){

         $('#commision_amount').val( $('#rate').val() * $('#amount').val());
         $('#netamount').val( $('#amount').val() - $('#commision_amount').val());
      });
$('#plus').on('click',function(){

     $('#commision_amount').val( $('#rate').val() * $('#amount').val());
     $('#netamount').val( $('#amount').val());

});


$(document).ready(function(){

    $(document).on('click', '#getUser', function(e){
			e.preventDefault();
		  var uid = $(this).data('id'); // get id of clicked row
		  //$('#dynamic-content').hide(); // hide dive for loader
		 // $('#modal-loader').show();  // load ajax loader
     $.ajax({
		    	url:'<?php  echo base_url()?>transfer/getTransferDetailById',
      	 type: 'POST',
         data: {'uid':uid},
         dataType: 'json'
     })
     .done(function(data){
			 console.log(data);
	      $('#dynamic-content').hide(); // hide dynamic div
	      $('#dynamic-content').show(); // show dynamic div
		    $('#txt_name').html(data[0].first_name+" "+data[0].middle_name+" "+data[0].last_name);
				$('#txt_amount').html(data[0].amount);
				$('#txt_code').html(data[0].code);
				$('#txt_purpose').html(data[0].purpose);
				$('#txt_rate').html(data[0].rate);
		    $('#txt_commision').html(data[0].commision_amount);
	      $('#txt_rcvr_name').html(data[0].rcvr_fname+" "+data[0].rcvr_mname+" "+data[0].rcvr_lname);
        $('#txt_tel').html(data[0].rcvr_tel);
	      $('#modal-loader').hide();    // hide ajax loader
     })
     .fail(function(){
			 $('.modal-body').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
     });
    });
});
//
$(function(){
 //alert("Hello world");
 	// function
 	showRateValue();
 	function showRateValue(){
 		$.ajax({
 			type:'POST',
 			url:'<?php  echo base_url()?>rate_setting/get',
 			asyc:false,
 			dataType:'json',
 			success:function(data){
 			// 	console.log(data);
        document.getElementById('rate').value=data[0].rate_value;
      },
 			error:function(){
 			alert("Could not get Data from Database");
 			}
 		});
 	}
});
$(function(){
 //alert("Hello world");
 	// function
 	showSecurityCodeValue();
 	function showSecurityCodeValue(){
 		$.ajax({
 			type:'POST',
 			url:'<?php  echo base_url()?>transfer/generateCode',
 			asyc:false,
 			dataType:'json',
 			success:function(data){
 				console.log(data);
        document.getElementById('secuirity_code').value=data;
      },
 			error:function(){
 			alert("Could not get Data from Database");
 			}
 		});
 	}
});
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

                    var row = $('<option value="'+data[i].branch_name+'">' + data[i].branch_name+ '</option>');
                    $('#receiving_branch').append(row);
                }

          },
 			error:function(){
 			alert("Could not get Data from Database");
 			}
 		});
 	}
});

  </script>
