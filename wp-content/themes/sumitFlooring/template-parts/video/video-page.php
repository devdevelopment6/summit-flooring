<?php

/**

 * Watch Video

 *

 * @package WordPress

 * @subpackage Global

 * @since Global 1.0

 * @version 1.2

 */

 $image = get_field('Youtube_image'); 

?>
<div class="content_primary">

	<section class="page-content">

	<div class="container">
		<?php if($image!=''){ ?>
		<div class="row">
			<div class="col-lg-8">
				<a href="#" class="video-btn" data-toggle="modal" data-target="#modal_youtube" data-src="<?php echo get_field('you_tube_video'); ?>">

					
					<div class="youtube-thumb" style="background:url(<?php echo wp_get_attachment_url( $image);?>);">
						<div class="youtube-space-box"></div>
					</div>
					<?php if(get_field('you_tube_video')){ ?>
					<span class="play-button">
						<img class="img-fluid" src="https://www.summit-flooring.com/inc/images/icons/play-button.png" alt="" />
					</span>
					<?php } ?>
				</a>
					
			</div>
			<div class="col-lg-4">
				<h1><?php echo get_field('video_title'); ?></h1>
			<?php if(!get_field('you_tube_video')){ ?>
				<br>
				<br>
				<div class="alert alert-warning text-center" role="alert">
						New video coming soon!
				</div>
			<?php } ?>
			</div>

		</div>
	<?php } ?>
		<?php if( have_rows('more_videos') ): ?>
		<div class="row my-5">
			<div class="col-md-12">
				<div class="watch-more">
					<h2>Watch More Videos</h2>
					<span class="title-highlight"></span>
				</div>
			</div>
		</div>

			
		<div class="row">
			
	<?php 
	  $i=1;

	  while( have_rows('more_videos') ): the_row(); 
	    $youtube_thumb = get_sub_field('youtube_thumb');
	 
	?>		
		<div class="col-md-4 d-block">

			<a href="#" class="video-btn" data-toggle="modal" data-target="#modal_youtube" data-src="<?php echo get_sub_field('youtube_video');  ?>">
				
				<div class="youtube-thumb" style="background:url(<?php echo wp_get_attachment_url( $youtube_thumb);?>);">
					<div class="youtube-space-box"></div>

				</div>

				<span class="watch-more-play-button">
					<img class="watch-more-img" src="https://www.summit-flooring.com/inc/images/icons/play-button.png" alt="" />								</span>
			</a>
			<div class="youtube-detail">
				<div class="youtube-date"><?php echo get_sub_field('youtube_date');  ?></div>
				<div class="youtube-title"><?php echo get_sub_field('youtube_title');  ?></div>
			</div>
		</div>
		<?php 
           endwhile;
           endif; 
        ?>

				
			
		</div>
	
	</div>

	<!-- Modal -->
	<div class="modal fade" id="modal_youtube" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" src="" id="video" allowscriptaccess="always"></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>

</section>


		</div>