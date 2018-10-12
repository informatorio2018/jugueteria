<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Marca;
use App\Categoria;
class Articulo extends Model
{
    protected $fillable = ['articulo','descripcion',
							'cantidad','stockMinimo','precio','foto','categoria_id',
							'marca_id'];

	public function marca(){

		 return $this->belongsTo('App\Marca','marca_id');
	}

	public function categoria(){

		 return $this->belongsTo('App\Categoria','categoria_id');
	}
}
