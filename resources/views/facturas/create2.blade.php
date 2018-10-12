@extends('layouts.master')

@section('content')

    <div class="row" id="factura">
    
    <div class="col-md-12">
        <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Nueva Facura</h4>
                  <div class="invoice p-3 mb-3">
                <!-- title row -->
                    <div class="row">
                    <div class="col-sm-4 invoice-col">
                        From
                        <address>
                            <strong></strong><br>
                            Jugueteria SA<br>
                            San Francisco, CA 94107<br>
                            4323444<br>
                            jug@mail.com
                        </address>
                    </div>

                    <div class="col-sm-4 invoice-col float-right">
                        To
                        <address>
                            <strong>{{$cliente->RazonSocial}}</strong><br>
                            <strong>Direccion:  </strong>{{$cliente->DireccionFiscal}}<br>
                          
                            <strong>Tel: </strong> {{$cliente->Telefono}}<br>
                            <strong>Tel: </strong> {{$cliente->MailFacturacion}}
                        </address>
                    </div>

                    </div>
                   
               
                  </div>     
                <div class="card-body" >

                    <form method="POST" action="{{route('facturas.store')}}" enctype="'multipart/form-data" file="true">
                            @csrf
                            <input type="" name="user_id" value="{{Auth::user()->id}}" hidden >
                            
                            <div class="row">
                            
                              <div class="col-md-2">
                              <label for="">Punto de Venta</label>
                                <input type="text" class="form-control" name="ptoVenta" placeholder="Punto de Venta">
                              </div>
                              <div class="col-md-3">
                                  <label for="">Num Factura</label>                    
                                  <input type="text" class="form-control" placeholder="Numero de Factura" name="numFactura">
                              </div>
                              
                              <div class="col-md-4">
                                <div class="form-group">
                                    <label>Fecha</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                        </div>
                                        <input type="date" name="fecha" class="form-control float-right" id="reservation">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                
                              </div>
                          
                            </div>
                            <hr>
                            <div class="row">
                            <div class="col-md-4">
                            <div class="form-group">
                                <label>CUIT:</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                    </div>
                                    <input name="cuit" type="text" class="form-control" data-inputmask="'mask': ['99-99999999-9']" data-mask="">
                                </div>
                                <!-- /.input group -->
                                </div>
                                
                              </div>
                            </div>
                            
                            <hr>
                            
                            <div class="row fila">
                            
                              <div class="col-md-4">
                            
                                <select class="form-control" name="codArticulo[]" id="articulo">
                                  <option>Seleccione aritculo...</option>
                                  @foreach($articulos as $articulo)
                                    <option value="{{$articulo->id}}">{{$articulo->articulo}}</option>
                                  @endforeach
                                  
                                </select>
                                
                                </div>
                                <div class="col-md-2">
                                  <input type="text" class="form-control" placeholder="Cantidad" name="cantidad[]">
                              
                                </div>
                                <div class="col-md-2">
                                  <input type="text" class="form-control" placeholder="P.Unitario" id="precio">
                              
                                </div>

                                <div class="col-md-4">
                              
                                  <input type="text" class="form-control" placeholder="Sub Total" name="subTotal[]">
                                
                              </div>

                            </div>
                            <input type='button' class = "add btn btn-success" class="btn btn-success" id='add' value='Add item' />
                          

                            <div class="row">

                              
                              
                              <div class="col-md-3 offset-md-9">
                                <div class="form-group bmd-form-group">
                                
                                  <input type="text" class="form-control" placeholder="Total" name="total">
                                </div>
                              </div>
                            </div>
            

                            <button type="submit" class="btn btn-primary pull-right">Guardar Factura</button>
                            <div class="clearfix"></div>
                          </form>

                </div>
                </div>
        </div>
       </div>
    </div>
    <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
<!-- <script type="text/javascript">
  var p = 0;
    $(document).on("click",".add",function(){
    var n= $('.fila').length+1;
    var temp = $('.fila:first').clone();
    $('input:first',temp).attr('placeholder','Cantidad')
    $('.fila:last').after(temp);
    });

     $('#articulo').on('change', function(e){
       var art = $( "#articulo" ).val();
       var res = traer(art);
      console.log(res);
      //  $('#precio').val(res);
    
       
     });

     function traer(art){
        $.ajax({
        url: '/articulo/'+art,
        dataType: 'json',
      
        success: function(respuesta) {
       
        console.log(respuesta.data['precio']);
         return (respuesta.precio);

        },
        error: function() {
              console.log("No se ha podido obtener la información");
          }
        
      });
     }
</script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.js">
 
</script>
<script>
  var app = new Vue({
    el: '#factura',
   
    data: {
        selected: null,
        options:[],
       
    },
    watch:{
      selected(newval, oldval){
        console.log(this.opciones);
      }
    },
    methods: {
       
        traerUno(id){
          var me = this;
            axios.get('/articulo/'+id)
            .then(function (response) {
                console.log(response.data);
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            .then(function () {
                // always executed
            });
        }
    },
    mounted(){
      
    }
    })
</script>

@endsection