<?php

/**

 * Displays footer contact info

 *

 * @package WordPress

 * @subpackage Global

 * @since Global 1.0

 * @version 1.2

 */

$address_title = get_field('address_title', 12);
$address = get_field('address', 12);
$phone_title = get_field('phone_title', 12);
$phone_link = get_field('phone_link', 12);
$phone = get_field('phone', 12);
$toll_free_title = get_field('toll_free_title', 12);
$toll_free = get_field('toll_free', 12);
$toll_free_link = get_field('toll_free_link', 12);
$fax_title = get_field('fax_title', 12);
$fax = get_field('fax', 12);

?>

             <div class="footer-contact-info">
                    <h3>
                    <?php if($address_title){
                        echo $address_title;
                        } ?>    
                    </h3>
                    <?php if($address){
                        echo $address;
                        } ?> 
                        <?php echo $phone_title; ?>: <a href="tel:<?php echo $phone_link;?>"><?php echo $phone;?></a><br>
                       <?php echo $toll_free_title;?>:<a href="tel:<?php echo $toll_free_link;?>"><?php echo $toll_free;?></a><br>
                        <?php echo $fax_title;?>: <?php echo $fax;?><br>
                    </p>
                </div>