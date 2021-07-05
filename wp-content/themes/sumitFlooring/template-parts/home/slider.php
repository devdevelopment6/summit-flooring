<?php

/**

 * Displays Slider

 *

 * @package WordPress

 * @subpackage Global

 * @since Global 1.0

 * @version 1.2

 */



?>
<section class="carousel-section">
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 gtter">
			<div id="demo" class="carousel slide" data-ride="carousel">

  <div class="carousel-inner">
    <?php if( have_rows('home_slider') ): ?>
    
    <?php     
    $i=1;
    while( have_rows('home_slider') ): the_row(); 
        if($i==1){
          $active='active';
        }else{
          $active='';
        }
    ?>
    <div class="carousel-item <?php echo $active;?>">     
      <?php $image = get_sub_field('image');
       echo wp_get_attachment_image( $image, 'full' ); 
      ?>
      <div class="carousel-caption">
        <h3><?php echo get_sub_field('title')?></h3>
        <p><?php echo get_sub_field('description')?></p>
        <a href="<?php echo get_sub_field('link')?>" class="btn btn-grey" >Learn More</a>
      </div>   
    </div>
    <?php 
    $i++;
    endwhile;
     ?>                            
    <?php endif; ?>      
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
		</div>
	</div>
</div>	
</section>
