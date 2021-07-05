// JavaScript Document
$(function() {
	$('#popupDatepicker').datepick();
	$('#inlineDatepicker').datepick({onSelect: showDate,minDate: 0,firstDay: 1,afterShowDay: highlightDays
		});
});
function highlightDays(date) {
        for (var i = 0; i < dates.length; i++) {
            if (new Date(dates[i]).toString() == date.toString()) {              
                return [true, 'td', tips[i]];
            }
        }
        return [true,''];
     }	 
function showDate(date) {
	var d = new Date(date);
	var n = d.getDay(); 
var days = new Array();
days[1] = "01";
days[2] = "02";
days[3] = "03";
days[4] = "04";
days[5] = "05";
days[6] = "06";
days[7] = "07";
days[8] = "08";
days[9] = "09";
days[10] = "10";
days[11] = "11";
days[12] = "12";
days[13] = "13";
days[14] = "14";
days[15] = "15";
days[16] = "16";
days[17] = "17";
days[18] = "18";
days[19] = "19";
days[20] = "20";
days[21] = "21";
days[22] = "22";
days[23] = "23";
days[24] = "24";
days[25] = "25";
days[26] = "26";
days[27] = "27";
days[28] = "28";
days[29] = "29";
days[30] = "30";
days[31] = "31";
var month = new Array();
month[0] = "01";
month[1] = "02";
month[2] = "03";
month[3] = "04";
month[4] = "05";
month[5] = "06";
month[6] = "07";
month[7] = "08";
month[8] = "09";
month[9] = "10";
month[10] = "11";
month[11] = "12";
var monthIndex = month[d.getMonth()];
var day = days[d.getDate()];
var year = d.getFullYear();
if(n==6)
{
	$.ajax({
						 url: "fetch_date_time.php",            
						 type: "POST",
						 data:  "weekendday="+ day +"&month="+ monthIndex + "&year=" + year,
						 success: function(data){
							$('.dgfdhgdhgj').html(data);
						}
						}); 
	return false;
}
else if(n==0)
{
	$.ajax({
						 url: "fetch_date_time.php",            
						 type: "POST",
						 data:  "sunday="+ day +"&month="+ monthIndex + "&year=" + year,
						 success: function(data){
							$('.dgfdhgdhgj').html(data);
						}
						}); 
	return false;
}
else
{
				$.ajax({
						 url: "fetch_date_time.php",            
						 type: "POST",
						 data:  "regularday="+ day +"&month="+ monthIndex + "&year=" + year,
						 success: function(data){
							$('.dgfdhgdhgj').html(data);
						}
						});
return false; 
}
}
