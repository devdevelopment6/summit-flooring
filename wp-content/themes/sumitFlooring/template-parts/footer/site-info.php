<?php
$copyright = get_field('copyright', 34);
/**

 * Displays footer site info

 *

 * @package WordPress

 * @subpackage Global

 * @since Global 1.0

 * @version 1.0

 */

$all_rights_reserved = get_field('all_rights_reserved', 12);

?>
<div class="col-12 text-center">
               <?php if($all_rights_reserved){
                        echo $all_rights_reserved;
                        } ?>         
            </div>
