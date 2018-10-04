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
						                   		<option value="{{$tratamiento->id}}">{{$tratamiento->condicion}}</option>
						                   		@endforeach
						                   </select>
						                </div>
						              </div>
						              <div class="col-md-3">
							            <div class="form-group bmd-form-group">
							            	<label>Condicion de Pago</label>
							                <select class="form-control" name="CondicionPago">
							                        <option value="Debito">Debito</option>
							                        <option value="Contado">Contado</option>
							            
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
						                   		<option value="{{$documento->id}}">{{$documento->documento}}</option>
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
						                <input class="" type="checkbox" name="Estado" id="exampleRadios1" value="1">
						                Activo
						            </div>
						        </div>
						        

						        
						        <div class="col-md-3">
						            <div class="form-check">
						                <input class="" type="checkbox" name="PercibeIVA" id="exampleRadios1" value="1">
						                IVA
						            </div>
						        </div>

						        <div class="col-md-3">
						            <div class="form-check">
						                <input class="" type="checkbox" name="PercibeIIBB" id="exampleRadios1" value="1">
						                Ingresos Brutos
						            </div>
						        </div>
						        <div class="col-md-4">
						                <div class="form-check">
						            <input class="" type="checkbox" name="EnviarComprobante" id="exampleRadios1" value="1">
						            Enviar Comprobante
						            </div>
						        </div>
						        </div>
						        


			        <div class="row">
			    
				        <div class="col-md-8">
				        <input type="file" name="Foto" >Seleccionar foto
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