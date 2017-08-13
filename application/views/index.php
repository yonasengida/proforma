<p>Hello</p>
<!-- <form id="contact_form"  name="contact_form" method="POST" action=""> -->
<div class="col-md-3">
    <div class="form-group">
           <label for="message-text" class="control-label">Start Date:</label>
                   <div class='input-group input-append date'  id='datetimepicker1'>
                       <input type='text' name="start" class="form-control"  />
                       <span class="input-group-addon">
                           <span class="glyphicon glyphicon-calendar"></span>
                       </span>
                   </div>
    </div>
  </div>
<!-- </form> -->
<script>

$(document).ready(function() {
      $('#datetimepicker1')
   .datetimepicker({
     format: 'YYYY/MM/DD'
     })
     .on('dp.change', function(e) {
           // Revalidate the date field
           $('#contact_form').formValidation('revalidateField', 'start');
       });
    $('#datetimepicker2')
   .datetimepicker({
     format: 'YYYY/MM/DD'
   });


});
</script>
