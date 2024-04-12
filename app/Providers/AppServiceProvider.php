<?php

namespace App\Providers;

use Illuminate\View\View;
use Illuminate\Support\Facades;
use Illuminate\Support\ServiceProvider;
// use Illuminate\Http\Request;
use App\Helpers\SearchDropdownData;
use App\Helpers\Utils;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // LAYOUT RELATED SECTION        
        Facades\View::composer('components.layouts.frontend', function (View $view) {
            $categories = SearchDropdownData::getCategories();
            $states = SearchDropdownData::getStates();            

            // Retrieve query string parameters
            /**/            
            $keywords = request()->attributes->get('keywords');
            $category = request()->attributes->get('category');
            $state = request()->attributes->get('state');

            $formData = (object)[
                'keywords' => $keywords,
                'category' => $category,
                'state' => $state,
            ];
            
            /*
            if (Request::has(['keywords', 'category', 'state'])) {
                $formData->keywords = Request::get('keywords');
                $formData->category = Request::get('category');
                $formData->state = Request::get('state');
            }
            */            

            $view->with([
                'user' => 'inandout',
                'categories' => $categories,
                'states' => $states,
                'formData' => $formData,
            ]);
        });

        Facades\View::composer('components.layouts.frontend.sidebar', function (View $view) {
            $categories = SearchDropdownData::getMostPopularCategories();
            $view->with([
                'categories' => $categories,
            ]);
        });
        // END OF LAYOUT RELATED SECTION
        /*
        Facades\View::composer('frontend.index', function (View $view) {
            $categories = SearchDropdownData::getCategories();
            $states = SearchDropdownData::getStates();
            $view->with([
                'categories' => $categories,
                'states' => $states,
            ]);
        });
        */


        Facades\View::composer('frontend.search', function (View $view) {
            $view->with(               
                'generatePlaceholderUrl', function ($text, $dimension = '') {                    
                    $backgroundColor = substr(str_shuffle('ABCDEF0123456789'), 0, 6);
                    $r = hexdec(substr($backgroundColor, 0, 2));
                    $g = hexdec(substr($backgroundColor, 2, 2));
                    $b = hexdec(substr($backgroundColor, 4, 2));
                    $luminance = (0.299 * $r + 0.587 * $g + 0.114 * $b) / 255;
                
                    if ($luminance > 0.5) {
                        // Use dark text color
                        $textColor = '000000';
                    } else {
                        // Use light text color
                        $textColor = 'ffffff';
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
                  },
            );
        });

        Facades\View::composer('frontend.detail', function (View $view) {
            $view->with(
                'generatePlaceholderUrl', function ($text, $dimension = '') {                    
                    $backgroundColor = substr(str_shuffle('ABCDEF0123456789'), 0, 6);
                    $r = hexdec(substr($backgroundColor, 0, 2));
                    $g = hexdec(substr($backgroundColor, 2, 2));
                    $b = hexdec(substr($backgroundColor, 4, 2));
                    $luminance = (0.299 * $r + 0.587 * $g + 0.114 * $b) / 255;
                
                    if ($luminance > 0.5) {
                        // Use dark text color
                        $textColor = '000000';
                    } else {
                        // Use light text color
                        $textColor = 'ffffff';
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
                },                
            );
        });
    }
}
