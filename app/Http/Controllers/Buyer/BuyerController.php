<?php

namespace App\Http\Controllers\Buyer;

// use App\Buyer\Buyer;
use App\Brand;
use App\Buyer;
use App\Product;
use ArrayObject;
use App\ModelProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        // $buyers = Buyer::select('id', 'created_at')->with(['products' => function($produtcs){
        //     $produtcs->with(['modelProduct' => function($model){
        //         $model->select('id','id_brand','name');
        //     }]);
        // }])->get();



        // return response()->json(['data' => $buyers], 200);

        // ========================================================

        $buyersProducts = DB::table('products as p')
        ->join('buyers as b', 'p.buyer_id', '=', 'b.id')
        ->join('model_products as m', 'p.model_product_id', '=', 'm.id')
        ->select('b.id as buyer_id', 'b.created_at as buyer_date',
                'p.id', 'p.price_buyer','p.detail',
                'm.name as model')
        ->where('p.deleted_at', '=', null)
        ->orderBy('b.id')
        ->get();

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
        $item = $array;


        if($item['buyer_id'] == 0){
            $newBuyer = new Buyer;
            $newBuyer->save();

            $product = new Product;
            $product->buyer_id = $newBuyer->id;
            $product->price_buyer = $item['price_buyer'];
            $product->detail = $item['detail'];
        }

        if($item['buyer_id'] !== 0){

            $product = new Product;
            $product->buyer_id = $item['buyer_id'];
            $product->price_buyer = $item['price_buyer'];
            $product->detail = $item['detail'];
        }

        $model = $item['model'];
        $model = strtolower($model);
        $searchModel = ModelProduct::where('name', $model)->with('brand')->get();


        if($searchModel->isEmpty()){
            $newModel = new ModelProduct;
            $newModel->name = $model;

            $newModel->save();

            $product->model_product_id = $newModel->id;
        }

        if(!$searchModel->isEmpty()){
            $product->model_product_id = $searchModel[0]->id;
            $brand = new Brand;
        }

        $brand = New Brand;
        $brand->name = "s/m";

        $product->save();


        return response()->json(["data" => $product],200);



        // foreach ($array as $mobil) {
        //     $modelo = $mobil['model'];
        //     $modelo = strtolower($modelo);

        //     $product = new Product;
        //     $product->buyer_id = $newBuyer->id;

        //     $searchModel = ModelProduct::where('name', $modelo)->get();

        //     if($searchModel->isEmpty()){
        //         $newModel = new ModelProduct;
        //         $newModel->name = $modelo;
        //         $newModel->save();

        //         $product->modelProduct_id = $newModel->id;
        //     }

        //     if(!$searchModel->isEmpty()){
        //         $product->modelProduct_id = $searchModel[0]->id;
        //     }

        //     $product->price_buy = $mobil['price_buyer'];

        //     $product->detail = $mobil['detail'];

        //     $product->save();
        // }

        // return response()->json(['data'=>$array],200);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Buyer\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    public function show(Buyer $buyer)
    {
        // $buyersProducts = $buyer->select('id','created_at')->with(['products' => function($query){
        //     $query->with(['modelProduct' => function($model){
        //         $model;
        //     }]);
        // }])->findOrFail($buyer->id);


        $buyersProducts = DB::table('products as p')
        ->join('buyers as b', 'p.buyer_id', '=', 'b.id')
        ->join('model_products as m', 'p.model_product_id', '=', 'm.id')
        ->select('b.id as buyer_id', 'b.created_at as buyer_date',
                'p.id as product_id', 'p.price_buyer','p.detail','p.mac','p.state','p.price_sale_max','p.price_sale_min',
                'm.name as model')
        ->where('b.id', '=', $buyer->id)
        ->where('p.deleted_at', '=', null)
        ->orderBy('p.id')
        ->get();

        return response()->json(["data" => $buyersProducts], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Buyer\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $product = Product::findOrFail($id)->with('modelProduct')-get();
        $product = Product::findOrFail($id);


        $model = $request->model;
        $model = strtolower($model);
        $searchModel = ModelProduct::where('name', $model)->get();


        if($searchModel->isEmpty()){
            $newModel = new ModelProduct;
            $newModel->name = $model;

            $newModel->save();

            $product->model_product_id = $newModel->id;
        }

        if(!$searchModel->isEmpty()){
            $product->model_product_id = $searchModel[0]->id;
            // $brand = new Brand;
        }

        $product->price_buyer = $request->price_buyer;
        $product->detail = $request->detail;

        $product->save();

        // $productx = $product->with('modelProduct')->get();

        return response()->json(['data' => $product], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Buyer\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(['data'=> $product->id], 200);
    }
}
