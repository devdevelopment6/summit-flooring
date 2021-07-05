<?php 
/* Template Name: Inner Template
*/ 

get_header();

if($_REQUEST['actions']=='submitRequest'){
   global $wpdb; 
    $request_name=$_POST['request_name'];
    $request_email=$_POST['request_email'];
    $company=$_POST['company'];
    $request_phone=$_POST['request_phone'];
    $project_name=$_POST['project_name'];
    $street=$_POST['street'];
    $city=$_POST['city'];
    $zip_code=$_POST['zip_code'];
    $color_swatch=$_POST['color_swatch'];

        $wpdb->insert( 
          'wp_sample_request', 
          array( 
              'name'     => $request_name,
              'email' => $request_email,
              'company' => $company,
              'phone'   => $request_phone,
              'project_name'   => $project_name,
              'street'   => $street,
              'city'   => $city,
              'zip_code'   => $zip_code,
              'color_swatch'   => $color_swatch
          )
        );
      $record_id = $wpdb->insert_id;
    
      if ($record_id != '') 
      {  

      $to = $request_email;
      $subject='Summit Flooring Sample Request';
      
      $message ='<table width="500" border="0" align="left">
        <tr>
          <th align="left" scope="col" colspan="2"><h3>Summit Flooring Sample Request </h3></th>
        </tr>
        
        <tr>
          <td scope="col" width="150"><b>Name:</b>&nbsp;</td>
          <td scope="col" width="350">'.$request_name.'</td>
        </tr>

        <tr>
          <td scope="col" width="150"><b>Email:</b>&nbsp;</td>
          <td scope="col" width="350">'.$request_email.'</td>
        </tr>

        <tr>
          <td scope="col" width="150"><b>company:</b>&nbsp;</td>
          <td scope="col" width="350">'.$company.'</td>
        </tr>
        
        <tr>
          <td scope="col" width="150"><b>Phone:</b>&nbsp;</td>
          <td scope="col" width="350">'.$request_phone.'</td>
        </tr>
        <tr>
          <td scope="col" width="150"><b>Project Name:</b>&nbsp;</td>
          <td scope="col" width="350">'.$project_name.'</td>
        </tr> 
        <tr>
          <td scope="col" width="150"><b>Street:</b>&nbsp;</td>
          <td scope="col" width="350">'.$street.'</td>
        </tr>
        <tr>
          <td scope="col" width="150"><b>City:</b>&nbsp;</td>
          <td scope="col" width="350">'.$city.'</td>
        </tr>
        <tr>
          <td scope="col" width="150"><b>Zip Code:</b>&nbsp;</td>
          <td scope="col" width="350">'.$zip_code.'</td>
        </tr>
        <tr>
          <td scope="col" width="150"><b>Color Swatch:</b>&nbsp;</td>
          <td scope="col" width="350">'.$color_swatch.'</td>
        </tr>

      </table>';
      //echo $message;die;
                 
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
      // More headers
      $headers .= 'From: <info@summitflooring.com>' . "\r\n";

      mail($to, $subject, $message, $headers);
         // header('Location:/thankyou.html');
         
        //echo '<meta http-equiv=Refresh content="0;url=page.php?reload=1">';       
    }
  //echo '<script type="text/javascript">window.location.href = "thank-you?id='.base64_encode($record_id).'"</script>'; 

  
}


 ?>

<link href="<?php echo get_template_directory_uri();?>/assets/css/innerStyle.css" rel="stylesheet" type="text/css" />



<div class="js-offcanvas" id="mobile-nav"></div>
    </div>

    <div class="content_primary">

      



    <?php

    // Show the selected front page content.

    if ( have_posts() ) :

      while ( have_posts() ) :

        the_post();

        get_template_part( 'template-parts/innerpage/inner', 'page' );

      endwhile;

    else :

      get_template_part( 'template-parts/post/content', 'none' );

    endif;

    ?>




    </div>	



	

<?php

get_footer();

?>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>

  <script type="text/javascript">

      function showImage(imgName) {
       var curImage = document.getElementById('currentImg');
       var thePath = '';
       var theSource = thePath + imgName;
       curImage.src = theSource;
       curImage.alt = imgName;
       curImage.title = imgName;
    }
    </script>