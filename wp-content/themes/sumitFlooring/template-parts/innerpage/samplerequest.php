<?php

/**

 * Displays 3rd BOx

 *

 * @package WordPress

 * @subpackage Global

 * @since Global 1.0

 * @version 1.2

 */



?>
 <script src="https://www.google.com/recaptcha/api.js" async defer></script>
<section class="color-swatch-section py-5">

    <div class="container">
      
       <?php if( have_rows('inner_image') ):?>
        <hr>
      <div id="view-sample" class="row justify-content-center color-swatch-list">
        <div class="col-xl-10"><!-- select_a_color_name -->
          <h2><?php echo get_field('select_a_color_name')?></h2>
          <p>Please select a color:</p>
          <div class="row">
          <?php
            while( have_rows('inner_image') ): the_row(); 
                $image = get_sub_field('image');  
            ?>
               <div class="col-6 col-md-2 mb-3">

                <div class="color-swatch-content">

                  <img src="<?php echo wp_get_attachment_url( $image);?>" class="img-fluid color-swatch" title="<?php echo get_sub_field('image_name') ?>" alt="<?php echo get_sub_field('image_name'); ?>"  />

                  <a href="<?php echo wp_get_attachment_url( $image);?>" data-lightbox="photos" class="btn btn-yellow btn-view-color-swatch" data-lightbox="color-swatch" data-title="4 - Greystone" >View</a>

                  <a href="#sample-request" onclick="showImage('<?php echo wp_get_attachment_url( $image);?>');" class="btn btn-blue btn-color-swatch-sample-request showcolorname" data-title="<?php echo get_sub_field('image_name')?>" data-code="4" data-src="<?php echo wp_get_attachment_url( $image);?>">Request</a>
                </div>

                <div class="text-center">
                  <span class="swatch-code"><?php echo get_sub_field('image_code')?></span><br/>
                  <span class="swatch-title"><?php echo get_sub_field('image_name')?></span>
                </div>

              </div>
            <?php 
             endwhile;
             ?>                
            </div>
        </div>
      </div>
    <?php endif; ?>
      <hr>
      <div id="sample-request" class="row justify-content-center">
        <div class="col-xl-10 mt-5 mb-3 text-center">
          <h2>Sample Request</h2>
        </div>
        <div class="col-md-10 mb-5">
          <div class="contact-form">
            <form action="<?php the_permalink();?>" method="post" id="simpleRequest">
                                                            
            <div class="form-row">
              <div class="col-12 col-sm-6">
                <input type="text" name="request_name" placeholder="Name" required="" >
                              </div>
              <div class="col-12 col-sm-6">
                <input type="text"  name="request_email" placeholder="E-Mail"  required="" >
                              </div>
            </div>
            <div class="form-row">
              <div class="col-12 col-sm-6">
                <input type="text" id="company" name="company" placeholder="Company"  required="" >
                              </div>
              <div class="col-12 col-sm-6">
                <input type="text" id="phone" name="request_phone" placeholder="Phone"  required="" >
                              </div>
            </div>
            <div class="form-row">
              <div class="col-12">
                <input type="text" id="project_name" name="project_name" placeholder="Project Name"  required="" >
                              </div>
            </div>
            <div class="form-row">
              <div class="col-12">
                <input type="text" id="street" name="street" placeholder="Street"  required="" >
                              </div>
            </div>
            <div class="form-row">
              <div class="col-12 col-sm-6">
                <input type="text" id="city" name="city" placeholder="City"  required="" >
                              </div>
              <div class="col-12 col-sm-6">
                <input type="text" id="zip_code" name="zip_code" placeholder="ZIP"  required="" >
                              </div>
            </div>
            <!-- feature_image -->
            <?php $feature_image = get_field('feature_image');?>

            <div class="form-row align-items-center">
              <div class="col-2 col-sm-1">
                <img   id="currentImg"  class="img-fluid selected-color-swatch mb-2" src="<?php echo wp_get_attachment_url( $feature_image);?>" />
              </div>
            <div class="col-10 col-sm-11">
                <div class="form-group">
                	<?php /* ?><select name="color_swatch" class="form-control">
                    <?php if( have_rows('inner_image') ):
                      while( have_rows('inner_image') ): the_row(); 
                          $image = get_sub_field('image');  
                      ?>
          					<option value="<?php echo get_sub_field('image_name'); ?>"><?php echo get_sub_field('image_name'); ?></option>
                    <?php 
                     endwhile;
                      endif; 
                    ?> 
        					</select><?php */ ?>
                  <?php /*if( have_rows('inner_image') ):
                    $i=1;
                      while( have_rows('inner_image') ): the_row(); 
                          $image = get_sub_field('image');  
                         if($i==1){ */
                      ?>
                  <input type="text" class="form-control" name="color_swatch" id="color_swatch" value="<?php echo get_field('feature_title');?>">
                   <?php 
                   /*}
                   $i++;
                     endwhile;
                      endif; */
                    ?> 
        				</div>              
        			</div>
            </div>
            <div class="form-row py-3">
              <div class="col-12">
                <div class="g-recaptcha" data-sitekey="6LedcmAbAAAAAPqT1Z6mqzg5kLgnds3oQcepnQEd"></div>
                <?php //if($errormessage){ ?>
                  <p style="color: red;"><?php echo $errormessage;?></p>
               <?php //} ?>
                <!-- 6LedcmAbAAAAAPqT1Z6mqzg5kLgnds3oQcepnQEd -->
                <!-- <script type="text/javascript">
      var onloadCallback = function() {
        grecaptcha.render("recaptcha_challenge_field", {
          "sitekey" : "6LcawZcUAAAAAAV1SXjq-T06BZAYc5YrmocAcbz5","theme":"dark", "lang":"en",       
        });
      };
    </script>
   <div id="recaptcha_challenge_field"></div>
   <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
     
  <script>  
  $(document).ready(function(){
    $("#recaptcha_challenge_field").hide(0).delay(500).show(0);
  });
  </script> -->
  
  </div>
  </div>

            
<input type="hidden" name="actions" value="submitRequest">
<input type="submit" value="REQUEST"  class="btn btn-yellow btn-lg"  />

            </form>
          </div>
        </div>
      </div>
    </div>

  </section>