<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AwardController extends Controller
{
    public function index(){
        return view('user.awards.rankAwards');
    }
}
