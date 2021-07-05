<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Color_image_lib {

	function __construct()
	{

	}

	public function createImage($formula)
	{
		
		// 
		/*$percent_adjust_array = array(
			 '0'	 => '0',
			 '5'	 => '5',
			 '10'	 => '7',
			 '15'	 => '8',
			 '20'	 => '8',
 			 '25'	 => '13',
			 '30'	 => '13',
			 '35'	 => '17',
			 '40'	 => '17',
			 '45'	 => '18',
			 '50'	 => '20',
			 '55'	 => '25',
			 '60'	 => '25',
			 '65'	 => '30',
			 '70'	 => '30',
			 '75'	 => '30',
			 '80'	 => '30',
			 '85'	 => '40',
			 '90'	 => '50',
			 '95'	 => '55',
			 '100'	 => '100'
		);*/
		$percent_adjust_array = array(
			 '0'	 => '0',
			 '1'	 => '0',
			 '2'	 => '0',
			 '3'	 => '5',
			 '4'	 => '5',
			 '5'	 => '5',
			 '6'	 => '5',
			 '7'	 => '5',
			 '8'	 => '7',
			 '9'	 => '7',
			 '10'	 => '7',
			 '11'	 => '7',
			 '12'	 => '7',
			 '13'	 => '7',
			 '14'	 => '8',
			 '15'	 => '8',
			 '16'	 => '8',
			 '17'	 => '8',
			 '18'	 => '8',
			 '19'	 => '8',
			 '20'	 => '8',
			 '21'	 => '8',
			 '22'	 => '8',
			 '23'	 => '13',
			 '24'	 => '13',
 			 '25'	 => '13',
			 '26'	 => '13',
			 '27'	 => '13',
			 '28'	 => '13',
			 '29'	 => '13',
			 '30'	 => '13',
			 '31'	 => '13',
			 '32'	 => '13',
			 '33'	 => '17',
			 '34'	 => '17',
			 '35'	 => '17',
			 '36'	 => '17',
			 '37'	 => '17',
			 '38'	 => '17',
			 '39'	 => '17',
			 '40'	 => '17',
			 '41'	 => '17',
			 '42'	 => '17',
			 '43'	 => '18',
			 '44'	 => '18',
			 '45'	 => '18',
			 '46'	 => '18',
			 '47'	 => '18',
			 '48'	 => '20',
			 '49'	 => '20',
			 '50'	 => '20',
			 '51'	 => '20',
			 '52'	 => '20',
			 '53'	 => '20',
			 '54'	 => '25',
			 '55'	 => '25',
			 '56'	 => '25',
			 '57'	 => '25',
			 '58'	 => '25',
			 '59'	 => '25',
			 '60'	 => '25',
			 '61'	 => '25',
			 '62'	 => '25',
			 '63'	 => '30',
			 '64'	 => '30',
			 '65'	 => '30',
			 '66'	 => '30',
			 '67'	 => '30',
			 '68'	 => '30',
			 '69'	 => '30',
			 '70'	 => '30',
			 '71'	 => '30',
			 '72'	 => '30',
			 '73'	 => '30',
			 '74'	 => '30',
			 '75'	 => '30',
			 '76'	 => '30',
			 '77'	 => '30',
			 '78'	 => '30',
			 '79'	 => '30',
			 '80'	 => '30',
			 '81'	 => '30',
			 '82'	 => '30',
			 '83'	 => '40',
			 '84'	 => '40',
			 '85'	 => '40',
			 '86'	 => '40',
			 '87'	 => '40',
			 '88'	 => '50',
			 '89'	 => '50',
			 '90'	 => '50',
			 '91'	 => '50',
			 '92'	 => '50',
			 '93'	 => '55',
			 '94'	 => '55',
			 '95'	 => '55',
			 '96'	 => '55',
			 '97'	 => '55',
			 '98'	 => '100',
			 '99'	 => '100',
			 '100'	 => '100'
		);

		// header('Content-type: image/png');
		$height = 295;
		$width = 325;

		//$png_image = imagecreate(325, 295);
		$png_image = imagecreatetruecolor(325, 295);
		imagecolorallocate($png_image, 0, 0, 0);
		$info = $formula;
		for ($k = 0; $k < 35; $k++)
		{
			for ($i = 0; $i < count($info) - 1; $i++)
			{
				//get coarse and fine images from folder and arrange in acsending order
				$directory_png = "assets/images/coarse/";
				$coarse_array = scandir($directory_png);
				$directory_fine_png = "assets/images/fine/";
				$fine_array = scandir($directory_fine_png);
				if (count($info) - 1 <= 3)
				{
					//get percentages from array and get corrosponding value from percentage array
					$current_percent_input = $info[$i]['percent'];
					$current_percent_adjusted = $percent_adjust_array[$current_percent_input];
					//check for black color--- black needs to be coarse
					if ($info[$i]["flecks_size"] == "Coarse" || ($info[$i]["r"] == 0 && $info[$i]["g"] == 0 && $info[$i]["b"] == 0 && $info[0]['percent'] >= 35))
					{
						//if true then get the random image to be coarse from coarse array
						$x = rand(2, count($coarse_array) - 1);
						$directory_png.= $coarse_array[$x];
						$white_fleck = $directory_png;
						//die;
						
						//set percentage
						$percent = 0.55;
						//get size of new image
						list($wh, $he) = getimagesize($white_fleck); // get new sizes;
						$newWidth = $wh * $percent;
						
						//create image form new image 
						$newHeight = $he * $percent;
						$source = imagecreatefrompng($white_fleck);
						
						//count total area for new image
						$totalArea = $width * $height; 
						//count flack area
						$fleckArea = ($newWidth * $newHeight) / 3.5;
						
						//cover area with image
						if ($info[$i]["r"] == 0 && $info[$i]["g"] == 0 && $info[$i]["b"] == 0)
						{
							//if black get percent from org array
							$coverArea = $totalArea * ($current_percent_input / 100);
						}
						else
						{
							// get % from corrosponding value from percent_adjust_array
							$coverArea = $totalArea * ($current_percent_adjusted / 100);
						}
						$numOfFlecks = ($coverArea / $fleckArea) - 45;
						//set color for given values
						imagecolorset($source, 0, $info[$i]["r"], $info[$i]["g"], $info[$i]["b"]);
					}
					else
					{
						// For fine colors
						$x = rand(2, count($fine_array) - 1);
						$directory_fine_png.= $fine_array[$x];
						$white_fleck = $directory_fine_png;
						$percent = 0.60;
						list($wh, $he) = getimagesize($white_fleck); // get new sizes;
						$newWidth = $wh * $percent;
						$newHeight = $he * $percent;
						$source = imagecreatefrompng($white_fleck);
						$totalArea = $width * $height;
						$fleckArea = ($newWidth * $newHeight) / 3.5;
						if ($info[$i]["r"] == 0 && $info[$i]["g"] == 0 && $info[$i]["b"] == 0)
						{
							//if black get percent from org array
							$coverArea = $totalArea * ($current_percent_input / 100);
						}
						else
						{
							// get % from corrosponding value from percent_adjust_array
							$coverArea = $totalArea * ($current_percent_adjusted / 100);
						}

						$numOfFlecks = ($coverArea / $fleckArea) - 185; //200
						imagecolorset($source, 0, $info[$i]["r"], $info[$i]["g"], $info[$i]["b"]);
					}
				}
				else
				{
					//print_r($info[$i]);
					//echo '----';
					if ($info[$i]["flecks_size"] === "Coarse" || ($info[$i]["r"] === 0 && $info[$i]["g"] === 0 && $info[$i]["b"] === 0 && $info[0]['percent'] >= 35))
					{
						$x = rand(2, count($coarse_array) - 1);
						$directory_png.= $coarse_array[$x];
						$white_fleck = $directory_png;

						$percent = 0.55;
						list($wh, $he) = getimagesize($white_fleck); // get new sizes;
						$newWidth = $wh * $percent;
						$newHeight = $he * $percent;
						$source = imagecreatefrompng($white_fleck);

						$totalArea = $width * $height;
						$fleckArea = ($newWidth * $newHeight) / 2.8;
						$coverArea = $totalArea * ($info[$i]["percent"] / 100);

						$numOfFlecks = ($coverArea / $fleckArea) - 75;
						imagecolorset($source, 0, $info[$i]["r"], $info[$i]["g"], $info[$i]["b"]);
					}
					else
					{
						$x = rand(2, count($fine_array) - 1);

						$directory_fine_png.= $fine_array[$x];
						$white_fleck = $directory_fine_png;

						$percent = 0.60;
						list($wh, $he) = getimagesize($white_fleck); // get new sizes;
						$newWidth = $wh * $percent;
						$newHeight = $he * $percent;
						$source = imagecreatefrompng($white_fleck);
						$totalArea = $width * $height;
						$fleckArea = ($newWidth * $newHeight) / 2.8;
						$coverArea = $totalArea * (($info[$i]["percent"]) / 100);

						$numOfFlecks = ($coverArea / $fleckArea) - 100; //300
						imagecolorset($source, 0, $info[$i]["r"], $info[$i]["g"], $info[$i]["b"]);
					}
				}

				$xy_array = array();
				for ($j = 0; $j < ($numOfFlecks) / 2; $j++)
				{
					$x1 = rand(-10, $width - 1);
					$y1 = rand(-10, $height - 1);
					$xy_array = array("x" => $x1, "y" => $y1);
					imagecopyresampled($png_image, $source, $x1, $y1, 0, 0, $newWidth, $newHeight, $wh, $he);
				}
			}
		}
//output
		$src = imagecreatefrompng('assets/images/background/grey50_old.png');
		imagelayereffect($src, IMG_EFFECT_OVERLAY);
		imagecopymerge($png_image, $src, 0, 0, 0, 0, 325, 295, 20);
		imagealphablending($png_image, TRUE);
		$file_Name = NULL;
		for ($i = 0; $i < count($info) - 1; $i++)
		{
			$file_Chunks = $info[$i]['id'].'_'.$info[$i]['percent'] . '_' . $info[$i]['r'] . '_' . $info[$i]['g'] . '_' . $info[$i]['b'] . '_' . $info[$i]['flecks_size'] . '-';
			$file_Name.=$file_Chunks;
		}
		$file_Name.=$info[sizeof($info) - 1]['time_stamp'];
		imagepng($png_image, 'images/' . $file_Name . '.jpg');
		imagedestroy($src);
		imagedestroy($png_image);
	}

}
