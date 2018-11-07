
jQuery(function($) {
  var i = 0;
  //var j=new array();
  $('#theButton').click(addAnotherTextBox);
  function addAnotherTextBox() {
    $("#theForm").append("<div><br><input type='text'/><br></div>");
  	i++;
  	$("#hideme").val(i);

   }
});
console.log("Heeeeeeeeeeeeeeeeyyyyyyy");

// <script>  
//         $(document).ready(function() {  
//             $("#theButton").on("click", function() {  
//                 $("#theForm").append("<div><br><input type='text'/><br></div>");  
//             });  
//         })
// </script>
 // <script>  
 //        $(document).ready(function() {  
 //            $("#Add").on("click", function() {  
 //                $("#textboxDiv").append("<div><br><input type='text'/><br></div>");  
 //            });  
 //            $("#Remove").on("click", function() {  
 //                $("#textboxDiv").children().last().remove();  
 //            });  
 //        });  
 //    </script>  