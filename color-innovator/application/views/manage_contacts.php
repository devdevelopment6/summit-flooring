<?php $this->load->view('notification');?>
<div class="" id="">
    <div class="">
        

    </div>

    <div class="widget-body">
        <div class="widget-main">

            <div id="page-wrapper">
                <form class="form-horizontal" id="update_contact_form" action="<?php echo base_url(); ?>manage_home/update_contacts/<?php echo $contacts['id']; ?>" method="post" enctype="multipart/form-data">
                  <div class="col-md-12">
                  	<div class="col-md-12">
                    	<h3 align="center">Contact Details </h3>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Toll Free : </label>
                        <div class="col-sm-6">
                            <input class="col-md-12" type="text" id="toll_free" placeholder="Toll Free Contact" name="toll_free" value="<?php echo $contacts['toll_free_contact']; ?>"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Direct Contact : </label>
                        <div class="col-sm-6">
                            <input class="col-md-12" type="text" id="direct_contact" name="direct_contact" placeholder="Direct Contact" value="<?php echo $contacts['direct_contact']; ?>"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Fax Toll Free : </label>
                        <div class="col-sm-6">
                            <input class="col-md-12" type="text" id="fax_toll_free" name="fax_toll_free" placeholder="Fax Toll Free" value="<?php echo $contacts['fax_toll_free']; ?>"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Fax Direct : </label>
                        <div class="col-sm-6">
                            <input class="col-md-12" type="text" id="fax_direct" name="fax_direct" placeholder="Fax Direct" value="<?php echo $contacts['fax_direct_contacat']; ?>"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email : </label>
                        <div class="col-sm-6">
                            <input class="col-md-12" type="email" id="email"  name="email" placeholder="Email ID" value="<?php echo $contacts['email']; ?>"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Phone Number : </label>
                        <div class="col-sm-6">
                            <input class="col-md-12" type="text" id="phone_no" name="phone_no" placeholder="Phone Number" value="<?php echo $contacts['phone_no']; ?>"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
						<label for="address" class="col-sm-3 control-label">Address : </label>
						<div class="col-sm-8">
							<textarea rows="8" id="address" name="address" class="form-control1"> <?php echo $contacts['address']; ?> </textarea>
						</div>
					</div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Facebook Link : </label>
                        <div class="col-sm-6">
                            <input class="col-md-6" type="text" id="fb_link" name="fb_link" placeholder="Facebook Link" value="<?php echo $contacts['fb_link']; ?>"/>
                            <div class="col-md-6 sku_error"></div>
                        </div>
                    </div>
					
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Twitter Link : </label>
                        <div class="col-sm-6">
                            <input class="col-md-6" type="text" id="twitter_link" name="twitter_link" placeholder="Twitter Link" value="<?php echo $contacts['twitter_link']; ?>"/>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label class="col-sm-3 control-label">Pinterest Link : </label>
                        <div class="col-sm-6">
                            <input class="col-md-6" type="text" id="pin_link" name="pin_link" placeholder="Pinterest Link" value="<?php echo $contacts['pinterest_link']; ?>"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Linkedin Link : </label>
                        <div class="col-sm-6">
                            <input class="col-md-6" type="text" id="linkedin" name="linkedin" placeholder="Linkedin Link" value="<?php echo $contacts['linkedin_link']; ?>"/>
                        </div>
                    </div>
       			
                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-3">
                            <button type="submit" class="btn-yellow btn" name="update">Save Changes</button></button>																												 							&nbsp;&nbsp;<a href="<?php echo base_url();?>manage_home/" class="btn-yellow btn" />Cancel</a>
                        </div>
                    </div>
                    </div>
                </form>
			</div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>ckfinder/ckfinder.js"></script>

<script type="text/javascript">
var editor = CKEDITOR.replace( 'address',{
    filebrowserBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : '<?php echo base_url();?>ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : '<?php echo base_url();?>ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '../' );
</script>

<script type="text/javascript">	

$(document).ready(function(){

  $("#update_contact_form").validate({
    rules:																																																								 	 {
         	toll_free: {
       					required:true
         		},
         	direct_contact: {
   					required:true
     		},
     		fax_toll_free: {
   					required:true
     		},
     		fax_direct: {
   					required:true
     		},
     		email: {
   					required:true,
   					email:true,
     		},
     		phone_no: {
   					required:true,
     		},																															
 	 },
 	messages: 																	{
	   	toll_free: {
	   				required:"Toll Free Number is required."
		 },
     	direct_contact: {
   					required:"Direct Contact is required."
     		},
     	fax_toll_free: {
   					required:"Fax Contact is required"
     		},
	   	fax_direct:	{
	   				required:"Fax Direct Contact is required."
		 },
		 email:	{
	   				required:"Email is required.",
	   				email:"Please Enter Valid Email ID",
		 },
		 phone_no:	{
	   				required:"Phone Number is required.",
		 },
    },
   });
});
</script>