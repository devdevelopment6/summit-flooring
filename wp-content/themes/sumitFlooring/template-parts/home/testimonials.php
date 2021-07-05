<?php

/**

 * Displays testimonials

 *

 * @package WordPress

 * @subpackage Global

 * @since Global 1.0

 * @version 1.2

 */

$testimonialheading = get_field('testimonial_heading');
?>
<section class="testimonial">
	<div class="container">
		<h4><?php if($testimonialheading) {
    echo $testimonialheading;}?></h4>
        <?php if( have_rows('testimonials' , 34) ): ?>
		<div class="owl-carousel owl-theme" id="testimonial">
        <?php while( have_rows('testimonials' , 34) ): the_row(); 
		$testimonial = get_sub_field('testimonial', 34);
$clientname = get_sub_field('client_name', 34);
$organization = get_sub_field('organization, 34');
        ?>
			<div class="item">
				<div class="testbox">
					<?php if($testimonial) {
    echo $testimonial;}?>
					<div class="info">
						<h5 class="cname"><?php if($client_name) {
    echo $client_name;}?></h5><h5 class="designation"><?php if($organization) {
    echo $organization;}?></h5>
					</div>
				</div>
			</div>
			 <?php endwhile; ?>
		</div>
        <?php endif; ?>
	</div>
</section>
