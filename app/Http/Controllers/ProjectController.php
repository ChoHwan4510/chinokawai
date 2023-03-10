<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MyAnimationCheckService;

class ProjectController extends Controller
{
    private $myAnimationCheckService = null;
    public function __construct(){
        $this->myAnimationCheckService = new MyAnimationCheckService();
    }

    public function animeQuiz(){
        return view('project/animeQuiz');
    }

    /** 페이지로드 */
    public function myAnimationCheck(){
        $result_test = $this->myAnimationCheckService->getMyanimationList();

        return view('project/myAnimeCheck', compact('result_test'));
    }

    public function insertMyAnimation(){
        $result = $this->myAnimationCheckService->insertMyAnimation();
        if($result <= 0){
            return response()->json(['status' => '400', 'msg' => '입력오류', 'data' => [] ] , 400);
        }

        return resonse()->json(['status' => '200', 'msg' => '', 'data' => [] ], 200);
    }


}
