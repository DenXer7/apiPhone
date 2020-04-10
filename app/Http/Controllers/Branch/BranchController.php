<?php

namespace App\Http\Controllers\Branch;

use App\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branchs = Branch::all();

        return response()->json(['data' => $branchs], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $branch == Client::create($request->all());

        return response()->json(['data' => $branch], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        return response()->json(['data' => $branch], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
        $branch->galery = $request->galery;
        $branch->stand = $request->stand;
        $branch->name = $request->name;
        $branch->city = $request->city;
        $branch->address = $request->address;
        $branch->ticket_series = $request->ticket_series;
        $branch->ticket_number = $request->ticket_number;
        $branch->update();

        return reponse()->json(['data' => $branch], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();

        return response()->json(['data' => $branch], 200);
    }
}
