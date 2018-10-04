<?php

use Illuminate\Database\Seeder;
use App\Cliente;
class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Cliente::class,20)->create()->each(function(App\Cliente $clientes){
            $clientes->documento(rand(1,2));
            $clientes->tratamiento(rand(1,2));
        });
    }
}
