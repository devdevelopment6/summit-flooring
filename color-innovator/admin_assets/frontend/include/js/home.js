var map, startPos = "", infoWindow, county;
var markers = [];

var isMobile = {
  Android: function () {
    return navigator.userAgent.match(/Android/i);
  },
  BlackBerry: function () {
    return navigator.userAgent.match(/BlackBerry/i);
  },
  iOS: function () {
    return navigator.userAgent.match(/iPhone|iPad|iPod/i);
  },
  Opera: function () {
    return navigator.userAgent.match(/Opera Mini/i);
  },
  Windows: function () {
    return navigator.userAgent.match(/IEMobile/i) || navigator.userAgent.match(/WPDesktop/i);
  },
  any: function () {
    return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
  }
};

$(document).ready(function () {

  $('input, textarea').placeholder();

  smoothScroll.init({
    speed: 500,
    offset: 50
  });
  setTimeout(function () {
    var hash = location.hash
    if (hash && $(hash).length) {
      var target = $(hash).offset().top;
      var headerH = $('header').height();
      $(window).scrollTop(target - headerH)
      /*
      //or with animate, 
      //but you'll need to reset the scrollTop to 0 (the top) first:
      $(window).scrollTop(0);
      $('html,body').animate({scrollTop:target - headerH}, 1000);
      */
    }
  }, 1);

  county = $("#county");

  // Load the slideshow
  $('.slider').slick({
    autoplay: true,
    centerMode: true,
    centerPadding: '60px',
    slidesToShow: 5,//Must not exceed number of items available
    responsive: [
      {
        breakpoint: 768,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 5
        }
      },
      {
        breakpoint: 480,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 1
        }
      }
    ]
  });
  $(".table-products #container-text div:first-child, .slider").show();

  $('.slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
    var text = $("[data-slick-index='" + nextSlide + "']").data("text");
    $(".table-products #container-text div").hide();
    $("#" + text).show();
  });

  $(".prod-view").click(function () {
    $("#modal-products").modal("show");
    $("#modal-products .modal-body > div").hide();
    $($(this).data("target")).show();
  });


  //$('#container-text').appendTo('#control-content');
  $('.slick-prev').appendTo('#control-prev');
  $('.slick-next').appendTo('#control-next');

  // Initialize google maps
  google.maps.event.addDomListener(window, 'load', initialize);

  // Get the user geolocation
  var geoOptions = {
    maximumAge: 5 * 60 * 1000,
    timeout: 10 * 1000
  }

  var geoSuccess = function (position) {
    startPos = position;
    //document.getElementById('startLat').innerHTML = startPos.coords.latitude;
    //document.getElementById('startLon').innerHTML = startPos.coords.longitude;

  };
  var geoError = function (error) {
    console.log('Error occurred. Error code: ' + error != null ? error.message : "unknown");
    // error.code can be:
    //   0: unknown error
    //   1: permission denied
    //   2: position unavailable (error response from location provider)
    //   3: timed out
  };

  navigator.geolocation.getCurrentPosition(geoSuccess, geoError, geoOptions);



  // Filter counties
  $("#county").change(function () {
    if ($(this).val() != "") {
      $('.dealer-details-container').hide();
      $('[data-county="' + $(this).val() + '"]').show();
    }
    else {
      $('.dealer-details-container').show();
    }
  });

  $(".p-item").click(function () {
    if ($(this).hasClass("slick-center")) {
      $("#modal-products").modal("show");
      $("#modal-products .modal-body > div").hide();
      $($(this).data("target")).show();
    }
  });
});

  //google maps settings (utilises googleapis loaded in main.master)
