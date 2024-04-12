<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Review;


class ReviewController extends Controller
{
    //

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'title' => ['required', 'string'],
                'description' => 'string',
                'rating' => 'numeric',   
                'business_id' => 'numeric',       
            ]);
        } catch (ValidationException $e) {
            // Handle validation failure here
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors(),
                'type' => 'error'
            ], 422); // 422 Unprocessable Entity status code for validation errors
        }
        if (Auth::check()) {
            // User is logged in
            $user_id = Auth::id();
            $data['user_id'] = $user_id;
        } else {
            // User is not logged in
            $data['user_id'] = 2;
        }        
        
        $review = Review::create($data);

        return response()->json([
            'message' => 'Review successfully added! Your review is subject to moderation.', 
            'type' => 'success'
            ]
        , 200);
        /*$data = $request->validate([
            'title' => ['required', 'string'],
            'description' => 'string',
            'rating' => 'numeric',            
        ]);
        $data['user_id'] = 1;
        $business = Review::create($data);

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API Token')->plainTextToken
        ]);*/
    }

    /*
    public function login(LoginUserRequest $request)
    {
        $request->validated($request->only(['email', 'password']));

        if(!Auth::attempt($request->only(['email', 'password']))) {
            return $this->error('', 'Credentials do not match', 401);
        }

        $user = User::where('email', $request->email)->first();

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API Token')->plainTextToken
        ]);
    }
    */
}
