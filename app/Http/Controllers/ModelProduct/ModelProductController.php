<?php

namespace App\Http\Controllers\ModelProduct;

use App\ModelProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModelProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modelProducts = ModelProduct::all();

        return response()->json(['data' => $modelProducts], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $modelProduct = ModelProduct::Create($request->all());

        return response()->json(['data' => $modelProduct], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ModelProduct  $modelProduct
     * @return \Illuminate\Http\Response
     */
    public function show(ModelProduct $modelProduct)
    {
        return response()->json(['data' => $modelProduct], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ModelProduct  $modelProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModelProduct $modelProduct)
    {
        $modelProduct->name = $request->name;
        $modelProduct->description = $request->description;
        $modelProduct->stock = $request->stock;
        $modelProduct->update();

        return response()->json(['data' => $modelProduct], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ModelProduct  $modelProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModelProduct $modelProduct)
    {
        $modelProduct->delete();

        return response()->json(['data' => $modelProduct], 200);
    }
}
