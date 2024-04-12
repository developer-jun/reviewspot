<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Metatags;
use App\Helpers\AlertPrompt;
use App\Models\Business;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
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
    public function index(Request $request)
    {
        $contentTitle = 'Search businesses';
        $keywords = request()->attributes->get('keywords');
        $category = request()->attributes->get('category');
        $state = request()->attributes->get('state');
        $businesses = [];
        if ($keywords || $category || $state) {
            $contentTitle = 'Search Results';
            $where = [];
            if($keywords) {
                $where[] = ['businesses.name', 'like', '%' . $keywords . '%'];
            }
            if($state) {
                $where[] = ['businesses.state', '=', $state];
            }
            if($category) {
                $where[] = ['categories.name', '=', $category];
                $businesses = DB::table('businesses')
                            ->leftJoin('categories', 'businesses.category_id', '=', 'categories.id')
                            ->select('businesses.*')
                            ->where($where)
                            ->take(10)
                            ->get();
            } else {
                $businesses = DB::table('businesses')
                            ->where($where)
                            ->take(10)
                            ->get();
            }          
        }
        $metatags = new Metatags($this->title, $this->meta_keywords, $this->meta_description);
        
        return view('frontend.search', [
            'contentTitle' => $contentTitle,
            'action' => 'Index',
            'metatags' => $metatags,
            'businesses' => $businesses
        ]);
    }

    public function show(Request $request)
    {
        return 'SHOW';
    }
 
}
