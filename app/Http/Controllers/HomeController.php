<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
        $jobs = Job::latest()->limit(6)->get();
        return view('home', ['jobs' => $jobs]);
    }
}
