
<template>

<div class="container">
   
   
         <div class="col-md-6">
            <div class="form-group bmd-form-group">
             <basic-select :options="options"
                :selected-option="item"
                placeholder="select item"
                @select="onSelect">
                </basic-select>
                <h2>{{item.text}}</h2>
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
                            
                            <tr v-for="cliente in clientes" :key="cliente.id">
                                <td>{{cliente.id}}</td>
                                <td>{{cliente.RazonSocial}}</td>
                                <td>
                                <img :src="cliente.foto" alt="" width="120px">
                            </td>
                                <td>{{cliente.MailFacturacion}}</td>
                                
                                <td class="pull-right">
                                <!-- <a href="{{url('/clientes/'.$cliente->id.'/edit')}}" class="btn btn-primary"> -->
                                <button class="btn btn-primary" data-toggle="modal" data-target="#editClient">
                                <i class="fas fa-edit"></i>Editar
                                </button>
                           
                                </td>
                                
                                <td>
                                    
                                    <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>Eliminar
                                    </button>    
                                
                                </td>
                            
                            </tr>
                            
                        </tbody>
                    </table>
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
                                <form method="POST" action="/clientes" enctype="">
                                   
                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <input type="text" class="form-control" v-model="RazonSocial" placeholder="Nombre" maxlength="20">
                                        </div>
                                    </div>
                                    
                                            <div class="col-md-6">
                                            <div class="form-group bmd-form-group">
                                                <select name="" id="" v-model="id_tratamientos" class="form-control">
                                                    <option value="condicion.id" 
                                                    v-for="condicion in condiciones"
                                                    :key="condicion.id">{{condicion.condicion}}</option>
                                                </select>
                                            <!-- <basic-select :options="condiciones"
                                                :selected-option="condicion"
                                                placeholder="select item"
                                                @select="onSelect">
                                                </basic-select> -->
                                            </div>
                                             </div>

                                    
                                   
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group bmd-form-group">
                                                <select name="" id="" v-model="id_documento" class="form-control" >
                                                   
                                                    <option value="documento.id" 
                                                    v-for="documento in documentos"
                                                    :key="documento.id">{{documento.documento}}</option>
                                                </select>
                                            <!-- <basic-select :options="condiciones"
                                                :selected-option="condicion"
                                                placeholder="select item"
                                                @select="onSelect">
                                                </basic-select> -->
                                            </div>
                                             </div>
                                        <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <input type="text" class="form-control" v-model="NroDocumento" placeholder="DNI">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                        
                                        <input type="email" class="form-control" placeholder="Email" v-model="MailFacturacion">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                        
                                        <input type="number" class="form-control" placeholder="Telefono" v-model="Telefono">
                                        </div>
                                    </div>
                                    </div>
                                    
                                    
                                    <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group bmd-form-group">
                                        <input type="text" class="form-control" placeholder="Direccion Fiscal" v-model="DireccionFiscal">
                                        </div>
                                    </div>
                                    

                                    
                                    <div class="col-md-4">
                                        <div class="form-group bmd-form-group">
                                        <input type="number" class="form-control" placeholder="CP" v-model="CodigoPostal">
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
                                            <input class="" type="checkbox" v-model="Estado" id="exampleRadios1" value="1">
                                            Activo
                                        </div>
                                    </div>
                                    

                                    
                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="" type="checkbox" v-model="PercibeIVA" id="exampleRadios1" value="1">
                                            IVA
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-check">
                                            <input class="" type="checkbox" v-model="PercibeIIBB" id="exampleRadios1" value="1">
                                            Ingresos Brutos
                                        </div>
                                    </div>
                                    </div>

                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <select class="form-control" v-model="CondicionPago">
                                                    <option value="Debito">Debito</option>
                                                    <option value="Contado">Contado</option>
                                        
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                        <input type="text" class="form-control" placeholder="Contacto" v-model="Contacto">
                                        </div>
                                    </div>
                                    </div>

                                        <div class="row">
                                    <div class="col-md-4">
                                            <div class="form-check">
                                        <input class="" type="checkbox" v-model="EnviarComprobante" id="exampleRadios1" value="1">
                                        Enviar Comprobante
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                    <input type="text" v-model="Foto" >Seleccionar foto
                                    </div>
                                    </div>

                                    <button type="button" class="btn btn-primary pull-right" @click="guardarCLiente()">Guardar Cliente</button>
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
</template>

<script>
import vSelect from 'vue-select'
 import { BasicSelect } from 'vue-search-select'

    export default {
       components: {
        BasicSelect
        },
        data(){
            return {
                clientes:[],
                condiciones:[],
                documentos:[],
                cliente:'',
                valores:[],
                seleccionado:'',
                options: [],
                searchText: '', // If value is falsy, reset searchText & searchItem
                item: {
                value: '',
                text: '',

                RazonSocial:'',
                id_documento:'',
                NroDocumento:'',
                DireccionFiscal:'',
                CodigoPostal:'',
                PercibeIVA:'',
                PercibeIIBB:'',
                CondicionPago:'',
                EnviarComprobante:'',
                MailFacturacion:'',
                MailContacto:'',
                Contacto:'',
                Telefono:'',
                Estado:'',
                id_tratamiento:'',
                Foto:'',
               
                }
              
               
            }
        },
        methods:{
            guardarCLiente(){
                axios.post('/clientes', {
                    RazonSocial:this.RazonSocial,
                    id_documento:this.id_documento,
                    NroDocumento:this.NroDocumento,
                    DireccionFiscal:this.DireccionFiscal,
                    CodigoPostal:this.CodigoPostal,
                    PercibeIVA:this.PercibeIVA,
                    PercibeIIBB:this.PercibeIIBB,
                    CondicionPago:this.CondicionPago,
                    EnviarComprobante:this.EnviarComprobante,
                    MailFacturacion:this.MailFacturacion,
                    MailContacto:this.MailContacto,
                    Contacto:this.Contacto,
                    Telefono:this.Telefono,
                    Estado:this.Estado,
                    id_tratamiento:this.id_tratamiento,
                    foto:this.Foto,
                })
                .then(function (response) {
                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            listarClientes(){
                let me=this;
                axios.get('/clientes').then(function (response) {
                     var respuesta = response.data;
                     me.clientes = respuesta;
                     for (let index = 0; index < me.clientes.length; index++) {
                         
                          me.options.push( { value: index, text: me.clientes[index]['RazonSocial'] });
                     }
              
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            listarCondiciones(){
                let me=this;
                axios.get('/tratamientos').then(function (response) {
                     var res = response.data;
                     me.condiciones = res;
                    
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
             listarDocumentos(){
                let me=this;
                axios.get('/documentos').then(function (response) {
                     var res = response.data;
                     me.documentos = res;
                    
                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            seleccionar(val){
                console.log(val);
            },
             reset () {
        this.item = {}
      },
        onSelect (item) {
            this.item = item
        },
        reset () {
            this.item = {}
        },
        selectOption () {
            // select option from parent component
            this.item = this.options[0]
        },
        cerrarModal(){
            
        }
        },
        computed:{
            
        },
        mounted() {
            this.listarClientes();
           this.listarCondiciones();
           this.listarDocumentos();
        }
    }
</script>
