<?php

use Illuminate\Database\Seeder;
use App\Tratamiento;
class TratamientosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tratamiento = Tratamiento::create([
    		'condicion' => 'Consumidor Final',
    		
    	]);
    	$tratamiento = Tratamiento::create([
    		'condicion' => 'Responsable Inscripto',
    		
    	]);
    }
}
