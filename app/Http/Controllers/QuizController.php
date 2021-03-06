<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Quiz as QuizResource;
use App\Mail\GameScore;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Jobs\SendEmailJob;
use App\Quiz;
use App\User;
use PDF;
use App\Setting;


class QuizController extends Controller
{
    public function index(){
        return view('front.quiz.index');
    }


    public function getAll(){
        //return new QuizResource(Quiz::find(1));
        $quantity = Setting::where('name','=','question-quantity')->first();
        $min = Setting::where('name','=','min-correct-question')->first();
        $quizs = Quiz::get()->random($quantity->value);
        return QuizResource::collection($quizs)->additional(['meta' => [
            'min' => $min->value,
        ]]);
    }


    public function updateScore(Request $request){

        $user = User::find($request->userid);
        if($user->score != null){
            if($request->score > $user->score){
                $user->score = $request->score;
                // $user->save();
                //Mail::to($user)->send(new GameScore($user));
                SendEmailJob::dispatch($user)->delay(now()->addSeconds(15));
            }

            // if($request->score == 5)
            // {
            //     //return $request->score;
            //     $pdf = PDF::loadView('Certificate.certificate', compact('user'));
            //     return $pdf->download('certificate.pdf');
            // }
        }
        

        $user->save();
        return $user;

    }

    public function downloadpdf(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $score = $user->score;
        $pdf = PDF::loadView('Certificate.certificate', compact('user','score'));
        return $pdf->download('certificate.pdf');
    }
}
