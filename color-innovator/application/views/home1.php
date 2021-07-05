
<!doctype html>
<html>
<head>
<title>Home</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSS Libs -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>home_assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/css/bootstrap-slider.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>home_assets/css/font-awesome.min.css">
	
<link href="https://fonts.googleapis.com/css?family=Lobster|Lobster+Two|Overpass" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Overpass:100,200,300,400,600,700,800,900" rel="stylesheet">
<!-- CSS App -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>home_assets/css/jquery.accordionjs.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>home_assets/css/style.css">
	
<!-- Javascript Libs -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-rc1/jquery.min.js"></script>

<script >var base_url = "<?php echo base_url();?>";</script>
</head>

<body>
<header>
  <div class="container">
    <div class="main-logo">
      <figure> <a href="#"><img src="<?php echo base_url();?>home_assets/img/logo.png"></a> </figure>
    </div>
    <div class="color-logo">
      <figure><a href="#"><img src="<?php echo base_url();?>home_assets/img/color-logo.jpg"></a></figure>
    </div>
  </div>
</header>
<div class="accordion-wrapper">
  <div class="accordion-tab-nav">
    <ul>
      <li><a href="#" class="active"><span>Mix</span></a></li>
      <li><a href="#"><span>Place</span></a></li>
      <li><a href="#"><span>Make</span></a></li>
    </ul>
  </div>
  <div id="container">
    <ul id="accordion">
      <li data-required="true" data-status="incomplete" data-selected="true"  data-title="Step 1" class='step1'>
        <div class="color-room">
          <div class="title">
            <h2>Color Room</h2>
            <ul>
              <li><em class="fa fa-circle" aria-hidden="true"></em>Please select your base colors</li>
              <li><em class="fa fa-circle" aria-hidden="true"></em>All colors with a Coarse / Fine option may be selected twice.</li>
            </ul>
          </div>
          <div class="color-bar">
            <ul>
			<?php 
				$i = 0;
				$each_color = array();
				foreach($colors as $color)
				{
					if($color->color_title != 'Black')
					{
						$each_color = (array)$color; 
						$i++;	
    		?>
              <li data-id="<?php echo $color->id; ?>" class="pick_color">
                <div class="color-point">
                  <figure><img src="<?php echo base_url(); ?>uploads/colors/<?php echo $color->color_img; ?>"></figure>
                  <figcaption><?php echo $color->color_title; ?></figcaption>
                </div>
              </li>
				<?php }
			}?>
             
            </ul>
			
          </div>
			<div class="col-lg-12" >
				<button type="reset" name="" value="" class="btn btn-sm btn-info  pull-right next_step2">Next</button>
			</div>
        </div>
		
      </li>
      <li data-required="true" data-status="incomplete" data-title="Step 2" class='step2' >
        <div class="innovation">
          <div class="title">
            <h2>Innovation Station</h2>
          </div>
          <div class="innovation-con">
            <ul class="list-style-disc">
              <li>Play with the percentages of your selected colors!</li>
              <li>Toggle between the Coarse and Fine options for a different look!</li>
              <li>Please ensure you have selected at least 5% black.</li>
              <li>Please ensure you have selected a minimum total of 15% fine granules.</li>
              <li>Percentages can be comprised of a maximum of 5 EPDM colors plus black.</li>
            </ul>
          </div>
          <div class="Product">
			<div class="add_extra">
				<div class="col-lg-4">
				  <div class="Product-part">
					<figure><img src="<?php echo base_url(); ?>/uploads/colors/granule_Black.jpg" ></figure>
					<div class="Product-desc">
					  <h5>Black</h5>
					  <ul>
						<li><a href="#">Fine</a></li>
						<li><a href="#">Coarse</a></li>
					  </ul>
					<input type="text" class="slider">
					<!-- <div class="progress">
						<div class="progress-value">80%</div>
						<div class="progress-bar" style="width:80%;"> </div>
					  </div>-->
					</div>
				  </div>
				</div>
			</div>
            <div class="col-lg-12">
              <div class="tootle-progress">
                <div class="meter orange nostripes"> <span style="width: 724px;"></span>
                  <h6>Progress</h6>
                  <p class="tot_progress">50%</p>
                </div>
              </div>
              <div class="btn">
                <button type="reset" name="" value="">reset</button>
                <button type="button" name="" value="">mix it</button>
              </div>
            </div>
          </div>
        </div>
      </li>
      <li data-required="true" data-status="optional" data-title="Step 3" class='step3'>
        <div class="custom-swatch">
          <div class="title">
            <h2>Your Custom Swatch</h2>
          </div>
          <div class="cs-content">
            <div class="col-md-5 p0">
              <div class="cs-img-box">
                <figure><img src="<?php echo base_url(); ?>home_assets/img/color-22.jpg" class="img-responsive" />
                  <div class="cs-overlay">
                    <ul>
                      <li><a href="#"><em class="fa fa-search"></em></a></li>
                      <li><a href="#"><em class="fa fa-trash"></em></a></li>
                      <li><a href="#"><em class="fa fa-facebook"></em></a></li>
                      <li><a href="#"><em class="fa fa-twitter"></em></a></li>
                    </ul>
                  </div>
                </figure>
              </div>
            </div>
            <div class="col-md-7 p0">
              <div class="sm-info">
                <div class="sm-pencil"><span>Name this Swatch</span> <em class="fa fa-pencil-square-o"></em></div>
                <div class="sm-title">
                  <h4>Your Formula</h4>
                </div>
                <ul class="sm-meta">
                  <li>Black - <span>Fine</span> - 25%</li>
                  <li>Turquoise - <span>Coarse</span> - 25%</li>
                  <li>Aqua - <span>Fine</span> - 15%</li>
                  <li>Blue - <span>Fine</span> - 15%</li>
                  <li>Royal Blue - <span>Fine</span> - 15%</li>
                  <li>Capari Blue - <span>Coarse</span> - 15% </li>
                </ul>
                <div class="sm-button"> <a href="#" class="btn btn-primary" >save to album</a> <a href="#" class="btn btn-secondary">Send To email</a> </div>
              </div>
            </div>
            <div class="swatch-gallery">
              <h4>Saved Swatch Gallery</h4>
              <div class="row">
                <ul>
                  <li>
                    <figure><img src="<?php echo base_url(); ?>home_assets/img/color-15.jpg" class="img-responsive"><a href="#" class="sg-close"><em class="fa fa-times" aria-hidden="true"></em></a></figure>
                  </li>
                  <li>
                    <figure><img src="<?php echo base_url(); ?>home_assets/img/color-10.jpg" class="img-responsive"><a href="#" class="sg-close"><em class="fa fa-times" aria-hidden="true"></em></a></figure>
                  </li>
                  <li>
                    <figure><img src="<?php echo base_url(); ?>home_assets/img/color-5.jpg" class="img-responsive"><a href="#" class="sg-close"><em class="fa fa-times" aria-hidden="true"></em></a></figure>
                  </li>
                  <li>
                    <figure><img src="<?php echo base_url(); ?>home_assets/img/color-9.jpg" class="img-responsive"><a href="#" class="sg-close"><em class="fa fa-times" aria-hidden="true"></em></a></figure>
                  </li>
                  <li>
                    <figure><img src="<?php echo base_url(); ?>home_assets/img/color-3.jpg" class="img-responsive"><a href="#" class="sg-close"><em class="fa fa-times" aria-hidden="true"></em></a></figure>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </div>
</div>

<!-- Javascript Libs --> 

<script type="text/javascript" src="<?php echo base_url();?>home_assets/js/bootstrap.min.js"></script> 
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/10.0.0/bootstrap-slider.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>home_assets/js/jquery.accordionjs.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>home_assets/js/scripts.js"></script> 
<!-- Javascript -->
	<script type="text/javascript">
		$("input.slider").bootstrapSlider({ min: 0, max: 100,formatter: function(value) {
		return 'Current value: ' + value;
	},});
	</script>
</body>
</html>
