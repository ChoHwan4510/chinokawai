<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function animeQuiz(){
        return view('project/animeQuiz');
    }

    public function myAnimationCheck(){
        return view('project/myAnimeCheck');
    }
}
