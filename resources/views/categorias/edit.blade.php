@extends('layout.dashboard')

@section('content')
	
	<div class="row">
            <div class="col-md-8 offset-md-1">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Editar Usuario</h4>
                  <p class="card-category">Actualice la informacion del usuario</p>
                </div>
                <div class="card-body">
                  <form method="POST" action="{{route('categorias.update',$categoria->id)}}" enctype="multipart/form-data">
                    @csrf
                     @method('PUT')
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                            <input type="text" class="form-control" name="categoria" value="{{$categoria->categoria}}">
                        </div>
                      </div>
                      </div>
                   

                    <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                    <div class="clearfix"></div>
            </form>
                </div>
              </div>
            </div>
          
          </div>
	
@endsection