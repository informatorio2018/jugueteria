<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Documento;
use App\Tratamiento;
use Image;
class ClientesController extends Controller
{

     // 'RazonSocial','TipoDocumento','NroDocumento',
     //                        'DireccionFiscal','CodigoPostal','PercibeIVA','PercibeIIBB',
     //                        'CondicionPago','TratamientoImpositivo','EnviarComprobante',
     //                        'MailFacturacion','MailContacto','Contacto','Telefono','Estado',
     //                        'foto' 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $clientes = Cliente::orderBy('id','desc')->paginate(5);
        $documentos = Documento::all();
        $tratamientos = Tratamiento::all();
        
        return view('clientes.index',compact('clientes','documentos','tratamientos'));
    }

    public function buscar($id){
        return Cliente::find($id);
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
        
      
        $validatedData = $request->validate([
            'RazonSocial' => 'required|unique:clientes',
            'NroDocumento' => 'required|unique:clientes|min:0|max:99999999',
            'DireccionFiscal' => 'required',
            'foto'=>'mimes:jpeg,jpg,png'
            ]);

        $ruta = public_path().'/img/clientes/';
        $temp_name = 'noimage.png';
           if ($request->hasFile('foto')){
                $imagenOriginal = $request->file('foto');
                          
                $imagen = Image::make($imagenOriginal);         
                $temp_name = $this->random_string() . '.' . $imagenOriginal->getClientOriginalExtension();
                 
                $imagen->save($ruta . $temp_name, 70);
            }
        
            
          


    //    no guarda foto
        $cliente = new Cliente;
        $cliente->RazonSocial=$request->RazonSocial;
        $cliente->id_documento=$request->TipoDocumento;
        $cliente->NroDocumento=$request->NroDocumento;
        $cliente->DireccionFiscal=$request->DireccionFiscal;
        $cliente->CodigoPostal=$request->CodigoPostal;
        
        if ($request->PercibeIVA==1) {
            $cliente->PercibeIVA=1;

        }else{
            $cliente->PercibeIVA=0;
        }
        
        if ($request->PercibeIIBB==1) {
            $cliente->PercibeIIBB=$request->PercibeIIBB;

        }else{
            $cliente->PercibeIIBB=0;
        }
        
        $cliente->CondicionPago=$request->CondicionPago;
        $cliente->id_tratamiento=$request->TratamientoImpositivo;
        
        if ($request->EnviarComprobante==1) {
            $cliente->EnviarComprobante=1;

        }else{
            $cliente->EnviarComprobante=0;
        }
       
        $cliente->MailFacturacion=$request->MailFacturacion;
       
        $cliente->Telefono=$request->Telefono;
        
        if ($request->Estado==1) {
            $cliente->Estado=1;

        }else{
            $cliente->Estado=0;
        }
        
        $cliente->foto = '/img/clientes/'.$temp_name;

        $cliente->save();
        
        return redirect('clientes')->with('info','Cliente creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = Cliente::find($id);
        $documentos = Documento::all();
        $tratamientos = Tratamiento::all();
       
        return view('clientes.edit',compact('cliente','documentos','tratamientos'));
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $validatedData = $request->validate([
            'RazonSocial' => 'required',
            'NroDocumento' => 'required|min:0|max:99999999',
            'DireccionFiscal' => 'required',
            'CodigoPostal' => 'required',
            'foto'=>'mimes:jpeg,jpg,png'
            ]);

       
        $cliente = Cliente::find($id);

        $ruta = public_path().'/img/clientes/';

        if ($request->hasFile('foto')){
            $imagenOriginal = $request->file('foto');
                      
            $imagen = Image::make($imagenOriginal);         
            $temp_name = $this->random_string() . '.' . $imagenOriginal->getClientOriginalExtension();
             
            $imagen->save($ruta . $temp_name, 70);
            $temp_name = '/img/clientes/'.$temp_name;

        }else{

            $temp_name = $cliente->foto;
        }



       
        $cliente->RazonSocial=$request->RazonSocial;
        $cliente->id_documento=$request->TipoDocumento;
        $cliente->NroDocumento=$request->NroDocumento;
        $cliente->DireccionFiscal=$request->DireccionFiscal;
        $cliente->CodigoPostal=$request->CodigoPostal;
        
        if ($request->PercibeIVA==null) {
            $cliente->PercibeIVA=0;

        }else{
            $cliente->PercibeIVA=1;
        }
        
        if ($request->PercibeIIBB==null) {
            $cliente->PercibeIIBB=0;

        }else{
            $cliente->PercibeIIBB=1;
        }
        
        $cliente->CondicionPago=$request->CondicionPago;
        $cliente->id_tratamiento=$request->TratamientoImpositivo;
        
        if ($request->EnviarComprobante==null) {
            $cliente->EnviarComprobante=0;

        }else{
            $cliente->EnviarComprobante=1;
        }
       
        $cliente->MailFacturacion=$request->MailFacturacion;
       
        $cliente->Telefono=$request->Telefono;
        
        if ($request->Estado==null) {
            $cliente->Estado=0;

        }else{
            $cliente->Estado=1;
        }
        
        $cliente->foto = $temp_name;
       
        $cliente->save();
        
        return redirect('clientes')->with('info','Post actualizado exitosamente');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id)->delete();
       return back()->with('info','Eliminado Exitosamente');
    }
    protected function random_string()
    {
        $key = '';
        $keys = array_merge( range('a','z'), range(0,9) );
     
        for($i=0; $i<10; $i++)
        {
            $key .= $keys[array_rand($keys)];
        }
     
        return $key;
    }
}
