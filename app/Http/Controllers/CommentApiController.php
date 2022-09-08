<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommentApiController extends Controller
{
    public function index(){
        return response(Comment::all(), Response::HTTP_OK);
    }

    public function store(Request $request){

        $data = $request->validate([
            'user_id' => 'required',
            'trainer_id' => 'required',
            'users_username' =>'required',
            'user_avatar' =>'required',
            'comment' => 'required'
        ]);

        // return response($data,Response::HTTP_EARLY_HINTS);


        $star = new Comment();
        $star->trainer_id = $data['trainer_id'];
        $star->user_id = $data['user_id'];
        $star->users_username =$data['users_username'];
        $star->user_avatar =$data['user_avatar'];
        $star->comment = $data['comment'];
        $star->save();        



        return response($star, Response::HTTP_CREATED);

    }

    public function show($id) 
    {  	
        $comments = Comment::all();
        $rate=[];
        foreach($comments as $comment){
            if($comment->trainer_id == $id){
                $rate[] = $comment;
            }
        }
        return ['comments' => $rate];


    }
}
