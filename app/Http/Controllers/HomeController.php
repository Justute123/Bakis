<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        if(Auth::user()->role_id=='2'){
            return view('pages.dash');
        }
        else if(Auth::user()->role_id=='1') {
            return view('pages.newsAsStudentFinal');
        }
        else
        {
            return view('pages.index');

        }
    }
}
