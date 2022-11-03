

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

// condition to check pass fail

var getmark = document.getElementsByClassName("countobt");
var gettotal = document.getElementsByClassName("countotal");

var remarkcol = document.getElementsByClassName("remark");

// get each row data
for(var i=0; i<gettotal.length;i++){
    obtmarkeach = getmark[i].innerText;
    marktotal = gettotal[i].innerText;
    // calculate each row %
    calp = obtmarkeach * (100/marktotal);
    eachpercent = parseFloat(calp).toFixed(2);
    console.log(eachpercent);

    if(eachpercent>=35.00)
    {
        var grade = "Pass";
    }
    else if(eachpercent<35)
    {
        var grade = "F"
    }

    data =  remarkcol[i].innerText = grade;
    
    
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

