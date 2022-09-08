<?php

namespace App\Http\Controllers;

use Faker\Generator;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;


class TrainerApiController extends Controller
{
    public function __construct()
    {
       
        $this->middleware('admin.id')->only(['create']);
    }
    
        public function index(){
            return response(Trainer::all(), Response::HTTP_OK);
        }
    public function create(){

             return view('trainers.create');

       
    }
    public function store(Request $request){
        $trainer = new Trainer();
        $request->validate([
            'name'=>'required',
            'content' => 'required|min:4',
            'email'=>'required',
            'image' => 'image:jpeg,png,jpg|max:2048',
        ]);
        $trainer->name = $request->name;
        $trainer->content = $request->content;
        $trainer->email = $request->email;
        if ($request->file('image')) {
            $name = uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('post_images'), $name);
            $trainer->image = $name;
        }

        $trainer->save();

        return redirect()->route('home')->with('success','New Trainer Has Been Created');



    }
    public function show(Trainer $trainer)
    {
        return view('trainers.show')->with('trainer',$trainer);
    }
   

    public function destroy($id){
        Trainer::destroy($id);

        return response(null, Response::HTTP_OK);
    }

    public function getTrainers(Request $request)
    {
        $data = Trainer::where('name', 'LIKE','%'.$request->keyword.'%')->get();
        return response()->json($data); 
    }
    public function user() 	
    {  	
        return $this->belongsTo('App\Models\User'); 	
    }
}
