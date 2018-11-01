<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
use App\Marca;
use App\Categoria;
use Image;
use Excel;
class ArticulosController extends Controller
{
    public function buscarCodigo($value){
        
        $articulos = Articulo::where('codArticulo','LIKE',$value.'%')->get();
        
        // $articulo = Articulo::firstOrFail()->where('codArticulo', $value);
      
        return response()->json($articulos);
    }

    public function buscarArticulo($articulo){
        
        $articulos = Articulo::where('articulo','LIKE','%'.$articulo.'%')->get();
        
        // $articulo = Articulo::firstOrFail()->where('codArticulo', $value);
       
        return response()->json($articulos);
    }

    public function traerArticulo($articulo){
        
        $articulo = Articulo::find($articulo);
        
        // $articulo = Articulo::firstOrFail()->where('codArticulo', $value);
       
        return response()->json($articulo);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $articulos = Articulo::orderBy('id','desc')->paginate(5);
        $marcas = Marca::all();
        $categorias = Categoria::all();
        return view('articulos.index',compact('articulos','marcas','categorias'));
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
            'articulo' => 'required|unique:articulos',
            'marca_id' => 'required',
            'categoria_id' => 'required',
            'cantidad' => 'required',
            'stockMinimo' => 'required',
            'foto'=>'mimes:jpeg,jpg,png'
            ]);

            $ruta = public_path().'/img/articulos/';
            $temp_name = 'noimage.png';
               if ($request->hasFile('foto')){
                    $imagenOriginal = $request->file('foto');
                              
                    $imagen = Image::make($imagenOriginal);         
                    $temp_name = $this->random_string() . '.' . $imagenOriginal->getClientOriginalExtension();
                     
                    $imagen->save($ruta . $temp_name, 70);
                }
            
        
            $articulo = new Articulo;
            $articulo->articulo=$request->articulo;
            $articulo->descripcion=$request->descripcion;
            $articulo->cantidad=$request->cantidad;
            $articulo->stockMinimo=$request->stockMinimo;
            $articulo->precio=$request->precio;
            $articulo->marca_id=$request->marca_id;
            $articulo->categoria_id=$request->categoria_id;
           
            $articulo->foto = '/img/articulos/'.$temp_name;

            $articulo->save();
            
            return redirect('articulos')->with('info','Articulo creado exitosamente');
            
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
    public function lista(){
        return view('articulos.importar');
    }
    public function importarLista(Request $request)
    {
        $request->validate([
            'lista' => 'required'
        ]);
 
        $path = $request->file('lista')->getRealPath();
        $data = Excel::load($path)->get();

       
        if($data->count()){
            foreach ($data as $key => $value) {
                $arr[] = [
                    'codarticulo' => $value->codarticulo,
                    'articulo' => $value->articulo, 
                    'descripcion' => $value->descripcion,
                    'cantidad' => $value->cantidad,
                    'stockminimo' => $value->stockminimo,
                    'precio' => $value->precio,
                    'foto' => $value->foto,
                    'marca_id' => $value->marca_id,
                    'categoria_id' => $value->categoria_id
                    
                ];
            }
 
            if(!empty($arr)){
                Articulo::insert($arr);
            }
        }
 
        return back()->with('success', 'Insert Record successfully.');
    }


    public function alertas(){

        $alertas = array();

        $articulos = Articulo::all();

        foreach($articulos as $articulo){
            if($articulo->cantidad <= $articulo->stockminimo){
                
                array_push ( $alertas ,  $articulo );


            }
        }
        return view('articulos.alertas',compact('alertas'));
    }
}
