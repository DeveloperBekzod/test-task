<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAplicationRequest;
use App\Http\Requests\UpdateAplicationRequest;
use App\Models\Aplication;

class AplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applications = Aplication::all();
        return view('aplications.index', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAplicationRequest $request)
    {
        $request->validated;
        $requestData = $request->all();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            if (!file_exists('files/' . auth()->user()->name)) {
                mkdir('files/' . auth()->user()->name);
            }
            $file->move('files/' . auth()->user()->name . '/', $file_name);
            $requestData['file_url'] = $file_name;
        }
        $request->user()->applications()->create($requestData);

        return redirect(route('my-applications'))->with('message', 'Your application send successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Aplication $aplication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aplication $aplication)
    {
        return view('aplications.edit', compact('aplication'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAplicationRequest $request, Aplication $aplication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aplication $aplication)
    {
        $aplication->delete();

        return redirect()->route('my-applications')->with('message', 'Application is deleted !');
    }
}
