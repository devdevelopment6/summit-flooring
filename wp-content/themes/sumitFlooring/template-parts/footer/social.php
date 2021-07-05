<?php
$socialheading = get_field('social_title', 34);
$facebook = get_field('facebook', 34);
/**

 * Displays social

 *

 * @package WordPress

 * @subpackage Global

 * @since Global 1.0

 * @version 1.2

 */



?>
<ul class="rightdiv"> 
<?php if( $socialheading ) {?>
<li><?php echo $socialheading;?></li>
<?php }?>
<?php if( $facebook ) {?>
<li><a href="<?php echo $facebook;?>" class="fa fa-facebook"></a></li>
<?php }?>
					</ul>