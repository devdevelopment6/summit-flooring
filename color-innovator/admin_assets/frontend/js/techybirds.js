// JavaScript Document
$(window).resize(function(){
	if($( window ).width() < 768) {
		$(".event-block .row .col-md-4.col-sm-4").removeClass("pull-right")	;
		$(".white-with-image.footer-div .container .row .col-md-6.col-sm-6").removeClass("pull-right")	;
	}
	else {
		$(".event-block .row .col-md-4.col-sm-4").addClass("pull-right");
		$(".white-with-image.footer-div .container .row .col-md-6.col-sm-6").addClass("pull-right");
	}
});
$(document).ready(function(){
	if($( window ).width() < 768) {
		$(".event-block .row .col-md-4.col-sm-4").removeClass("pull-right")	;
		$(".white-with-image.footer-div .container .row .col-md-6.col-sm-6").removeClass("pull-right")	;
	}
	else {
		$(".event-block .row .col-md-4.col-sm-4").addClass("pull-right");
		$(".white-with-image.footer-div .container .row .col-md-6.col-sm-6").addClass("pull-right");
	}
});

$(window).on('load',function(){
	$("#myTab li").removeClass("active");
	$("#myTab li a").attr("aria-expanded","false");
	$("#myTab li:first-child a").attr("aria-expanded","true");
	$("#myTab li").first().addClass("active");
	$("#sectionB").addClass("active");	
	$("#sectionA").removeClass("active");
	
	var pgurl = window.location.href.substr(window.location.href);
	$("#hmain li a").removeClass("active");
    $("#hmain li a").each(function(){
		
          if($(this).attr("href") == pgurl || $(this).attr("href") == '' ) 
		  {  
		 	 $(this).addClass("active");
			}
     });	
});
