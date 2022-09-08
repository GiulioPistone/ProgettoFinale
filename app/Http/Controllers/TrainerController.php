<?php

namespace App\Http\Controllers;

use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function show(Trainer $trainer)
    {
        return view('trainers.show')->with('trainer',$trainer);
    }
}
