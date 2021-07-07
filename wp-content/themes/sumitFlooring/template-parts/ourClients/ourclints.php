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


/*$myposts = get_posts(array(
    'showposts' => -1,
    'post_type' => 'ourclients',
    'tax_query' => array(
        array(
        'taxonomy' => 'our_clients',
        'field' => 'slug',
        'terms' => array('sunsets', 'nature'))
    ))
);
 
foreach ($myposts as $mypost) {
      echo $mypost->post_title . '<br/>';
      echo $mypost->post_content . '<br/>';
      echo  $mypost->ID . '<br/><br/>';
}

*/


$myposts = get_posts(array(
    'showposts' => -1,
    'post_type' => 'ourclients',
    
));
 




?>



<div id="reference-item-list" class="row">
			
		
			<?php foreach ($myposts as $mypost) {     
    
			      $pid=  $mypost->ID;
			      $tid=wp_get_post_terms($pid,'our_clients');
			      //$termids= get_term_by('id',$tid,'')
			      /*echo "<pre>";
			      print_r($mypost);*/

				//$image= wp_get_attachment_image_src( get_post_thumbnail_id( $pid ));
				$image=wp_get_attachment_url( get_post_thumbnail_id($pid), 'full' );

				
      		?>
      		<?php //echo get_the_post_thumbnail( $pid );?>
				<div class="col-md-3 col-sm-4 col-xs-6 element-item <?php echo $tid[0]->slug;?>" data-category="<?php echo $tid[0]->slug;?>">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="<?php echo $image;?>" alt="" />	
								
													
								 </div>
							<div class="reference-name"><?php echo $mypost->post_title ?></div>
						</a>
					</div>

				</div>
			<?php } ?>
				
			</div>
	</div>
</section>