<?php

use App\Brand;
use App\Buyer;
use App\Branch;
use App\Client;
use App\Output;
use App\Product;
use App\Provider;
use App\Maintenance;
use App\ModelProduct;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        //Para limpiar loas tablas a traves de los modelos
        Provider::truncate();
        Buyer::truncate();
        Brand::truncate();
        ModelProduct::truncate();
        Branch::truncate();
        Maintenance::truncate();
        Client::truncate();
        Output::truncate();
        DB::table('buyer_product')->truncate(); 
        
        // guardar en variables las cantidades 
        $cantidadProvider = 3;
        $cantidadBuyer = 10;

        $cantidadBrand = 10;
        $cantidadModel = 30;

        $cantidadBranch = 3;
        $cantidadMaintenance = 10;

        $cantidadClient = 70;
        $cantidadOutput = 70;

        $cantidadProduct = 150;


    
        // EJECUTAR LOS FACTORY
        factory(Provider::class , $cantidadProvider)->create();
        factory(Buyer::class , $cantidadBuyer)->create();

        factory(Brand::class, $cantidadBrand)->create();
        factory(ModelProduct::class, $cantidadModel)->create();

        factory(Branch::class, $cantidadBranch)->create();

        factory(Client::class, $cantidadClient)->create();
        


        factory(Product::class , $cantidadProduct)->create()->each(function ($producto){
            $buyer = Buyer::all()->random(mt_rand(1, 5))->pluck('id');
            // $output = Output::all()->random();


            // buyer() => funcion de la clase Product que "return $this->belongsToMany(Buyer::class)"
            $producto->buyer()->attach($buyer);

            // // output() => funcion de la clase Product que "return $this->belongsToMany(Output::class)"
            // $producto->output()->attach($output);
            
        });

        factory(Output::class, $cantidadOutput)->create()->each(function ($output){
            $product = Product::all()->random();

            // output() => funcion de la clase Product que "return $this->belongsToMany(Product::class)"
            $output->product()->attach($output);
        });

        factory(Maintenance::class, $cantidadMaintenance)->create();


        

        
    }
}
