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

				$image= wp_get_attachment_image_src( get_post_thumbnail_id( $pid ));

				
      		?>
      		<?php //echo get_the_post_thumbnail( $pid );?>
				<div class="col-md-3 col-sm-4 col-xs-6 element-item <?php echo $tid[0]->slug;?>" data-category="<?php echo $tid[0]->slug;?>">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="<?php echo $image[0];?>" alt="" />	
								
													
								 </div>
							<div class="reference-name"><?php echo $mypost->post_title ?></div>
						</a>
					</div>

				</div>
			<?php } ?>
				<!-- <div class="col-md-3 col-sm-4 col-xs-6 element-item rubber_flooring" data-category="rubber_flooring">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/reference_page_-_marriott_international__medium.png" alt="" />							</div>
							<div class="reference-name">Marriott International</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item object_carpet" data-category="object_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/mikimoto_-_refrence_logo_(3)_medium.png" alt="" />							</div>
							<div class="reference-name">Mikimoto</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item rubber_flooring" data-category="rubber_flooring">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/EARTH_Kaiser_Permanete_Refrence_page1_medium.png" alt="" />							</div>
							<div class="reference-name">Kaiser Permanete</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item object_carpet" data-category="object_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/Refrences_La_Prairie_Switzerland_medium.png" alt="" />							</div>
							<div class="reference-name">la prairie switzerland</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item bentzon" data-category="bentzon">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/Features_Illumination_Entertainment_medium.png" alt="" />							</div>
							<div class="reference-name">Illumination</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item rubber_flooring" data-category="rubber_flooring">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/Features_HomeAway_medium.png" alt="" />							</div>
							<div class="reference-name">HomeAway</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item rubber_flooring" data-category="rubber_flooring">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/marriot_medium.png" alt="" />							</div>
							<div class="reference-name">AC Marriot</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item object_carpet" data-category="object_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/adidas_medium.png" alt="" />							</div>
							<div class="reference-name">Adidas</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item object_carpet" data-category="object_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/amhurst-1_medium.png" alt="" />							</div>
							<div class="reference-name">Amhurst University</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item woven_carpet" data-category="woven_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/assouline1_medium.png" alt="" />							</div>
							<div class="reference-name">Assouline</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item bentzon" data-category="bentzon">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/bony_medium.png" alt="" />							</div>
							<div class="reference-name">Bank Of New York</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item object_carpet" data-category="object_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/capitalone_medium.png" alt="" />							</div>
							<div class="reference-name">Capital One</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item van_besouw" data-category="van_besouw">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/citizenm_medium.png" alt="" />							</div>
							<div class="reference-name">Citizen M</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item rubber_flooring" data-category="rubber_flooring">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/crumb_medium.png" alt="" />							</div>
							<div class="reference-name">Crumb & Foster</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item woven_carpet" data-category="woven_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/cowboys_medium.png" alt="" />							</div>
							<div class="reference-name">Dallas Cowboys</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item object_carpet" data-category="object_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/delamo_medium.png" alt="" />							</div>
							<div class="reference-name">Del Amo Mall</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item van_besouw" data-category="van_besouw">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/dkny_medium.png" alt="" />							</div>
							<div class="reference-name">DKNY</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item object_carpet" data-category="object_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/droga_medium.png" alt="" />							</div>
							<div class="reference-name">Droga</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item object_carpet" data-category="object_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/embassy_medium.png" alt="" />							</div>
							<div class="reference-name">Embassy Suites</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item object_carpet" data-category="object_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/etihad_medium.png" alt="" />							</div>
							<div class="reference-name">Etihad Airlines</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item woven_carpet" data-category="woven_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/whatsup_medium.png" alt="" />							</div>
							<div class="reference-name">Facebook/WhatsApp</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item bentzon" data-category="bentzon">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/fourseasons_medium.png" alt="" />							</div>
							<div class="reference-name">Four Seasons (Balto)</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item lounge_object_carpet" data-category="lounge_object_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/Google_medium.png" alt="" />							</div>
							<div class="reference-name">Google</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item woven_carpet" data-category="woven_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/grandecheese_medium.png" alt="" />							</div>
							<div class="reference-name">Grande Cheese</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item object_carpet" data-category="object_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/harvard_medium.png" alt="" />							</div>
							<div class="reference-name">Harvard University</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item object_carpet" data-category="object_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/hundai_medium.png" alt="" />							</div>
							<div class="reference-name">Hyundai</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item woven_carpet" data-category="woven_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/imf_medium.png" alt="" />							</div>
							<div class="reference-name">IMF</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item object_carpet" data-category="object_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/ingredion_medium.png" alt="" />							</div>
							<div class="reference-name">Ingredion</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item rubber_flooring" data-category="rubber_flooring">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/irvine_medium.png" alt="" />							</div>
							<div class="reference-name">Irvine Company</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item object_carpet" data-category="object_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/iwc_medium.png" alt="" />							</div>
							<div class="reference-name">IWC</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item woven_carpet" data-category="woven_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/mzone_medium.png" alt="" />							</div>
							<div class="reference-name">Machine Zone</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item woven_carpet" data-category="woven_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/mattel_medium.png" alt="" />							</div>
							<div class="reference-name">Mattel</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item woven_carpet" data-category="woven_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/mckinsey_medium.png" alt="" />							</div>
							<div class="reference-name">McKinsey</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item object_carpet" data-category="object_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/mersedes_medium.png" alt="" />							</div>
							<div class="reference-name">Mercedes</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item woven_carpet" data-category="woven_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/mtsanai_medium.png" alt="" />							</div>
							<div class="reference-name">Mt. Sanai</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item object_carpet" data-category="object_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/chicago_medium.png" alt="" />							</div>
							<div class="reference-name">MCA Chicago</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item object_carpet" data-category="object_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/newyork_medium.png" alt="" />							</div>
							<div class="reference-name">NY Film Academy</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item bentzon" data-category="bentzon">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/neiman_medium.png" alt="" />							</div>
							<div class="reference-name">Neiman Marcus</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item rubber_flooring" data-category="rubber_flooring">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/nickelodeon_medium.png" alt="" />							</div>
							<div class="reference-name">Nickelodian</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item object_carpet" data-category="object_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/nokia_medium.png" alt="" />							</div>
							<div class="reference-name">Nokia</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item woven_carpet" data-category="woven_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/norton_medium.png" alt="" />							</div>
							<div class="reference-name">Norton Museum</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item woven_carpet" data-category="woven_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/periscope_medium.png" alt="" />							</div>
							<div class="reference-name">Periscope</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item object_carpet" data-category="object_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/pfizer_medium.png" alt="" />							</div>
							<div class="reference-name">Pfizer</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item object_carpet" data-category="object_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/porche_medium.png" alt="" />							</div>
							<div class="reference-name">Porsche</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item woven_carpet" data-category="woven_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/ravb_medium.png" alt="" />							</div>
							<div class="reference-name">Reserve Vero Beach</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item object_carpet" data-category="object_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/rr_medium.png" alt="" />							</div>
							<div class="reference-name">Rolls Royce</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item object_carpet" data-category="object_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/samsung_medium.png" alt="" />							</div>
							<div class="reference-name">Samsung</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item object_carpet" data-category="object_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/spotify_medium.png" alt="" />							</div>
							<div class="reference-name">Spotify</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item van_besouw" data-category="van_besouw">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/stregis_medium.png" alt="" />							</div>
							<div class="reference-name">St. Regis</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item van_besouw" data-category="van_besouw">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/twitter_medium.png" alt="" />							</div>
							<div class="reference-name">Twitter</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item van_besouw" data-category="van_besouw">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/uber_medium.png" alt="" />							</div>
							<div class="reference-name">Uber</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item woven_carpet" data-category="woven_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/sdutribute_medium.png" alt="" />							</div>
							<div class="reference-name">Union Tribune</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item woven_carpet" data-category="woven_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/usbank_medium.png" alt="" />							</div>
							<div class="reference-name">US Bank</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item edel_grass" data-category="edel_grass">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/WebMD_medium.png" alt="" />							</div>
							<div class="reference-name">Web MD</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item object_carpet" data-category="object_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/willis_medium.png" alt="" />							</div>
							<div class="reference-name">Willis Towers</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item rubber_flooring" data-category="rubber_flooring">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/ymca_medium.png" alt="" />							</div>
							<div class="reference-name">YMCA Cedar Knolls</div>
						</a>
					</div>

				</div>
			
				<div class="col-md-3 col-sm-4 col-xs-6 element-item object_carpet" data-category="object_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/equinox_medium.png" alt="" />
															</div>
							<div class="reference-name">Equinox</div>
						</a>
					</div>

				</div> -->
			</div>
	</div>
</section>