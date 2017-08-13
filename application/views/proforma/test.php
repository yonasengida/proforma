<SCRIPT language="javascript">
  function addRow(tableID) {

    var table = document.getElementById(tableID);

    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);

    var colCount = table.rows[0].cells.length;

    for(var i=0; i<colCount; i++) {

      var newcell	= row.insertCell(i);

      newcell.innerHTML = table.rows[0].cells[i].innerHTML;
      //alert(newcell.childNodes);
      switch(newcell.childNodes[0].type) {
        case "text":
            newcell.childNodes[0].value = "";
            break;
        case "checkbox":
            newcell.childNodes[0].checked = false;
            break;
        case "select-one":
            newcell.childNodes[0].selectedIndex = 0;
            break;
      }
    }
  }

  function deleteRow(tableID) {
    try {
    var table = document.getElementById(tableID);
    var rowCount = table.rows.length;

    for(var i=0; i<rowCount; i++) {
      var row = table.rows[i];
      var chkbox = row.cells[0].childNodes[0];
      if(null != chkbox && true == chkbox.checked) {
        if(rowCount <= 1) {
          alert("Cannot delete all the rows.");
          break;
        }
        table.deleteRow(i);
        rowCount--;
        i--;
      }


    }
    }catch(e) {
      alert(e);
    }
  }
  </script>
<form method="post" action="proforma/create">
  <div class="col-md-4">
   <div class="form-group">
        <label for="customer">Customer</label>
        <select class="form-control" id="p_customer" name="p_customer" required>
          <option value="">Select Customer</option>
          <!-- <option value="Olivet">Olivet</option> -->
        </select>
  </div>
  </div>
  <div class="col-md-4">
   <div class="form-group">
        <label for="customer">Refernece Number</label>
        <input id="ref" name="ref" class="form-control" value="" readonly/>
        <input id="ref1" type="hidden" name="ref1" class="form-control" value="" readonly/>
  </div>
  </div>
<div class="col-md-12">
<INPUT type="button" value="Add Item" class=" btn btn-info" onclick="addRow('dataTable')" />

<INPUT type="button" value="Delete Item" class=" btn btn-danger" onclick="deleteRow('dataTable')" />
<div class="table-responsive">
  <TABLE id="dataTable"class="table table-bordered table-striped" >
    <TR>
      <TD><INPUT type="checkbox" name="chk"/></TD>

              <TD>
                <SELECT name="item[]" id="item" class="form-control" required>
                <OPTION value="">Select Item</OPTION>
                </SELECT>
              </TD>

              <TD>
                  <SELECT name="unit[]" class="form-control" required>
                  <OPTION value="">Select Unit</OPTION>
                  <OPTION value="PCS">PCS</OPTION>
                  <OPTION value="KG">KG</OPTION>
                  <OPTION value="BOX">BOX</OPTION>
                  </SELECT>
              </TD>
    <TD><INPUT type="text" id="quantity"  class="quantity form-control" name="quantity[]" placeholder="Quantity" required/></TD>
    <TD><INPUT type="text" id="unitprice" class="unitprice form-control" name="unitprice[]"/ placeholder="Unit Price" required/></TD>
    <!-- <TD><INPUT type="text" id="total" class="total" name="total[]" placeholder="Total Price" required/></TD> -->
    </TR>
  </TABLE>
</div>
</div>

<div class="col-md-12">
<input type="submit" class=" btn btn-success" value="Save"/>
</div>
</form>
<script>

$('.unitprice').on('keyup',function(){
    if( $('.quantity').val()== ""){
      alert("Please Enter Quantity")
    }else{
      $('.total').val( $('.quantity').val() * $('.unitprice').val());
    }

  //  $('#netamount').val( $('#amount').val() - $('#commision_amount').val());

});
$(function(){

showAllItem();
function showAllItem(){
  $.ajax({
    type:'POST',
    url:'<?php  echo base_url()?>item/get',
    asyc:false,
    dataType:'json',
    success:function(data){
      //console.log(data);
      for (var i=0; i<data.length; i++) {

                  var row = $('<option value="'+data[i].item_id+'">' + data[i].item_name+'->'+data[i].category_name+'->'+data[i].category_name+'</option>');
                  $('#item').append(row);

              }

        },
    error:function(){
    alert("Could not get Data from Database");
    }
  });
}
showRef();
function showRef(){
  $.ajax({
    type:'POST',
    url:'<?php  echo base_url()?>proforma/getReference',
    asyc:false,
    dataType:'json',
    success:function(data){
      console.log(data);
    // $('#ref').val()=='1';
    document.getElementById('ref').value=data[0].ref_no;
      document.getElementById('ref1').value=data[0].ref_no*1+1;

        },
    error:function(){
    alert("Could not get Data from Database");
    }
  });
}
});

$(function(){

showAllCustomer();
function showAllCustomer(){
  $.ajax({
    type:'POST',
    url:'<?php  echo base_url()?>customer/get',
    asyc:false,
    dataType:'json',
    success:function(data){
    //  console.log(data);
      for (var i=0; i<data.length; i++) {

                  var row = $('<option value="'+data[i].customer_id+'">'+data[i].customer_name+'</option>');
                  $('#p_customer').append(row);

              }

        },
    error:function(){
    alert("Could not get Data from Database");
    }
  });
}
});
</script>
