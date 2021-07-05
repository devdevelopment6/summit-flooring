<?php

/**

 * Displays Clients area

 *

 * @package WordPress

 * @subpackage Global

 * @since Global 1.0

 * @version 1.2

 */
$first_image = get_field('first_image', 6);
$first_title = get_field('carpet_title', 6);
$first_description = get_field('carpet_description', 6);
$first_link = get_field('first_link', 6);

$second_image = get_field('second_image', 6);
$second_title = get_field('second_title', 6);
$second_description = get_field('second_description', 6);
$second_link = get_field('second_link', 6);

$third_image = get_field('third_image', 6);
$third_tittle = get_field('third_tittle', 6);
$third_description = get_field('third_description', 6);
$third_link = get_field('third_link', 6);


$fourth_image = get_field('fourth_image', 6);
$fourth_title = get_field('fourth_title', 6);
$fourth_description = get_field('fourth_description', 6);
$fourth_link = get_field('fourth_link', 6);



?>

<section class="after-partner">
	<div class="container">
		<div class="row">

			<div class="col-md-4">
			    <div class="home-grid-box">

						<a class="home-grid-content" href="<?php echo $first_link;?>">
							<?php 
								if($first_image){
								   	echo wp_get_attachment_image( $first_image,'' );
								}
							?>						
							<div class="home-grid-content-detail">
								<div class="grid-title">
									<h2><?php echo $first_title;?></h2>
								</div>
								<div class="grid-subtitle">
									<p><?php echo $first_description;?></p>							
								</div>
								<div class="grid-icon">
									<span class="link-icon"></span>
								</div>
								<div class="view-now">View Now</div>

							</div>
						</a>
				</div>
			</div>
			<div class="col-md-8">
					<div class="home-grid-box">

					<a class="home-grid-content" href="<?php echo $second_link;?>">
							<?php 
								if($second_image){
								   	echo wp_get_attachment_image( $second_image,'' );
								}
							?>
							<div class="home-grid-content-detail">
								<div class="grid-title">
									<h2><?php echo $second_title;?></h2>
								</div>
								<div class="grid-subtitle">
									<p><?php echo $second_description;?></p>								
								</div>
								<div class="grid-icon">
									<span class="link-icon"></span>
								</div>
								<div class="view-now">View Now</div>

							</div>
						</a>
					</div>
			</div>

		</div>
		<div class="row">

			<div class="col-md-8">
					<div class="home-grid-box">
						<?php echo $third_description;?>
					</div>
			</div>
			<div class="col-md-4">
					<div class="home-grid-box">

						<a class="home-grid-content" href="<?php echo $fourth_link;?>">
							<?php 
								if($fourth_image){
								   	echo wp_get_attachment_image( $fourth_image,'' );
								}
							?>							
							<div class="home-grid-content-detail">
								<div class="grid-title">
									<h2><?php echo $fourth_title;?></h2>
								</div>
								<div class="grid-subtitle">
									<p><?php echo $fourth_description;?></p>								
								</div>
								<div class="grid-icon">
									<span class="link-icon"></span>
								</div>
								<div class="view-now">View Now</div>

							</div>
						</a>
					</div>
				</div>

		</div>
	</div>
</section>