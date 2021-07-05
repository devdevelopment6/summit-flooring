<?php

/**

 * Category

 *

 * @package WordPress

 * @subpackage Global

 * @since Global 1.0

 * @version 1.2

 */



?>


   <section class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <?php the_post_thumbnail();?>
            </div>
            <div class="col-lg-8">
                <h1><?php the_title(); ?></h1>

                <strong><?php the_field('designation');?></strong>
                <br/><br/>
                <?php the_content();?>
            </div>
        </div>
    </div>
</section>