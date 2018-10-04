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
                    <h4 class="card-title ">Lista de Clientes</h4>

                            <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#exampleModal">
                            Nuevo Cliente
                        </button>
            
                
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table">
                        <thead class="text-primary">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                            
                            <th>Foto</th>
                                <th>Email</th>
                                <th class="pull-right">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clientes as $cliente)
                            <tr>
                                <td>{{$cliente->id}}</td>
                                <td>{{$cliente->RazonSocial}}</td>
                                <td>
                                <img src="{{$cliente->foto}}" alt="" width="120px">
                            	</td>
                                <td>{{$cliente->MailFacturacion}}</td>
                                
                                <td class="pull-right">
                               
                                <a class="btn btn-primary" href="{{route('clientes.edit',$cliente->id)}}">
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
                    {{$clientes->render()}}
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
                        <h5 class="modal-title" id="exampleModalLabel">Clientes</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                <h4 class="card-title">Crear Cliente</h4>
                                <p class="card-category">Complete la informacion del cliente</p>
                                </div>
                                <div class="card-body">
                                <form method="POST" action="{{route('clientes.store')}}" enctype="multipart/form-data">
                                   @csrf
                                    <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group bmd-form-group">
                                            <input type="text" class="form-control" name="RazonSocial" placeholder="Nombre" maxlength="20">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                            <div class="form-group bmd-form-group">
                                               <select class="form-control" name="TratamientoImpositivo">
                                               		@foreach($tratamientos as $tratamiento)
                                               		<option value="{{$tratamiento->id}}">{{$tratamiento->condicion}}</option>
                                               		@endforeach
                                               </select>
                                            </div>
                                          </div>
                                    
                                           
                                   
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group bmd-form-group">
                                               <select class="form-control" name="TipoDocumento">
                                               		@foreach($documentos as $documento)
                                               		<option value="{{$documento->id}}">{{$documento->documento}}</option>
                                               		@endforeach
                                               </select>
                                            </div>
                                          </div>
                                        <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <input type="text" class="form-control" name="NroDocumento" placeholder="DNI">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                        
                                        <input type="email" class="form-control" placeholder="Email" name="MailFacturacion">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                        
                                        <input type="number" class="form-control" placeholder="Telefono" name="Telefono">
                                        </div>
                                    </div>
                                    </div>
                                    
                                    
                                    <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group bmd-form-group">
                                        <input type="text" class="form-control" placeholder="Direccion Fiscal" name="DireccionFiscal">
                                        </div>
                                    </div>
                                    

                                    
                                    <div class="col-md-4">
                                        <div class="form-group bmd-form-group">
                                        <input type="number" class="form-control" placeholder="CP" name="CodigoPostal">
                                        </div>
                                    </div>
                                    </div>


                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                           
                                        </div>
                                    </div>
                                    </div>

                                    <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="" type="checkbox" name="Estado" id="exampleRadios1" value="1">
                                            Activo
                                        </div>
                                    </div>
                                    

                                    
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="" type="checkbox" name="PercibeIVA" id="exampleRadios1" value="1">
                                            IVA
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="" type="checkbox" name="PercibeIIBB" id="exampleRadios1" value="1">
                                            Ingresos Brutos
                                        </div>
                                    </div>
                                    </div>

                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <select class="form-control" name="CondicionPago">
                                                    <option value="Debito">Debito</option>
                                                    <option value="Contado">Contado</option>
                                        
                                            </select>
                                        </div>
                                    </div>

                                 {{--    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                        <input type="text" class="form-control" placeholder="Contacto" name="Contacto">
                                        </div>
                                    </div> --}}
                                    </div>

                                        <div class="row">
                                    <div class="col-md-4">
                                            <div class="form-check">
                                        <input class="" type="checkbox" name="EnviarComprobante" id="exampleRadios1" value="1">
                                        Enviar Comprobante
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                    <input type="file" name="Foto" >Seleccionar foto
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


