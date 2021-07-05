<?php
$dest = imagecreatefromjpeg('uploads/user_custom_images/18/20200212104941826.JPG');
$src = imagecreatefrompng('images/test.png');


imagecopymerge($dest, imagerotate($src, 45, 0), 300, 150, 100, 100, 150, 150, 100); //have to play with these numbers for it to work for you, etc.

header('Content-Type: image/jpg');
imagepng($dest);

imagedestroy($dest);
imagedestroy($src);
?>