@extends('layout.dashboard')

@section('content')
	
	<div class="row">
            <div class="col-md-8 offset-md-1">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Crear Usuario</h4>
                  <p class="card-category">Complete la informacion del usuario</p>
                </div>
                <div class="card-body">
                  <form method="POST" action="{{route('usuarios.store')}}" enctype="'multipart/form-data" file="true">
                  	@csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                            <input type="text" class="form-control" name="name" placeholder="Nombre">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label>Seleccione Foto</label>
                        <input type="file" class="form-control" name="file" >
                       
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                        
                          <input type="email" class="form-control" placeholder="Email" name="email">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                        
                          <input type="password" class="form-control" placeholder="Contraseña" name="password">
                        </div>
                      </div>
                    </div>
                   
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                        <select class="form-control" name="rol">
                        	@foreach($roles as $rol)
								            <option value="{{$rol->id}}">{{$rol->name}}</option>
                        	@endforeach
                        	
                        </select>
                         
                        </div>
                      </div>
                    </div>

                    <button type="submit" class="btn btn-primary pull-right">Guardar Usuario</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          
          </div>
	
@endsection