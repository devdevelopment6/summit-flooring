
<div class="container about_section about_margin_top core_values">
		<div class="row">
			<div class="col-md-4">
				
			</div>
			<div class="col-md-12">
				<div class="row ">
					<div class="col-md-12">
						<h2 class="body_content"><?php echo $about['banner_content_title_2']; ?></h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<p><?php echo $about['banner_content_2']; ?></p>
					</div>
				</div>
                
                <div class="row section1">
				 
				<div class="col-md-offset-4 col-md-4 all_products text-center">
					<div class="btn_skewx blue">
						<div class="text-skewx blue"><button type="button" id="goto_about">Go back to About us</button>
						</div>
					</div>
				</div>
				<div class="col-md-4"></div>
			</div>
            
				
			</div>
		</div>
		
	 </div>
     
     <div class="row margin_right1">
			<div class="col-md-2"></div>
			<div class="col-md-8 col-sm-12 sit_logo">
				<img src="<?php echo base_url(); ?>homepage_assests/image/gsa-logo.png">
				<img src="<?php echo base_url(); ?>homepage_assests/image/scs-logo.png">
				<img src="<?php echo base_url(); ?>homepage_assests/image/cgbc-logo.png">
				<img src="<?php echo base_url(); ?>homepage_assests/image/recycled-rubber-floor-logo.png">
				<img src="<?php echo base_url(); ?>homepage_assests/image/usgbc-logo.png">
				<img src="<?php echo base_url(); ?>homepage_assests/image/floor-score-logo.png">
			</div>
			<div class="col-md-2"></div>
			
			
		</div>
        
<script type="text/javascript">
 
 $(function(){
    $("#goto_about").on("click",function(){
        window.location = "<?php echo base_url(); ?>front_end/about/#about_core_values";
    });
})
 
 
 </script>