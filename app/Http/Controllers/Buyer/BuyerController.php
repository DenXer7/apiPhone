<?php

namespace App\Http\Controllers\Buyer;

// use App\Buyer\Buyer;
use App\Buyer;
use App\Product;
use App\ModelProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ArrayObject;

class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buyers = Buyer::all();

        foreach($buyers as $buyer){
            $buyersProducts = $buyer->with('products')->get();
        }

        // $buyer = Buyer::all();

        return response()->json(['data' => $buyersProducts], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $array = json_decode($request->getContent(),true);

        $newBuyer = new Buyer;
        $newBuyer->save();

        // foreach($array as $data){


        //     echo $data['model'];
        // }


        foreach ($array as $mobil) {
            $modelo = $mobil['model'];
            $modelo = strtolower($modelo);

            $product = new Product;
            $product->buyer_id = $newBuyer->id;

            $searchModel = ModelProduct::where('name', $modelo)->get();

            if($searchModel->isEmpty()){
                $newModel = new ModelProduct;
                $newModel->name = $modelo;
                $newModel->save();

                $product->modelProduct_id = $newModel->id;
            }

            if(!$searchModel->isEmpty()){
                $product->modelProduct_id = $searchModel[0]->id;
            }

            $product->price_buy = $mobil['price_buyer'];

            $product->detail = $mobil['detail'];

            $product->save();
        }

        return response()->json(['data'=>$newBuyer],200);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Buyer\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    public function show(Buyer $buyer)
    {
        $buyer = $buyer->with('products')->findOrFail($buyer->id);

        return response()->json(["data" => $buyer], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Buyer\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buyer $buyer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Buyer\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buyer $buyer)
    {
        //
    }
}
