<?php

namespace App\Http\Controllers\Provider;

use App\Provider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::all();

        return response()->json(['data' => $providers], 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $provider = new Provider;

        // $provider->names = $request->names;
        // $provider->phone1 = $request->phone1;
        // $provider->phone2 = $request->phone2;
        // $provider->save();

        $provider = Provider::create($request->all());

        return response()->json($provider, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        return response()->json(['data' => $provider], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provider $provider)
    {
        $provider->names = $request->names;
        $provider->phone1 = $request->phone1;
        $provider->phone2 = $request->phone2;
        $provider->update();

        return response()->json(['data' => $provider], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        $provider->delete();

        return response()->json(['data' => $provider], 200);
    }
}
