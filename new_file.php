<?php

//include "connect.php";
include "db.php";
?>
<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="style3.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>






  </head>

<body>


<div id="page-wrapper" >
      <div class="container" >
        <h1>
          Send Post Data to AJAX
        </h1>
       <form name="SupplierForm" id ="SupplierForm" method="POST" >
                    Supplier:<br>
                    <input type="text" name="supplier_name" id="location" >
                     <br>
                    Location:<br>
                    <input type="text" name="location" id="location" style="width:40%">
                    <br><br><br>
                    <input type="submit" class = "btn btn-primary" name="submit" value="Submit" id="submit" style="width:40%">

        </form>
        <div id='response'></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>
      </div>
    </div>


<!-- <script>
function submitForm() {
            
 
  $.ajax({
      url: "new_file1.php",
      type: "POST",
      data: form_data,
      processData: false,  // tell jQuery not to process the data
      contentType: false,  // tell jQuery not to set contentType
      success:function(data){
        console.log(data);
        //Success Message == 'Title', 'Message body', Last one leave as it is
        swal("¡Success!", "Message sent!", "success");
      },
      error:function(data){
        //Error Message == 'Title', 'Message body', Last one leave as it is
        swal("Oops...", "Something went wrong :(", "error");
      }
  // }).done(function( data ) {
  //   console.log(data);
  //   //Perform ANy action after successfuly post data
       
  });
  return false;     
}
</script> -->
<!--   <script type="text/javascript">
      $(function(){
        $('#SupplierForm').on('submit',function(e){
            $.ajax({
                url:'addSupplier.php',
                data:$(this).serialize(),
                type:'POST',
                success:function(data){
        console.log(data);
        //Success Message == 'Title', 'Message body', Last one leave as it is
       
      },
      error:function(data){
        //Error Message == 'Title', 'Message body', Last one leave as it is
    
      }
    });
   // e.preventDefault(); //This is to Avoid Page Refresh and Fire the Event "Click"
  });
});
  </script> -->
  <script>
$(document).ready(function(){
$('#SupplierForm').submit(function(){

// show that something is loading
$('#response').html("<b>Loading response...</b>");

// Call ajax for pass data to other place
$.ajax({
type: 'POST',
url: 'addSupplier.php',
data: $(this).serialize() // getting filed value in serialize form
})
.done(function(data){ // if getting done then call.

// show the response
$('#response').html(data);

})
.fail(function() { // if fail then getting message

// just in case posting your form failed
alert( "Posting failed." );

});

// to prevent refreshing the whole page page
return false;

});
});


</script>
</body>
</html>