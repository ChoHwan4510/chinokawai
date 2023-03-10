<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProjectService;

class ProjectController extends Controller
{
    public function animeQuiz(){
        return view('project/animeQuiz');
    }

    public function myAnimationCheck(){
        $project_service = new ProjectService();

        $result_test = $project_service->getMyanimationList();

        return view('project/myAnimeCheck', compact('result_test'));
    }
}
