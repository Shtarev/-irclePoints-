<?php
$foto = imagecreatetruecolor(500, 300);
$white = imagecolorallocate($foto, 255, 255, 255);
$punktColor = imagecolorallocate($foto, 255, 0, 0);
imagefilledellipse($foto, $x, $y, $r*2, $r*2, $white);

$x = 240;
$y = 150;  
$r = 50;
$A = 30;
 
function kreisPunkte($foto, $punktColor, $x, $y, $r, $A) {
    $x0 = $x;
    $y0 = $y-$r;
    imagefilledellipse($foto, $x0, $y0, 15, 15, $punktColor);
    $i = 0;
    while($i < 360) {
        $rx = $x0 - $x;
        $ry = $y0 - $y;
        $c = cos(deg2rad($A));
        $s = sin(deg2rad($A));
        $x0 = $x + $rx * $c - $ry * $s;
        $y0 = $y + $rx * $s + $ry * $c;
        imagefilledellipse($foto, $x0, $y0, 15, 15, $punktColor);
        $i += $A;
        }
}

kreisPunkte($foto, $punktColor, $x, $y, $r, $A);
imagepng($foto, "krug.png");
imagedestroy($foto);
?>