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
                                <input type="text" class="form-control" name="ptoVenta" placeholder="Punto de Venta" value="1">
                              </div>
                              <div class="col-md-3">
                                  <label for="">Num Factura</label>                    
                                  <input type="text" class="form-control" placeholder="Numero de Factura" name="numFactura" value="{{($factura->numFactura)+1}}">
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
                                        <input type="date" name="fecha" class="form-control float-right" id="reservation" value="{{$fecha}}">
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
                                    <input name="cuit" type="text" class="form-control" >
                                </div>
                                <!-- /.input group -->
                                </div>
                                
                              </div>
                            </div>
                            
                            <hr>
                            
                            <div class="row fila">
                            
                              <div class="col-md-4">
                                <label>Seleccione Articulo</label>
                                <select class="form-control" 
                                  id="articulo" 
                                  v-model="cod"
                                  :key="articulo.id"
                                  @change="traerUno()">
                                 
                                  @foreach($articulos as $articulo)
                                    <option value="{{$articulo->id}}">{{$articulo->articulo}}</option>
                                  @endforeach
                                  
                                </select>
                                
                                </div>
                                <div class="col-md-2">
                                <label for="">Disponibles</label>
                                  <input type="text" class="form-control" 
                                  placeholder="Unidades" 
                                
                                  v-model="cantidad"
                                 
                                  @click="borrar()"
                                  >
                              
                                </div>
                                <div class="col-md-2">
                                <label for="">P Unitario</label>
                                  <input type="text" class="form-control" placeholder="P.Unitario" id="precio" v-model="precio">
                              
                                </div>

                                <!-- <div class="col-md-4">
                                  <label for="">SubTotal</label>
                                  <input type="text" 
                                  class="form-control" 
                                  placeholder="Sub Total" 
                                 
                                  v-model="subTotal">
                                
                              </div> -->

                            </div>
                            <!-- <input type='button' class = "add btn btn-success" class="btn btn-success" id='add' value='Add item' />
                          

                            
             -->

                            <div class="clearfix"></div>
                            <hr>
                            <button type='button' class="btn btn-info" @click="addNewRow()">
                            <i class="fas fa-plus-circle"></i>
                            Add
                            </button>
                            <table class="table">
                             <thead>
                             <tr>
                             <th>Del</th>
                             <th>CodArticulo</th>
                             <th>Articulo</th>
                             <th>Cantidad</th>
                             <th>P. Unitario</th>
                             <th>subTotal</th>
                             </tr>
                             </thead>
                             <tbody>
                             <tr v-for="(invoice_product, k) in detalles" :key="k" v-if="k>0">
                                  <td scope="row" class="trashIconContainer">
                                      <i class="far fa-trash-alt" @click="deleteRow(k, invoice_product)"></i>
                                  </td>
                                  <td>
                                      <input name="codArticulo[]" class="form-control" type="text" v-model="invoice_product.codArticulo" />
                                  </td>
                                  <td>
                                      <input class="form-control " type="text" v-model="invoice_product.articulo" />
                                  </td>
                                
                                  <td>
                                      <input name="cantidad[]" class="form-control text-right" type="number" min="0" step="1" v-model="invoice_product.unidades" @change="calculateLineTotal(invoice_product)"
                                      />
                                  </td> 
                                  <td>
                                      <input name="precioUnitario[]" class="form-control text-right" type="number" min="0" step=".01" v-model="invoice_product.precioUnitario" @change="calculateLineTotal(invoice_product)"
                                      />
                                  </td>
                                  <td>
                                      <input readonly name="subTotal[]" class="form-control text-right" type="number" min="0" step=".01" v-model="invoice_product.sTotal" />
                                  </td>
                              </tr>
                             
                             </tbody>
                            </table>
  
                            <div class="row">

                              <div class="col-md-3 offset-md-9">
                                <div class="form-group bmd-form-group">
                                  <label for="">Total</label>
                                  <input type="text" class="form-control" placeholder="Total" name="total" v-model="total">
                                </div>
                              </div>
                            </div>
                            <div class="row">

                              <div class="col-md-3 offset-md-9">
                                <div class="form-group bmd-form-group">
                                  <label for="">Recargo</label>
                                  <input 
                                    @change="calculateTotal()"
                                    type="text"
                                    class="form-control" 
                                    placeholder="Recargo"
                                    name="tax" 
                                    v-model="invoice_tax">
                                </div>
                              </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Guardar Factura</button>

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
  <script src="https://unpkg.com/vue@latest"></script>
  <script src="https://unpkg.com/vue-select@latest"></script>   
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

       
 <script>
    Vue.component('v-select', VueSelect.VueSelect);
   var app = new Vue({
    el: '#factura',
   
    data: {
        selected: null,
        cod:'',
        articulo:'',
        precio:0,
        telefono:'3735',
        todo:[],
        articulo:[],
        cantidad:0,
        subTotal:0,
        sTotal:0,
        total:0,
        invoice_tax:21,
        detalles: [{
                codArticulo: '',
                articulo: '',
                precioUnitario: '',
                unidades: '',
                sTotal: 10
            }],
    },
    computed:{
      
    },
    watch:{
      
      cod(newval, oldval){
       
      },
      cantidad(newval, oldval){
       this.subTotal = (this.cantidad * this.precio);
       
      },
      precio(newval, oldval){
       this.subTotal = (this.cantidad * this.precio);
      }
    },
    methods: {
        
        calculateTotal() {
            var subtotal, total;
            subtotal = this.detalles.reduce(function (sum, product) {
                var lineTotal = parseFloat(product.sTotal);
                if (!isNaN(lineTotal)) {
                    return sum + lineTotal;
                }
            }, 0);

            this.sTotal = subtotal.toFixed(2);

            total = (subtotal * (this.invoice_tax / 100)) + subtotal;
            total = parseFloat(total);
            if (!isNaN(total)) {
                this.total = total.toFixed(2);
            } else {
                this.total = '0.00'
            }
        },
        calculateLineTotal(invoice_product) {
            var total = parseFloat(invoice_product.precioUnitario) * parseFloat(invoice_product.unidades);
            if (!isNaN(total)) {
                invoice_product.sTotal = total.toFixed(2);
            }
            this.calculateTotal();
        },
        deleteRow(index, invoice_product) {
            var idx = this.detalles.indexOf(invoice_product);
            console.log(idx, index);
            if (idx > -1) {
                this.detalles.splice(idx, 1);
            }
            this.calculateTotal();
        },
      addNewRow() {
            this.detalles.push({
                codArticulo: this.cod,
                articulo: this.articulo,
                precioUnitario: this.precio,
                unidades:'',
                sTotal: 0
            });
            
          
           
        },
      borrar(){
        this.cantidad ='';
      },
        calcular(){
         
        },
        traerTodos(){
            var me = this;
            axios.get('/listar')
            .then(function (response) {
                var respuesta =  response;
                me.opciones = respuesta.data;
                me.todo = respuesta.data;
               
                
             
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            .then(function () {
                // always executed
            });

        },
        traerUno(id = this.cod){
          var me = this;
            axios.get('/articulo/'+id)
            .then(function (response) {
              var res = response.data;
                me.precio = res.precio;
                me.cod = res.id;
                me.articulo = res.articulo;
                me.cantidad = res.cantidad;
                
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