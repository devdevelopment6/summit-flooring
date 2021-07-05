<!-- include the BotDetect layout stylesheet -->
<link type="text/css" rel="Stylesheet" href="<?php echo CaptchaUrls::LayoutStylesheetUrl() ?>" />

<?php

$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
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

if ($this->config->item('use_username', 'tank_auth')) {
	$login_label = 'Email or login';
} else {
	$login_label = 'Email';
}
?>
<?php echo form_open($this->uri->uri_string()); ?>
<table>
	<tr>
		<td colspan="2" style="color: red;">
			<?php echo form_error($login['name']); ?>
			<?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?>

			<!-- Show captcha error message -->
			<?php echo form_error('CaptchaCode'); ?>
			<?php echo isset($errors['captchaValidationMessage'])? $errors['captchaValidationMessage'] : ''; ?>
		</td>
	</tr>

	<tr>
		<td><?php echo form_label($login_label, $login['id']); ?></td>
		<td><?php echo form_input($login); ?></td>
	</tr>

	<tr>
		<td>Captcha</td>
		<td> 
			<!-- Show captcha image -->
			<?php echo $captchaHtml; ?>
			<?php echo form_input($botdetectCaptcha); ?>
		</td>
  	</tr>

</table>
<?php echo form_submit('reset', 'Get a new password'); ?>
<?php echo form_close(); ?>