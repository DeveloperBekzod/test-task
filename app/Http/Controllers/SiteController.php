<?php

namespace App\Http\Controllers;

use App\Models\Aplication;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function myAppilations()
    {
        $applications = Aplication::where('user_id', '=', auth()->user()->id)->get();

        return view('my-applications', compact('applications'));
    }
}
