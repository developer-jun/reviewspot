<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Business;
use App\Models\Review;
use App\Models\BusinessType;
use App\Models\UsState as State;
use App\Helpers\Metatags;

class BusinessController extends Controller
{
    protected $layout = 'admin.business.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $businesses = Business::query()
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view($this->layout . 'index', ['businesses' => $businesses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $business_default = new Business();
        $business_default['name'] = fake()->company();
        $business_default['phone'] = fake()->phoneNumber();
        $business_default['address'] = fake()->streetAddress();
        $business_default['address2'] = fake()->buildingNumber();
        $business_default['city'] = fake()->city();  
        $business_default['state'] = fake()->stateAbbr();
        $business_default['zip_code'] = fake()->postcode(); 
        $business_default['summary'] = fake()->realText(150); 
        $business_default['description'] = fake()->realText(500);
        $business_default['business_type'] = fake()->numberBetween(1, 3);
        //
        $states = State::all();
        $businessTypes = BusinessType::all();
        return view($this->layout . 'create', [
            'states' => $states,
            'businessTypes' => $businessTypes,
            'business' => $business_default
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  
        $data = $request->validate([
            'name' => ['required', 'string'],
            'phone' => 'nullable',
            'address' => 'nullable',
            'address2' => 'nullable',
            'city' => 'nullable',
            'state' => 'nullable',
            'zip_code' => 'nullable',
            'summary' => 'nullable',
            'description' => 'required',
            'business_type' => 'numeric'
        ]);

        $business = Business::create($data);
        // to_route(NAME_OF_ROUTE,ARRAY_OF_VARIABLES_TO_PASS)->with(SESSION(flash)_VARIABLE_NAME,SESSION_VARIABLE_VALUE);
        return to_route('business.show', ['id' => $business->id])->with('message', 'Business successfully Created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {        
        $business = Business::find($id);
        $states = State::all();
        $businessTypes = BusinessType::all();       
        return view($this->layout . 'show', [
            'business'=> $business,
            'states' => $states,
            'businessTypes' => $businessTypes,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $business = Business::find($id);
        $states = State::all();
        $businessTypes = BusinessType::all();       
        return view($this->layout . 'edit', [
            'business'=> $business,
            'states' => $states,
            'businessTypes' => $businessTypes,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'phone' => 'nullable',
            'address' => 'nullable',
            'address2' => 'nullable',
            'city' => 'nullable',
            'state' => 'nullable',
            'zip_code' => 'nullable',
            'summary' => 'nullable',
            'description' => 'required',
            'business_type' => 'numeric'
        ]);
        $business = Business::find($id)->update($data);
        return to_route('business.show', ['id' => $id])->with('message', 'Business successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Business::find($id)->delete();

        return to_route('business.index')->with('message', 'Business successfully deleted!');
    }

    public function detail(string $slug)
    {
        $business = Business::where('slug', $slug)->first();

        if(!$business) {
            abort(404);
        }
        // join
        $reviews = DB::table('reviews')
            ->leftJoin('users', 'users.id', '=', 'reviews.user_id')
            ->select('reviews.*', 'users.name', 'users.city', 'users.state')
            ->where('reviews.business_id', $business->id)
            ->orderBy('created_at', 'desc')
            ->get();
        //$reviews = Review::where('business_id', $business->id)->get();
        $state = '';
        $title = '';
        $meta_keywords = '';
        $meta_description = '';
        if($business) {        
            $state = State::where('code', $business->state)->get('name');
            $businessTypes = BusinessType::all();       
        }
        // generate meta tags based on the business information
        $metatags = new Metatags($title, $meta_keywords, $meta_description);
        
        $ratings = $reviews->groupBy('rating')->map->count();
        $totalRatings = $reviews->pluck('rating')->sum();
        $ratingsArray = $ratings->all();
        krsort($ratingsArray, );

        $totalReviews = array_sum($ratingsArray);
        $percentageByRating = [];
        if($ratingsArray) {
            foreach ($ratingsArray as $rating => $count) {
                $percentage = ($count / $totalReviews) * 100;
                $percentageByRating[$rating] = number_format($percentage, 2);
            }
        }

        // Fill in missing ratings
        for($rating = 5; $rating >= 1; $rating--) {
            if(!isset($percentageByRating[$rating])) {
                $percentageByRating[$rating] = 0;
            }
        }

        //foreach ($ratings as $key => $value) {
        //    var_dump($value);
        //}
        //dd($percentageByRating);
        return view('frontend.detail', [
            'business'=> $business,
            'reviews' => $reviews,
            'ratingSummary' => [
                'percentageByRating' => $percentageByRating,
                'ratings' => $ratings,
                'total' => $reviews->count(),
                'overallRating' => $totalRatings ?  number_format($totalRatings / $reviews->count(), 2) : 0,
            ],
            'state' => $state,
            'businessTypes' => $businessTypes,
            'metatags' => $metatags
        ]);
    }
}
