<?php

namespace App\Http\Controllers;

use App\Mail\PostLiked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['auth']);
    }


    public function index(){

        $user = auth()->user();


        return view('home');
    }
}
