@extends('layouts.master')

@section('content')
	<div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Facturas</h4>
                  
				
                    <a class="btn btn-info" href="{{route('facturas.create')}}">Crear Factura</a>
                                        
				
               
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class="text-primary">
                        	<tr>
	                        	<th>ID</th>
	                        	<th>Nro Factura</th>
                            <th>CUIT</th>
                            <th>Total</th>
	                        
	                        	<th>Acciones</th>
                        	</tr>
                    	</thead>
                      	<tbody>
                      		@foreach($facturas as $factura)
                      		<tr>
                      			<td>{{$factura->id}}</td>
                            <td>{{$factura->numFactura}}</td>
                      			<td>{{$factura->cuit}}</td>
                            <td>{{$factura->total}}</td>
                      		  
                      			<td class="pull-right">
                    				  <a class="btn btn-info pull-right" href="{{route('facturas.edit',$factura->id)}}">
                              Editar
                              </a>
                      			</td>
								
                      			<td>
                      				<form action="{{url('facturas/'.$factura->id)}}" method="POST">
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




