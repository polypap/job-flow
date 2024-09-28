<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $states = State::query()->latest()->with(['country'])->paginate(10);

        $countries = Country::all();
        return view('states.index', ['states' => $states, 'countries' => $countries]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        return view('states.create',['countries'=>$countries]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=> 'required|max:50|min:3',
            'code'=> 'unique:states|required|max:2',
            'country_id'=> 'required'
        ]);

        $countryId = $validatedData['country_id'];
        $country = Country::find($countryId);
        if(empty($country)){
            return redirect()->back()->with('error','There seems to be an issue with the selected country');
        }

        $country->states()->create($validatedData);

        return redirect()->back()->with('success', 'State Created Successfully.');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(State $state)
    {
        $countries = Country::all();
        return view('states.edit', ['countries' => $countries, 'state' => $state]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(State $state, Request $request)
    {
        $validatedData = $request->validate([
            'name'=> 'required|max:50|min:3',
            'code'=> 'required|max:2',
            'country_id'=> 'required'
        ]);

        $state->update($validatedData );

        return redirect()->back()->with('success', 'State updated successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
