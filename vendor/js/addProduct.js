
 jQuery(function($) {
  var i = 0;
  //var j=new array();
  $('#theButton').click(addAnotherTextBox);
  function addAnotherTextBox() {
    $("#theForm").append("<div class='rcorners3' style='background: #C0C0C0; padding:2%';>\
                            <input type='image' src='images/cross.png' class='delete-row' name='record' style='float:right;height:2%;width:2%'>\
                            <b><h3>Product number "+ (i+1) + "</h3></b><br>\
                            Item Name:<br>\
                                <div class='auto-widget'><input type='text' class='product_name' name='purc_item_name"+ i +"' id='purc_item_name'  style='width:40%' required='required' autocomplete='off'></div><br>\
                            Quantity purchase:<br>\
                                <input type='number' min='0'  name='purchase_quantity"+ i +"' id='stock_bought' style='width:40%' required='required''><br>\
                            Cost Price (in BD) :<br>\
                                <input type='number' min='0' style='width:40%' name='cost_price"+ i +"' id='cost_price' placeholder='Enter Cost price of single Pc.' required='required' ><br>\
                            Selling Price (in BD) : <br>\
                                <input type='number' min='0' name='sell_price"+ i +"' id='sell_price' style='width:40%' placeholder='Enter Selling price of single Pc.' required='required''><br>\
                            Description:<br>\
                                <input type='text' name='description"+ i +"' id='description' style='width:40%'><br>\
                            Cabinet Number:<br>\
                                <input type='number' name='cabinet"+ i +"' id='cabinet' style='width:40%'' ><br>\
                            Tags:<br>\
                                <input type='text' name='tags"+ i +"' id='tags' style='width:40%'><br>\
                            \
                            </div>");
    i++;
    $("#hideme").val(i);

   }
   // $(function() {
   //          $("input.product_name").autocomplete({
   //          source: "../search.php",
   //          });
   //      });

   
   $(document).ready(function() {
            $("#theForm").on('click','.delete-row', function() {
                $(this).closest('div').remove();
                // console.log("clicked delete button");
                // Update total when delete button clicked code below
                
            });
        });
   $("#theForm").on("keydown","input.product_name",function(){
            $(this).autocomplete({
            source: "../search.php",
            });
        });
});
console.log("Heeeeeeeeeeeeeeeeyyyyyyy");


