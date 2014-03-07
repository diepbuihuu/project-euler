<?php
//    header ('Content-Type: image/png');
//    $im = imagecreatetruecolor(100, 100);
//    $red = imagecolorallocate($im, 255, 0, 0);
//    $green = imagecolorallocate($im, 0, 255, 0);
//    $blue = imagecolorallocate($im, 0, 0, 255);
//    imagefill($im,0,0,$green);
//    
//    $icon = imagecreatetruecolor(20, 20);
//    $red = imagecolorallocate($icon, 255, 0, 0);
//    imagefill($icon,0,0,$red);
//    imagecopymerge($im, $icon, 30, 30, 0, 0, 20, 20, 100);
//    imagejpeg($im);
//    imagejpeg($icon);
    $im = imagecreatefrompng('icon/arrow_next.png');
    echo $im;
    imagepng($im);
    imagedestroy($im);
    echo '<br/>';
    $im = imagecreatefrompng('aaa.png');
    echo $im;
    imagepng($im);
    imagedestroy($im);
//    $maxX = 900;
//    $maxY = 900;
//    $im = imagecreatetruecolor($maxX, $maxY);
//    $white = imagecolorallocate($im, 255, 255, 255);
//    imagefill($im,0,0,$white);
//    $css = "";
//    
//    $x = 0; $y = 0;
//    if ($handle = opendir('icon')) {
//        while (false !== ($entry = readdir($handle))) {
//            if ($entry != "." && $entry != "..") {
//                
//                $icon = load("icon/".$entry);
////                var_dump($icon); die;
//                if (imagesx($icon) < 30 && imagesy($icon) < 30) {
//                    imagecopymerge($im, $icon, $x, $y, 0, 0, imagesx($icon), imagesy($icon), 100);
//                    $tmp = explode('.', $entry);
//                    $name = $tmp[0];
//                    $iconCss = "." . $name . '{background-position:-' . $x . 'px -' . $y 
//                            . 'px;width:' . imagesx($icon) . 'px;height:' . imagesy($icon) . 'px;}' .PHP_EOL;
//                    $css .= $iconCss;
//                    $x += 30;
//                }
//                
//                if ($x >= $maxX) {
//                    $y += 30;
//                    $x = 0;
//                }
//                if ($y >= $maxY) {
//                    break;
//                }
//                
//                
//            }
//        }
//        closedir($handle);
//   }
//   imagepng($im);
//   file_put_contents('allIcon.css', $css);
   echo "success";

function load($filename) {
      $image_info = getimagesize($filename);
      $image_type = $image_info[2];
      if( $image_type == IMAGETYPE_JPEG ) {
 
         return imagecreatefromjpeg($filename);
      } elseif( $image_type == IMAGETYPE_GIF ) {
 
         return imagecreatefromgif($filename);
      } elseif( $image_type == IMAGETYPE_PNG ) {
          
         return imagecreatefrompng($filename);
      }
   }
   
   function save($content, $filename, $image_type=IMAGETYPE_JPEG, $compression=75) {
 
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($content,$filename,$compression);
      } elseif( $image_type == IMAGETYPE_GIF ) {
 
         imagegif($content,$filename);
      } elseif( $image_type == IMAGETYPE_PNG ) {
 
         imagepng($content,$filename);
      }
   }
   
   
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
