<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;



class HomeController extends Controller
{
    private $excel;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

   



    // public function importFromFile(Request $request)
    // {
    //     /** Cargando el excel mediante un archivo recibido vía POST con name=productos */
    //     Excel::load($request->users->getRealPath(), function ($reader) {
    //         /**
    //          * $reader->get() nos permite obtener todas las filas de nuestro archivo
    //          */
    //         foreach ($reader->get() as $key => $row) {
    //             $user = [
    //                 'name' => $row['name'],
    //                 'email' => $row['email'],
    //                 'password' => bcrypt($row['password'])
    //             ];
    //             /** Una vez obtenido los datos de la fila procedemos a registrarlos */
    //             if (!empty($user)) {
    //                 DB::table('users')->insert($user);
    //             }
    //         }
    //         echo 'Los productos han sido importados exitosamente';
    //     });
    // }

    public function import(Request $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);
 
        $path = $request->file('import_file')->getRealPath();
        $data = Excel::load($path)->get();
 
        if($data->count()){
            foreach ($data as $key => $value) {
                $arr[] = [
                    'name' => $value->name, 
                    'email' => $value->email,
                    'password' => bcrypt($value->password)];
            }
 
            if(!empty($arr)){
                User::insert($arr);
            }
        }
 
        return back()->with('success', 'Insert Record successfully.');
    }
}
