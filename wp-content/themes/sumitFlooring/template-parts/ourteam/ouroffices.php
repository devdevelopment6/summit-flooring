<?php

/**

 * our Clients

 *

 * @package WordPress

 * @subpackage Global

 * @since Global 1.0

 * @version 1.2

 */



?>

<?php if( have_rows('our_office','480') ):  ?>
<div class="row">
    <div class="col-md-12 text-center mb-5">
        <h2>Our Offices</h2>
    </div>
</div>
<?php endif; ?>
<div class="row justify-content-center mb-5">
    <div class="card-deck">

		<?php if( have_rows('our_office','480') ): 

		  while( have_rows('our_office','480') ): the_row(); 
		    $office_image = get_sub_field('office_image');
		 
		?>
        <div class="card mb-5">
            <div class="card-body text-center">
                <img class="img-fluid contact-icon mt-3" src="<?php echo wp_get_attachment_url( $office_image);?>" />
                
                <h5 class="my-3"><?php echo get_sub_field('office_title');  ?></h5>

                <p class="mb-5"><?php echo get_sub_field('office_contet');  ?></p>

                <?php if(get_sub_field('office_phone')){ ?>
                <p><strong>Phone:</strong> <a href="tel:1-877-496-3566"><?php echo get_sub_field('office_phone');  ?></a></p>
          	  <?php }?>

          	  <?php if(get_sub_field('office_email')){ ?>
                <p><strong>Email:</strong> <a href="mailto:info@summit-flooring.com"><?php echo get_sub_field('office_email');  ?></a></p>
              <?php }?>

              <?php if(get_sub_field('office_appointment')){ ?>
                <p><?php echo get_sub_field('office_appointment');  ?></p>
              <?php }?>
            </div>
        </div>

<?php 
	           endwhile;
	           endif; 
	        ?>

        
    </div>
</div>

				