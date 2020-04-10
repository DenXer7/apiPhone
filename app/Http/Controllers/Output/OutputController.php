<?php

namespace App\Http\Controllers\Output;

use App\Output;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OutputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outputs = Output::all();

        return response()->json(['data' => $outputs], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $output = Output::create($request->all());

        return response()->json(['data' => $output], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Output  $output
     * @return \Illuminate\Http\Response
     */
    public function show(Output $output)
    {
        return response()->json(['data' => $output], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Output  $output
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Output $output)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Output  $output
     * @return \Illuminate\Http\Response
     */
    public function destroy(Output $output)
    {
        //
    }
}
