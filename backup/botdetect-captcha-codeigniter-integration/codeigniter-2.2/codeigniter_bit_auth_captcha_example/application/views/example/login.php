<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<style type="text/css">
		body { margin: 0; padding: 0; font-size: 10pt; font-family: Verdana, Arial, sans-serif; }
		form { width: 400px; margin: 0 auto; padding: 10px; border: 1px solid #666; }
		label, input[type=text], input[type=password] { display: block; width: 100%; }
		input { margin-bottom: 8px; }
		#bottom { width: 420px; padding: 10px 0; margin: 0 auto; }
		#header { font-size: 1.4em; font-weight: bold; width: 420px; margin: 60px auto 0 auto; text-align: center; }
		.error { color: #940D0A; font-weight: bold; }
	</style>
	<title>BitAuth: Login</title>

	<link type="text/css" rel="Stylesheet" href="<?php echo CaptchaUrls::LayoutStylesheetUrl() ?>" />


</head>
<body>
<?php
	echo '<div id="header">BitAuth Example: Login</div>';

	echo form_open(current_url());
	echo form_label('Username','username');
	echo form_input('username');
	echo form_label('Password','password');
	echo form_password('password');

	// Show captcha image 
	echo $captchaHtml; 

	$botdetectCaptcha = array(
		'name'        => 'CaptchaCode',
		'id'          => 'CaptchaCode',
		'value'       => '',
		'maxlength'   => '100',
		'size'        => '50'
	);
	echo form_input($botdetectCaptcha);

	echo form_label(form_checkbox('remember_me', 1).' Remember Me', 'remember_me');
	echo form_submit('login','Login');
	echo ( ! empty($error) ? $error : '' );

	// Show captcha error message
	echo ( ! empty($captchaValidationMessage)? $captchaValidationMessage : '' );

	echo form_close();

	echo '<div id="bottom">';
	echo '<span style="float: right;">'.anchor('example/register', 'Register').'</span>';
	echo 'Username: <strong>admin</strong><br/>Password: <strong>admin</strong>';
	echo '</div>';

?>
</body>
</html>
