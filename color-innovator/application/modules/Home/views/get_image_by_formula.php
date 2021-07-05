 <div class="container" style="disply:block">
	 <div class="mid-conttainer">
		  <div class="col-md-12 col-sm-12 col-xs-12">
			   <div class="">
				  	<div class="row" style="margin:0;">			
						<div class="slogan custheadgal" style="text-align:left;">
				 			 <h3 class="custemailhead">Generated Swatch: </h3>
						</div>
					</div>  
				</div>
			
				<div class="col-md-12 col-sm-12 col-xs-12" style="padding-bottom: 20px;" >
					<div class="col-md-3 col-sm-6 col-xs-6">
						<img src="<?php echo $swatch_image; ?>" style="width:100%;cursor:pointer;" class="zoom_single_image" id="generated_swatch_image" />
					</div>
					<input type="hidden" name="image_category" id="image_category" value="<?php echo $category; ?>" />
					<input type="hidden" name="swatch_image_name" id="swatch_image_name" value="<?php echo $swatch_image_name; ?>" />
					<div class="col-md-3 col-sm-6 col-xs-6" >
						<input type="text" name="your_swatch_name" id="your_swatch_name" placeholder="Swatch Name (In case of place to floor)" />
						<div class="image_info_div save-gallery-new">
						<h3 style="margin-top: 20px;margin-bottom: 10px;">Your Formula :</h3>
						<ul>
						<?php for($i=0;$i<count($info)-1;$i++){ 
								$get_single_color = $this->common_model->get_single('color_room',array('id'=>$info[$i]['id']));
								if($get_single_color!=false){
						?>
							<li><?php echo $get_single_color['color_title'].' - <b>'.$info[$i]['flecks_size'].'</b> - '.$info[$i]['percent'].'%'; ?></li>
						<?php }} ?>
						</ul>
						</div>	
						<div class="" style="margin-top:10px;">
							<?php if ($this->session->userdata('logedin_user') == "") { ?>
								<a href="#" class="row btn greennew login_btn_popup">Save To Gallery</a>
							<?php } ?>
						</div>
						<div class="">
							<a href="#" class="row btn yellownew go_to_place_from_generated">Place To Floor</a>
						</div>
						<?php
						//$set=array('org_image_name'=>$swatch_image_name);
						
						$get_img_nm = $this->common_model->get_single('saved_album', array('org_image_name'=>$swatch_image_name));
						
						//print_r($get_img_nm);
						//echo '>>>>>>>>>>>';
						//print_r($get_img_nm['id']);
						?>
			  			<div class="">
							<a href="<?php echo base_url();?>home/samplereq/<?php echo $get_img_nm['id']; ?>" class="row btn greennew request_for_sample_generated ">Request A Sample</a>
						</div>
					</div>
				</div>			    
			  
		 </div>
	 </div>
</div>
<?php $this->load->view('login_reg_form'); ?>

<div class="modal login-registration fade" id="enlargeImageModal" tabindex="-1" role="dialog" aria-labelledby="enlargeImageModal" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h2>View Saved Swatch</h2>
			</div>
			<div class="modal-body">
			  <img src="" class="enlargeImageModalSource" style="width: 100%;">
			</div>
		  </div>
		</div>
	</div>

<script type="text/javascript">
	$(document).ready(function(){
		$(".go_to_place_from_generated").on('click',function(){
			var your_swatch_name = $("#your_swatch_name").val();
			var image_info = $(".image_info_div").text(); 
			var image_category = $("#image_category").val();
			var generated_swatch_image = $("#generated_swatch_image").attr('src');
			var swatch_image_name = $("#swatch_image_name").val();
			//alert(swatch_image_name);
			if(your_swatch_name==''){
				 swal("","Provide swatch name!!",'error');
			}	
			else
			{
				$.ajax({
					url: base_url + "home/go_to_place_from_generated",
				 	method: 'POST',
				 	data:{'your_swatch_name':your_swatch_name,'image_info':image_info,'image_category':image_category,'generated_swatch_image':generated_swatch_image,"org_image_name":swatch_image_name },
					success:function(data){
						if(data==true){
							window.location.href=base_url + "home/place";
						}
					}
				});
				
			}	
		});
	});
</script>