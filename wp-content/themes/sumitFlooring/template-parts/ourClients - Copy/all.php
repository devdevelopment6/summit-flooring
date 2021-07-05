	
/***************** woven_carpet *****************************************/
	<?php $args = array(
			  'post_type' => 'ourclients' ,
			  'orderby' => 'date' ,
			  'order' => 'DESC' ,
			  'posts_per_page' => 60,
			  'cat'         => '6',
			  'paged' => get_query_var('paged'),
			  'post_parent' => $parent
			);  ?>
            <?php query_posts($args); ?>

		<div class="col-md-3 col-sm-4 col-xs-6 element-item woven_carpet" data-category="woven_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/siliconvalleybank-removebg-preview_(2)_medium.png" alt="" />							</div>
							<div class="reference-name">Silicon Valley Bank</div>
						</a>
					</div>

				</div>
		<?php endwhile; ?>
        <?php wp_reset_postdata(); ?>

   		<?php endif; ?>	


/***************** RUber flooring *****************************************/

				<div class="col-md-3 col-sm-4 col-xs-6 element-item rubber_flooring" data-category="rubber_flooring">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/EARTH_Kaiser_Permanete_Refrence_page1_medium.png" alt="" />							</div>
							<div class="reference-name">Kaiser Permanete</div>
						</a>
					</div>

				</div>


/***************** object_carpet *****************************************/

				<div class="col-md-3 col-sm-4 col-xs-6 element-item object_carpet" data-category="object_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/mikimoto_-_refrence_logo_(3)_medium.png" alt="" />							</div>
							<div class="reference-name">Mikimoto</div>
						</a>
					</div>

				</div>


/***************** bentzon *****************************************/

				<div class="col-md-3 col-sm-4 col-xs-6 element-item bentzon" data-category="bentzon">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/bony_medium.png" alt="" />							</div>
							<div class="reference-name">Bank Of New York</div>
						</a>
					</div>

				</div>
				
/***************** lounge_object_carpet *****************************************/

				<div class="col-md-3 col-sm-4 col-xs-6 element-item lounge_object_carpet" data-category="lounge_object_carpet">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/Google_medium.png" alt="" />							</div>
							<div class="reference-name">Google</div>
						</a>
					</div>

				</div>


/***************** van_besouw *****************************************/

				<div class="col-md-3 col-sm-4 col-xs-6 element-item van_besouw" data-category="van_besouw">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/uber_medium.png" alt="" />							</div>
							<div class="reference-name">Uber</div>
						</a>
					</div>

				</div>
								
/***************** edel_grass *****************************************/

				<div class="col-md-3 col-sm-4 col-xs-6 element-item edel_grass" data-category="edel_grass">

					<div class="reference-box">
						<a href="#">
							<div class="reference-thumb">
								<img class="img-fluid" src="https://www.summit-flooring.com/inc/upload/images/WebMD_medium.png" alt="" />							</div>
							<div class="reference-name">Web MD</div>
						</a>
					</div>

				</div>