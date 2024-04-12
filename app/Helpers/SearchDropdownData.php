<?php

namespace App\Helpers;

use App\Models\UsState;

class SearchDropdownData
{

  public function __construct()
  {
    //
  }


  public static function getStates()
  {
    $states = UsState::all(['code', 'name']);
    return $states;
  }

  public static function getCategories()
  {
    $categories = [
      (object)[
        'code' => 'Restaurants',
        'name' => 'Restaurants' 
      ],
      (object)[
        'code' => 'Contractors',
        'name' => 'Contractors'
      ],
      (object)[
        'code' => 'Electricians',
        'name' => 'Electricians',
      ],
      (object)[
        'code' => 'Home Cleaners',
        'name' => 'Home Cleaners'
      ],
      (object)[
        'code' => 'HVAC',
        'name' => 'HVAC'
      ],
      (object)[
        'code' => 'Landscaping',
        'name' => 'Landscaping'
      ],
      (object)[
        'code' => 'Locksmiths',
        'name' => 'Locksmiths'
      ],
      (object)[
        'code' => 'Movers',
        'name' => 'Movers'
      ],
      (object)[
        'code' => 'Plumbers',
        'name' => 'Plumbers'
      ],
      (object)[
        'code' => 'Auto Repair',
        'name' => 'Auto Repair'
      ],
      (object)[
        'code' => 'Auto Detailing',
        'name' => 'Auto Detailing'
      ],
      (object)[
        'code' => 'Towing',
        'name' => 'Towing'
      ]
    ];
    return $categories;
  }


  public static function getMostPopularCategories()
  {
    $categories = [
      (object)[
        'code' => 'Restaurants',
        'name' => 'Restaurants',
        'icon' => 'building-storefront',
        'svgPath'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />',
      ],
      (object)[
        'code' => 'Contractors',
        'name' => 'Contractors',
        'icons' => 'building-office',
        'svgPath' => '<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />'
      ],
      (object)[
        'code' => 'Electricians',
        'name' => 'Electricians',
        'icons' => 'bolt',
        'svgPath' => '<path stroke-linecap="round" stroke-linejoin="round" d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />'
      ],
      (object)[
        'code' => 'Home Cleaners',
        'name' => 'Home Cleaners',
        'icons' => 'archive-box-x-mark',
        'svgPath' => '<path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />'
      ],
      (object)[
        'code' => 'HVAC',
        'name' => 'HVAC',
        'icons' => 'building-office-2',
        'svgPath' => '<path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z" />'
      ],
      (object)[
        'code' => 'Landscaping',
        'name' => 'Landscaping',
        'icons' => 'soil',
        'svgPath' => '<path d="M2 4L22 4" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M3 8.01L3.01 7.99889" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M3 16.01L3.01 15.9989" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M6 12.01L6.01 11.9989" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M6 20.01L6.01 19.9989" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M9 8.01L9.01 7.99889" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M9 16.01L9.01 15.9989" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M12 12.01L12.01 11.9989" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M12 20.01L12.01 19.9989" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M15 8.01L15.01 7.99889" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M15 16.01L15.01 15.9989" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M18 12.01L18.01 11.9989" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M18 20.01L18.01 19.9989" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M21 8.01L21.01 7.99889" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M21 16.01L21.01 15.9989" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>'
      ],
      (object)[
        'code' => 'Locksmiths',
        'name' => 'Locksmiths',
        'icons' => 'lock',
        'svgPath' => '<path d="M16 12H17.4C17.7314 12 18 12.2686 18 12.6V19.4C18 19.7314 17.7314 20 17.4 20H6.6C6.26863 20 6 19.7314 6 19.4V12.6C6 12.2686 6.26863 12 6.6 12H8M16 12V8C16 6.66667 15.2 4 12 4C8.8 4 8 6.66667 8 8V12M16 12H8" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>'
      ],
      (object)[
        'code' => 'Movers',
        'name' => 'Movers',
        'icons' => 'delivery-truck',
        'svgPath' => '<path d="M8 19C9.10457 19 10 18.1046 10 17C10 15.8954 9.10457 15 8 15C6.89543 15 6 15.8954 6 17C6 18.1046 6.89543 19 8 19Z" stroke="#000000" stroke-width="1.5" stroke-miterlimit="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M18 19C19.1046 19 20 18.1046 20 17C20 15.8954 19.1046 15 18 15C16.8954 15 16 15.8954 16 17C16 18.1046 16.8954 19 18 19Z" stroke="#000000" stroke-width="1.5" stroke-miterlimit="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M10.05 17H15V6.6C15 6.26863 14.7314 6 14.4 6H1" stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path><path d="M5.65 17H3.6C3.26863 17 3 16.7314 3 16.4V11.5" stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path><path d="M2 9L6 9" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M15 9H20.6101C20.8472 9 21.0621 9.13964 21.1584 9.35632L22.9483 13.3836C22.9824 13.4604 23 13.5434 23 13.6273V16.4C23 16.7314 22.7314 17 22.4 17H20.5" stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path><path d="M15 17H16" stroke="#000000" stroke-width="1.5" stroke-linecap="round"></path>'
      ],
      (object)[
        'code' => 'Plumbers',
        'name' => 'Plumbers',
        'icons' => 'pipe3d',
        'svgPath' => '<path d="M10 20C6.68629 20 4 17.3137 4 14C4 10.6863 6.68629 8 10 8C13.3137 8 16 10.6863 16 14C16 17.3137 13.3137 20 10 20Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M10.773 4.74173C11.8576 3.66513 13.3511 3 15 3C18.3137 3 21 5.68629 21 9C21 10.5367 20.4223 11.9385 19.4722 13" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M3 21L9.5 14.5" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M21 3L19.5 4.5" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M6 9.5L10.5 5L10.75 4.75" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M14.5 18L19.2188 13.2812" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>'
      ],
      (object)[
        'code' => 'Auto Repair',
        'name' => 'Auto Repair',
        'icons' => 'car',
        'svgPath' => '<path d="M8 10L16 10" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M7 14L8 14" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M16 14L17 14" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M3 18V11.4105C3 11.1397 3.05502 10.8716 3.16171 10.6227L5.4805 5.21216C5.79566 4.47679 6.51874 4 7.31879 4H16.6812C17.4813 4 18.2043 4.47679 18.5195 5.21216L20.8383 10.6227C20.945 10.8716 21 11.1397 21 11.4105V18M3 18V20.4C3 20.7314 3.26863 21 3.6 21H6.4C6.73137 21 7 20.7314 7 20.4V18M3 18H7M21 18V20.4C21 20.7314 20.7314 21 20.4 21H17.6C17.2686 21 17 20.7314 17 20.4V18M21 18H17M7 18H17" stroke="#000000" stroke-width="1.5"></path>'
      ]      
    ];
    return $categories;
  }
} 