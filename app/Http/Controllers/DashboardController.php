<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\DetailLearning;
use App\Models\Learning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $learning = Learning::where([['status', 0], ['user_id', Auth::user()->id]])->get();
        $finish = Learning::where([['status', 1], ['user_id', Auth::user()->id]])->latest('updated_at')->take(3)->get();
        $achievement = Auth::user()->achievement;
        $c = Auth::user()->challengeTaken;
        $challenge = [
            "wait" => $c->where('status', 1)->count(),
            "finish" => $c->where('status', 2)->count(),
            "point" => $c->where('status', 2)->sum('point')
        ];
        return view('main/dashboard', [
            "title" => "Dashboard",
            "ongoing" => $learning,
            "finish" => $finish,
            "achievement" => $achievement,
            "challenge" => $challenge

        ]);
    }
}
