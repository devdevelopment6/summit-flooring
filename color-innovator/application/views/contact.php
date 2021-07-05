<style type="text/css">
	.map iframe{
		width:100% !important;
	}
</style>

<div class="container-fluid banner product contact_page_banner" style="padding:0px;position:relative;">
	<?php /*if($category_details['banner_image'] !='' && $category_details['banner_image']!=NULL && file_exists(FCPATH.'uploads/category_banner_images/'.$category_details['id'].'/'.$category_details['banner_image'])){*/ ?>
	<img src="<?php echo base_url();?>homepage_assests/new_images_1/new_2_dinoflex-made-flat-stays-flat-bg_1.jpg" class="cust_banner_prod_cat" alt="location_category_banner_image" style="width:100%;height:auto;">
	<?php //} ?>
	<div class="container">
		<div class="banner_product">
			<div class="background_small_image"></div>
			<div class="banner_txt col-sm-12">
				<div class="bg_small_img"></div>
				<h2 class="page_title hosp_title"><span><?php echo 'Contact';?></span></h2>
			
			</div>
		</div>
	</div>
</div>



<div class="col-md-12 contact_msg">	
	<?php $this->load->view('notification'); ?>
</div>

<div class='contactForm'>
	<div class='container'>
	<div class='row'>
		<div class='col-md-6' >
			<form action="<?php echo base_url(); ?>front_end/submit_contect" name="contact_form" id="contact_form" method="post" accept-charset="utf-8">
			 <p class='contactHeading cust_size'>Contact Us</p>
			<div class='contactAddress'>
				<b>Toll Free : - </b><?php echo $contacts['toll_free_contact']; ?><br>
				<b>Direct : - </b><?php echo $contacts['direct_contact']; ?><br>
				<b>Fax Toll Free : - </b><?php echo $contacts['fax_toll_free']; ?><br>
				<b>Fax Direct : - </b><?php echo $contacts['fax_direct_contacat']; ?> 
			</div>
				
	       <div class="form-group">
                  <label for="name">Name : -</label>
                  <input name="name" type="text" class="form-control" id="name" placeholder="Enter Name">
			</div>
           <div class="form-group">
                  <label for="subject">Subject : -</label>
                  <input name="subject" type="text" class="form-control" id="subject" placeholder="Enter subject">
			</div>
			
           <div class="form-group">
                  <label for="email">Email : -</label>
                  <input name="email" type="text" class="form-control" id="email" placeholder="Enter  email">
			</div>
			
           <div class="form-group">
                  <label for="mobileno">Mobile No : -</label>
                  <input name="mobileno" type="text" class="form-control" id="mobileno" placeholder="Enter  Mobileno">
			</div>
			
           <div class="form-group">
                  <label for="message">Message : -</label>
			   <textarea name='message'  class="form-control" rows='5'></textarea>
			</div>
			 <div class="col-sm-4">
                
                    <div class="btn_skewx text-center home_text_skewx" style = "margin : 0;" >
                       <div class="text-skewx"><button type="submit" name="submit" class="contact_submit">Submit</button>
                                    </div>
                       
                    </div>
                </div>
		</form>
	   </div>
		 <div class="col-md-6 map">
          <?php /*?><iframe src="https://www.google.com/maps/d/embed?mid=1Jpdkd_WPKOy9IHlZhH-167zgqQ8&amp;output=embed" width="100%" height="335" frameborder="0" style="border:0" allowfullscreen=""></iframe><?php */?>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2528.9435853464656!2d-119.22268204828997!3d50.66530797940503!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x537e8b294b86baff%3A0xb631c67dfd24123a!2sDinoflex+Group+Ltd+Partnership!5e0!3m2!1sen!2sca!4v1515692307002" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
	</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	 
  $("#contact_form").validate({
    rules:																																																								 	 {
		name: {
   					required:true
     		},
     	subject: {
   					required:true
     		},
		email: {
   					required:true
     		},																																																	 		mobileno: {																																																					 					required:true																																																									 			},
 	 },
 	messages: 																																																								 	{
		name: {
	   				required:"Name is required."
		 	},
	   	subject: {
	   				required:"Subject is required."
		 	},
		email: {
   					required:"Email is required."
     		},
	  	mobileno:	{
	   				required:"Mobile Number is required."
		 	},
    },
   });
  });
</script>