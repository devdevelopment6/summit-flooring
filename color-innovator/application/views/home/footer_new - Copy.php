<div class="custheadright hidden-lg hidden-md col-sm-12 col-xs-12">

	<div class="comat">

		<a href="https://summit-flooring.com/" target="_blank"><img class="atm_logo" src="<?php echo base_url(); ?>home_assets/images/slogo.png"></a>

		<div><?php $this->load->view('desktop_view_links');?></div>

	</div>

</div>



<footer>	

	<div class="container">

		<div id="cus_foo">

			<div class="submit-flooring">

				<li>© <?php echo date('Y');?>. Summit Flooring All Rights Reserved. Complete Convergent Communication provided by <a href="http://theoneco.com/" target="_blank"><span class="yellowcolor">theONEco</span></a></li>

			</div>

		</div> 	

	</div>

</footer>



</div>

</div>

</body>

</html>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>-->





<!--change-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script src="<?php echo base_url(); ?>home_assets/js/jquery.ui.touch-punch.js"></script>





<!-- Include all compiled plugins (below), or include individual files as needed -->

<script src="<?php echo base_url(); ?>home_assets/js/bootstrap.min.js"></script>



<!-- Smooth scroll -->

<script src="<?php echo base_url(); ?>home_assets/js/smooth.scroll.js"></script>



<!-- Animation -->



<script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.25.6/sweetalert2.all.min.js"></script>

<!-- Flex Slider -->

<script src="<?php echo base_url(); ?>home_assets/js/owl.carousel.min.js"></script>

<script src="<?php echo base_url(); ?>home_assets/js/notify.min.js"></script>



<script defer src="<?php echo base_url(); ?>home_assets/flexslider/js/jquery.flexslider.js"></script>



<!--change_dione-->



<!-- Syntax Highlighter -->

<!-- <script type="text/javascript" src="<?php echo base_url(); ?>home_assets/flexslider/js/shCore.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>home_assets/flexslider/js/shBrushXml.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>home_assets/flexslider/js/shBrushJScript.js"></script>-->





<!--change-->



<script src="<?php echo base_url(); ?>home_assets/js/fileinput.min.js"></script>

<!-- Optional FlexSlider Additions -->

<script src="<?php echo base_url(); ?>home_assets/flexslider/js/jquery.easing.js"></script>

<script src="<?php echo base_url(); ?>home_assets/flexslider/js/jquery.mousewheel.js"></script>



<!--change_dione-->



<!--loader -->

<!--<script src="<?php echo base_url(); ?>home_assets/js/animsition.min.js"></script>-->





<!--change-->

<script src="<?php echo base_url(); ?>home_assets/js/snap.svg-min.js?ver=<?php echo date("YmdHis"); ?>"></script>

<script src="<?php echo base_url(); ?>home_assets/js/classie.js?ver=<?php echo date("YmdHis"); ?>"></script>

<script src="<?php echo base_url(); ?>home_assets/js/svgLoader.js?ver=<?php echo date("YmdHis"); ?>"></script>



