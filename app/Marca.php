<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Articulo;
class Marca extends Model
{
     protected $fillable = ['marca','file'];

	public function articulos(){

		 return $this->hasMany(Articulo::class);
	}
}
