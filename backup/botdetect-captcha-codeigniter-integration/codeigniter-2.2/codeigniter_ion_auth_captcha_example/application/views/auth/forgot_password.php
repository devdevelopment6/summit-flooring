<link type="text/css" rel="Stylesheet" href="<?php echo CaptchaUrls::LayoutStylesheetUrl() ?>" />

<h1><?php echo lang('forgot_password_heading');?></h1>
<p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>

<div><?php echo $captchaValidationMessage; ?></div>
<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/forgot_password");?>

      <p>
      	<label for="email"><?php echo sprintf(lang('forgot_password_email_label'), $identity_label);?></label> <br />
      	<?php echo form_input($email);?>
      </p>

      <p>
	    <label for="CaptchaCode">Please retype the characters from the image:</label>
	    <?php 
	      $botdetectCaptcha = array(
	        'name'        => 'CaptchaCode',
	        'id'          => 'CaptchaCode',
	        'value'       => '',
	        'maxlength'   => '100',
	        'size'        => '50'
	      );
	      // Show captcha image 
	      echo $captchaHtml; 
	      echo form_input($botdetectCaptcha);
	    ?>
	  </p>

      <p><?php echo form_submit('submit', lang('forgot_password_submit_btn'));?></p>

<?php echo form_close();?>