<?php

namespace App;
use App\Cliente;
use App\Articulo;
use App\Empresa;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    protected $fillable = ['ptoVenta','numFactura','cuit','fecha','total','recargo', 'cliente_id', 'user_id'];

    public function cliente(){

    	return $this->belongsTo(Cliente::class,'cliente_id');
    }

  

    public function user(){

    	return $this->belongsTo(User::class,'user_id');
    }

     public function articulos()
    {
       return $this->belongsToMany('App\Articulo')
        ->withPivot('cantidad','medida','precioUnitario','subTotal')
        ->withTimestamps();

    }

    public function artis(){
		return $this->belongsToMany(Articulo::class,'articulo_factura');
	}
}
