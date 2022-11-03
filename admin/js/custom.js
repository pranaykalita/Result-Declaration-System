// for marksheet genretae . assignresult.php
$(function(){


    // set value
    var set_number = function () {
        var table_len = $('#markstable tbody tr').length+1;
        $('#slno').val(table_len);
      }
      set_number();

    //   set input data

    $('#addmarks').click(function () {
       
        var slno = $('#slno').val();
        var subject = $('#subjects').val();
        var tmarks = $('#totalmarks').val();
        var mobt = $('#marksobtained').val();
        var btndel = '<input type="button" class="btn btn-danger" id="delsub" value="Delete">';
        

        $('#markstable tbody:last-child').append(

            '<tr>'+
                '<td contenteditable="true">'+slno+'</td>'+
                '<td contenteditable="true">'+subject+'</td>'+
                '<td contenteditable="true">'+tmarks+'</td>'+
                '<td contenteditable="true" class="countsum">'+mobt+'</td>'+
                '<td >'+btndel+'</td>'+
            '</tr>'

        );
        // clear input 
        $('#slno').val('');
        $('#subjects').val('');
        $('#totalmarks').val('');
        $('#marksobtained').val('');

        // inc slnumber
        set_number();

    });

  



    // delete sub
    $('#markstable').on('click', '#delsub', function(){
        $(this).parent().parent().remove();
    });

    // get student data
    $('#setstudent').click(function(){
        var name = $('#sname').val();
        var roll = $('#rollnum').val();
        var sem = $('#sem').val();

        // set student data
        $('#psname').html(name);
        $('#psroll').html(roll);
        $('#pssem').html(sem);
    });

    


});




// insert marksheet data to database
$('#savemarks').click(function () { 
    
    
    var table_data = [];

    $('#markstable tr').each(function (row, tr) { 

        if($(tr).find('td:eq(0)').text() == "")
        {

        }
        else
        {
            var reportdata = {
                'srno' : $(tr).find('td:eq(0)').text(),
                'subjects' : $(tr).find('td:eq(1)').text(),
                'total' : $(tr).find('td:eq(2)').text(),
                'obtained' : $(tr).find('td:eq(3)').text(),
            };
   
            table_data.push(reportdata);
        }
       
    });

    // alert
    swal({
        title: "Save Result ?",
        text: "",
        icon: "info",
        buttons: ["Cancel",  true]
        
    })
    .then(function(ask) {
       if(ask === true)
       {
        var name = $('#sname').val();
        var roll = $('#rollnum').val();
        var sem = $('#sem').val();


       

        var resultdata = {'data_table' : table_data };
        

            // send to database
            $.ajax({
                type: "post",
                url: "/admin/common/ajaxdata.php",
                data: { 
                    addresult: true,
                    sname : name,
                    sroll : roll,
                    ssem : sem,
                    resdata : resultdata, 
                },
                success: function (savemarks) {
                    console.log(savemarks);
                }
            });

            location.reload();
       }
       else
       {
        

       }

    });
        

    
});

// Update marksheet data to database
$('#updatemarksheet').click(function () { 

    var table_data = [];

    $('#markstable tr').each(function (row, tr) { 

        if($(tr).find('td:eq(0)').text() == "")
        {

        }
        else
        {
            var reportdata = {
                'srno' : $(tr).find('td:eq(0)').text(),
                'subjects' : $(tr).find('td:eq(1)').text(),
                'total' : $(tr).find('td:eq(2)').text(),
                'obtained' : $(tr).find('td:eq(3)').text(),
            };
   
            table_data.push(reportdata);
        }
       
    });

    // alert
    swal({
        title: "Update Result ?",
        text: "",
        icon: "info",
        buttons: ["Cancel",  true]
        
    })
    .then(function(ask) {
       if(ask === true)
       {
        var roll = $('#srollnum').val();
        var sem = $('#susem').val();



        var resultdata = {'data_table' : table_data };
        // console.log(resultdata);

            // send to database
            $.ajax({
                type: "post",
                url: "/admin/common/ajaxdata.php",
                data: { 
                    updmarks: true,
                    sroll : roll,
                    ssem: sem,
                    updatedresult : resultdata, 
                },
                success: function (savemarks) {
                    console.log(savemarks);
                }
            });

            location.reload();
       }
       else
       {
        

       }

    });
        

    
});



// for generate pin in setting.php
$(document).ready(function () {
    var pin = Math.floor(100000 + Math.random() * 900000);
    $('#admpin').val(pin);
});


// select roll  in assignmarksheet
$('#rollnum').on("change", function () {

    var roll = $('#rollnum').val();
    
    $.ajax({
        type: "post",
        url: "/admin/common/ajaxdata.php",
        data: { 
            rollsel: true,
            studentroll: roll
        },
        success: function (data) {
            // console.log(data);
            $('#sname').val(data);
        }
    });
});



// for viewresult copy from frntend custom



// count
$(document).ready(function () {
    calc();
});

// calculate total sum
function calc() {
    var totalsum = 0;
    var obtsum = 0;
    var table = document.getElementById("markstable");
    
    var mtot = table.getElementsByClassName('countotal');
    var mobt = table.getElementsByClassName('countobt');

    for(var i=0;i<mobt.length;i++){
        totalsum += isNaN(mobt[i].innerText) ? 0 : parseInt(mtot[i].innerText);
        console.log(totalsum)
    }
    
    for(var i=0;i<mobt.length;i++){
        obtsum += isNaN(mobt[i].innerText) ? 0 : parseInt(mobt[i].innerText);
    }
    // percentile
    var calculatep = obtsum * (100/totalsum);
    var percentile = parseFloat(calculatep).toFixed(2);

 
    $('#totalmarks').html(totalsum);  
    $('#marksobtain').html(obtsum);  
    $('#percentile').html(percentile); 

    // pass fail
    if(percentile>30)
    {  
    $("#remakstatus").html("Pass");
    }
    else{
    $("#remakstatus").html("Fail");
    }
}



// download pdf
  
$('#download').on("click", function(){
    var elem = document.getElementById('todownlaod');
    var opt = {
        margin:       0,
        filename:     'Jist.pdf',
        image:        { type: 'jpeg', quality: 1 },
        html2canvas:  { scale: 5 },
        jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
    };
    html2pdf().from(elem).set(opt).save();
   
});