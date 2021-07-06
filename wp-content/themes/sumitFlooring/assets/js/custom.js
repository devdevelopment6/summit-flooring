$(document).ready(function(){


 /* $('.navbar-nav li').removeAttr("class");  
  $('.navbar-nav li').attr("class",'nav-item'); 
  $('.navbar-nav li a').attr("class",'nav-link dropdown-toggle');

 $('.navbar-nav ul').removeAttr("class"); 
 $('.navbar-nav ul').attr("class",'drop-down'); 
  $('.navbar-nav ul li a').attr("class",'nav-link');


$("#topmenu").hide();
$("#showtopmenu").show();*/

$("#homePartnerhide").hide();
$("#homePartner").show();

$('#owlone').owlCarousel({
   /* loop: true,
    margin: 10,
    dots: false,
    nav: false,*/

    lazyLoad: true,
    loop:true,
    margin:10,
    nav:false,
    dots: false,
    autoplay:true,
    
    responsive:{
        0:{
            items:2,
            
        },
        600:{
            items:3,
            
            
        },
        1000:{
            items:4,
            
        }
    }
})




})

$(document).ready(function(){

 $(document).scroll(function() {
            if ($(window).width () >= 1200) {
                if ($(document).scrollTop() > 300) {
                    $(".stick").addClass("sticky");
                } else {
                    $(".stick").removeClass("sticky");
                }
            }
        });
 $(document).scroll(function() {
            if ($(window).width () < 1200) {
                if ($(document).scrollTop() > 200) {
                    $(".header").addClass("mobfixed");
                } else {
                    $(".header").removeClass("mobfixed");
                }
            }
        });

})


function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}


$(document).ready(function(){

 $(document).scroll(function() {
            if ($(window).width () >= 1200) {
                if ($(document).scrollTop() > 200) {
                    $(".header").addClass("fixed");
                } else {
                    $(".header").removeClass("fixed");
                }
            }
        });
 $(document).scroll(function() {
            if ($(window).width () < 1200) {
                if ($(document).scrollTop() > 200) {
                    $(".header").addClass("mobfixed");
                } else {
                    $(".header").removeClass("mobfixed");
                }
            }
        });

})





