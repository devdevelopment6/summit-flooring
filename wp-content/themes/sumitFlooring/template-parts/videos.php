<?php

/**

 * The template for displaying services

 *

 * This is the template that displays all pages by default.

 * Please note that this is the WordPress construct of pages

 * and that other 'pages' on your WordPress site may use a

 * different template.

 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/

 *

 * @package WordPress

 * @subpackage Global

 * @since Global 1.0

 * @version 1.0

 */

 ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<section class="innercontent">
	<div class="container">
    <?php the_title( '<h1 class="pagetitle">', '</h1>' ); ?>
    <div class="entry-content">

		<div class="video-panel">
		<?php if( have_rows('videos' , 152) ): ?>
		<?php if( have_rows('videos' , 152) ):
$s = 1;
 ?>
		<?php if( have_rows('videos' , 152) ):
$s = 1;
 ?>
		<div class="row">
        <?php while( have_rows('videos' , 152) ): the_row(); 
		$videoid = get_sub_field('video_id', 152);
$videothumb = get_sub_field('video_thumb', 152);
$size = 'video-thumb'; // (thumbnail, medium, large, full or custom size)
       
       //if( $s > 2 )
			//{
			//	break;
			//}?>
			<div class="col-sm-6">
            <div id="video-image-<?php echo $s;?>" class="video-image">
            <?php  echo wp_get_attachment_image( $videothumb, $size );?>
           </div>
           <div id="thevideo<?php echo $s;?>" style="display:none" class="thevideo">
 
			<iframe width="100%" height="500" src="https://www.youtube.com/embed/<?php if($videoid) {
				echo $videoid;}?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			 
			</div>

            <!-- YOUTUBE VIDEO -->
				
			</div>
			<script>
			$(document).ready(function($){
			$("#video-image-<?php echo $s;?>").click(function(){
				$(".video-image").show();
				$("#video-image-<?php echo $s;?>").hide();
				$(".thevideo").hide();
			$("#thevideo<?php echo $s;?>").show();
			$("#thevideo<?php echo $s;?> iframe")[0].src += "?autoplay=1&mute=1";
			});
			});
			</script>
			 <?php 
			 $s++;
			 endwhile; ?>
		</div>
 <?php endif; ?>
 <?php endif; ?>
        <?php endif; ?>
</div>

	</div>
	</div>
</section>

	

	<!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->

