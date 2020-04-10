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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ModelProduct  $modelProduct
     * @return \Illuminate\Http\Response
     */
    public function show(ModelProduct $modelProduct)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ModelProduct  $modelProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModelProduct $modelProduct)
    {
        //
    }
}
