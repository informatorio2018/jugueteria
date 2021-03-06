@extends('layouts.master')

@section('content')
	
	<div class="row">
                        <div class="col-md-10">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                <h4 class="card-title">Actualizar Cliente</h4>
                                <p class="card-category">Complete la informacion del cliente</p>
                                </div>
                                <div class="card-body">
							<form method="POST" action="{{route('clientes.update',$cliente->id)}}" enctype="multipart/form-data">
						        @csrf
								<input name="_method" type="hidden" value="PUT">
						        <div class="row">
							        <div class="col-md-5">
							            <div class="form-group bmd-form-group">
							            	<label> Razon Social</label>
							                <input type="text" class="form-control"  value="{{$cliente->RazonSocial}}" name="RazonSocial" placeholder="Nombre" maxlength="20">
							            </div>
							        </div>
						        	<div class="col-md-4">
						                <div class="form-group bmd-form-group">
						                	<label>Tratamiento Impositivo</label>
						                   <select class="form-control" name="TratamientoImpositivo">
						                   		@foreach($tratamientos as $tratamiento)
												
													@if($tratamiento->id == $cliente->id_tratamiento)
												 	<option value="{{$tratamiento->id}}" selected="selected">{{$tratamiento->condicion}}</option>

												  @else
												  <option value="{{$tratamiento->id}}" >{{$tratamiento->condicion}}</option>
												  @endif
						                   		
						                   		@endforeach
						                   </select>
						                </div>
						              </div>
						              <div class="col-md-3">
							            <div class="form-group bmd-form-group">
							            	<label>Condicion de Pago</label>
							                <select class="form-control" name="CondicionPago">
											
												@if($cliente->CondicionPago == "Debito")
							                        <option value="Debito" selected="selected">Debito</option>
												@else
							                        <option value="Contado">Contado</option>
												@endif
							            
							                </select>
							            </div>
							        </div>
						        
						               
						       
						        </div>

						        <div class="row">
						            <div class="col-md-3">
						                <div class="form-group bmd-form-group">
						                	<label>Tipo de Documento</label>
						                   <select class="form-control" name="TipoDocumento">
						                   		@foreach($documentos as $documento)
												  @if($documento->id == $cliente->id_documento)
												  <option value="{{$documento->id}}" selected="selected">{{$documento->documento}}</option>
												  @else
												  <option value="{{$documento->id}}">{{$documento->documento}}</option>
												  @endif
												
						                   		@endforeach
						                   </select>
						                </div>
						              </div>

						            <div class="col-md-3">
						            	<label>Num de Documento</label>
						            	<div class="form-group bmd-form-group">
						                <input type="text" class="form-control" name="NroDocumento" value="{{$cliente->NroDocumento}}">
						            	</div>
						        	</div>
						        <div class="col-md-6">
						            <div class="form-group bmd-form-group">
						            <label>Email</label>
						            <input type="email" class="form-control" value="{{$cliente->MailFacturacion}}" name="MailFacturacion">
						            </div>
						        </div>
						
						       
						        </div>
						        
						        
						        <div class="row">
 									<div class="col-md-4">
						            	<div class="form-group bmd-form-group">
						            	<label>Telefono</label>
						            	<input type="text" class="form-control" value="{{$cliente->Telefono}}" name="Telefono">
						            	</div>
						        	</div>

						        <div class="col-md-4">
						            <div class="form-group bmd-form-group">
						            	<label>Direccion</label>
						            <input type="text" class="form-control" value="{{$cliente->DireccionFiscal}}" name="DireccionFiscal">
						            </div>
						        </div>
						                                    

						                                    
						        <div class="col-md-2">
						            <div class="form-group bmd-form-group">
						            	<label>Codigo Postal</label>
						            <input type="number" class="form-control" value="{{$cliente->CodigoPostal}}" name="CodigoPostal">
						            </div>
						        </div>
						        </div>


						        <div class="row">
						        <div class="col-md-2">
						            <div class="form-check">
										@if($cliente->Estado == 0)
										<input class="" type="checkbox" name="Estado" id="exampleRadios1" value="0">

										@else
										<input class="" type="checkbox" name="Estado" id="exampleRadios1" value="1" checked>

										@endif
						                Activo
						            </div>
						        </div>
						        

						        
						        <div class="col-md-3">
						            <div class="form-check">
										@if($cliente->PercibeIVA == 0)
										<input class="" type="checkbox" name="PercibeIVA" id="exampleRadios1" value="0">

										@else
										<input class="" type="checkbox" name="PercibeIVA" id="exampleRadios1" value="1" checked>

										@endif
						               
						                IVA
						            </div>
						        </div>

						        <div class="col-md-3">
						            <div class="form-check">
									@if($cliente->PercibeIIBB == 0)
										<input class="" type="checkbox" name="PercibeIIBB" id="exampleRadios1" value="0">

										@else
										<input class="" type="checkbox" name="PercibeIIBB" id="exampleRadios1" value="1" checked>

										@endif
						   
						                Ingresos Brutos
						            </div>
						        </div>
						        <div class="col-md-4">
						                <div class="form-check">
										@if($cliente->EnviarComprobante == 0)
										<input class="" type="checkbox" name="EnviarComprobante" id="exampleRadios1" value="0">

										@else
										<input class="" type="checkbox" name="EnviarComprobante" id="exampleRadios1" value="1" checked>

										@endif	
						            Enviar Comprobante
						            </div>
						        </div>
						        </div>
						        


			        <div class="row">
						<div class="form-group bmd-form-group">
				        <div class="col-md-8">
						<img src="{{$cliente->foto}}" alt="" width="120px">
						<input type="file" name="foto" >Seleccionar foto
				        </div>
						</div>
			    	</div>
																				
			      <div class="clearfix"></div>              
			        <div class="row">
			         	<div class="col-md-4">
			            	<div class="form-group bmd-form-group">
								<input type="submit" class="btn btn-primary pull-right" value="Actualizar"> 
			            	</div>
			         	</div>	
			         	
			         	<div class="col-md-4">
			            	<div class="form-group bmd-form-group">
								<a href="{{route('clientes.index')}}" class="btn btn-success">Volver</a>
			            	</div>
			         	</div>

			     	</div>
							         	 								

						       
			         </div>

			       

			        </form>
                    </div>
                </div>
    	</div>
    </div>




@endsection