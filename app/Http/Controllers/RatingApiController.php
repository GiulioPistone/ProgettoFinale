<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Trainer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RatingApiController extends Controller
{
    public function index(){
        return response(Rating::all(), Response::HTTP_OK);
    }

    public function store(Request $request){

        $data = $request->validate([
            'user_id' => 'required',
            'trainer_id' => 'required',
            'users_username' =>'required',
            'user_avatar' =>'required',
            'star' => 'required'
        ]);

        // return response($data,Response::HTTP_EARLY_HINTS);


        $star = new Rating();
        $star->trainer_id = $data['trainer_id'];
        $star->user_id = $data['user_id'];
        $star->users_username =$data['users_username'];
        $star->user_avatar =$data['user_avatar'];
        $star->star = $data['star'];
        $star->save();        



        return response($star, Response::HTTP_CREATED);

    }

    public function show($id) 
    {  	
        $ratings = Rating::all();
        $rate=[];
        foreach($ratings as $rating){
            if($rating->trainer_id == $id){
                $rate[] = $rating;
            }
        }
        return ['ratings' => $rate];

    }



}