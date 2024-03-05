<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAplicationRequest;
use App\Http\Requests\UpdateAplicationRequest;
use App\Models\Aplication;
use Illuminate\Support\Facades\Storage;

class AplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role->name == 'client') {
            return back();
        }
        $applications = Aplication::all();
        return view('aplications.index', compact('applications'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAplicationRequest $request)
    {
        $request->validated();
        $requestData = $request->all();

        if ($request->hasFile('file')) {

            /* $file = $request->file('file');
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            if (!file_exists('files/' . auth()->user()->name)) {
                mkdir('files/' . auth()->user()->name);
            }
            $file->move('files/' . auth()->user()->name . '/', $file_name);
            $requestData['file_url'] = $file_name; */


            $file = $request->file('file');
            // $file_name = $file->getClientOriginalName();
            /* $path = $file->storeAs(
                auth()->user()->name,
                $file_name,
                'public'
            ); */
            $path = $file->store('files/' . auth()->user()->name, 'public');
            $requestData['file_url'] = $path;
        }
        $request->user()->applications()->create($requestData);

        return redirect(route('my-applications'))->with('message', 'Your application send successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aplication $aplication)
    {
        $this->authorize('update', $aplication);
        return view('aplications.edit', compact('aplication'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAplicationRequest $request, Aplication $aplication)
    {
        $this->authorize('update', $aplication);
        $request->validated();

        $aplication->user()->applications()->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aplication $aplication)
    {
        $this->authorize('delete', $aplication);
        $aplication->delete();

        return redirect()->route('my-applications')->with('message', 'Application is deleted !');
    }
}
