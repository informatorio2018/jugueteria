@extends('layouts.master')

@section('content')
	<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Lista de Marcas</h4>
                  
					
					      <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#exampleModal">
                  Nueva Marca
                </button>
                					
				
               
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class="text-primary">
                        	<tr>
	                        	<th>ID</th>
	                        	<th>Marca</th>
                            <th>Logo</th>
	                        
	                        	<th>Acciones</th>
                        	</tr>
                    	</thead>
                      	<tbody>
                      		@foreach($marcas as $marca)
                      		<tr>
                      			<td>{{$marca->id}}</td>
                      			<td>{{$marca->marca}}</td>
                      		  <td>
                              <img src="{{$marca->file}}" width="90px">
                            </td>
                      			<td class="pull-right">
                    				  <a class="btn btn-info pull-right" href="{{route('marcas.edit',$marca->id)}}">
                              Editar
                              </a>
                      			</td>
								
                      			<td>
                      				<form action="{{url('marcas/'.$marca->id)}}" method="POST">
                      					@csrf
                      					@method('DELETE')
                      					<button type="submit" class="btn btn-warning">Eliminar</button>
                      				</form>	
                      				
                      			</td>
							
                           	</tr>
                           	@endforeach
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
           
          </div>
@endsection


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="POST" action="{{route('marcas.store')}}" enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                            <input type="text" class="form-control" name="marca" placeholder="Marca">
                        </div>
                      </div>
                      </div>
                    <div class="row">
                      <div class="col-md-6">
                        <label>Seleccione Logo</label>
                        <input type="file" class="form-control" name="file" >
                       
                      </div>
                    </div>

                   
                   

                    <button type="submit" class="btn btn-primary pull-right">Guardar</button>
                    <div class="clearfix"></div>
            </form>
      </div>
     
    </div>
  </div>
</div>

