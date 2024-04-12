<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Helpers\Metatags;
use App\Helpers\AlertPrompt;

class HomeController extends Controller
{
    public $title;
    public $meta_keywords;
    public $meta_description;

    public function __construct()
    {
        $this->title = 'Welcome Homies';
        $this->meta_description = "Show the meta tags in partials could be a little tricky, at least at the beginning. But it's actually easy.";
        $this->meta_keywords = 'meta tags,partials,could,little,tricky,least,beginning.';
    }

    //
    public function index()
    {
        $metatags = new Metatags($this->title, $this->meta_keywords, $this->meta_description);
        //$categories = SearchDropdownData::getCategories();
        //$states = SearchDropdownData::getStates();
        // View::share('metatags', $metatags);
        return view('frontend.index', [
            'contentTitle' => 'The message is clear',
            'alertPrompt' => new AlertPrompt('',''),
            'metatags' => $metatags,
            //'states' => $states,
            //'categories' => $categories
        ]);
    }
}
