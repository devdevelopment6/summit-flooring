<?php

/**

 * Displays 2nd Box

 *

 * @package WordPress

 * @subpackage Global

 * @since Global 1.0

 * @version 1.2

 */



?>
<section class="product-content my-5">

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-10">
        <h2 class="mb-5"><?php echo get_field('about_title'); ?></h2>
        <p>
			<?php echo get_field('content'); ?> 
		  </p>
		<strong><?php echo get_field('installation_photos_title'); ?>:</strong>

    <!-- ***************** installation_name *************************** -->
    <?php if( have_rows('installation_name') ):
              $i=1;

              while( have_rows('installation_name') ): the_row(); 
                

             
    ?>
    <p><a href="<?php echo get_sub_field('about_link');  ?>" rel="noopener" target="_blank">
                <?php echo get_sub_field('image_name');  ?>
              </a>
              <br/>

  </p>
 <?php 
             
             endwhile;
            endif; ?> 


    <!-- **************** installation_photos  ******************** -->
		  </div>
      </div>
	  
          <div class="row justify-content-center mt-3 carpet">
			  <div class="col-xl-10">
				  <div class="row justify-content-center mt-3">
			  <p>
            <?php if( have_rows('installation_photos') ):
              $i=1;

              while( have_rows('installation_photos') ): the_row(); 
                $image = get_sub_field('image'); 

              if( $image!=''){ 
            ?>  
			    
              <div class="col-lg-2 col-md-2 col-sm-3 col-6">
                <a href="<?php echo wp_get_attachment_url( $image);?>" class="d-block mb-4" data-lightbox="gallery">
                  <img class="img-fluid" src="<?php echo wp_get_attachment_url( $image);?>" alt="">
                </a>
              </div>
            <?php }?>

            

            <?php 
             
             endwhile;
            endif; ?>   
            
             <p> 
				  </div>
</div>	
            
          </div>
      </div>

</section>
