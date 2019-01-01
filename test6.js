
var header = Array();    
$("table tr th").each(function(i, v){
        header[i] = $(this).text();
})
               
alert(header);
	
var data = Array();
    
$("table tr").each(function(i, v){
    data[i] = Array();
    $(this).children('td').each(function(ii, vv){
        data[i][ii] = $(this).text();
    }); 
})

alert(data);


// var rowsArray = {};
// var i = 0;
// $('#myTable tr th').each(function(){
//     rowsArray[i] = $(this).html(); // if you want to save the htmls of each row
//     i++;
// });

// alert(JSON.stringify(rowsArray));
// // alert(rowsArray.attr("value"));

// var table=document.getElementById("myTable");
// getTableData(table);

	
// function getTableData(table) {
//     var data = [];
//     table.find('tr').each(function (rowIndex, r) {
//         var cols = [];
//         $(this).find('th,td').each(function (colIndex, c) {
//             cols.push(c.textContent);
//         });
//         data.push(cols);
//     });
//     alert(data);
// }