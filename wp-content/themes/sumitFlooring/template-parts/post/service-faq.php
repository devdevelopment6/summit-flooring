<?php

/**

 * Displays faq 

 *

 * @package WordPress

 * @subpackage Global

 * @since Global 1.0

 * @version 1.2

 */



?>
<?php if (get_field('faq')): ?>
<div class="servicefaq">
<h3>Frequently Asked Questions</h3>

<?php if(get_field('faq')): $i = 0; ?>

<div class="panel-group" id="accordion">

<?php while(has_sub_field('faq')): $i++; ?>

  <div class="panel panel-default<?php echo $i; ?>">
    <div class="panel-heading">
    
    <div class="row">
    
    
    
    <div class="col-sm-12">
    <a class="cte" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>"><?php the_sub_field('title'); ?></a>
    </div>
    
    </div>
    
    </div>
    <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse">
      <div class="panel-body">
      <?php the_sub_field('description'); ?>
      </div>
    </div>
  </div>
  
 <?php endwhile; ?> 
 
</div>

<?php endif; ?>

</div>
     <?php endif; ?>
