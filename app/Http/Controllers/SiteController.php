<?php

namespace App\Http\Controllers;

use App\Models\Aplication;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function myAppilations()
    {
        if (auth()->user()->role->name == 'manager') {
            return redirect(route('aplications.index'));
        }
        $applications = Aplication::where('user_id', '=', auth()->user()->id)->get();
        return view('my-applications', compact('applications'));
    }
}
