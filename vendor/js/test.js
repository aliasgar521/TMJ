
jQuery(function($) {
  var i = 0;
  //var j=new array();
  
  $('#theButton').click(addAnotherTextBox);
  function addAnotherTextBox() {
    $("#theForm").append("\
    						          <br>Product:<br><input type='text' name='pro_name"+ i +"' id='pro_name' style='width:40%' >\
                          <br>Quantity:<br><input type='number' name='quan"+ i +"' id='quan' placeholder='quan"+ i +"'>\
                            \
                          </div>");
  	i++;
  	$("#hideme").val(i);
   }

   // $("#pro_name").autocomplete({
   //    source: "../search.php",
   //  });
   var source=  [
        "ActionScript",
        "AppleScript",
        "Asp",
        "BASIC"];
   var selector = '#pro_name';
  $(document).on('keydown.autocomplete', selector, function() {
    $(this).autocomplete(source);
});
});


console.log("Heeeeeeeeeeeeeeeeyyyyyyy");


