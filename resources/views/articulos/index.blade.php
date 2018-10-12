@extends('layouts.master')

@section('content')

	<div class="container">
   
         <div class="col-md-6">
            <div class="form-group bmd-form-group">
            
                
            </div>
        </div>
      
    	<div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Lista de Articulos</h4>

                            <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#exampleModal">
                            Nuevo Articulo
                        </button>
            
                
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table">
                        <thead class="text-primary">
                            <tr>
                                <th>ID</th>
                                <th>Articulo</th>
                            
                                <th>Foto</th>
                                <th>Precio</th>
                                <th class="pull-right">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($articulos as $articulo)
                            <tr>
                                <td>{{$articulo->id}}</td>
                                <td>{{$articulo->articulo}}</td>
                                <td>
                                <img src="{{$articulo->foto}}" alt="" width="120px">
                            	</td>
                                <td>{{$articulo->precio}}</td>
                                
                                <td class="pull-right">
                               
                                <a class="btn btn-primary" href="{{route('articulos.edit',$articulo->id)}}">
                                <i class="fas fa-edit"></i>Editar
                                </a>
                           
                                </td>
                                
                                <td>
                                    
                                    <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>Eliminar
                                    </button>    
                                
                                </td>
                            
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$articulos->render()}}
                    </div>
                </div>

                </div>
            </div>
           
        </div>


        <div class="modal fade bd-example-modal-lg" id="exampleModal" 
            tabindex="-1" role="dialog" 
            aria-labelledby="exampleModalLabel" 
            aria-hidden="true">

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Articulos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                <h4 class="card-title">Crear Articulo</h4>
                                <p class="card-category">Complete la informacion del articulo</p>
                                </div>
                                <div class="card-body">
                                <form method="POST" action="{{route('articulos.store')}}" enctype="multipart/form-data">
                                   @csrf
                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                        <label for="">Articulo</label>
                                            <input type="text" class="form-control" name="articulo" placeholder="Articulo" maxlength="20">
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                            <div class="form-group bmd-form-group">
                                            <label for="">Marca</label>
                                               <select class="form-control" name="marca_id">
                                               		@foreach($marcas as $marca)
                                               		<option value="{{$marca->id}}">{{$marca->marca}}</option>
                                               		@endforeach
                                               </select>
                                            </div>
                                    </div>


                                    
                                    </div>
                                    <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group bmd-form-group">
                                        <label for="">Descripcion</label>
                                            <input type="text" class="form-control" name="descripcion" placeholder="Descripcion">
                                        </div>
                                    </div>
                                    
                                           
                                   
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group bmd-form-group">
                                            <label for="">Categoria</label>
                                               <select class="form-control" name="categoria_id">
                                               		@foreach($categorias as $categoria)
                                               		<option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                                               		@endforeach
                                               </select>
                                            </div>
                                          </div>
                                        <div class="col-md-4">
                                        <div class="form-group bmd-form-group">
                                        <label for="">Cantidad</label>
                                            <input type="text" class="form-control" name="cantidad" placeholder="Cantidad">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group bmd-form-group">
                                        <label for="">Stock Minimo</label>
                                        <input type="text" class="form-control" placeholder="Stock Minimo" name="stockMinimo">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                        <label for="">Precio</label>
                                        <input type="number" class="form-control" placeholder="Precio" name="precio">
                                        </div>
                                    </div>
                                    </div>
                                    
                                    
                               
                                    
                                   
                                    
                                
                                        <div class="row">
                                
                                    <div class="col-md-8">
                                    <input type="file" name="foto" >Seleccionar foto
                                    </div>
                                    </div>
											
                       
                                   
                                    <input type="submit" class="btn btn-primary pull-right" value="Guardar"> 

                                    <div class="clearfix"></div>

                                </form>
                                </div>
                            </div>
                            </div>
                        
                        </div>
                    </div>
      
                </div>
            </div>
        </div>

</div>
@endsection


