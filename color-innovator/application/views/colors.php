

<html>

<head>

    <title>Color Innovator</title>

    <?php /*?><link href="//cdn.kendostatic.com/2013.1.319/styles/kendo.common.min.css" rel="stylesheet" /><?php */?>

    <?php /*?><link href="//cdn.kendostatic.com/2013.1.319/styles/kendo.default.min.css" rel="stylesheet" /><?php */?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" />

     <script >var base_url = "<?php echo base_url();?>";</script>

    



</head>

<body>



<div class="row">

	<div class="colorlist">

    	<div class="col-md-12">

    	<?php 

			$i = 0;

			$each_color = array();

			foreach($colors as $color)

			{

				if($color->color_title != 'Black')

				{

					$each_color = (array)$color; 

					$i++;	

    	?>

            	 <div class="col-md-2 image pick_color" data-id="<?php echo $color->id; ?>">

            		  <img src="<?php echo base_url(); ?>uploads/colors/<?php echo $color->color_img; ?>" class="img" title="<?php echo $color->color_title;?>"/>

                  	<div class="lbl">

	                	<label id="<?php echo $color->id; ?>" class="lbl_color"><?php echo $color->color_title; ?></label>

                    </div>

                </div>

        <?php

				}

			}

			?>

        </div>

    </div>

 </div>

    

    <div class="">

    	<div class="col-md-12">

        	<div class="mix_color">

                <div class="row">

                    <div class="col-md-12">

                            <div class="granules" style="padding-left: 25px; ">

                            

                                    <div class="black_color">

                                         <div style="padding-left: 55px;">

                                                        <label style="font-weight:bold;">Black</label>

                                         </div>

                                            <div style="float: left; ">

                                                <img src="<?php echo base_url(); ?>/uploads/colors/granule_Black.jpg" id="base_img_black" class="img_2" alt="Black">

                                            </div>

                                                <div class="black_2">

                                                    <div class="switch" style="padding-left: 0px;">

                                                        <button class="fine" id="fine" style="background-color:#FDDB31">

                                                            <strong>Fine</strong></button>

                                                        <input type="text" id="amount0" disabled="" class="black_percent">

                                                    </div>

                                                    <div class="color_slider" id="slider-range-min00" aria-disabled="false" style="width: 258px;">

                                                     </div>

                                                </div>

                                 </div>

                            

                        

                         <div id="slider_amount">

                

                

                            </div>

                            

                                 <!--- CLONE THIS --->         

                                 <div class="add_another" style="padding-top: 30px;">

                                    <div id="add_another" style="float:left; margin-left: 45px; ">

                                    	<div>

                                       	 <p style="text-align: center;">

                                            <br>

                                            <span style="color:#5b5b5b;"><strong> Add another color from Color Room </strong></span>

                                        </p>

                                        </div>

                                    </div>

                                </div>

                                <div id="last_div">

                                

                

                                </div>

                        </div>

                    </div>

                 

                 </div>

            </div>

        </div>

        

        <div class="col-md-2">

            <div style="float:right; padding-top: 115px;padding-right: 185px;height: 250px;">

						<div class="end_div slider_box">

							<div class="common_progress">

                                    <div>

                                    </div>

                                     <div class="progress_total" id="slider-range-progress"> </div>

            

                                     </div>

                         </div>     

                              <div class="common_progress_2">

								<label class="common_progress_lbl">Progress</label><input type="text" disabled="" id="progress" class="common_progress_input">

                                <div class="progress_btn">

                                    <div class="col-md-12 progress_btn_2">

                                        <div class=col-md-6>

                                          <img class="display_btn" src="<?php echo base_url(); ?>uploads/resetbutton.png" id="reset" alt="">

                                         </div>

                                         

                                         <div class=col-md-6>

                                          <img style="border-radius: 40px;" src="<?php echo base_url(); ?>uploads/mixit.png" id="mix_button" alt="">

                                         </div>

                                     </div>

                                 </div>

							</div>  



						</div>

		    

          </div>  

          

          <div id="flow3" class="swatch_1">

                        <div id="join">

                        </div>



                        <div class="col-md-12">

                        	<div class="col-md-6">

                                    <div class="swatch_2">

            

                                            <div style="float: left; padding-top: 25px;">

                                                <div class="swatch-main color_mixture">

                                                    <img style="" id="test_image"/>

                

                                                </div>

                                            </div>

                                    </div>

                    			</div>

                                <div class="swatch-info" style="float:left; padding-left:15px; width:225px;">

                                    <div id="name_formula" style=" padding-top:60px;">

                                        <div style="">

                                            <label>Name this Swatch</label>

                                        </div>

                                        <div>

                                            <input type="text" title="Name this Swatch" id="name-swatch" placeholder="Custom Swatch" style="border:-1px; border-color:black; background-color: rgba(102, 125, 255,0);">

                                        </div>

                                         <div class="formula" style="">

                                            <label>Your Formula</label>

                                        </div>

                                         <div class="col-md-6">

                                            <div id="info" style=""></div>

                                    </div>

        

                                    <div id="favourite" title="Save image" class="ui-widget" style="padding-top: 5px; padding-bottom: 5px; pointer-events: stroke;">

                                        <img src="<?php echo base_url(); ?>uploads/Save-to-album.png" alt="">						

                                    </div>

                                    

                                     </div>

                                     </div>

                                    <!-- -->

        							<div class="savedswatch" style="float:left;">

                                            <div id="save_img" style="float:left;" >

                

                                            </div>

                

                                        </div>

                                        <div class="end" style="float: left;">

                                        </div>

                

                                        <div class="saved-swatch img_grid" id="save-info" style="">

                                            <div id="swatch-label" style="" class="grid_lbl"><!--float: left;-->

                                                <label>Saved Swatch Gallery</label>

                                            </div>

                

                                            <div id="last-save-swatch" style="float:left;">

                

                                            </div>

                                        </div>



                              <!-- -->         

                                 

                           

                        

					<div></div>

				</div>                         

            </div>

    </div>





    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

     <script src="//cdn.kendostatic.com/2013.1.319/js/kendo.all.min.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->

 	 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

  	<script src="<?php echo base_url(); ?>/assets/js/main.js"></script>





</body>

</html>