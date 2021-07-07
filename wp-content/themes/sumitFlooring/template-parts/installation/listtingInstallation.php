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
<?php 

$myposts = get_posts(array(
    'showposts' => -1,
    'post_type' => 'installation',
    'order' => 'ASC',
     'orderby' => 'ID'
    
));

?>

<section class="page-content bg-light-grey">
	<div class="container">
		<div class="row mb-5">
			<div class="col-md-12">
							</div>
		</div>
		<div class="row">
			<?php foreach ($myposts as $mypost) {     
    
			      $pid=  $mypost->ID;
			      $tid=wp_get_post_terms($pid,'productvideo');
			      //$termids= get_term_by('id',$tid,'')
			      /*echo "<pre>";
			      print_r($mypost);*/

				//$image= wp_get_attachment_image_src( get_post_thumbnail_id( $pid ));

 			$image=wp_get_attachment_url( get_post_thumbnail_id($pid), 'full' );


      		?>
			
				<div class="col-md-4">

					<div class="product-box">

						<a class="product-content" href="<?php echo get_permalink( $pid );?>">
							<span class="link-icon"></span>
							<img class="" src="<?php echo $image;?>" alt="" />	
						</a>
						<div class="product-content-detail">
							<div class="product-title"><?php echo $mypost->post_title ?></div>
						</div>
					</div>

				</div>
			<?php } ?>	

		</div>
		<div class="row justify-content-center mt-5">
	</div>
	</div>
</section>
