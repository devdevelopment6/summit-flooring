<!DOCTYPE html>
<html>
   <head>
      <title>Sample Request - Summit Flooring</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body style="margin:0px;">
      <div style="width: 680px; margin:0 auto; font-size:18px; line-height: 1.5; background-color:#f5f5f5; padding:25px; ">
         <div style="">
            <div style="text-align: right;">
               <img  style="width:190px;height:77px;" src="https://www.summit-flooring.com/color-conductor/home_assets/images/logo.png" alt="Color Conductor Logo">
            </div>
            <table style="width: 680px;">
               <tr>
                  <td>
                     <table style="width: 680px;">
								<tr>
									<td>
										<img src="<?php echo $swatch_image; ?>" style="width:325px;height:270px" />
									</td>
									<td>
										<ul style="display:inline-block;"><?php echo $swatch_formula; ?></ul>
									</td>
								</tr>
							</table>
                  </td>
               </tr>
			   <tr>
			   <td colspan="2">&nbsp;</td>
			   </tr>
               <tr>
                  <td>
                     <table style="width: 680px;" border="1">
                        <tr>
									<td>Name</td>
									<td><?php echo $sample_request_data['name']; ?></td>
                        </tr>
                        <tr>
									<td>Company</td>
									<td><?php echo $sample_request_data['company']; ?></td>
                        </tr>
                        <tr>
									<td>Address</td>
									<td><?php echo $sample_request_data['address']; ?></td>
                        </tr>
                        <tr>
									<td>City</td>
									<td><?php echo $sample_request_data['city']; ?></td>
                        </tr>
                        <tr>
									<td>State</td>
									<td><?php echo $sample_request_data['state']; ?></td>
                        </tr>
                        <tr>
									<td>Zipcode/Postal Code</td>
									<td><?php echo $sample_request_data['zipcode']; ?></td>
                        </tr>
                        <tr>
									<td>Email</td>
									<td><?php echo $sample_request_data['email_id']; ?></td>
                        </tr>
                        <tr>
									<td>Telephone</td>
									<td><?php echo $sample_request_data['telephone']; ?></td>
                        </tr>
                        <tr>
									<td>Fax</td>
									<td><?php echo $sample_request_data['fax']; ?></td>
                        </tr>
                        <tr>
									<td>Tell us about yourself</td>
									<td><?php echo $sample_request_data['yourself']; ?></td>
                        </tr>
                        <tr>
									<td>Project Description</td>
									<td><?php echo $sample_request_data['self_description']; ?></td>
                        </tr>
                     </table>
                  </td>
               </tr>
			    <tr>
			   <td colspan="2">&nbsp;</td>
			   </tr>
					<tr>
						<td>
							<img  style="width:284px;height:96px;" src="https://www.summit-flooring.com/color-conductor/home_assets/images/submit-flooring.png" alt="Summit Flooring Logo">
						</td>
					</tr>
            </table>
         </div>
      </div>
   </body>
</html>