function initialize() {
  var mapCanvas = document.getElementById('map-canvas');
  var mapOptions = {
    center: new google.maps.LatLng("53.333006", "-6.365665"),
    zoom: 7,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  map = new google.maps.Map(mapCanvas, mapOptions);

  infoWindow = new google.maps.InfoWindow({ maxWidth: 400 });

  $.getJSON(urlDefault, function (data) {
    var items = [];
    $.each(data, function (key, val) {
      point = new google.maps.LatLng(val.DEAL_LATITUDE, val.DEAL_LONGITUDE);

      var distance = calcDistance(point);

      html = '<div><p><div class="gmapOrga">' + val.DEAL_NAME + '</div><div class="gmapaddress"><div>';

      if (val.DEAL_ADDRESS_1 != null)
        html += val.DEAL_ADDRESS_1;
      if (val.DEAL_ADDRESS_2 != null)
        html += ' ' + val.DEAL_ADDRESS_2;
      if (val.DEAL_ADDRESS_3 != null)
        html += ' ' + val.DEAL_ADDRESS_3;

      html += "</div>";

      if (val.DEAL_TOWN != null)
        html += '<div>' + val.DEAL_TOWN + '</div>';
      if (val.DEAL_COUNTY != null)
        html += '<div>' + val.DEAL_COUNTY + '</div>';

      html += "</div>";

      if (val.DEAL_PHONE != null)
        html += '<div class="gmapphone"><span>Phone:</span> ' + val.DEAL_PHONE + '</div>';
      if (val.DEAL_EMAIL != null)
        html += '<div class="gmapemail"><span>Email:</span> <a href="mailto:' + val.DEAL_EMAIL + '">' + val.DEAL_EMAIL + '</a></div>';
      if (val.DEAL_MONDAY != null)
        html += '<div class="gmapphone"><span>Monday:</span> ' + val.DEAL_MONDAY + '</div>';
      if (val.DEAL_TUESDAY != null)
        html += '<div class="gmapphone"><span>Tuesday:</span> ' + val.DEAL_TUESDAY + '</div>';
      if (val.DEAL_WEDNESDAY != null)
        html += '<div class="gmapphone"><span>Wednesday:</span> ' + val.DEAL_WEDNESDAY + '</div>';
      if (val.DEAL_THURSDAY != null)
        html += '<div class="gmapphone"><span>Thursday:</span> ' + val.DEAL_THURSDAY + '</div>';
      if (val.DEAL_FRIDAY != null)
        html += '<div class="gmapphone"><span>Friday:</span> ' + val.DEAL_FRIDAY + '</div>';
      if (val.DEAL_SATURDAY != null)
        html += '<div class="gmapphone"><span>Saturday:</span> ' + val.DEAL_SATURDAY + '</div>';
      if (val.DEAL_SUNDAY != null)
        html += '<div class="gmapphone"><span>Sunday:</span> ' + val.DEAL_SUNDAY + '</div>';
      html += '</p></div>';


      markers.push([html, createMarker(val.DEAL_NAME, point, html)]);

      items.push('<div class="dealer-details-container" data-county="' + val.DEAL_COUNTY + '"><h5>' + distance + '</h5><h4>' + val.DEAL_NAME + '</h4><h5 class="call">' + val.DEAL_PHONE + '</h5><a href="javascript:void(0);" title="More Info" data-index="' + key + '">More Info</a></div>');
    });

    $(".dealer-list").append(items);

    $(".dealer-details-container a").click(function () {

      var $link = $(this);

      infoWindow.setContent(markers[$link.data("index")][0]);
      infoWindow.open(map, markers[$link.data("index")][1]);

      map.setZoom(15);

    });
  });
}

function createMarker(title, point, html) {
  var image = 'images/mm_20_red.png';
  var marker = new google.maps.Marker({
    position: point,
    title: title,
    map: map,
    icon: image
  });
  google.maps.event.addListener(marker, "click", function (event) {
    infoWindow.setContent(html);
    infoWindow.open(map, marker);
  });

  return marker;
}

function calcDistance(p1) {
  if (startPos != "" && isMobile.any()) {
    var p2 = new google.maps.LatLng(startPos.coords.latitude, startPos.coords.longitude);
    return (google.maps.geometry.spherical.computeDistanceBetween(p1, p2) / 1000).toFixed(2) + " km away";
  }
  else {
    return "";
  }
}