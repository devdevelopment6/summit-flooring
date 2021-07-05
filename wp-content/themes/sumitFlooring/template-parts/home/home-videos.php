<?php

/**

 * Displays Home Videos

 *

 * @package WordPress

 * @subpackage Global

 * @since Global 1.0

 * @version 1.2

 */



?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<section class="videos">
	<div class="container">
    <div class="headingbox">
		<h4>
			<?php 
$videoheading = get_field('video_heading');
if( $videoheading ) {
    echo $videoheading;
}?>
		</h4>
	</div>	
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
       
       if( $s > 2 )
			{
				break;
			}?>
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
	
			<div class="btnrow">
				<a href="<?php 
$servicebtnlink = get_field('video_button_link');
if( $servicebtnlink ) {
    echo $servicebtnlink;
}?>" class="stylebtn"><?php 
$servicebtntitle = get_field('video_button_title');
if( $servicebtntitle ) {
    echo $servicebtntitle;
}?></a>
			</div>
		</div>
	</div>	
</section>


	
<!-- #site-navigation -->

