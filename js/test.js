
jQuery(function($) {
  var i = 0;
  //var j=new array();
  $('#theButton').click(addAnotherTextBox);
  function addAnotherTextBox() {
    $("#theForm").append("\
    						          <br>Product:<br><input type='text' name='pro_name"+ i +"' id='pro_name"+ i +"' style='width:40%'>\
                          <br>Quantity:<br><input type='number' name='quan"+ i +"' id='quan"+ i +"' placeholder='quan"+ i +"'>\
                            \
                          </div>");
  	i++;
  	$("#hideme").val(i);

   }
});
console.log("Heeeeeeeeeeeeeeeeyyyyyyy");


