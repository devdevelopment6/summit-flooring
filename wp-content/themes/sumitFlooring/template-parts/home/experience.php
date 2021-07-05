<?php

/**

 * Displays experience

 *

 * @package WordPress

 * @subpackage Global

 * @since Global 1.0

 * @version 1.2

 */


$experienceleftpanelcontent = get_field('left_panel_content_area');
$clientsubheading = get_field('client_sub_heading');
?>
<section class="experience">
	<div class="container">
		<div class="row">
			<div class="col-xl-7 col-lg-12">
				<div class="leftbox">
					<?php if($experienceleftpanelcontent) {
    echo $experienceleftpanelcontent;}?>
				</div>
			</div>
			<div class="col-xl-5 col-lg-12">
				<div class="rightbox">
                <?php if( have_rows('right_panel_top') ): ?>
    <?php while( have_rows('right_panel_top') ): the_row(); 
        $toptitle = get_sub_field('title');
		$topbtntitle = get_sub_field('button_title');
		$topbtnlink = get_sub_field('button_link');

        ?>
					<div class="txtbox">
						<?php if($toptitle) {
    echo $toptitle;}?>
						<a href="<?php echo $topbtnlink;?>" class="redlink"><?php echo $topbtntitle;?></a>
					</div>
                     <?php endwhile; ?>
<?php endif; ?>
                <?php if( have_rows('right_panel_bottom') ): ?>
    <?php while( have_rows('right_panel_bottom') ): the_row(); 
        $bottomtitle = get_sub_field('title');
		$bottombtntitle = get_sub_field('button_title');
		$bottombtnlink = get_sub_field('button_link');

        ?>
					<div class="txtbox">
						<?php if($bottomtitle) {
    echo $bottomtitle;}?>
						<a href="<?php echo $bottombtnlink;?>" class="redlink"><?php echo $bottombtntitle;?></a>
					</div>
                                         <?php endwhile; ?>
<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
	