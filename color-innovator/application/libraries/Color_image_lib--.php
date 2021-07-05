<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Color_image_lib {

	function __construct()
	{

	}

	public function createImage($formula)
	{
		$arr_degrees = array("10", "20", "30", "40", "50", "60", "70", "80", "90", "100", "110", "120", "130", "140", "150", "160", "170", "180");

		// header('Content-type: image/png');
		$height = 380;
		$width = 420;

		//$png_image = imagecreate(325, 295);
		$png_image = imagecreatetruecolor(420, 380);
		imagecolorallocate($png_image, 0, 0, 0);
		$info = $formula;
		//echo '<pre>';
		//print_r($info);

		
		for ($k = 0; $k < 30; $k++)
		{
			for ($i = 0; $i < count($info) - 1; $i++)
			{
				$numOfFlecks = 0;
				//get coarse and fine images from folder and arrange in acsending order
				$directory_png = "assets/images/coarse/";
				$coarse_array = scandir($directory_png);
				$directory_fine_png = "assets/images/fine/";
				$fine_array = scandir($directory_fine_png);
				if (count($info) - 1 <= 3)
				{
					//get percentages from array and get corrosponding value from percentage array
					//check for black color--- black needs to be coarse
					if ($info[$i]["flecks_size"] == "Coarse" && ($info[$i]["r"] != 157 && $info[$i]["g"] != 107 && $info[$i]["b"] != 61))
					{
						//if true then get the random image to be coarse from coarse array
						$x = rand(2, count($coarse_array) - 1);
						$directory_png .= $coarse_array[$x];
						$white_fleck = $directory_png;
						//die;
						//set percentage
						$percent = 0.65;
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
						// get % from corrosponding value from percent_adjust_array
						$coverArea = $totalArea * ($info[$i]['percent'] / 100);
						$numOfFlecks = ($coverArea / $fleckArea) - 85;
						//set color for given values
						imagecolorset($source, 0, $info[$i]["r"], $info[$i]["g"], $info[$i]["b"]);
					}
					else if ($info[$i]["r"] == 157 && $info[$i]["g"] == 107 && $info[$i]["b"] == 61)
					{
						$x = rand(2, count($fine_array) - 1);
						$directory_fine_png .= $fine_array[$x];
						$white_fleck = $directory_fine_png;
						$percent = 0.60;
						list($wh, $he) = getimagesize($white_fleck); // get new sizes;
						$newWidth = $wh * $percent;
						$newHeight = $he * $percent;
						$source = imagecreatefrompng($white_fleck);
						$totalArea = $width * $height;
						$fleckArea = ($newWidth * $newHeight) / 3.5;
						// get % from corrosponding value from percent_adjust_array
						$coverArea = $totalArea * 0.10;

						$numOfFlecks = ($coverArea / $fleckArea) - 185; //200
						imagecolorset($source, 0, $info[$i]["r"], $info[$i]["g"], $info[$i]["b"]);
					}
					else if ($info[$i]["flecks_size"] == "Fine" && ($info[$i]["r"] != 157 && $info[$i]["g"] != 107 && $info[$i]["b"] != 61))
					{
						// For fine colors
						$x = rand(2, count($fine_array) - 1);
						$directory_fine_png .= $fine_array[$x];
						$white_fleck = $directory_fine_png;
						$percent = 0.60;
						list($wh, $he) = getimagesize($white_fleck); // get new sizes;
						$newWidth = $wh * $percent;
						$newHeight = $he * $percent;
						$source = imagecreatefrompng($white_fleck);
						$totalArea = $width * $height;
						$fleckArea = ($newWidth * $newHeight) / 3.5;
						// get % from corrosponding value from percent_adjust_array
						$coverArea = $totalArea * ($info[$i]['percent'] / 100);

						$numOfFlecks = ($coverArea / $fleckArea) - 185; //200
						imagecolorset($source, 0, $info[$i]["r"], $info[$i]["g"], $info[$i]["b"]);
					}
				}
				else
				{
					//get percentages from array and get corrosponding value from percentage array
					if ($info[$i]["flecks_size"] === "Coarse" && ($info[$i]["r"] != 157 && $info[$i]["g"] != 107 && $info[$i]["b"] != 61))
					{
						$x = rand(2, count($coarse_array) - 1);
						$directory_png .= $coarse_array[$x];
						$white_fleck = $directory_png;

						$percent = 0.55;
						list($wh, $he) = getimagesize($white_fleck); // get new sizes;
						$newWidth = $wh * $percent;
						$newHeight = $he * $percent;
						$source = imagecreatefrompng($white_fleck);

						$totalArea = $width * $height;
						$fleckArea = ($newWidth * $newHeight) / 2.8;
						$coverArea = $totalArea * ($info[$i]['percent'] / 100);

						$numOfFlecks = ($coverArea / $fleckArea) - 75;
						imagecolorset($source, 0, $info[$i]["r"], $info[$i]["g"], $info[$i]["b"]);
					}
					else if ($info[$i]["r"] == 157 && $info[$i]["g"] == 107 && $info[$i]["b"] == 61)
					{
						$x = rand(2, count($fine_array) - 1);

						$directory_fine_png .= $fine_array[$x];
						$white_fleck = $directory_fine_png;

						$percent = 0.60;
						list($wh, $he) = getimagesize($white_fleck); // get new sizes;
						$newWidth = $wh * $percent;
						$newHeight = $he * $percent;
						$source = imagecreatefrompng($white_fleck);
						$totalArea = $width * $height;
						$fleckArea = ($newWidth * $newHeight) / 2.8;
						$coverArea = $totalArea * 0.10;

						$numOfFlecks = ($coverArea / $fleckArea) - 100; //300
						imagecolorset($source, 0, $info[$i]["r"], $info[$i]["g"], $info[$i]["b"]);
					}
					else
					{
						if (($info[$i]["flecks_size"] != "Coarse")&&($info[$i]["flecks_size"] != "Chunk")&&($info[$i]["r"] != 157 && $info[$i]["g"] != 107 && $info[$i]["b"] != 61))
						{
							$x = rand(2, count($fine_array) - 1);

							$directory_fine_png .= $fine_array[$x];
							$white_fleck = $directory_fine_png;

							$percent = 0.60;
							list($wh, $he) = getimagesize($white_fleck); // get new sizes;
							$newWidth = $wh * $percent;
							$newHeight = $he * $percent;
							$source = imagecreatefrompng($white_fleck);
							$totalArea = $width * $height;
							$fleckArea = ($newWidth * $newHeight) / 2.8;
							$coverArea = $totalArea * ($info[$i]['percent'] / 100);

							$numOfFlecks = ($coverArea / $fleckArea) - 90; //300
							imagecolorset($source, 0, $info[$i]["r"], $info[$i]["g"], $info[$i]["b"]);
						}
					}
				}

				$xy_array = array();
				for ($j = 0; $j < ($numOfFlecks) / 2; $j++)
				{
					//imagerotate($source,$arr_degrees[rand(0,9)],0);
					$x1 = rand(-10, $width - 1);
					$y1 = rand(-10, $height - 1);
					$xy_array = array("x" => $x1, "y" => $y1);
					imagecopyresampled($png_image, $source, $x1, $y1, 0, 0, $newWidth, $newHeight, $wh, $he);
					imagerotate($source, $arr_degrees[rand(0, 17)], 0);
				}
			}
		}


		//for chunks
		for ($i = 0; $i < count($info) - 1; $i++)
		{
			if ($info[$i]["flecks_size"] == "Chunk")
			{
				for ($j = 0; $j < 4; $j++)
				{
					for ($k = 0; $k < 4; $k++)
					{
						$white_fleck = "assets/images/chunk/grain-chunks-".$k.".png";
						
						//set percentage
						$percent = 0.85;

						//get size of new image
						list($wh, $he) = getimagesize($white_fleck); // get new sizes;
						$newWidth = $wh * $percent;

						//create image form new image
						$newHeight = $he * $percent;
						$source = imagecreatefrompng($white_fleck);

						//count total area for new image
						$totalArea = $width * $height;
						//count flack area
						$fleckArea = ($newWidth * $newHeight) / 3.3;

						//cover area with image
						// get % from corrosponding value from percent_adjust_array
						$coverArea = $totalArea * ($info[$i]['percent'] / 100);

						$numOfFlecks = ($coverArea / $fleckArea) - ($info[$i]['percent'] * 6);
						//set color for given values
						imagecolorset($source, 0, $info[$i]["r"], $info[$i]["g"], $info[$i]["b"]);

						$x1 = rand(-10, $width - 1);
						$y1 = rand(-10, $height - 1);

						imagecopyresampled($png_image, $source, $x1, $y1, 0, 0, $newWidth, $newHeight, $wh, $he);
						imagerotate($source, $arr_degrees[rand(0, 17)], 0);
						
						for ($j = 3; $j < ($numOfFlecks) / 2; $j++)
						{
							//imagerotate($source,$arr_degrees[rand(0,9)],0);
							$x1 = rand(-10, $width - 1);
							$y1 = rand(-10, $height - 1);
							imagecopyresampled($png_image, $source, $x1, $y1, 0, 0, $newWidth, $newHeight, $wh, $he);
							imagerotate($source, $arr_degrees[rand(0, 17)], 0);
						}
					}
				}
			}
		}

//output
		$src = imagecreatefrompng('assets/images/background/grey50_old.png');
		imagelayereffect($src, IMG_EFFECT_OVERLAY);
		imagecopymerge($png_image, $src, 0, 0, 0, 0, 420, 380, 20);
		imagealphablending($png_image, TRUE);
		$file_Name = NULL;
		for ($i = 0; $i < count($info) - 1; $i++)
		{
			$file_Chunks = $info[$i]["id"] . '_' . $info[$i]['percent'] . '_' . $info[$i]['r'] . '_' . $info[$i]['g'] . '_' . $info[$i]['b'] . '_' . $info[$i]['flecks_size'] . '-';
			$file_Name .= $file_Chunks;
		}
		$file_Name .= $info[sizeof($info) - 1]['time_stamp'];
		imagepng($png_image, 'images/' . $file_Name . '.jpg');
		imagedestroy($src);
		imagedestroy($png_image);
	}

}