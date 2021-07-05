<!-- include the BotDetect layout stylesheet -->
<link type="text/css" rel="Stylesheet" href="<?php echo CaptchaUrls::LayoutStylesheetUrl() ?>" />

<?php
$email = array(
	'name'	=> 'email',
	'id'	=> 'email',
	'value'	=> set_value('email'),
	'maxlength'	=> 80,
	'size'	=> 30,
);

$botdetectCaptcha = array(
	'name'        => 'CaptchaCode',
	'id'          => 'CaptchaCode',
	'value'       => '',
	'maxlength'   => '100',
	'size'        => '50'
);
?>

<?php echo form_open($this->uri->uri_string()); ?>
<table>
	<tr>
		<td><?php echo form_label('Email Address', $email['id']); ?></td>
		<td><?php echo form_input($email); ?></td>
		<td style="color: red;"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></td>
	</tr>

	<tr>
		<td>Captcha</td>
		<td> 
			<!-- Show captcha image -->
			<?php echo $captchaHtml; ?>
			<?php echo form_input($botdetectCaptcha); ?>
		</td>
		<td style="color: red;">
			<!-- Captcha validation failed, show error message -->
			<?php echo form_error('CaptchaCode'); ?>
			<?php echo isset($errors['captchaValidationMessage'])? $errors['captchaValidationMessage'] : ''; ?>
		</td>
  	</tr>
  	
</table>
<?php echo form_submit('send', 'Send'); ?>
<?php echo form_close(); ?>