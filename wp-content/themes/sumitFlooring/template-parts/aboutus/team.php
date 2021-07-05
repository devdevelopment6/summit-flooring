<?php

/**

 * Displays content for front page

 *

 * @package WordPress

 * @subpackage Global

 * @since Global 1.0

 * @version 1.0

 */


?>

<section class="bg-light-grey">
<div class="container py-5">
<div class="row">
<div class="col-md-12 text-center">
<h4 class="mb-5">Executive Team</h4>
</div>

<?php 

        $loop = new WP_Query( array(
            'post_type' => 'ourteam',
            'posts_per_page' => -1,
            'orderby' => 'id', 
            'order' => 'ASC',
            'post_status' => 'publish', 
          )
        );
        $i=1;
        while ( $loop->have_posts() ) : $loop->the_post();

            if($i==1){
                $adddiv='<div class="w-100">&nbsp;</div>';
                $offset='offset-md-4';
            }else{
                $adddiv='';
                $offset='';
            }
    ?>


<div class="col-md-4 <?php echo $offset;?>">
<div class="team-box">
    <a class="team-thumb" href="<?php the_permalink();?>">
        <?php the_post_thumbnail();?>
     </a>

<div class="team-name"><a href="team/david_numark"><?php the_title(); ?></a></div>

<div class="team-position"><a href="team/david_numark"><?php the_field('designation');?></a></div>
</div>
</div>


<!-- <div class="w-100">&nbsp;</div> -->
<?php echo $adddiv;?>
<?php $i++; endwhile; wp_reset_query(); ?>

<!-- <div class="col-md-4">
<div class="team-box"><a class="team-thumb" href="team/jed_horowitz"><img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/jed_medium.jpg" /></a>

<div class="team-name"><a href="team/jed_horowitz">Jed Horowitz</a></div>

<div class="team-position"><a href="team/jed_horowitz">Vice President</a></div>
</div>
</div>

<div class="col-md-4">
<div class="team-box"><a class="team-thumb" href="team/marc_becker"><img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/marc_medium.jpg" /></a>

<div class="team-name"><a href="team/marc_becker">Marc Becker</a></div>

<div class="team-position"><a href="team/marc_becker">National Sales Director</a></div>
</div>
</div>

<div class="col-md-4">
<div class="team-box"><a class="team-thumb" href="team/steve_hand"><img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/steve_medium.jpg" /></a>

<div class="team-name"><a href="team/steve_hand">Steve Hand</a></div>

<div class="team-position"><a href="team/steve_hand">Operations Manager</a></div>
</div>
</div>

<div class="w-100">&nbsp;</div>

<div class="col-md-4">
<div class="team-box"><a class="team-thumb" href="team/gail_numark"><img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/gail_medium.jpg" /></a>

<div class="team-name"><a href="team/gail_numark">Gail Numark</a></div>

<div class="team-position"><a href="team/gail_numark">Human Resources/Office Manager</a></div>
</div>
</div>

<div class="col-md-4">
<div class="team-box"><a class="team-thumb" href="team/alan_smith"><img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/Alan_Smith_-_Featured_Image1.jpg" /></a>

<div class="team-name"><a href="team/alan_smith">Alan Smith</a></div>

<div class="team-position"><a href="team/alan_smith">Market Development Manager</a></div>
</div>
</div>

<div class="col-md-4">
<div class="team-box"><a class="team-thumb" href="team/joseph_willsen"><img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/Joseph_Willsen_Featured_Image.jpg" /></a>

<div class="team-name"><a href="team/joseph_willsen">Joseph Willsen</a></div>

<div class="team-position"><a href="team/joseph_willsen">Regional Manager</a></div>
</div>
</div>

<div class="w-100">&nbsp;</div>

<div class="col-md-4">
<div class="team-box"><a class="team-thumb" href="team/thauane_freire_silva"><img class="img-fluid" src="https://summit-flooring.com/inc/upload/images/TS_medium.png" style="width: 350px; height: 235px;" /></a>

<div class="team-name"><a href="team/thauane_freire_silva">Thauane Silva</a></div>

<div class="team-position"><a href="team/thauane_freire_silva">Sales and Logistics Coordinator</a></div>
</div>
</div>

<div class="col-md-4">
<div class="team-box"><a class="team-thumb" href="team/oliver_hellewell"><img class="img-fluid" src="https://summit-flooring.com/inc/upload/images/OH_medium.png" /></a>

<div class="team-name"><a href="team/oliver_hellewell">Oliver Hellewell</a></div>

<div class="team-position"><a href="team/oliver_hellewell">Marketing Manager</a></div>
</div>
</div> -->
</div>
</div>
</section>