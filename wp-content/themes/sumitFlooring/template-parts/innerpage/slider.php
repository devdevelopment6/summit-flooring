<?php

/**

 * Displays Slider and right content

 *

 * @package WordPress

 * @subpackage Global

 * @since Global 1.0

 * @version 1.2

 */



?>
<section class="product-top">
  <div class="container-fluid">
    <div class="row">
        <div class="col-xl-5 product-banner">
          <div id="product-banner" class="carousel slide" data-ride="carousel">

            <div class="carousel-inner">

            <?php if( have_rows('slider_image') ):
              $i=1;
            while( have_rows('slider_image') ): the_row(); 
                $image = get_sub_field('image'); 
                if($i==1){
                  $active='active';
                }else{
                  $active=''; 
                } 
            ?>
                <div class="carousel-item <?php echo $active;?>" style="background-image: url('<?php echo wp_get_attachment_url( $image);?>')">
                </div>
            <?php 
            $i++;
             endwhile;
             
            endif; ?>      
            </div>
            <a class="carousel-control-prev" href="#product-banner" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#product-banner" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
            <div class="col-xl-6 product-banner-content">
        <h1 class="mb-5"><?php echo get_field('content_title'); ?></h1>
        <p><?php echo get_field('content_description'); ?></p>

           <?php $featured_posts = get_field('watch_video');
           if( $featured_posts ): ?>
            
<!-- https://www.advancedcustomfields.com/resources/post-object/ -->
          <div style="background:#eeeeee;border:1px solid #cccccc;padding:5px 10px;">
              <strong>
              <?php 
              $i=1;
              foreach( $featured_posts as $post ):
                setup_postdata($featured_posts); 
                if($i==1){
              ?> 
              <a href="<?php the_permalink(); ?>">
                  <?php the_title(); ?>
                  <?php the_title(); ?>
              </a>
               <?php 
             }
             $i++;
             endforeach; ?>
              </strong>
          </div>
          <?php            
            wp_reset_postdata(); ?>
        <?php endif; ?>
             <?php //if( have_rows('inner_image') ): ?>
                  <a href="#view-sample" class="btn btn-yellow btn-sample-request"><?php //echo get_field('view_sample');?>
                  View Sample
                </a>
              <?php  //endif;?>      
              <?php if( have_rows('document_name') ): ?> 
              
                  <a href="#download-document" class="btn btn-blue btn-download-document"><?php //echo get_field('document'); ?>
                  Document
                </a>
              <?php  endif;?>    



        
      </div>
    </div>
  </div>
</section>