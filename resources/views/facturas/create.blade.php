@extends('layouts.master')

@section('content')

    <div class="row" id="factura">
    <div class="row">
    <!-- <div class="row">
        <div class="col-sm-8">
            <h1>Building an Autocomplete Component with Vue.js and PHP Laravel 5.6</h1>
            <div class="panel panel-primary">
                <div class="panel-heading">Please type here in text box to get search data</div>
                <div class="panel-body">
                <div>
                <input type="text" 
                    placeholder="Type here.."
                     v-model="buscar" 
                     v-on:keyup="autoComplete" 
                     class="form-control">

                <div class="panel-footer" v-if="clientes.length">
                <ul class="list-group">
                <li class="list-group-item" v-for="result in clientes">@{{ result.RazonSocial }}</li>
                </ul>
                </div>
                </div>
                </div>
            </div>
        </div>
    </div> -->
    
    </div>
    <pre>
        
    </pre>
    <div class="col-md-12">
        <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Nueva Facura</h4>
                  <div class="invoice p-3 mb-3">
                <!-- title row -->
                    <div class="row">
                    <div class="col-sm-4 invoice-col">
                        De:
                        <address>
                            <h2>Jugueteria SA</h2>
                            <br>
                            <strong>Direccion:  </strong><div>San Francisco 123</div><br>
                            <strong>Telefono:  </strong><div>3735-433221</div><br>
                            <strong>CUIT:  </strong><div>22-8978622-9</div><br>
                        </address>
                    </div>

                    <div class="col-sm-8 invoice-col">
                        
                        <div>
                            <input type="text" placeholder="Buscar Cliente..." v-model="buscar" v-on:keyup="autoComplete" class="form-control">
                            <div v-if="clientes.length">
                            <ul class="list-group">
                            <li class="list-group-item" 
                                v-for="(result,index) in clientes" 
                                :key="index" @click="seleccionaCliente(result.id)">@{{ result.RazonSocial }}</li>
                            </ul>
                            </div>
                        </div>
                    
                        <address>
                            <h2 v-text="cliente"></h2>
                           
                            <strong>Direccion:  </strong><div v-text="direccion"></div><br>
                          
                            <strong>Tel: </strong> <div v-text="telefono"></div><br>
                            <strong>Email: </strong> <div v-text="direccion"></div><br>
                            <strong>CUIT: </strong> <div v-text="cuit"></div> 
                        </address>
                        </div>
                    </div>

                    <div class="col-sm-4 invoice-col float-right">
                   
                    </div>

                    </div>
                   
               
                  </div>     
                <div class="card-body" >

                    <form 
                        method="POST" 
                        action="{{route('facturas.store')}}" 
                        enctype="'multipart/form-data" 
                        file="true"
                        v-on:keyup.enter.prevent="">
                            @csrf
                            <input type="" name="user_id" value="{{Auth::user()->id}}" hidden >
                            <input type="" name="cuit" v-model="cuit" hidden >
                            <div class="row">
                            
                              <div class="col-md-2">
                              <label for="">Punto de Venta</label>
                                <input type="text" class="form-control" name="ptoVenta" placeholder="Punto de Venta" value="1">
                              </div>
                              <div class="col-md-3">
                                  <label for="">Num Factura</label>
                                  @if($factura)
                                  <input type="text" class="form-control" placeholder="Numero de Factura" name="numFactura" value="{{($factura->numFactura)+1}}">

                                  @else
                                    <input type="text" class="form-control" placeholder="Numero de Factura" name="numFactura" value="1">

                                  @endif                    
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
                            
                            
                            <div class="row fila">

                            <div class="col-md-4">
                                <label for="">CodArticulo</label>
                                <input 
                                type="text" 
                                placeholder="Buscar Cod Articulo..." 
                                v-model="art" 
                                v-on:keyup="traerCodigo" 
                                @click="limpiarArt"
                                class="form-control">

                                <div v-if="articulos.length">
                                <ul class="list-group">
                                <li class="list-group-item" 
                                    v-for="(r,index) in articulos" 
                                    :key="index" @click="cargarArticulo(r.id)">@{{ r.codArticulo }}</li>
                                </ul>
                                </div>
                        </div>


                              <div class="col-md-4">
                                <label>Seleccione Articulo</label>
                                <div>
                                <input 
                                    type="text" 
                                    placeholder="Buscar Articulo..." 
                                    v-model="barticulo" v-on:keyup="buscarArticulo"
                                    @click="limpiarBarticulo" 
                                    class="form-control">
                                <div v-if="todos.length">
                                <ul class="list-group">
                                <li class="list-group-item" 
                                    v-for="resultado in todos" 
                                    :key="resultado.id"
                                    @click="cargarArticulo(resultado.id)">@{{ resultado.articulo }}
                                </li>
                                </ul>
                                </div>
                        </div>
                                
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

                             

                            </div>
                           

                            <div class="clearfix"></div>
                            <hr>
                            <button 
                                type='button' 
                                class="btn btn-info" 
                                @click="addNewRow()"
                                :disabled="botonDeshabilitado">
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
                             <tr v-for="(invoice_product, k) in detalles" :key="k" v-if="k>0" >
                                  <td scope="row" class="trashIconContainer">
                                      <i class="far fa-trash-alt" @click="deleteRow(k, invoice_product)"></i>
                                      <input name="codArticulo[]" class="form-control" type="text" v-model="invoice_product.id" hidden/>

                                  </td>
                                 
                                  <td>
                                      <input  class="form-control" type="text" v-model="invoice_product.codArticulo" />
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
                            <button 
                                type="submit" 
                                class="btn btn-primary pull-right"
                                :disabled="guardadoDeshabilitado"
                                >Guardar Factura</button>

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
   
    
   
   var app = new Vue({
    el: '#factura',
   
    data: {
        selected: null,
        cuit:null,
        cod:'',
        botonDeshabilitado:true,
        guardadoDeshabilitado:true,
        barticulo:'',
        precio:0,
        direccion:'',
        telefono:'',
        cliente:'',
        todos:[],
        articulos:[],
        cantidad:0,
        subTotal:0,
        sTotal:0,
        total:0,
        id_art:0,
        invoice_tax:21,
        detalles: [{
                id:'',
                codArticulo: '',
                articulo: '',
                precioUnitario: '',
                unidades: '',
                sTotal: 10
            }],
        clientes:[],
        razonSocial:'',
        buscar:'',
        art:'',
        detalle: 0,
       
    },
   
    watch:{
       total(newval,oldval){
        if(this.cuit>0 && this.detalle>0 && this.total>0){
              this.guardadoDeshabilitado = false;
          }else{
            if(this.detalle == 0 ){
                this.total = 0;
                this.guardadoDeshabilitado = true;
            }
          }
       },
      detalle(newval,oldval){
          if(this.cuit>0 && this.detalle>0 && this.total>0){
              this.guardadoDeshabilitado = false;
          }else{
            if(this.detalle == 0 ){
                this.total = 0;
                this.guardadoDeshabilitado = true;
            }
          }
          
      },
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
        cargarArticulo(id){
            var me = this;
            axios.get('/art/'+id)
            .then(function (response) {
                var res = response.data;
                me.precio = res.precio;
                me.id = res.id;
                me.art = res.codArticulo;
                me.barticulo = res.articulo;
                me.cantidad = res.cantidad;
            });
            me.todos = [];
            me.articulos=[];
            me.botonDeshabilitado = false;

        },
        traerCodigo(){
            var me = this;
            me.articulos = [];
            if(me.art.length >= 5){
             axios.get('/codArticulo/'+me.art).then(response => {
             me.articulos = response.data;
            
            });
            }else{
                me.articulos =[];
               
            }
        },
        buscarArticulo(){
            var me = this;
            me.todos = [];
            if(me.barticulo.length > 0){
             axios.get('/articulo/'+me.barticulo).then(response => {
             me.todos = response.data;
            
            });
            }else{
                me.todos =[];
                me.barticulo ='';
            }
        },
        seleccionaCliente(id){
            var me = this;
            axios.get('/cliente/'+id)
            .then(function (response) {
                var datos = response.data;
                me.cliente = datos.RazonSocial;
                me.direccion = datos.DireccionFiscal;
                me.telefono = datos.Telefono;
                me.email = datos.MailFacturacion;
                me.cuit = datos.NroDocumento;
                me.clientes =[];
                me.buscar ='';
                // always executed
            });
            me.buscar = '';


        },
        
        autoComplete(){
            var me = this;
            me.clientes = [];
            if(me.buscar.length > 0){
             axios.get('/buscar/'+me.buscar).then(response => {
             me.clientes = response.data;
            
            });
            }else{
                me.clientes =[];
                me.buscar ='';
            }
       
        },
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
           
            if (idx > -1) {
                this.detalles.splice(idx, 1);
            }
            this.calculateTotal();
            this.detalle--;
        },
      addNewRow() {
            this.detalles.push({
                id:this.id,
                codArticulo: this.art,
               
                articulo: this.barticulo,
                precioUnitario: this.precio,
                unidades:'',
                sTotal: 0
            });
            this.botonDeshabilitado = true;
            this.detalle++;
            
          
           
        },
      borrar(){
        this.cantidad ='';
      },
      limpiarBarticulo(){
          this.barticulo = '';
      },
      limpiarArt(){
          this.art = '';
      }

        
    },
    mounted(){
       
      }
    })
 </script>

@endsection