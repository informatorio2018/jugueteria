@extends('layouts.master')

@section('content')
	<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Categorias</h4>
                  
					
					      <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#exampleModal">
                  Nueva Categoria
                </button>
                					
				
               
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class="text-primary">
                        	<tr>
	                        	<th>ID</th>
	                        	<th>Categoria</th>
                                             
	                        	<th>Acciones</th>
                        	</tr>
                    	</thead>
                      	<tbody>
                      		@foreach($categorias as $categoria)
                      		<tr>
                      			<td>{{$categoria->id}}</td>
                      			<td>{{$categoria->categoria}}</td>
                      		  
                      			<td class="pull-right">
                    				  <a class="btn btn-info pull-right" href="{{route('categorias.edit',$categoria->id)}}">
                              Editar
                              </a>
                      			</td>
								
                      			<td>
                      				<form action="{{url('categorias/'.$categoria->id)}}" method="POST">
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
          <form method="POST" action="{{route('categorias.store')}}" enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                            <input type="text" class="form-control" name="categoria" placeholder="Categoria">
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

