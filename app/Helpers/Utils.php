<?php
namespace App\Helpers;

class Utils
{
  public static function generateRGB()
  {
    $r = mt_rand(0, 255);
    $g = mt_rand(0, 255);
    $b = mt_rand(0, 255);
    return "{$r}{$g}{$b}";
  }

  public static function generatePlaceholderUrl($text, $dimension = '') {                    
    $backgroundColor = substr(str_shuffle('ABCDEF0123456789'), 0, 6);
    $r = hexdec(substr($backgroundColor, 0, 2));
    $g = hexdec(substr($backgroundColor, 2, 2));
    $b = hexdec(substr($backgroundColor, 4, 2));
    $luminance = (0.299 * $r + 0.587 * $g + 0.114 * $b) / 255;

    if ($luminance > 0.5) {        
        $textColor = '000000'; // Use dark text color
    } else {        
        $textColor = 'ffffff'; // Use light text color
    }

    if($dimension == '') {
        $dimension = '200x200';
    }
    $businessName = str_word_count($text, 1);
    if(count($businessName) >= 2) {
        $text = $businessName[0] . '+' . $businessName[1].'...'; // just take the first two words
    } else {
        $text = str_replace(' ', '+', $text);
    }                    

    return "https://placehold.co/{$dimension}/{$backgroundColor}/{$textColor}?text={$text}";
  }

  public static function getRatingSVG($rating)
  {   
    $active = '<svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
          <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
      </svg>';
    $inactive = '<svg class="w-4 h-4 text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
          <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
      </svg>';
    
      $stars = '';
      for($i = 0; $i < 5; $i++) {
        if($i < $rating) {
          $stars .= $active;
        } else {
          $stars .= $inactive;
        }
      }

    return '<div class="flex items-center mb-1 space-x-1 rtl:space-x-reverse">'. $stars .'</div>';
  }
}