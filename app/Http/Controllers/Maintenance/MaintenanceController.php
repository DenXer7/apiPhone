<?php

namespace App\Http\Controllers\Maintenance;

use App\Product;
use App\Maintenance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maintenance = DB::table('maintenances as m')
            ->join('products as p', 'm.product_id','=','p.id')
            ->join('model_products as mo', 'p.id_model_product', '=', 'mo.id')
            ->select('m.id', 'mo.name', 'm.product_id', 'm.state as state_maintenance', 'm.name as maintenances', 'm.price as price_maintenance', 'm.date', 'm.description','m.technical','m.state as state_product','p.mac', 'p.state', 'price_buy')
            ->get();

        $maintenancex = Maintenance::all();
        
        return $maintenance;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // El Celular que se queire dar mantenimiento no debe tener estado "mantenimiento"
        // Al guardar la reparacion El Celular cambia el estado a "mantenimiento"
        $product = Product::find($request->product_id);
        
        if($product->state != Product::MANTENIMIENTO)
        {
            $maintenance = Maintenance::create($request->all());
            $product->state = Product::MANTENIMIENTO;
            $product->save();
            return response()->json(['data' => $maintenance], 201);
        }
        
            return response()->json('Error, escoga otro producto', 409);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function show(Maintenance $maintenance)
    {
        return response()->json(['data' => $maintenance], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maintenance $maintenance)
    {
        $maintenance->product_id = $request->product_id;
        $maintenance->name = $request->name;
        $maintenance->price = $request->price;
        $maintenance->date = $request->date;
        $maintenance->description = $request->description;
        $maintenance->technical = $request->technical;

        $stateRequest = $request->state;
        $stateMaintenance = $maintenance->state;
        
        if($stateRequest == Maintenance::REALIZADO or $stateRequest == Maintenance::CANCELADO or $stateRequest == Maintenance::PROCESO or $stateRequest == Maintenance::DEVUELTO )
        {
            $maintenance->state = $stateRequest;
        }else
        {
            if($stateRequest == $stateMaintenance or $stateRequest == $stateMaintenance or $stateRequest == $stateMaintenance or $stateRequest == $stateMaintenance )
            {
                $maintenance->state = $stateRequest;
            }
            
        }
        $maintenance->update();
        
        return response()->json(['data' => $maintenance], 200);
        
        // $stateBack = Maintenance::findOrFail('1');

        // return $maintenance->state;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maintenance $maintenance)
    {
        //
    }
}
