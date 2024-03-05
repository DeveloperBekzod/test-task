<?php

namespace App\Http\Controllers;

use App\Models\Aplication;
use App\Models\User;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function main()
    {
        if (auth()->user()->role->name == 'manager') {
            return back();
        }
        return view('form');
    }

    public function myAppilations()
    {
        if (auth()->user()->role->name == 'manager') {
            return redirect(route('aplications.index'));
        }
        $applications = Aplication::where('user_id', '=', auth()->user()->id)->latest()->paginate(10);
        return view('my-applications', compact('applications'));
    }
}