<script>

	$(".container").css('display','none');

	



	(function() {

		init();

		var pageWrap = document.getElementById( 'pagewrap' ),

			pages = [].slice.call( pageWrap.querySelectorAll( 'div.container-fluid' ) ),

			currentPage = 0,

			triggerLoading = [].slice.call( pageWrap.querySelectorAll( '.pageload-link' ) ),

			loader = new SVGLoader( document.getElementById( 'loader' ), { speedIn : 400, easingIn : mina.easeinout } );



		function init() {

			//triggerLoading.forEach( function( trigger ) {

				window.addEventListener( 'load', function( ev ) {

					ev.preventDefault();

					loader.show();

					

					$("body").css('opacity','0.7');

					var currenturl =  $(location).attr('href');

					var step1 = base_url+'home';

					var step2 = base_url+'home/step_2';

					var step3 = base_url+'home/step_3';

					var step4 = base_url+'home/step_4';

					var step5 = base_url+'home/place';

					var step6 = base_url+'home/make';

					var step7 = base_url+'home/make_logo';

					var step8 = base_url+'home/view_gallery';

					var step9 = base_url+'home/login';

					var step10 = base_url+'home/reg';

					var step11 = base_url+'home/loginplace';

					

					if(currenturl != ''){							

						if(currenturl == step1){

							$("body").css('background-color','#ecc847');								

						} else if(currenturl == step2) {

							$("body").css('background-color','#506e2d');							

						} else if(currenturl == step3) {

							$("body").css('background-color','#103b70');

						} else if(currenturl == step4) {

							$("body").css('background-color','#798889');

						} else if(currenturl == step5) {

							$("body").css('background-color','#9c7c09');

						} else if(currenturl == step6) {

							$("body").css('background-color','#7eda13');

						} else if(currenturl == step7) {

							$("body").css('background-color','#c7dcfb');

						} else if(currenturl == step8) {

							$("body").css('background-color','#508488');

						} else if(currenturl == step9) {

							$("body").css('background-color','#b1889b');

						} else if(currenturl == step10) {

							$("body").css('background-color','#a76cbb');

						} else if(currenturl == step11) {

							$("body").css('background-color','#e88d6a');

						} else {

							$("body").css('background-color','#000000');	

						}

					} else {

						$("body").css('background-color','#000000');	

					}

					$(".pageload-loading.pageload-overlay").css('opacity','1');

					$(".pageload-loading.pageload-overlay").css('display','block');

								

					$(".pageload-loading.pageload-overlay::after").css('opacity','1');

					$(".pageload-loading.pageload-overlay::after").css('visibility','visible');

					$(".pageload-loading.pageload-overlay::after").css('-webkit-transition','opacity 0.3s');

					$(".pageload-loading.pageload-overlay::after").css('transition','opacity 0.3s');

					

					$(".pageload-loading.pageload-overlay::before").css('opacity','1');

					$(".pageload-loading.pageload-overlay::before").css('visibility','visible');

					$(".pageload-loading.pageload-overlay::before").css('-webkit-transition','opacity 0.3s');

					$(".pageload-loading.pageload-overlay::before").css('transition','opacity 0.3s');

				

					//$("body").css('background-color','#000');

					// after some time hide loader

					setTimeout( function() {

						loader.hide();

						$(".container").css('display','block');

						$("body").css('opacity','1');

						$("body").css('background-color','#ffffff');

						//$(".mid-conttainer").css('background-color','#f9fbfb');

						//$(".mid-conttainer").css('background-color','#edf5f5');

						//$(".mid-conttainer").css('background-color','#f9fbfb');

						//$(".mid-conttainer").css('background-color','#edf5f5');

						$(".pageload-loading.pageload-overlay").css('opacity','0');

						$(".pageload-loading.pageload-overlay").css('display','none');

						

						$(".pageload-loading.pageload-overlay::after").css('opacity','0');

						$(".pageload-loading.pageload-overlay::after").css('visibility','hidden');

						$(".pageload-loading.pageload-overlay::after").css('-webkit-transition','opacity 0s');

						$(".pageload-loading.pageload-overlay::after").css('transition','opacity 0s');



						$(".pageload-loading.pageload-overlay::before").css('opacity','0');

						$(".pageload-loading.pageload-overlay::before").css('visibility','hidden');

						$(".pageload-loading.pageload-overlay::before").css('-webkit-transition','opacity 0s');

						$(".pageload-loading.pageload-overlay::before").css('transition','opacity 0s');

						

						classie.removeClass( pages[ currentPage ], 'show' );

						// update..

						currentPage = currentPage ? 0 : 1;

						classie.addClass( pages[ currentPage ], 'show' );



					}, 1500);

					

				} );

			//} );	

		}



		init();

	})();

	

</script>

<!--<script>

			(function() {

				var pageWrap = document.getElementById( 'pagewrap' ),

					pages = [].slice.call( pageWrap.querySelectorAll( 'div.container' ) ),

					currentPage = 0,

					triggerLoading = [].slice.call( pageWrap.querySelectorAll( 'a.pageload-link' ) ),

					loader = new SVGLoader( document.getElementById( 'loader' ), { speedIn : 400, easingIn : mina.easeinout } );



				function init() {

					triggerLoading.forEach( function( trigger ) {

						trigger.addEventListener( 'click', function( ev ) {

							ev.preventDefault();

							loader.show();

							// after some time hide loader

							setTimeout( function() {

								loader.hide();



								classie.removeClass( pages[ currentPage ], 'show' );

								// update..

								currentPage = currentPage ? 0 : 1;

								classie.addClass( pages[ currentPage ], 'show' );



							}, 2000 );

						} );

					} );	

				}



				init();

			})();

</script>-->



<!-- Custome js -->

<script type="text/javascript" src="<?php echo base_url(); ?>home_assets/js/cusome.js?ver=<?php echo date('YmdHis'); ?>"></script>





<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>home_assets/css/slick_ext.css"/>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>home_assets/slick/slick-theme.css"/>



            <script src="<?php echo base_url();?>home_assets/js/slick_ext.js"></script>

            <script>

                jQuery(document).ready(function($) {

      $('.slider').slick({

        dots: false,

        infinite: true,

        cssEase: 'linear',

        speed: 500,

       // centerMode: false,

        slidesToShow: 4,

        slidesToScroll: 1,

        autoplay: false,

        autoplaySpeed: 2000,

        arrows: true,

        responsive: [{

          breakpoint: 600,

          settings: {

            slidesToShow: 3,

            slidesToScroll: 1

          }

        },

        {

           breakpoint: 400,

           settings: {

              arrows: false,

              slidesToShow: 2,

              slidesToScroll: 1

           }

        }]

    });

    





});

            </script>

            

            



