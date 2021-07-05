<?php

/**

 * Displays Home Services

 *

 * @package WordPress

 * @subpackage Global

 * @since Global 1.0

 * @version 1.2

 */



?>

<section class="partner" id="homePartnerhide" style="display: block;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 gtter">
                <div class="partner-div" align="center">
                   <!--  Loding... -->
                </div>
            </div>
        </div>
    </div>
</section>

<section class="partner" id="homePartner" style="display: none;">
	<div class="container">
		<div class="row">
			<div class="col-md-12 gtter">
				<div class="partner-div">
					<div id="owlone" class="owl-carousel owl-theme">

                        <?php if( have_rows('client') ): ?>
    
                            <?php while( have_rows('client') ): the_row(); 
                                
                                ?>
                               <div class="item">
                                <?php $image = get_sub_field('client_image');
                                    echo wp_get_attachment_image( $image, 'full' ); 
                                ?>
                            </div>
                            <?php endwhile; ?>                            
                        <?php endif; ?>    
                    </div>
				</div>
			</div>
		</div>
	</div>
</section>


	
<!-- #site-navigation -->

