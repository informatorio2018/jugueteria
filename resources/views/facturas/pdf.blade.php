@extends('layouts.master')

@section('content')

    <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                  
                    <small class="float-right">PDF </small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                        <address>
                            <h2>Jugueteria SA</h2>
                           
                            <strong>Direccion:  </strong><div>San Francisco 123</div>
                            <strong>Telefono:  </strong><div>3735-433221</div>
                            <strong>CUIT:  </strong><div>22-8978622-9</div>
                        </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                 Cliente
                  <address>
                    <strong>{{$cliente->RazonSocial}}</strong><br>
                    <strong>CUIT:  </strong><div>{{$cliente->NroDocumento}}</div>
                    <strong>Direccion:  </strong><div>{{$cliente->DireccionFiscal}}</div>
                    <strong>Telefono:  </strong><div>{{$cliente->Telefono}}</div>
                    <strong>Email:  </strong><div>{{$cliente->MailFacturacion}}</div>
                   
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Factura #{{$factura->numFactura}}</b><br>
                  <br>
                  <b>Fecha</b> {{$factura->fecha}}<br>
                 
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Producto</th>
                      <th>Descripcion</th>
                      <th>Cantidad</th>
                      
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($detalles as $d)
                    <tr>
                      <td>{{$d->id}}</td>
                      <td>{{$d->articulo}}</td>
                      <td>{{$d->descripcion}}</td>
                      <td>{{$d->pivot->cantidad}}</td>
                      <td>{{$d->pivot->subTotal}}</td>
                    </tr>
                   @endforeach
                   
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Metodos de Pago</p>
                  <img src="/img/credit/visa.png" alt="Visa">
                  <img src="/img/credit/mastercard.png" alt="Mastercard">
                  <img src="/img/credit/american-express.png" alt="American Express">
                  <img src="/img/credit/paypal2.png" alt="Paypal">

                  <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                    plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Fecha de Impresion {{$factura->fecha}}</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                       <tr>
                      <th style="width:50%">Recargo:</th>
                        <td>{{$factura->recargo}}</td>
                      </tr>
                      <tr class="h1">
                        <th style="width:50%">Total:</th>
                        <td>{{$factura->total}}</td>

                      </tr>
                     
                     
                    </tbody></table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                  <button type="button" class="btn btn-success float-right"><i class="fa fa-credit-card"></i> Submit
                    Payment
                  </button>
                  <!-- <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fa fa-download"></i> Generate PDF
                  </button> -->

                  <a href="{{ route('pdf') }}" class="btn btn-primary float-right" style="margin-right: 5px;">
                  <i class="fa fa-download"></i> Generate PDF
                  </a>
                </div>
              </div>
            </div>
@endsection



