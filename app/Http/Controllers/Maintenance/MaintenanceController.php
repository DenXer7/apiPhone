<?php

namespace App\Http\Controllers\Maintenance;

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
            ->select('m.id', 'mo.name', 'm.name as maintenances', 'm.price as price_maintenance', 'm.date', 'm.description','m.technical','m.state','p.mac', 'p.state', 'price_buy')
            ->get();

        $maintenancex = Maintenance::all();
        
        return $maintenance;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function show(Maintenance $maintenance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function edit(Maintenance $maintenance)
    {
        //
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
        //
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
