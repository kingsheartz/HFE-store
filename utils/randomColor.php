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

function getContrastColor($hexColor)
{
  // Remove # if present
  $hexColor = ltrim($hexColor, '#');

  // Convert hex to RGB
  $r = hexdec(substr($hexColor, 0, 2));
  $g = hexdec(substr($hexColor, 2, 2));
  $b = hexdec(substr($hexColor, 4, 2));

  // Calculate brightness (YIQ formula)
  $yiq = (($r * 299) + ($g * 587) + ($b * 114)) / 1000;

  // Return black or white text based on brightness
  return ($yiq >= 128) ? '#000000' : '#FFFFFF';
}
