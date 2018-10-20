<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Documento;
use App\Tratamiento;
class Cliente extends Model
{
	
    protected $fillable = ['RazonSocial','NroDocumento',
							'DireccionFiscal','CodigoPostal','PercibeIVA','PercibeIIBB',
							'CondicionPago','EnviarComprobante',
							'MailFacturacion','MailContacto','Telefono','Estado',
							'foto','id_documento','id_tratamiento'];

	public function documento(){

		 return $this->belongsTo(Documento::class);
	}

	public function tratamiento(){

		 return $this->belongsTo(Tratamiento::class);
	}
}
