<?php

/**

 * Displays DOWNLOADS & DOCUMENTS

 *

 * @package WordPress

 * @subpackage Global

 * @since Global 1.0

 * @version 1.2

 */



?>
<section id="download-document" class="download-document bg-grey py-5">

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-10">
          <h2 class="mb-5"><?php echo get_field('document_title'); ?></h2>
          <div class="row">
            <div class="col-md-4">
                <ul>                  
                  <?php if( have_rows('document_name') ):                 
                  while( have_rows('document_name') ): the_row(); 
                      $file_document_image = get_sub_field('file_document_image');
                  ?>
                    <li><a href="<?php echo wp_get_attachment_url( $file_document_image);?>" target="_blank">
                      <?php echo get_sub_field('file_name') ?></a>
                    </li>
                  <?php 
                   endwhile;
                   endif;
                  ?> 

                </ul>

            </div>
          </div>
        </div>
      </div>
    </div>

  </section>