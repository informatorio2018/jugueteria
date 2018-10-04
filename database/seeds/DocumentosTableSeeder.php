<?php

use Illuminate\Database\Seeder;
use App\Documento;

class DocumentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $documento = Documento::create([
    		'documento' => 'DNI',
    		
    	]);

    	$documento = Documento::create([
    		'documento' => 'CUIT',
    		
    	]);
    }
}
