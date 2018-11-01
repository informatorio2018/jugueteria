<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;
use Image;
class MarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Marca::All();
        return view('marcas.index',compact('marcas'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'marca' => 'required|unique:marcas',
            'file'=>'required|max:10000|mimes:jpeg,jpg,png'
            ]);

        $ruta = public_path().'/img/marcas/';
        $temp_name = 'noimage.png';
       if ($request->hasFile('file')){
            $imagenOriginal = $request->file('file');
                      
            $imagen = Image::make($imagenOriginal);         
            $temp_name = $this->random_string() . '.' . $imagenOriginal->getClientOriginalExtension();
             
            $imagen->save($ruta . $temp_name, 70);
        }

        $marca = new Marca;



        $marca->marca = $request->marca;
        $marca->file = '/img/marcas/'.$temp_name;

     
        $marca->save();
        return redirect('marcas')->with('info','Se guardo nueva marca');
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
        $marca = Marca::findOrFail($id);

        return view('marcas.edit',compact('marca'));
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
            'marca' => 'required',
            'file'=>'mimes:jpeg,jpg,png'
            ]);


        $marca = Marca::findOrFail($id);

         
       if ($request->hasFile('file')){
            $ruta = public_path().'/img/marcas/';
            $imagenOriginal = $request->file('file');
                      
            $imagen = Image::make($imagenOriginal);         
            $temp_name = $this->random_string() . '.' . $imagenOriginal->getClientOriginalExtension();
             
            $imagen->save($ruta . $temp_name, 70);

             $marca->file = '/img/marcas/'.$temp_name; 
        }

        $marca->marca = $request->marca;
       

     
        $marca->save();
        return redirect('marcas')->with('info','Se actualizo marca');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $marca = Marca::find($id)->delete();
        return redirect('marcas');
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
