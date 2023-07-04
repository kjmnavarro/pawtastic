
$(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;

    $('#startdate').attr('min', maxDate);
});

var selected_day = new Array();
var selected_times = new Array();
var selected_freq = '';

function toggleFreq(thisClass,freq){

  	let checkFreq = $(freq).hasClass('check-on');
  	selected_freq = $(thisClass).val();

  	if (checkFreq) {
  		$(freq).removeClass('check-on');
  		$(freq).addClass('check-off');
  	}

  	$(thisClass).toggleClass("check-on");
}

function toggleDay(thisClass){

	let checkDay = $(thisClass).hasClass('check-on');
	let dayVal = $(thisClass).val();

	$(thisClass).toggleClass("check-on");

	if (checkDay) {
		selected_day = selected_day.filter(v => v !== dayVal);
	}
	else
	{
		selected_day.push(dayVal);
	}
}

function toggleTimes(thisClass){

	let checkTimes = $(thisClass).hasClass('check-on');
	let timesVal = $(thisClass).val();

	$(thisClass).toggleClass("check-on");

	if (checkTimes) {
		selected_times = selected_times.filter(v => v !== timesVal);
	}
	else
	{
		selected_times.push(timesVal);
	}

}

function ajaxSchedule(){

	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

	let startdate = $('#startdate').val();
	let notes = $('#notes').val();
	if (checkDate(startdate)) 
	{
		$('.errorMessage').addClass('d-block');
		$('.alertMsg').text('Date must be now or in the future');
		$('#startdate').val('');
	}

	$.ajax({
       type:'POST',
       url:"/submit-schedule",
       data:{selected_freq:selected_freq, startdate:startdate, selected_day:selected_day, selected_times:selected_times, notes:notes},
       success:function(data){
          if (data) {
          	$('.successMessage').addClass('d-block');

          	setTimeout(function() {
			  $('.successMessage').removeClass('d-block');
			}, 5000);
          }
       },
       error:function(reject) {
            if( reject.status === 422 ) {
                $('.errorMessage').addClass('d-block');
				$('.alertMsg').text('Please input data in the required fields');
            }
        }
    });
}

 function checkDate(date) {

   var selectedDate = new Date(date);
   var now = new Date();
   if (selectedDate < now) 
   {
		return true;
   }
   return false;
}