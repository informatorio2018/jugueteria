<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Marca;
use App\Categoria;
class Articulo extends Model
{
    protected $fillable = [
							'codarticulo',
							'articulo',
							'descripcion',
							'cantidad',
							'stockminimo',
							'precio',
							'foto',
							'marca_id',
							'categoria_id',
							];

	public function marca(){

		 return $this->belongsTo('App\Marca','marca_id');
	}

	public function categoria(){

		 return $this->belongsTo('App\Categoria','categoria_id');
	}

	public function facturas(){

		return $this->belongsToMany('App\Factura')
        ->withPivot('articulo_factura','cantidad','medida','precioUnitario','subTotal')
        ->withTimestamps();  
	}

	public function factus(){
		return $this->belongsToMany(Factura::class,'articulo_factura');
	}
}
