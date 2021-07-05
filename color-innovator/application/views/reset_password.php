<?php

$last = $this->uri->total_segments();

$record_num = $this->uri->segment($last);

?>

<html lang="en"><head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <meta charset="utf-8">

    <title>Admin Login</title>



    <meta name="description" content="User login page">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">



    <!-- bootstrap & fontawesome -->

    <link rel="stylesheet" href="<?php echo base_url();?>admin_assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?php echo base_url();?>admin_assets/font-awesome/4.2.0/css/font-awesome.min.css">



    <!-- text fonts -->

    <link rel="stylesheet" href="<?php echo base_url();?>admin_assets/fonts/fonts.googleapis.com.css">



    <!-- ace styles -->

    <link rel="stylesheet" href="<?php echo base_url();?>admin_assets/css/ace.min.css">



    <!--[if lte IE 9]>

    <link rel="stylesheet" href="assets/css/ace-part2.min.css" />

    <![endif]-->

    <link rel="stylesheet" href="<?php echo base_url();?>admin_assets/css/ace-rtl.min.css">



    <!--[if lte IE 9]>

    <link rel="stylesheet" href="assets/css/ace-ie.min.css" />

    <![endif]-->



    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->



    <!--[if lt IE 9]>

    <script src="assets/js/html5shiv.min.js"></script>

    <script src="assets/js/respond.min.js"></script>

    <![endif]-->



    <link rel="stylesheet" href="<?php echo base_url();?>/admin_assets/css/techybirds.css">

    <!--<script type="text/javascript" src="http://techybirds.com/testserver/mitali_kuhlmanns/assets/js/jquery.min.js"></script>-->



</head>



<body class="login-layout" cz-shortcut-listen="true">

<input type="hidden" value="<?php echo base_url();?>" id="base_path">

<div class="main-container">

    <div class="main-content">

        <div class="row">

            <div class="col-sm-10 col-sm-offset-1">

                <div class="login-container">

                    <div class="center">

                        <h1>

                            <i class="ace-icon fa fa-leaf green"></i>

                            <span class="red">Admin Panel</span>

                            <span class="white" id="id-text2"> - Event</span>

                        </h1>

                    </div>



                    <div class="space-6"></div>



                    <div class="position-relative">

                        <div id="forgot-box" class="forgot-box widget-box no-border visible">

                            <div class="widget-body">

                                <div class="widget-main">

                                    <h4 class="header red lighter bigger">

                                        <i class="ace-icon fa fa-key"></i>

                                        Reset Password

                                    </h4>



                                    <div class="space-6"></div>

                                    <form action="<?php echo base_url(); ?>admin_login/resetnew_password/<?php echo $record_num; ?>" method="post">

                                        <fieldset>

                                            <label class="block clearfix">Password:

														<span class="block input-icon input-icon-right">

															<input type="password" class="form-control" placeholder="password" name="pass">

															<i class="ace-icon fa fa-envelope"></i>

														</span>

                                            </label>



                                            <label class="block clearfix">Confirm Password:

														<span class="block input-icon input-icon-right">

															<input type="password" class="form-control" placeholder="Confirm password" name="conf_pass">

															<i class="ace-icon fa fa-envelope"></i>

														</span>

                                            </label>

                                            <div class="clearfix">

                                                <button type="submit" class="width-35 pull-right btn btn-sm btn-danger">

                                                    <i class="ace-icon fa fa-lightbulb-o"></i>

                                                    <span class="bigger-110">Reset</span>

                                                </button>

                                            </div>

                                        </fieldset>

                                    </form>

                                </div><!-- /.widget-main -->



                                <div class="toolbar center">

                                    <a href="#" data-target="#login-box" class="back-to-login-link">

                                        Back to login

                                        <i class="ace-icon fa fa-arrow-right"></i>

                                    </a>

                                </div>

                            </div><!-- /.widget-body -->

                        </div><!-- /.forgot-box -->

                    </div><!-- /.position-relative -->



                    <div class="navbar-fixed-top align-right">

                        <br>

                        &nbsp;

                        <a id="btn-login-dark" href="#">Dark</a>

                        &nbsp;

                        <span class="blue">/</span>

                        &nbsp;

                        <a id="btn-login-blur" href="#">Blur</a>

                        &nbsp;

                        <span class="blue">/</span>

                        &nbsp;

                        <a id="btn-login-light" href="#">Light</a>

                        &nbsp; &nbsp; &nbsp;

                    </div>

                </div>

            </div><!-- /.col -->

        </div><!-- /.row -->

    </div><!-- /.main-content -->

</div><!-- /.main-container -->



<!-- basic scripts -->



<!--[if !IE]> -->

<script src="http://techybirds.com/testserver/mitali_kuhlmanns/assets/js/jquery.2.1.1.min.js"></script>



<!-- <![endif]-->



<!--[if IE]>

<script src="http://techybirds.com/testserver/mitali_kuhlmanns/assets/js/jquery.1.11.1.min.js"></script>

<![endif]-->



<!--[if !IE]> -->

<script type="text/javascript">

    window.jQuery || document.write("<script src='http://techybirds.com/testserver/mitali_kuhlmanns/assets/js/jquery.min.js'>"+"<"+"/script>");

</script>



<!-- <![endif]-->



<!--[if IE]>

<script type="text/javascript">

    window.jQuery || document.write("<script src='http://techybirds.com/testserver/mitali_kuhlmanns/assets/js/jquery1x.min.js'>"+"<"+"/script>");

</script>

<![endif]-->

<script type="text/javascript">

    if('ontouchstart' in document.documentElement) document.write("<script src='http://techybirds.com/testserver/mitali_kuhlmanns/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");

</script>



<!-- inline scripts related to this page -->

<script type="text/javascript">

    jQuery(function($) {

        $(document).on('click', '.toolbar a[data-target]', function(e) {

            e.preventDefault();

            var target = $(this).data('target');

            $('.widget-box.visible').removeClass('visible');//hide others

            $(target).addClass('visible');//show target

        });

    });



    //you don't need this, just used for changing background

    jQuery(function($) {

        $('#btn-login-dark').on('click', function(e) {

            $('body').attr('class', 'login-layout');

            $('#id-text2').attr('class', 'white');

            $('#id-company-text').attr('class', 'blue');



            e.preventDefault();

        });

        $('#btn-login-light').on('click', function(e) {

            $('body').attr('class', 'login-layout light-login');

            $('#id-text2').attr('class', 'grey');

            $('#id-company-text').attr('class', 'blue');



            e.preventDefault();

        });

        $('#btn-login-blur').on('click', function(e) {

            $('body').attr('class', 'login-layout blur-login');

            $('#id-text2').attr('class', 'white');

            $('#id-company-text').attr('class', 'light-blue');



            e.preventDefault();

        });



    });

</script>



<script type="text/javascript" src="http://techybirds.com/testserver/mitali_kuhlmanns/assets/js/jquery.validate.min.js"></script>

<script type="text/javascript" src="http://techybirds.com/testserver/mitali_kuhlmanns/assets/js/techybirds.js"></script>







</body></html>