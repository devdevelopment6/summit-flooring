<link type="text/css" rel="Stylesheet" href="<?php echo CaptchaUrls::LayoutStylesheetUrl() ?>" />

<h1><?php echo lang('login_heading');?></h1>
<p><?php echo lang('login_subheading');?></p>

<div><?php echo $captchaValidationMessage;?></div>
<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("auth/login");?>

  <p>
    <?php echo lang('login_identity_label', 'identity');?>
    <?php echo form_input($identity);?>
  </p>

  <p>
    <?php echo lang('login_password_label', 'password');?>
    <?php echo form_input($password);?>
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

  <p>
    <?php echo lang('login_remember_label', 'remember');?>
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
  </p>

  <p><?php echo form_submit('submit', lang('login_submit_btn'));?></p>

<?php echo form_close();?>

<p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>