<?php
function randomHexColor()
{
  return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
}

function randomRgbColor()
{
  $r = mt_rand(0, 255);
  $g = mt_rand(0, 255);
  $b = mt_rand(0, 255);
  return "rgb($r, $g, $b)";
}

function randomGradient()
{
  $color1 = randomHexColor();
  $color2 = randomHexColor();
  return "linear-gradient(45deg, $color1, $color2)";
}
