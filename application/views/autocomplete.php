<!-- <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script> -->

<script type="text/javascript">
function lookup(inputString) {
if(inputString.length == 0) {
    $('#suggestions').hide();
} else {
    $.post("<?php echo base_url() ?>autocomplete/autocomplete1/"+inputString, function(data){
        if(data.length > 0) {
          console.log(data)
            $('#suggestions').show();
            $('#autoSuggestionsList').html(data);
        }
    });
}
}

function fill(thisValue) {
$('#id_input').val(thisValue);
  setTimeout("$('#suggestions').hide();", 200);
}
</script>


<?php echo form_input('company_name', '', "id='id_input' list='categoryname' autocomplete='off' onKeyUp='lookup(this.value)'") ?>

<div id="suggestions">
  <div class="autoSuggestionsList_l" id="autoSuggestionsList"></div>
</div>
